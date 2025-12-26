<?php
require_once 'config.php';

$erro  = '';
$sucesso = '';
$post   = [
  'id'       => '',
  'titulo'   => '',
  'conteudo' => '',
  'arquivo'  => ''
];

// 1) SE ENVIAR O FORMULÁRIO, ATUALIZA NO BANCO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id       = isset($_POST['id']) ? (int)$_POST['id'] : 0;
  $titulo   = trim($_POST['titulo'] ?? '');
  $conteudo = trim($_POST['conteudo'] ?? '');
  $arquivo  = trim($_POST['arquivo'] ?? '');

  if ($id <= 0) {
    $erro = 'Invalid post ID.';
  } elseif ($titulo === '' || $conteudo === '') {
    $erro = 'Title and content are required.';
  } else {
    $stmt = $conn->prepare("UPDATE posts SET titulo = ?, conteudo = ?, arquivo = ? WHERE id = ?");
    if ($stmt) {
      $stmt->bind_param("sssi", $titulo, $conteudo, $arquivo, $id);
      if ($stmt->execute()) {
        $sucesso = 'Post updated successfully.';
      } else {
        $erro = 'Error updating post. Please try again.';
      }
      $stmt->close();
    } else {
      $erro = 'Database error. Please try again.';
    }
  }

  // Recarrega dados para mostrar no formulário após salvar
  if ($id > 0) {
    $stmt = $conn->prepare("SELECT id, titulo, conteudo, arquivo FROM posts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado && $resultado->num_rows === 1) {
      $post = $resultado->fetch_assoc();
    }
    $stmt->close();
  }
}
// 2) PRIMEIRO ACESSO: CARREGA OS DADOS DO POST PELO ID NA URL (?id=3)
else {
  $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

  if ($id <= 0) {
    $erro = 'No post selected to edit.';
  } else {
    $stmt = $conn->prepare("SELECT id, titulo, conteudo, arquivo FROM posts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado && $resultado->num_rows === 1) {
      $post = $resultado->fetch_assoc();
    } else {
      $erro = 'Post not found.';
    }
    $stmt->close();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Edit Blog Post – Zach's Quality Services</title>

  <!-- Mesma fonte padrão do site -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
    rel="stylesheet"
  />

  <style>
    :root {
      --bg-page: #0a1024;
      --bg-card: #0f172a;
      --bg-input: #020617;
      --border-soft: #1f2937;
      --accent: #f59e0b;
      --accent-soft: rgba(245, 158, 11, 0.14);
      --text-main: #e5e7eb;
      --text-muted: #9ca3af;
      --danger: #f97373;
      --success: #34d399;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      -webkit-font-smoothing: antialiased;
      text-rendering: optimizeLegibility;
    }

    body {
      min-height: 100vh;
      background: radial-gradient(circle at top, #111827 0, #020617 55%, #000 100%);
      color: var(--text-main);
      font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont,
        "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px 16px;
    }

    .admin-shell {
      width: 100%;
      max-width: 980px;
      background: linear-gradient(145deg, #020617, #020617);
      border-radius: 20px;
      border: 1px solid #111827;
      box-shadow:
        0 24px 80px rgba(0, 0, 0, 0.8),
        0 0 0 1px rgba(15, 23, 42, 0.9);
      padding: 24px 24px 28px;
    }

    .admin-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      gap: 16px;
    }

    .admin-title-block {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .admin-kicker {
      font-size: 11px;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--text-muted);
    }

    .admin-title {
      font-size: 22px;
      font-weight: 600;
      color: #f9fafb;
    }

    .admin-subtitle {
      font-size: 13px;
      color: var(--text-muted);
    }

    .admin-actions {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .btn-link {
      border: none;
      background: transparent;
      color: var(--accent);
      font-size: 13px;
      cursor: pointer;
      text-decoration: none;
      padding: 6px 10px;
      border-radius: 999px;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .btn-link:hover {
      background-color: rgba(249, 115, 22, 0.12);
    }

    .badge-id {
      font-size: 11px;
      padding: 4px 9px;
      border-radius: 999px;
      border: 1px solid var(--border-soft);
      color: var(--text-muted);
    }

    .notice {
      margin-bottom: 16px;
      padding: 10px 12px;
      border-radius: 12px;
      font-size: 13px;
      display: flex;
      gap: 8px;
      align-items: flex-start;
    }

    .notice-error {
      background: rgba(248, 113, 113, 0.06);
      border: 1px solid rgba(248, 113, 113, 0.4);
      color: #fecaca;
    }

    .notice-success {
      background: rgba(22, 163, 74, 0.07);
      border: 1px solid rgba(52, 211, 153, 0.5);
      color: #bbf7d0;
    }

    .notice strong {
      font-weight: 600;
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1.6fr 1fr;
      gap: 18px;
      margin-top: 8px;
    }

    @media (max-width: 800px) {
      .form-grid {
        grid-template-columns: 1fr;
      }
    }

    .field {
      margin-bottom: 14px;
    }

    .field label {
      display: block;
      font-size: 13px;
      font-weight: 500;
      margin-bottom: 6px;
      color: #e5e7eb;
    }

    .field small {
      display: block;
      font-size: 11px;
      color: var(--text-muted);
      margin-top: 3px;
    }

    input[type="text"],
    textarea {
      width: 100%;
      border-radius: 10px;
      border: 1px solid var(--border-soft);
      background: var(--bg-input);
      padding: 9px 11px;
      font-size: 13px;
      color: var(--text-main);
      outline: none;
      resize: vertical;
      min-height: 40px;
    }

    textarea {
      min-height: 260px;
      line-height: 1.5;
    }

    input[type="text"]:focus,
    textarea:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 1px rgba(245, 158, 11, 0.3);
    }

    .help-box {
      background: #020617;
      border-radius: 14px;
      border: 1px dashed var(--border-soft);
      padding: 12px 12px 10px;
      font-size: 11px;
      color: var(--text-muted);
    }

    .help-box strong {
      color: #e5e7eb;
    }

    .help-box code {
      font-family: "JetBrains Mono", ui-monospace, SFMono-Regular, Menlo, Monaco,
        Consolas, "Liberation Mono", "Courier New", monospace;
      font-size: 11px;
      padding: 2px 4px;
      border-radius: 6px;
      background: rgba(15, 23, 42, 0.9);
      color: #e5e7eb;
    }

    .form-footer {
      margin-top: 10px;
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      align-items: center;
    }

    .btn-primary {
      border-radius: 999px;
      border: none;
      background: linear-gradient(135deg, #f97316, #facc15);
      color: #111827;
      font-size: 13px;
      font-weight: 600;
      padding: 9px 18px;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      box-shadow:
        0 10px 30px rgba(249, 115, 22, 0.5),
        0 0 0 1px rgba(15, 23, 42, 0.9);
    }

    .btn-primary:hover {
      filter: brightness(1.05);
    }

    .btn-secondary {
      border-radius: 999px;
      border: 1px solid var(--border-soft);
      background: transparent;
      color: var(--text-muted);
      font-size: 13px;
      padding: 8px 14px;
      cursor: pointer;
    }

    .btn-secondary:hover {
      border-color: #4b5563;
      color: #e5e7eb;
    }
  </style>
</head>
<body>
  <div class="admin-shell">
    <div class="admin-header">
      <div class="admin-title-block">
        <span class="admin-kicker">BLOG • EDIT POST</span>
        <h1 class="admin-title">Edit article content</h1>
        <p class="admin-subtitle">
          Update the title, body and featured image URL for this tip.
        </p>
      </div>

      <div class="admin-actions">
        <?php if (!empty($post['id'])): ?>
          <span class="badge-id">Post ID: <?php echo (int)$post['id']; ?></span>
        <?php endif; ?>
        <a href="tips-manager.php" class="btn-link">← Back to Posts Manager</a>
        <a href="tips.php" class="btn-link">View Tips page</a>
      </div>
    </div>

    <?php if ($erro): ?>
      <div class="notice notice-error">
        <strong>Heads up:</strong> <?php echo htmlspecialchars($erro); ?>
      </div>
    <?php endif; ?>

    <?php if ($sucesso): ?>
      <div class="notice notice-success">
        <strong>All set!</strong> <?php echo htmlspecialchars($sucesso); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($post['id'])): ?>
      <form method="post" action="post-edit.php">
        <input type="hidden" name="id" value="<?php echo (int)$post['id']; ?>">

        <div class="form-grid">
          <div>
            <div class="field">
              <label for="titulo">Title</label>
              <input
                type="text"
                id="titulo"
                name="titulo"
                value="<?php echo htmlspecialchars($post['titulo']); ?>"
                required
              />
            </div>

            <div class="field">
              <label for="conteudo">Content</label>
              <textarea
                id="conteudo"
                name="conteudo"
                required
              ><?php echo htmlspecialchars($post['conteudo']); ?></textarea>
              <small>
                To create light-blue tip cards on the article page, wrap each
                paragraph between asterisks, like:
                <code>*This paragraph will appear in a blue card.*</code>
              </small>
            </div>
          </div>

          <div>
            <div class="field">
              <label for="arquivo">Featured image URL (optional)</label>
              <input
                type="text"
                id="arquivo"
                name="arquivo"
                placeholder="https://www.zachsqualityservices.com/uploads/your-image.jpg"
                value="<?php echo htmlspecialchars($post['arquivo']); ?>"
              />
              <small>
                This image appears at the top of the article. It can be a full URL
                or a relative path like <code>uploads/bathroom-cleaning.jpg</code>.
              </small>
            </div>

            <div class="help-box">
              <strong>Formatting tips</strong><br><br>
              • Use normal paragraphs for body text.<br>
              • Text between <code>*asterisks*</code> will be rendered as
              highlighted cards.<br>
              • Keep titles short and benefit-oriented, e.g.
              <em>“5 Practical Tips to Keep Clinic Bathrooms Hygienic”</em>.
            </div>
          </div>
        </div>

        <div class="form-footer">
          <button type="button" class="btn-secondary" onclick="window.location.href='tips-manager.php'">
            Cancel
          </button>
          <button type="submit" class="btn-primary">
            Save changes
          </button>
        </div>
      </form>
    <?php endif; ?>
  </div>
</body>
</html>
