<?php
session_start();

if (empty($_SESSION['is_admin'])) {
    header('Location: admin-login.php');
    exit;
}

// se o arquivo usa o banco:
require_once 'config.php';
?>

<?php
require_once "config.php";

$mensagemSucesso = null;
$mensagemErro = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo   = isset($_POST['titulo']) ? trim($_POST['titulo']) : '';
    $conteudo = isset($_POST['conteudo']) ? trim($_POST['conteudo']) : '';
    $caminhoArquivo = null;

    // pasta de uploads
    $dirUploads = __DIR__ . "/uploads/";
    if (!is_dir($dirUploads)) {
        mkdir($dirUploads, 0775, true);
    }

    // se veio arquivo
    if (!empty($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
        $nomeOriginal = basename($_FILES['arquivo']['name']);
        $ext = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

        // extensões permitidas
        $extPermitidas = ['pdf','doc','docx','jpg','jpeg','png','webp','avif'];
        if (!in_array($ext, $extPermitidas)) {
            $mensagemErro = "Tipo de arquivo não permitido. Use PDF, DOC, JPG, PNG, WEBP, AVIF.";
        } else {
            $nomeNovo = uniqid("post_") . "." . $ext;
            $caminhoDestinoFS = $dirUploads . $nomeNovo; // no servidor
            $caminhoPublico   = "uploads/" . $nomeNovo;  // URL relativa

            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminhoDestinoFS)) {
                $caminhoArquivo = $caminhoPublico;
            } else {
                $mensagemErro = "Erro ao fazer upload do arquivo.";
            }
        }
    }

    if (!$mensagemErro) {
        if ($titulo === '' && $conteudo === '' && $caminhoArquivo === null) {
            $mensagemErro = "Preencha o título, o conteúdo ou envie um arquivo.";
        } else {
            $stmt = $conn->prepare("INSERT INTO posts (titulo, conteudo, arquivo) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $titulo, $conteudo, $caminhoArquivo);

            if ($stmt->execute()) {
                $mensagemSucesso = "Postagem criada com sucesso!";
            } else {
                $mensagemErro = "Erro ao salvar no banco: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Client Hub – Create Blog Post</title>
  <link rel="stylesheet" href="style.css" />
  <script src="script.js" defer></script>
</head>
<body>
  <!-- Se quiser, mais tarde você copia aqui o mesmo header do index.html -->

  <main style="max-width: 800px; margin: 3rem auto; padding: 0 1.5rem;">
    <h1>Client Blog Hub</h1>
    <p>Escreva o post ou envie um arquivo do Canva (PDF, imagem, DOC).</p>

    <?php if ($mensagemSucesso): ?>
      <div style="background:#dcfce7;color:#166534;padding:8px 12px;border-radius:6px;margin:10px 0;">
        <?php echo htmlspecialchars($mensagemSucesso); ?>
      </div>
    <?php endif; ?>

    <?php if ($mensagemErro): ?>
      <div style="background:#fee2e2;color:#991b1b;padding:8px 12px;border-radius:6px;margin:10px 0;">
        <?php echo htmlspecialchars($mensagemErro); ?>
      </div>
    <?php endif; ?>

    <form action="post.php" method="post" enctype="multipart/form-data" style="display:grid;gap:1rem;">
      <div>
        <label for="titulo"><strong>Título *</strong></label><br>
        <input type="text" id="titulo" name="titulo" required style="width:100%;padding:0.5rem;">
      </div>

      <div>
        <label for="conteudo"><strong>Conteúdo (opcional se enviar arquivo)</strong></label><br>
        <textarea id="conteudo" name="conteudo" rows="8" style="width:100%;padding:0.5rem;"></textarea>
      </div>

      <div>
        <label for="arquivo"><strong>Arquivo (opcional)</strong></label><br>
        <input type="file" id="arquivo" name="arquivo">
        <p style="font-size:0.85rem;color:#64748b;margin-top:0.25rem;">
          Aceita: PDF, DOC, JPG, PNG, WEBP, AVIF.
        </p>
      </div>

      <button
        type="submit"
        style="padding:0.6rem 1.4rem;border:none;border-radius:999px;background:#0B163F;color:#fff;cursor:pointer;"
      >
        Publicar
      </button>
    </form>
  </main>
</body>
</html>
