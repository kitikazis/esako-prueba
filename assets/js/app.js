/* ===================================================================
   ESAKO — interacción de cliente
   =================================================================== */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', init);

  function init() {
    initHero();
    initCarousel();
    initNav();
    initLang();
  }

  /* ----------------- HERO SLIDER ----------------- */
  function initHero() {
    var hero = document.querySelector('[data-hero]');
    if (!hero) return;
    var slides = Array.prototype.slice.call(hero.querySelectorAll('.hero-slide'));
    var dots = Array.prototype.slice.call(document.querySelectorAll('[data-hero-dots] .dot'));
    var titleEl = hero.querySelector('[data-hero-title]');
    var subEl = hero.querySelector('[data-hero-sub]');
    if (slides.length < 2) return;
    var i = 0, timer;

    function show(n) {
      i = (n + slides.length) % slides.length;
      slides.forEach(function (s, k) { s.classList.toggle('is-active', k === i); });
      dots.forEach(function (d, k) { d.classList.toggle('is-active', k === i); });
      if (titleEl) { titleEl.textContent = slides[i].getAttribute('data-title') || ''; }
      if (subEl) { subEl.textContent = slides[i].getAttribute('data-sub') || ''; }
      // reinicia animación del texto
      [titleEl, subEl].forEach(function (el) {
        if (!el) return; el.style.animation = 'none'; void el.offsetWidth; el.style.animation = '';
      });
    }
    function next() { show(i + 1); }
    function start() { stop(); timer = setInterval(next, 5000); }
    function stop() { if (timer) clearInterval(timer); }

    var p = hero.querySelector('[data-hero-prev]'), n = hero.querySelector('[data-hero-next]');
    if (p) p.addEventListener('click', function () { show(i - 1); start(); });
    if (n) n.addEventListener('click', function () { show(i + 1); start(); });
    dots.forEach(function (d) {
      d.addEventListener('click', function () { show(parseInt(d.getAttribute('data-dot'), 10)); start(); });
    });
    start();
  }

  /* ----------------- CARRUSEL ----------------- */
  function initCarousel() {
    var root = document.querySelector('[data-carousel]');
    if (!root) return;
    var track = root.querySelector('[data-carousel-track]');
    var items = track.querySelectorAll('.carousel-item');
    if (!items.length) return;
    var pos = 0, timer;

    function metrics() {
      var iw = items[0].getBoundingClientRect().width || 1;
      var visible = Math.max(1, Math.round(root.getBoundingClientRect().width / iw));
      var max = Math.max(0, items.length - visible);
      return { iw: iw, max: max };
    }
    function render() {
      var m = metrics();
      if (pos > m.max) pos = m.max;
      track.style.transform = 'translateX(' + (-pos * m.iw) + 'px)';
    }
    function next() { var m = metrics(); pos = pos >= m.max ? 0 : pos + 1; render(); }
    function prev() { var m = metrics(); pos = pos <= 0 ? m.max : pos - 1; render(); }
    function start() { stop(); timer = setInterval(next, 2800); }
    function stop() { if (timer) clearInterval(timer); }

    var p = root.querySelector('[data-carousel-prev]'), n = root.querySelector('[data-carousel-next]');
    if (p) p.addEventListener('click', function () { prev(); start(); });
    if (n) n.addEventListener('click', function () { next(); start(); });
    window.addEventListener('resize', render);
    render(); start();
  }

  /* ----------------- NAV (cerrar menú móvil al navegar) ----------------- */
  function initNav() {
    document.addEventListener('click', function (e) {
      var a = e.target.closest ? e.target.closest('a') : null;
      if (!a) return;
      if (a.matches('.nav-link') || a.matches('.dropdown-item')) {
        var chk = document.getElementById('navchk');
        if (chk) chk.checked = false;
      }
    });
  }

  /* ----------------- IDIOMA (Google Translate) -----------------
     La página es server-rendered: el HTML completo está presente al cargar.
     Por eso usamos cookie + recarga en AMBOS sentidos; Google Translate
     lee la cookie "googtrans" al iniciar y aplica el idioma de forma fiable.
       /es/en  → inglés
       /es/es  → español (original, sin traducir)
  */
  function initLang() {
    function setCookie(val) {
      var h = location.hostname;
      // limpia cualquier valor previo en todas las variantes de dominio
      var kill = 'googtrans=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/';
      document.cookie = kill;
      document.cookie = kill + ';domain=' + h;
      document.cookie = kill + ';domain=.' + h;
      // fija el nuevo valor
      document.cookie = 'googtrans=' + val + ';path=/';
      document.cookie = 'googtrans=' + val + ';path=/;domain=' + h;
      document.cookie = 'googtrans=' + val + ';path=/;domain=.' + h;
    }

    window.setLang = function (l) {
      setCookie('/es/' + (l === 'en' ? 'en' : 'es'));
      try { localStorage.setItem('esako_lang', l === 'en' ? 'en' : 'es'); } catch (e) {}
      location.reload();
    };

    // Carga el widget (lee la cookie googtrans y traduce automáticamente al cargar)
    window.googleTranslateElementInit = function () {
      try {
        new google.translate.TranslateElement(
          { pageLanguage: 'es', includedLanguages: 'en,es', autoDisplay: false },
          'google_translate_element'
        );
      } catch (e) {}
    };
    var s = document.createElement('script');
    s.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
    document.head.appendChild(s);

    // Clic en las banderas
    document.addEventListener('click', function (e) {
      var el = e.target.closest ? e.target.closest('[data-lang]') : null;
      if (el) { e.preventDefault(); window.setLang(el.getAttribute('data-lang')); }
    });
  }
})();
