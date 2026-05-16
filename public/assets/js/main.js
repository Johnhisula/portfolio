/* ============================================================
   main.js — Portfolio interactivity
   ============================================================ */
'use strict';

// ── 1. Navbar scroll effect ────────────────────────────────
const nav = document.getElementById('mainNav');
if (nav) {
  const onScroll = () => nav.classList.toggle('scrolled', window.scrollY > 60);
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}

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
  const strings  = ['UI/UX Designer', 'Front-End Developer', '4th Year BSIT Student', 'Web Designer'];
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
