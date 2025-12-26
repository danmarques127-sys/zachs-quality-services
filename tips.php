<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""
  />
  <!-- ========== BASIC HTML META ========== -->
  <meta charset="UTF-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  />
  <meta
    http-equiv="X-UA-Compatible"
    content="IE=edge"
  />

  <!-- ========== TITLE ========== -->
  <title>Tips &amp; Insights – Zach's Quality Services®</title>

  <!-- ========== META DESCRIPTION ========== -->
  <meta
    name="description"
    content="Commercial cleaning tips, insights and practical guidance from Zach's Quality Services® to help you keep offices and facilities cleaner and safer across Massachusetts."
  />

  <!-- ========== KEYWORDS ========== -->
  <meta
    name="keywords"
    content="cleaning tips, janitorial tips, office cleaning Massachusetts, facility cleaning best practices"
  />

  <!-- ========== CANONICAL URL ========== -->
  <link
    rel="canonical"
    href="https://www.zachsqualityservices.com/tips"
  />

  <!-- FAVICONS -->
  <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
  <link rel="icon" type="image/x-icon" href="/favicons/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
  <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#0B163F">
  <link rel="manifest" href="/site.webmanifest">
  <meta name="theme-color" content="#0B163F">
  <meta name="msapplication-TileColor" content="#0B163F">
  <meta name="msapplication-config" content="/browserconfig.xml">

  <!-- ========== OPEN GRAPH / SOCIAL SHARING ========== -->
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Zach's Quality Services" />
  <meta
    property="og:title"
    content="Tips &amp; Insights – Zach's Quality Services®"
  />
  <meta
    property="og:description"
    content="Cleaning tips, janitorial best practices and facility hygiene insights from Zach's Quality Services® in Massachusetts."
  />
  <meta
    property="og:url"
    content="https://www.zachsqualityservices.com/tips"
  />
  <meta
    property="og:image"
    content="https://www.zachsqualityservices.com/assets/social-preview.jpg"
  />
  <meta
    property="og:image:alt"
    content="Commercial janitorial crew from Zach's Quality Services® on-site in Massachusetts."
  />

  <!-- ========== TWITTER CARD (X) ========== -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta
    name="twitter:title"
    content="Tips &amp; Insights – Zach's Quality Services®"
  />
  <meta
    name="twitter:description"
    content="Facility cleaning, office hygiene and janitorial tips for businesses across Massachusetts."
  />
  <meta
    name="twitter:image"
    content="https://www.zachsqualityservices.com/assets/social-preview.jpg"
  />

  <!-- ========== BASE FONT / RESET (igual aos outros arquivos) ========== -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap"
    rel="stylesheet"
  />

  <style>
    :root {
      --page-bg: #ffffff;
      --text-main: #0a1a2f;
      --accent: #1a4fa3;
      --border-soft: #dbe2ef;
      --font-body: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
    }

    * {
      box-sizing: border-box;
      -webkit-font-smoothing: antialiased;
      text-rendering: optimizeLegibility;
      margin: 0;
      padding: 0;
    }

    body {
      background-color: var(--page-bg);
      color: var(--text-main);
      font-family: var(--font-body);
      line-height: 1.5;
    }

    img {
      max-width: 100%;
      height: auto;
      display: block;
    }
  </style>

  <!-- ========== SITE STYLES & SCRIPTS ========== -->
  <link rel="stylesheet" href="style.css" />
  <script src="script.js" defer></script>
</head>
<body>
  <!-- HEADER IGUAL AOS OUTROS ARQUIVOS -->
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

      <!-- NAVIGATION (desktop) -->
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

      <!-- CTA DESKTOP -->
      <div class="header-cta-wrapper">
        <a href="quote.html" class="header-cta-btn" data-cta="free-estimate">
          Free Estimate
        </a>
      </div>

      <!-- MOBILE HAMBURGER -->
      <button class="mobile-toggle" aria-label="Open menu" aria-controls="mobile-nav" aria-expanded="false">
        <span class="mobile-toggle-bar"></span>
        <span class="mobile-toggle-bar"></span>
        <span class="mobile-toggle-bar"></span>
      </button>
    </div>

    <!-- MOBILE DRAWER -->
    <aside class="mobile-nav-drawer" id="mobile-nav" aria-hidden="true">
      <div class="mobile-nav-inner">
        <button class="mobile-close" aria-label="Close menu">&times;</button>

        <div class="mobile-brand-block">
          <a href="/" class="brand-link" aria-label="Zach’s Quality Services Home">
            <img
              src="images/logoa.png"
              alt="Zach’s Quality Services logo"
              class="mobile-brand-logo"
              width="200"
              height="60"
            />
          </a>
        </div>

        <nav class="mobile-nav-menu" role="navigation" aria-label="Mobile Primary">
          <ul class="mobile-nav-list">
            <li class="mobile-nav-item"><a class="mobile-nav-link" href="about.html">About Us</a></li>

            <li class="mobile-nav-item mobile-nav-has-sub">
              <button
                class="mobile-nav-link mobile-nav-toggle"
                aria-expanded="false"
                aria-controls="mobile-services-subnav"
                type="button"
              >
                Services
                <span class="nav-caret" aria-hidden="true">▼</span>
              </button>

              <ul class="mobile-subnav-list" id="mobile-services-subnav">
                <li><a class="mobile-subnav-link" href="janitorial.html">Nightly Janitorial</a></li>
                <li><a class="mobile-subnav-link" href="day.html">Day Porter Services</a></li>
                <li><a class="mobile-subnav-link" href="clinical.html">Clinical / Medical Cleaning</a></li>
                <li><a class="mobile-subnav-link" href="floor.html">Floor Care &amp; Buffing</a></li>
                <li><a class="mobile-subnav-link" href="strip.html">Strip &amp; Wax / Floor Refinishing</a></li>
                <li><a class="mobile-subnav-link" href="construction.html">Post-Construction Clean-Up</a></li>
                <li><a class="mobile-subnav-link" href="carpet.html">Carpet &amp; Upholstery Care</a></li>
                <li><a class="mobile-subnav-link" href="desinfection.html">Disinfection &amp; Sanitization</a></li>
              </ul>
            </li>

            <li class="mobile-nav-item"><a class="mobile-nav-link" href="industries.html">Industries</a></li>
            <li class="mobile-nav-item"><a class="mobile-nav-link" href="tips.php">Tips &amp; Insights</a></li>
            <li class="mobile-nav-item"><a class="mobile-nav-link" href="reviews.html">Reviews</a></li>
            <li class="mobile-nav-item"><a class="mobile-nav-link" href="index.html#coverage-area">Coverage Area</a></li>
            <li class="mobile-nav-item"><a class="mobile-nav-link" href="contact.html">Contact Us</a></li>
          </ul>
        </nav>

        <a class="mobile-cta-btn" href="quote.html" data-cta="free-estimate-mobile">
          Free Estimate
        </a>

        <div class="mobile-contact-block">
          <div class="contact-line">
            <span class="contact-label">Call:</span>
            <a class="contact-value" href="tel:+15087268558">(508) 726-8558</a>
          </div>
          <div class="contact-line">
            <span class="contact-label">Headquarters:</span>
            <span class="contact-value">
              123 Main St<br>
              Framingham, MA 01701
            </span>
          </div>
          <div class="contact-line">
            <span class="contact-label">Coverage:</span>
            <span class="contact-value">Massachusetts (statewide)</span>
          </div>
          <div class="contact-line">
            <span class="contact-label">Availability:</span>
            <span class="contact-value">24/7 Emergency Response</span>
          </div>
        </div>
      </div>
    </aside>

    <!-- dark overlay behind drawer -->
    <div class="mobile-overlay" aria-hidden="true"></div>
  </header>
<p>



  </p>
  <!-- ========== MAIN – BLOG LIST USANDO O NOVO BANCO tips.posts ========== -->
<main>
  <section class="blog-section">
    <div class="container">
      <span class="section-tag">Tips &amp; Insights</span>
      <h1 class="blog-title">Commercial Cleaning Tips &amp; Insights</h1>
      <p class="blog-intro">
        Practical guidance on office cleaning, janitorial best practices and facility hygiene across Massachusetts.
      </p>

      <?php
      // ===== PAGINAÇÃO =====
      $perPage = 6; // posts por página

      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      if ($page < 1) {
        $page = 1;
      }
      $offset = ($page - 1) * $perPage;

      // total de posts
      $totalPosts = 0;
      $countSql = "SELECT COUNT(*) AS total FROM posts";
      $countRes = $conn->query($countSql);
      if ($countRes && $rowCount = $countRes->fetch_assoc()) {
        $totalPosts = (int)$rowCount['total'];
      }

      $totalPages = $totalPosts > 0 ? (int)ceil($totalPosts / $perPage) : 1;

      // buscar posts da tabela tips.posts (mysqli) com LIMIT/OFFSET
      $sql = "
        SELECT id, titulo, conteudo, arquivo, criado_em
        FROM posts
        ORDER BY criado_em DESC
        LIMIT $perPage OFFSET $offset
      ";
      $result = $conn->query($sql);

      if (!$result || $result->num_rows === 0):
      ?>
        <p>No tips published yet. Check back soon.</p>
      <?php
      else:
      ?>
        <div class="blog-list">
          <?php
          while ($row = $result->fetch_assoc()):
            $id       = (int)$row['id'];
            $titulo   = $row['titulo'];
            $conteudo = $row['conteudo'];
            $arquivo  = $row['arquivo'];
            $data     = $row['criado_em'] ? date('F j, Y', strtotime($row['criado_em'])) : '';

            // cria excerpt do conteúdo
            $excerpt = '';
            if (!empty($conteudo)) {
              $textoLimpo = strip_tags($conteudo);
              if (mb_strlen($textoLimpo) > 220) {
                $excerpt = mb_substr($textoLimpo, 0, 220) . '…';
              } else {
                $excerpt = $textoLimpo;
              }
            }

            // verifica se o arquivo é imagem
            $isImage = false;
            if (!empty($arquivo)) {
              $isImage = preg_match('/\.(jpe?g|png|gif|webp)$/i', $arquivo);
            }
          ?>
            <article class="blog-card">
              <a class="blog-card-link" href="tip.php?id=<?php echo $id; ?>">
                <?php if ($isImage): ?>
                  <figure class="blog-card-thumb">
                    <img
                      src="<?php echo htmlspecialchars($arquivo); ?>"
                      alt="<?php echo htmlspecialchars($titulo); ?>"
                    >
                  </figure>
                <?php endif; ?>

                <div class="blog-card-content">
                  <h2 class="blog-card-title">
                    <?php echo htmlspecialchars($titulo); ?>
                  </h2>

                  <?php if (!empty($data)): ?>
                    <p class="blog-card-meta">
                      <?php echo $data; ?>
                    </p>
                  <?php endif; ?>

                  <?php if (!empty($excerpt)): ?>
                    <p class="blog-card-excerpt">
                      <?php echo nl2br(htmlspecialchars($excerpt)); ?>
                    </p>
                  <?php endif; ?>

                  <span class="blog-card-readmore">
                    Read full article →
                  </span>
                </div>
              </a>
            </article>
          <?php endwhile; ?>
        </div>

        <?php if ($totalPages > 1): ?>
          <nav class="blog-pagination" aria-label="Tips pagination">
            <ul class="blog-pagination-list">
              <?php if ($page > 1): ?>
                <li>
                  <a class="blog-pagination-link blog-pagination-prev"
                     href="?page=<?php echo $page - 1; ?>">&laquo; Prev</a>
                </li>
              <?php endif; ?>

              <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li>
                  <?php if ($i === $page): ?>
                    <span class="blog-pagination-link blog-pagination-current">
                      <?php echo $i; ?>
                    </span>
                  <?php else: ?>
                    <a class="blog-pagination-link"
                       href="?page=<?php echo $i; ?>">
                      <?php echo $i; ?>
                    </a>
                  <?php endif; ?>
                </li>
              <?php endfor; ?>

              <?php if ($page < $totalPages): ?>
                <li>
                  <a class="blog-pagination-link blog-pagination-next"
                     href="?page=<?php echo $page + 1; ?>">Next &raquo;</a>
                </li>
              <?php endif; ?>
            </ul>
          </nav>
        <?php endif; ?>

      <?php endif; ?>
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
