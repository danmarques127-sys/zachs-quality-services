<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title>Article – Zach's Quality Services®</title>

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="style.css" />
  <script src="script.js" defer></script>
</head>
<body>
  <!-- mesmo HEADER -->
  <?php /* se você usa include do header, pode trocar isso por include */ ?>
  <header class="site-header" role="banner">
    <div class="site-header-inner">
      <div class="brand-block">
        <a href="/" class="brand-link" aria-label="Zach’s Quality Services Home">
          <img 
            src="images/logoz.png" 
            alt="Zach’s Quality Services logo"
            class="brand-logo"
            width="220"
            height="70"
          />
        </a>
      </div>

      <nav class="main-nav" role="navigation" aria-label="Primary">
        <ul class="main-nav-list">
          <li class="main-nav-item"><a class="main-nav-link" href="about.html">About Us</a></li>
          <li class="main-nav-item main-nav-has-sub">
            <button
              class="main-nav-link main-nav-toggle"
              aria-haspopup="true"
              aria-expanded="false"
              aria-controls="services-subnav"
            >
              Services
              <span class="nav-caret" aria-hidden="true">▼</span>
            </button>
            <ul class="subnav-list" id="services-subnav" role="menu">
              <li role="none"><a role="menuitem" class="subnav-link" href="janitorial.html">Nightly Janitorial</a></li>
              <li role="none"><a role="menuitem" class="subnav-link" href="day.html">Day Porter Services</a></li>
              <li role="none"><a role="menuitem" class="subnav-link" href="clinical.html">Clinical / Medical Cleaning</a></li>
              <li role="none"><a role="menuitem" class="subnav-link" href="floor.html">Floor Care &amp; Buffing</a></li>
              <li role="none"><a role="menuitem" class="subnav-link" href="strip.html">Strip &amp; Wax / Floor Refinishing</a></li>
              <li role="none"><a role="menuitem" class="subnav-link" href="construction.html">Post-Construction Clean-Up</a></li>
              <li role="none"><a role="menuitem" class="subnav-link" href="carpet.html">Carpet &amp; Upholstery Care</a></li>
              <li role="none"><a role="menuitem" class="subnav-link" href="desinfection.html">Disinfection &amp; Sanitization</a></li>
            </ul>
          </li>
          <li class="main-nav-item"><a class="main-nav-link" href="industries.html">Industries</a></li>
          <li class="main-nav-item"><a class="main-nav-link" href="tips.php">Tips &amp; Insights</a></li>
          <li class="main-nav-item"><a class="main-nav-link" href="reviews.html">Reviews</a></li>
          <li class="main-nav-item"><a class="main-nav-link" href="index.html#coverage-area">Coverage Area</a></li>
          <li class="main-nav-item"><a class="main-nav-link" href="contact.html">Contact Us</a></li>
        </ul>
      </nav>

      <div class="header-cta-wrapper">
        <a href="quote.html" class="header-cta-btn" data-cta="free-estimate">
          Free Estimate
        </a>
      </div>

      <button class="mobile-toggle" aria-label="Open menu" aria-controls="mobile-nav" aria-expanded="false">
        <span class="mobile-toggle-bar"></span>
        <span class="mobile-toggle-bar"></span>
        <span class="mobile-toggle-bar"></span>
      </button>
    </div>
  </header>

  <?php
    // pega o id da URL
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

    if ($id <= 0) {
      $post = null;
    } else {
      $stmt = $conn->prepare("SELECT id, titulo, conteudo, arquivo, criado_em FROM posts WHERE id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      $post = $result->fetch_assoc();
      $stmt->close();
    }
  ?>

 <?php
// buscar o post pelo id na URL ?id=3 por exemplo
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$titulo = $conteudo = $arquivo = $criado_em = '';

if ($id > 0) {
  $stmt = $conn->prepare("
    SELECT titulo, conteudo, arquivo, criado_em
    FROM posts
    WHERE id = ?
    LIMIT 1
  ");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->bind_result($titulo, $conteudo, $arquivo, $criado_em);
  $stmt->fetch();
  $stmt->close();
}

$data = $criado_em ? date('F j, Y', strtotime($criado_em)) : '';
$isImage = !empty($arquivo) && preg_match('/\.(jpe?g|png|gif|webp)$/i', $arquivo);
?>

<main class="tip-main">
  <section class="tip-section">
    <div class="container tip-container">

      <a href="tips.php" class="tip-back-link">← Back to Tips &amp; Insights</a>

      <?php if ($isImage): ?>
        <figure class="tip-hero-image">
          <img src="<?php echo htmlspecialchars($arquivo); ?>"
               alt="<?php echo htmlspecialchars($titulo); ?>">
        </figure>
      <?php endif; ?>

      <div class="tip-article-meta">
        <span class="tip-eyebrow">Tips &amp; Insights</span>

        <h1 class="tip-article-title">
          <?php echo htmlspecialchars($titulo); ?>
        </h1>

        <?php if (!empty($data)): ?>
          <p class="tip-article-date"><?php echo $data; ?></p>
        <?php endif; ?>
      </div>

      <article class="tip-article-body">
        <?php
          // --- transforma o conteudo em parágrafos e cardezinhos ----
          if (!empty($conteudo)) {
            // normaliza quebras de linha
            $texto = str_replace(["\r\n", "\r"], "\n", $conteudo);

            // separa em blocos por linha em branco
            $blocks = preg_split("/\n\s*\n/", trim($texto));

            foreach ($blocks as $bloco) {
              $bloco = trim($bloco);
              if ($bloco === '') continue;

              // se começar e terminar com * => vira card azul
              if ($bloco[0] === '*' && substr($bloco, -1) === '*' && strlen($bloco) >= 2) {
                $inner = trim(substr($bloco, 1, -1));
                echo '<div class="tip-highlight-card">' .
                      nl2br(htmlspecialchars($inner)) .
                     '</div>';
              } else {
                // parágrafo normal
                echo '<p>' . nl2br(htmlspecialchars($bloco)) . '</p>';
              }
            }
          }
        ?>
      </article>

    </div>
  </section>
</main>


 <div class="hero-divider"></div>
  <!-- ========== FOOTER – MESMO DE OUTRAS PÁGINAS ========== -->
  <footer class="site-footer" role="contentinfo">
    <div class="footer-inner">
      <!-- BRAND -->
      <div class="footer-column footer-brand">
        <a href="index.html" class="footer-logo-link" aria-label="Zach’s Quality Services Home">
          <img
            src="images/logoz.png"
            alt="Zach’s Quality Services logo"
            class="footer-logo"
            width="190"
            height="60"
          />
        </a>
        
        <p class="footer-tagline">
          Commercial &amp; janitorial cleaning for offices, clinics and facilities across Massachusetts.
        </p>
      </div>

      <!-- SERVICES -->
      <div class="footer-column footer-services">
        <h2 class="footer-heading">Services</h2>
        <ul class="footer-services-list">
          <li><a href="janitorial.html">Nightly Janitorial</a></li>
          <li><a href="day.html">Day Porter Services</a></li>
          <li><a href="clinical.html">Clinical / Medical Cleaning</a></li>
          <li><a href="floor.html">Floor Care &amp; Buffing</a></li>
          <li><a href="strip.html">Strip &amp; Wax / Floor Refinishing</a></li>
          <li><a href="construction.html">Post-Construction Clean-Up</a></li>
          <li><a href="carpet.html">Carpet &amp; Upholstery Care</a></li>
          <li><a href="desinfection.html">Disinfection &amp; Sanitization</a></li>
        </ul>
      </div>

      <!-- LINKS -->
      <div class="footer-column footer-links">
        <h2 class="footer-heading">Explore</h2>
        <ul class="footer-links-list">
          <li><a href="about.html">About Us</a></li>
          <li><a href="industries.html">Industries</a></li>
          <li><a href="tips.php">Tips &amp; Insights</a></li>
          <li><a href="index.html#coverage-area">Coverage Area &amp; Insights</a></li>
          <li><a href="reviews.html">Reviews</a></li>
          <li><a href="contact.html">Contact Us</a></li>
          <li><a href="quote.html">Request a Quote</a></li>
        </ul>
      </div>

      <!-- CONTACT -->
      <div class="footer-column footer-contact">
        <h2 class="footer-heading">Contact</h2>
        <ul class="footer-contact-list">
          <li>
            <span class="footer-contact-label">Call</span>
            <a href="tel:+15087268558">(508) 726-8558</a>
          </li>
          <li>
            <span class="footer-contact-label">Email</span>
            <a href="mailto:zachsqualityservices@gmail.com">zachsqualityservices@gmail.com</a>
          </li>
          <li>
            <span class="footer-contact-label">Service Area</span>
            Massachusetts (statewide)
          </li>
        </ul>

        <p class="footer-contact-note">
          Prefer phone or text? Our team is ready to respond.
        </p>

        <div class="footer-cta-wrapper">
          <a href="contact.html" class="footer-cta footer-cta-desktop">Contact Us</a>
          <a href="sms:+15087268558" class="footer-cta footer-cta-mobile">Text Us</a>
        </div>
      </div>
    </div>

    <div class="footer-social">
      <span class="footer-social-label">Connect with us</span>
      <div class="footer-social-links">
        <a href="https://facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="social-icon">
          <img src="images/facebook.png" alt="Facebook" />
        </a>
        <a href="https://linkedin.com/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="social-icon">
          <img src="images/linkedin.png" alt="LinkedIn" />
        </a>
        <a href="https://instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="social-icon">
          <img src="images/instagram.png" alt="Instagram" />
        </a>
        <a href="https://youtube.com/" target="_blank" rel="noopener noreferrer" aria-label="YouTube" class="social-icon">
          <img src="images/youtube.png" alt="YouTube" />
        </a>
        <a href="https://bark.com/" target="_blank" rel="noopener noreferrer" aria-label="Bark" class="social-icon">
          <img src="images/bark.png" alt="Bark" />
        </a>
        <a href="https://nextdoor.com/" target="_blank" rel="noopener noreferrer" aria-label="Nextdoor" class="social-icon">
          <img src="images/nextdoor.png" alt="Nextdoor" />
        </a>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© 2025 Zach’s Quality Services® — All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
