document.addEventListener('DOMContentLoaded', function () {
  // ==========================
  // MOBILE NAV DRAWER
  // ==========================
  const mobileToggleBtn = document.querySelector('.mobile-toggle');
  const mobileDrawer = document.querySelector('.mobile-nav-drawer');
  const mobileCloseBtn = document.querySelector('.mobile-close');
  const overlay = document.querySelector('.mobile-overlay');

  function openMobileNav() {
    if (!mobileDrawer || !mobileToggleBtn || !overlay) return;

    mobileDrawer.classList.add('is-open');
    mobileDrawer.setAttribute('aria-hidden', 'false');
    mobileToggleBtn.setAttribute('aria-expanded', 'true');
    overlay.classList.add('is-active');
    document.body.style.overflow = 'hidden'; // lock scroll
  }

  function closeMobileNav() {
    if (!mobileDrawer || !mobileToggleBtn || !overlay) return;

    mobileDrawer.classList.remove('is-open');
    mobileDrawer.setAttribute('aria-hidden', 'true');
    mobileToggleBtn.setAttribute('aria-expanded', 'false');
    overlay.classList.remove('is-active');
    document.body.style.overflow = ''; // restore scroll
  }

  if (mobileToggleBtn && mobileDrawer && overlay) {
    mobileToggleBtn.addEventListener('click', () => {
      const isOpen = mobileDrawer.classList.contains('is-open');
      isOpen ? closeMobileNav() : openMobileNav();
    });

    mobileCloseBtn && mobileCloseBtn.addEventListener('click', closeMobileNav);
    overlay.addEventListener('click', closeMobileNav);

    // Close drawer when clicking a mobile nav LINK (anchors only, not buttons)
    document.querySelectorAll('a.mobile-nav-link').forEach(link => {
      link.addEventListener('click', closeMobileNav);
    });

    // Close drawer on ESC key
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape' && mobileDrawer.classList.contains('is-open')) {
        closeMobileNav();
      }
    });
  }

  // ==========================
  // MOBILE SUBMENU "SERVICES"
  // ==========================
  const mobileServicesItem = document.querySelector('.mobile-nav-has-sub');
  const mobileServicesToggle = mobileServicesItem
    ? mobileServicesItem.querySelector('.mobile-nav-toggle')
    : null;
  const mobileServicesMenu = mobileServicesItem
    ? mobileServicesItem.querySelector('.mobile-subnav-list')
    : null;

  function closeMobileServicesMenu() {
    if (!mobileServicesItem || !mobileServicesToggle || !mobileServicesMenu) return;
    mobileServicesItem.classList.remove('is-open');
    mobileServicesToggle.setAttribute('aria-expanded', 'false');
  }

  function toggleMobileServicesMenu() {
    if (!mobileServicesItem || !mobileServicesToggle || !mobileServicesMenu) return;
    const isOpen = mobileServicesItem.classList.contains('is-open');
    if (isOpen) {
      closeMobileServicesMenu();
    } else {
      mobileServicesItem.classList.add('is-open');
      mobileServicesToggle.setAttribute('aria-expanded', 'true');
    }
  }

  if (mobileServicesToggle && mobileServicesItem && mobileServicesMenu) {
    mobileServicesToggle.addEventListener('click', e => {
      e.preventDefault();
      toggleMobileServicesMenu();
    });

    // When clicking a service link in the mobile submenu, close submenu + drawer
    mobileServicesMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        closeMobileServicesMenu();
        closeMobileNav();
      });
    });
  }

  // ==========================
  // DESKTOP SUBMENU "SERVICES"
  // ==========================
  const servicesToggle = document.querySelector('.main-nav-toggle');
  const servicesItem = document.querySelector('.main-nav-has-sub');
  const servicesMenu = servicesItem ? servicesItem.querySelector('.subnav-list') : null;

  function closeServicesMenu() {
    if (!servicesItem || !servicesToggle || !servicesMenu) return;

    servicesItem.classList.remove('is-open');
    servicesToggle.setAttribute('aria-expanded', 'false');
  }

  function openServicesMenu() {
    if (!servicesItem || !servicesToggle || !servicesMenu) return;

    servicesItem.classList.add('is-open');
    servicesToggle.setAttribute('aria-expanded', 'true');
  }

  function toggleServicesMenu() {
    if (!servicesItem || !servicesToggle || !servicesMenu) return;

    const isOpen = servicesItem.classList.contains('is-open');
    if (isOpen) {
      closeServicesMenu();
    } else {
      openServicesMenu();
    }
  }

  if (servicesToggle && servicesItem && servicesMenu) {
    servicesToggle.addEventListener('click', e => {
      e.preventDefault();
      toggleServicesMenu();
    });

    // Close submenu when clicking outside (desktop)
    document.addEventListener('click', e => {
      if (!servicesItem.contains(e.target) && servicesItem.classList.contains('is-open')) {
        closeServicesMenu();
      }
    });

    // Close submenu on ESC (desktop)
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape' && servicesItem.classList.contains('is-open')) {
        closeServicesMenu();
      }
    });

    // Reset submenu state when resizing to desktop
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 992) {
        closeServicesMenu();
      }
    });
  }
});
   // ==========================
  // HERO CAROUSEL (BACKGROUND)
  // ==========================
  const heroSlides = document.querySelectorAll('.hero-bg-slide');
  const HERO_INTERVAL = 7000; // 7 segundos
  let heroCurrentIndex = 0;
  let heroCarouselTimer = null;

  const heroControlsContainer = document.querySelector('.hero-carousel-controls');
  const heroDots = [];

  // Lazy-load das imagens de fundo
  function ensureSlideBackground(slide) {
    if (!slide) return;
    const bg = slide.getAttribute('data-bg');
    if (bg && !slide.style.backgroundImage) {
      slide.style.backgroundImage = `url("${bg}")`;
    }
  }

  function updateHeroDots() {
    heroDots.forEach((dot, i) => {
      dot.classList.toggle('is-active', i === heroCurrentIndex);
    });
  }

  function showHeroSlide(index) {
    if (!heroSlides.length) return;

    heroSlides.forEach((slide, i) => {
      if (i === index) {
        ensureSlideBackground(slide);
        slide.classList.add('is-active');
      } else {
        slide.classList.remove('is-active');
      }
    });

    updateHeroDots();
  }

  function goToHeroSlide(index) {
    if (!heroSlides.length) return;
    heroCurrentIndex = (index + heroSlides.length) % heroSlides.length;
    showHeroSlide(heroCurrentIndex);
  }

  function resetHeroInterval() {
    if (heroCarouselTimer) {
      clearInterval(heroCarouselTimer);
    }
    heroCarouselTimer = setInterval(() => {
      goToHeroSlide(heroCurrentIndex + 1);
    }, HERO_INTERVAL);
  }

  // Monta os controles (setas + bolinhas)
  if (heroControlsContainer && heroSlides.length) {
    const prevBtn = document.createElement('button');
    prevBtn.type = 'button';
    prevBtn.className = 'hero-nav-btn hero-nav-prev';
    prevBtn.setAttribute('aria-label', 'Previous background image');
    prevBtn.textContent = '‹';

    const nextBtn = document.createElement('button');
    nextBtn.type = 'button';
    nextBtn.className = 'hero-nav-btn hero-nav-next';
    nextBtn.setAttribute('aria-label', 'Next background image');
    nextBtn.textContent = '›';

    const dotsWrapper = document.createElement('div');
    dotsWrapper.className = 'hero-dots';

    heroSlides.forEach((slide, index) => {
      const dot = document.createElement('button');
      dot.type = 'button';
      dot.className = 'hero-dot' + (index === 0 ? ' is-active' : '');
      dot.setAttribute('aria-label', `Go to slide ${index + 1}`);
      dot.dataset.heroIndex = index.toString();
      dotsWrapper.appendChild(dot);
      heroDots.push(dot);
    });

    heroControlsContainer.appendChild(prevBtn);
    heroControlsContainer.appendChild(dotsWrapper);
    heroControlsContainer.appendChild(nextBtn);

    prevBtn.addEventListener('click', () => {
      goToHeroSlide(heroCurrentIndex - 1);
      resetHeroInterval();
    });

    nextBtn.addEventListener('click', () => {
      goToHeroSlide(heroCurrentIndex + 1);
      resetHeroInterval();
    });

    heroDots.forEach(dot => {
      dot.addEventListener('click', () => {
        const targetIndex = parseInt(dot.dataset.heroIndex, 10);
        goToHeroSlide(targetIndex);
        resetHeroInterval();
      });
    });
  }

  // Inicia o carrossel
  if (heroSlides.length) {
    ensureSlideBackground(heroSlides[0]);
    goToHeroSlide(0);
    resetHeroInterval();
  }
    // ==========================
  // GOOGLE REVIEWS CAROUSEL – 3 cards (prev / center / next)
  // ==========================
  const googleReviewCards = document.querySelectorAll('.google-review-card');
  const googlePrevBtn = document.querySelector('.gr-nav-prev');
  const googleNextBtn = document.querySelector('.gr-nav-next');

  if (googleReviewCards.length && googlePrevBtn && googleNextBtn) {
    let googleCurrentIndex = 0;
    const GOOGLE_INTERVAL = 8000; // 8s

    function updateGoogleClasses() {
      const total = googleReviewCards.length;

      googleReviewCards.forEach((card, i) => {
        card.classList.remove('is-center', 'is-prev', 'is-next', 'is-hidden');

        if (i === googleCurrentIndex) {
          card.classList.add('is-center');
        } else if (i === (googleCurrentIndex - 1 + total) % total) {
          card.classList.add('is-prev');
        } else if (i === (googleCurrentIndex + 1) % total) {
          card.classList.add('is-next');
        } else {
          card.classList.add('is-hidden');
        }
      });
    }

    function goToPrevGoogleReview() {
      googleCurrentIndex =
        (googleCurrentIndex - 1 + googleReviewCards.length) %
        googleReviewCards.length;
      updateGoogleClasses();
    }

    function goToNextGoogleReview() {
      googleCurrentIndex =
        (googleCurrentIndex + 1) % googleReviewCards.length;
      updateGoogleClasses();
    }

    googlePrevBtn.addEventListener('click', () => {
      goToPrevGoogleReview();
      resetGoogleInterval();
    });

    googleNextBtn.addEventListener('click', () => {
      goToNextGoogleReview();
      resetGoogleInterval();
    });

    let googleTimer = null;

    function resetGoogleInterval() {
      if (googleTimer) {
        clearInterval(googleTimer);
      }
      googleTimer = setInterval(goToNextGoogleReview, GOOGLE_INTERVAL);
    }

    // inicia
    updateGoogleClasses();
    resetGoogleInterval();
  }
// Mobile dots highlight based on scroll position
const cards = document.querySelectorAll('.industry-card');
const dots = document.querySelectorAll('.m-dot');
const grid = document.querySelector('.industries-grid');

if (grid && cards.length === dots.length) {
  grid.addEventListener('scroll', () => {
    let index = Math.round(grid.scrollLeft / grid.clientWidth);
    dots.forEach(dot => dot.classList.remove('active'));
    if (dots[index]) dots[index].classList.add('active');
  });
}
// ==========================
// VALUES & CULTURE CAROUSEL
// ==========================
(function () {
  const track = document.querySelector('[data-values-track]');
  if (!track) return;

  const cards = Array.from(track.querySelectorAll('.value-card'));
  if (!cards.length) return;

  const dotsContainer = document.querySelector('[data-values-dots]');
  const prevBtn = document.querySelector('[data-values-prev]');
  const nextBtn = document.querySelector('[data-values-next]');
  const mqMobile = window.matchMedia('(max-width: 900px)');

  let currentIndex = 0;

  // cria os pontinhos
  const dots = cards.map((_, index) => {
    if (!dotsContainer) return null;
    const dot = document.createElement('button');
    dot.type = 'button';
    dot.className = 'values-dot' + (index === 0 ? ' is-active' : '');
    dot.setAttribute('aria-label', `Go to value ${index + 1}`);
    dot.addEventListener('click', () => scrollToIndex(index));
    dotsContainer.appendChild(dot);
    return dot;
  });

  function updateDots(index) {
    if (!dots) return;
    dots.forEach((dot, i) => {
      if (!dot) return;
      dot.classList.toggle('is-active', i === index);
    });
  }

  function clampIndex(index) {
    const max = cards.length - 1;
    if (index < 0) return 0;
    if (index > max) return max;
    return index;
  }

  function scrollToIndex(index) {
    index = clampIndex(index);
    currentIndex = index;

    if (!mqMobile.matches) {
      // no desktop todos os cards estão na tela, só atualizamos os dots
      updateDots(index);
      return;
    }

    const width = track.clientWidth || 1;
    track.scrollTo({
      left: width * index,
      behavior: 'smooth'
    });
    updateDots(index);
  }

  function handlePrev() {
    scrollToIndex(currentIndex - 1);
  }

  function handleNext() {
    scrollToIndex(currentIndex + 1);
  }

  prevBtn && prevBtn.addEventListener('click', handlePrev);
  nextBtn && nextBtn.addEventListener('click', handleNext);

  // quando o usuário arrasta com o dedo
  track.addEventListener('scroll', () => {
    if (!mqMobile.matches) return;
    const width = track.clientWidth || 1;
    const index = clampIndex(Math.round(track.scrollLeft / width));
    if (index !== currentIndex) {
      currentIndex = index;
      updateDots(index);
    }
  });

  // quando entra/sai do breakpoint mobile
  mqMobile.addEventListener('change', () => {
    currentIndex = 0;
    if (mqMobile.matches) {
      track.scrollTo({ left: 0 });
    } else {
      track.scrollLeft = 0;
    }
    updateDots(0);
  });

  // estado inicial
  updateDots(0);
})();
// Nightly Janitorial – Before & After carousel + lightbox
document.addEventListener('DOMContentLoaded', function () {
  const workTrack = document.querySelector('[data-work-track]');
  if (!workTrack) return;

  const slides = Array.from(workTrack.querySelectorAll('.tl-work-slide'));
  const btnPrev = document.querySelector('[data-work-prev]');
  const btnNext = document.querySelector('[data-work-next]');

  if (!slides.length) return;

  // slide ativo inicial
  let currentIndex = slides.findIndex((s) => s.classList.contains('is-active'));
  if (currentIndex === -1) currentIndex = 0;

  function showWorkSlide(idx) {
    if (!slides.length) return;

    if (idx < 0) idx = slides.length - 1;
    if (idx >= slides.length) idx = 0;

    slides.forEach((slide, i) => {
      const isThis = i === idx;
      slide.classList.toggle('is-active', isThis);
      slide.style.pointerEvents = isThis ? 'auto' : 'none';
    });

    currentIndex = idx;
  }

  // aplica na carga
  showWorkSlide(currentIndex);

  // botões prev/next
  if (btnPrev) {
    btnPrev.addEventListener('click', () => {
      showWorkSlide(currentIndex - 1);
    });
  }

  if (btnNext) {
    btnNext.addEventListener('click', () => {
      showWorkSlide(currentIndex + 1);
    });
  }

  // ---------- LIGHTBOX ----------
  let lightboxEl = null;
  let lightboxImg = null;

  function openLightbox(src, altText) {
    if (!lightboxEl) {
      lightboxEl = document.createElement('div');
      lightboxEl.className = 'tl-lightbox';

      lightboxImg = document.createElement('img');

      // fecha clicando fora
      lightboxEl.addEventListener('click', (e) => {
        if (e.target === lightboxEl) {
          lightboxEl.remove();
        }
      });

      lightboxEl.appendChild(lightboxImg);
    }

    lightboxImg.src = src;
    lightboxImg.alt = altText || '';
    document.body.appendChild(lightboxEl);
  }

  // clique em cada slide abre o lightbox
  slides.forEach((slide) => {
    const img = slide.querySelector('img');
    if (!img) return;

    img.style.cursor = 'zoom-in';

    img.addEventListener('click', () => {
      const src = img.getAttribute('src');
      const alt = img.getAttribute('alt') || '';
      openLightbox(src, alt);
    });
  });

  // auto-slide opcional (pode comentar se não quiser)
  const AUTO_DELAY = 7000;
  let autoTimer = null;

  function startAuto() {
    stopAuto();
    autoTimer = setInterval(() => {
      showWorkSlide(currentIndex + 1);
    }, AUTO_DELAY);
  }

  function stopAuto() {
    if (autoTimer) {
      clearInterval(autoTimer);
      autoTimer = null;
    }
  }

  startAuto();

  workTrack.addEventListener('mouseenter', stopAuto);
  workTrack.addEventListener('mouseleave', startAuto);

  document.addEventListener('visibilitychange', () => {
    if (document.hidden) stopAuto();
    else startAuto();
  });
});
// LIGHTBOX PARA GALERIA GERAL
document.addEventListener('DOMContentLoaded', function () {
  const galleryItems = document.querySelectorAll('[data-gallery-img] img');

  if (!galleryItems.length) return;

  let lightboxEl = null;
  let lightboxImg = null;

  function openLightbox(src, altText) {
    if (!lightboxEl) {
      lightboxEl = document.createElement('div');
      lightboxEl.className = 'tl-lightbox';
      lightboxImg = document.createElement('img');
      
      lightboxEl.addEventListener('click', (e) => {
        if (e.target === lightboxEl) lightboxEl.remove();
      });

      lightboxEl.appendChild(lightboxImg);
    }
    lightboxImg.src = src;
    lightboxImg.alt = altText || '';
    document.body.appendChild(lightboxEl);
  }

  galleryItems.forEach((img) => {
    img.style.cursor = 'zoom-in';
    img.addEventListener('click', () => {
      openLightbox(img.getAttribute('src'), img.getAttribute('alt'));
    });
  });
});
