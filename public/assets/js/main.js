/* ============================================================
   main.js — Portfolio interactivity
   ============================================================ */
'use strict';

// ── 0. Real-time Clock ─────────────────────────────────────
(function () {
  const h  = document.getElementById('clockH');
  const m  = document.getElementById('clockM');
  const s  = document.getElementById('clockS');
  const gr = document.getElementById('clockGreeting');
  const dt = document.getElementById('clockDate');
  if (!h) return;

  const days   = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
  const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  const pad    = n => String(n).padStart(2, '0');

  function tick() {
    const now  = new Date();
    const hour = now.getHours();
    h.textContent  = pad(hour);
    m.textContent  = pad(now.getMinutes());
    s.textContent  = pad(now.getSeconds());

    // Greeting
    const greeting = hour < 12 ? 'Good Morning ☀️'
                   : hour < 17 ? 'Good Afternoon 🌤️'
                   : hour < 21 ? 'Good Evening 🌆'
                   :             'Good Night 🌙';
    if (gr) gr.textContent = greeting;

    // Date: Monday, May 19, 2026
    if (dt) dt.textContent = `${days[now.getDay()]}, ${months[now.getMonth()]} ${now.getDate()}, ${now.getFullYear()}`;
  }

  tick();
  setInterval(tick, 1000);
})();

// ── 1. Navbar scroll effect ────────────────────────────────
const nav = document.getElementById('mainNav');
if (nav) {
  const onScroll = () => nav.classList.toggle('scrolled', window.scrollY > 60);
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}

// ── 1b. Hamburger left-drawer toggle ──────────────────────
(function () {
  const toggler = document.querySelector('.navbar-toggler');
  const menu    = document.getElementById('navbarMenu');
  if (!toggler || !menu) return;

  // Create full-screen overlay
  const overlay = document.createElement('div');
  overlay.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:1039;display:none;';
  document.body.appendChild(overlay);

  const openDrawer = () => {
    menu.classList.add('show');
    overlay.style.display = 'block';
    toggler.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  };

  const closeDrawer = () => {
    menu.classList.remove('show');
    overlay.style.display = 'none';
    toggler.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  };

  toggler.addEventListener('click', (e) => {
    e.stopPropagation();
    menu.classList.contains('show') ? closeDrawer() : openDrawer();
  });

  // Close on overlay tap
  overlay.addEventListener('click', closeDrawer);

  // Close when any nav link is tapped
  menu.querySelectorAll('.nav-link, .hire-btn').forEach(link => {
    link.addEventListener('click', closeDrawer);
  });
})();

// ── 1c. Skills tab switcher ────────────────────────────────
(function () {
  const tabBtns    = document.querySelectorAll('.skills-tab-btn');
  const tabPanes   = document.querySelectorAll('.skills-tab-content .tab-pane');
  if (!tabBtns.length) return;

  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetId = btn.getAttribute('data-bs-target')?.replace('#', '');
      if (!targetId) return;

      // Update button states
      tabBtns.forEach(b => {
        b.classList.remove('active');
        b.setAttribute('aria-selected', 'false');
      });
      btn.classList.add('active');
      btn.setAttribute('aria-selected', 'true');

      // Show correct pane
      tabPanes.forEach(pane => {
        pane.classList.remove('show', 'active');
      });
      const target = document.getElementById(targetId);
      if (target) {
        target.classList.add('show', 'active');
        // Re-trigger skill bar animations
        target.querySelectorAll('.skill-bar-fill').forEach(bar => {
          bar.style.width = '0';
          requestAnimationFrame(() => {
            requestAnimationFrame(() => {
              bar.style.width = bar.style.getPropertyValue('--target-width') ||
                                getComputedStyle(bar).getPropertyValue('--target-width');
            });
          });
        });
      }
    });
  });
})();

// ── 2. Active nav-link on scroll ──────────────────────────
const sections   = document.querySelectorAll('section[id]');
const navLinks   = document.querySelectorAll('#mainNav .nav-link');

const sectionObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        navLinks.forEach(l => l.classList.remove('active'));
        const active = document.querySelector(`#mainNav a[href="#${entry.target.id}"]`);
        if (active) active.classList.add('active');
      }
    });
  },
  { rootMargin: '-40% 0px -55% 0px' }
);
sections.forEach(s => sectionObserver.observe(s));

// ── 3. Dark / Light mode toggle ───────────────────────────
const themeToggle = document.getElementById('themeToggle');
const themeIcon   = document.getElementById('themeIcon');
const htmlEl      = document.documentElement;

const applyTheme = (theme) => {
  htmlEl.setAttribute('data-bs-theme', theme);
  if (themeIcon) {
    themeIcon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';
  }
  localStorage.setItem('portfolioTheme', theme);
};

// Persist across reloads
const savedTheme = localStorage.getItem('portfolioTheme') || 'dark';
applyTheme(savedTheme);

if (themeToggle) {
  themeToggle.addEventListener('click', () => {
    const next = htmlEl.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
    applyTheme(next);
  });
}

// ── 4. Typed role animation ───────────────────────────────
const typedEl = document.getElementById('typedRole');
if (typedEl) {
  const strings  = ['UI/UX Designer', '4th Year BSIT Student', 'Web Designer'];
  let   strIdx   = 0, charIdx = 0, deleting = false;

  const type = () => {
    const current = strings[strIdx];
    typedEl.textContent = deleting
      ? current.slice(0, charIdx--)
      : current.slice(0, charIdx++);

    let delay = deleting ? 60 : 100;

    if (!deleting && charIdx === current.length + 1) {
      delay   = 2000;
      deleting = true;
    } else if (deleting && charIdx === 0) {
      deleting = false;
      strIdx   = (strIdx + 1) % strings.length;
      delay    = 400;
    }
    setTimeout(type, delay);
  };
  setTimeout(type, 700);
}

// ── 5. Skill bar animation ────────────────────────────────
const animateBars = (container) => {
  container.querySelectorAll('.skill-bar-fill').forEach(bar => {
    // Reset → force reflow → animate
    bar.classList.add('js-reset');
    bar.classList.remove('animated');
    void bar.offsetWidth;
    bar.classList.remove('js-reset');
    bar.classList.add('animated');
  });
};

// Animate bars when their tab is shown
document.querySelectorAll('#skillsTabs .skills-tab-btn').forEach(btn => {
  btn.addEventListener('shown.bs.tab', e => {
    const target = document.querySelector(e.target.getAttribute('data-bs-target'));
    if (target) animateBars(target);
  });
});

// Animate first visible tab when skills section enters viewport
const skillsSection = document.getElementById('skills');
if (skillsSection) {
  const firstPane = skillsSection.querySelector('.tab-pane.active');
  const skillObs  = new IntersectionObserver(
    ([entry]) => {
      if (entry.isIntersecting && firstPane) {
        animateBars(firstPane);
        skillObs.disconnect();
      }
    },
    { threshold: 0.15 }
  );
  skillObs.observe(skillsSection);
}

// ── 6. Project filter ─────────────────────────────────────
const filterBtns = document.querySelectorAll('.filter-btn');
const projectCols = document.querySelectorAll('.project-col');

filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    filterBtns.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const filter = btn.dataset.filter;

    projectCols.forEach(col => {
      const match = filter === 'all' || col.dataset.category === filter;
      col.classList.toggle('hidden', !match);
    });
  });
});

// ── 7. Contact form client-side validation ────────────────
const contactForm = document.getElementById('contactForm');
if (contactForm) {
  contactForm.addEventListener('submit', (e) => {
    if (!contactForm.checkValidity()) {
      e.preventDefault();
      e.stopPropagation();
    }
    contactForm.classList.add('was-validated');
  });
}

// ── 8. Scroll-reveal — opt-in approach ───────────────────
// Mark elements as ready AFTER DOM loads so nothing starts invisible
document.addEventListener('DOMContentLoaded', () => {
  const revealEls = document.querySelectorAll('[data-aos]');

  // Small delay so layout paints first
  requestAnimationFrame(() => {
    revealEls.forEach(el => el.classList.add('aos-ready'));

    const revealObs = new IntersectionObserver(
      (entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.remove('aos-ready');
            entry.target.classList.add('revealed');
            revealObs.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.08, rootMargin: '0px 0px -40px 0px' }
    );
    revealEls.forEach(el => revealObs.observe(el));
  });
});

// ── 8. Attachment drop zone ────────────────────────────────
(function () {
  const zone     = document.getElementById('attachDropZone');
  const input    = document.getElementById('contact_attachment');
  const filename = document.getElementById('attachFilename');
  if (!zone || !input || !filename) return;

  const updateName = (file) => {
    if (file) {
      const kb = (file.size / 1024).toFixed(1);
      filename.textContent = `📎 ${file.name} (${kb} KB)`;
      filename.style.color = 'var(--accent-2)';
    } else {
      filename.textContent = 'No file chosen';
      filename.style.color = '';
    }
  };

  input.addEventListener('change', () => updateName(input.files[0] || null));

  zone.addEventListener('dragover', (e) => { e.preventDefault(); zone.classList.add('drag-over'); });
  zone.addEventListener('dragleave', () => zone.classList.remove('drag-over'));
  zone.addEventListener('drop', (e) => {
    e.preventDefault();
    zone.classList.remove('drag-over');
    const file = e.dataTransfer.files[0];
    if (!file) return;
    const dt = new DataTransfer();
    dt.items.add(file);
    input.files = dt.files;
    updateName(file);
  });
})();
