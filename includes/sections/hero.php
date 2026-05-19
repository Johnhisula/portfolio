<?php $site = SITE; ?>
<section id="hero" class="hero-section d-flex align-items-center" aria-label="Hero introduction">

    <!-- Animated background grid -->
    <div class="hero-grid" aria-hidden="true"></div>

    <!-- Floating orbs -->
    <div class="orb orb-1" aria-hidden="true"></div>
    <div class="orb orb-2" aria-hidden="true"></div>
    <div class="orb orb-3" aria-hidden="true"></div>

    <div class="container position-relative z-1">
        <div class="row align-items-center gy-5">

            <!-- Text column -->
            <div class="col-lg-7 hero-text">
                <div class="hero-badge mb-3">
                    <span class="status-dot" aria-hidden="true"></span>
                    Available for new projects
                </div>

                <h1 class="hero-title">
                    Hi, I am
                    <span class="text-gradient"><?= e($site['name']) ?></span>
                </h1>

                <p class="hero-role">
                    <span class="role-prefix">// </span>
                    <span id="typedRole" class="typed-text" aria-label="<?= e($site['role']) ?>"></span>
                    <span class="typed-cursor" aria-hidden="true">|</span>
                </p>

                <p class="hero-tagline"><?= e($site['tagline']) ?></p>

                <div class="hero-cta-group d-flex flex-wrap gap-3 mt-4">
                    <a href="#projects" class="btn btn-primary btn-lg hero-btn-primary">
                        <i class="bi bi-grid-3x3-gap-fill me-2" aria-hidden="true"></i>View Projects
                    </a>
                    <a href="#contact" class="btn btn-outline-light btn-lg hero-btn-secondary">
                        <i class="bi bi-send-fill me-2" aria-hidden="true"></i>Get In Touch
                    </a>

                </div>

                <!-- Tech strip -->
                <div class="tech-strip mt-5">
                    <span class="tech-strip-label">Tech stack:</span>
                    <div class="tech-chips d-flex flex-wrap gap-2 mt-2">
                        <?php
                        $chips = ['Figma', 'HTML5 / CSS3', 'JavaScript', 'Bootstrap 5', 'PHP', 'Git'];
                        foreach ($chips as $chip): ?>
                            <span class="tech-chip"><?= e($chip) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Avatar / Code card column -->
            <div class="col-lg-5 d-flex justify-content-center hero-visual">
                <div class="code-card" aria-hidden="true">
                    <div class="code-card__bar">
                        <span class="dot dot-red"></span>
                        <span class="dot dot-yellow"></span>
                        <span class="dot dot-green"></span>
                        <span class="code-card__filename">designer.php</span>
                    </div>
                    <pre class="code-card__body"><code><span class="cc-kw">class</span> <span class="cc-cls">Designer</span> {

  <span class="cc-kw">public</span> <span class="cc-fn">function</span> <span class="cc-method">__construct</span>(
    <span class="cc-kw">private readonly</span> <span class="cc-type">string</span> <span class="cc-var">$name</span> = <span class="cc-str">'<?= e($site['name']) ?>'</span>,
    <span class="cc-kw">private readonly</span> <span class="cc-type">string</span> <span class="cc-var">$role</span> = <span class="cc-str">'UI/UX & Front-End'</span>,
  ) {}

  <span class="cc-kw">public function</span> <span class="cc-method">skills</span>(): <span class="cc-type">array</span>
  {
    <span class="cc-kw">return</span> [<span class="cc-str">'Figma'</span>, <span class="cc-str">'CSS3'</span>, <span class="cc-str">'Bootstrap'</span>];
  }

  <span class="cc-kw">public function</span> <span class="cc-method">passion</span>(): <span class="cc-type">string</span>
  {
    <span class="cc-kw">return</span> <span class="cc-str">'Beautiful UIs'</span>;
  }
}</code></pre>
                </div>

                <!-- ── Live Clock Widget ─────────────────── -->
                <div class="hero-clock" id="heroClock" aria-label="Current time">
                    <div class="hero-clock__greeting" id="clockGreeting">Good evening</div>
                    <div class="hero-clock__time">
                        <span id="clockH">00</span><span class="hero-clock__sep blink">:</span><span id="clockM">00</span><span class="hero-clock__sep">:</span><span id="clockS">00</span>
                    </div>
                    <div class="hero-clock__date" id="clockDate">Loading…</div>
                </div>

            </div>

        </div>

        <!-- Scroll hint -->
        <div class="scroll-hint" aria-hidden="true">
            <div class="scroll-mouse">
                <div class="scroll-wheel"></div>
            </div>
            <span>Scroll down</span>
        </div>
    </div>
</section>
