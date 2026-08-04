<?php $site = SITE; ?>
<section id="about" class="section-padded" aria-labelledby="about-heading">
    <div class="container">

        <!-- Section heading -->
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-label">Get to Know Me</span>
            <h2 id="about-heading" class="section-title">About <span class="text-gradient">Me</span></h2>
            <div class="section-divider" aria-hidden="true"></div>
        </div>

        <!-- About content — full width, no image -->
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-10">
                <div class="about-content about-content--centered">
                    <p class="about-intro">
                        I'm a <strong>Front-End Developer</strong> with a degree in <strong>Information Technology</strong>,
                        passionate about crafting high-quality, responsive web experiences that combine
                        clean code with thoughtful design.
                    </p>
                    <p class="about-body">
                        I specialize in building modern, performant user interfaces using
                        <strong>HTML, CSS, and JavaScript</strong>. From pixel-perfect layouts to fluid animations
                        and seamless cross-browser compatibility — I ensure every detail is polished
                        and every interaction feels intuitive.
                    </p>
                    <p class="about-body">
                        My workflow bridges the gap between design and development. I collaborate closely
                        with designers to translate wireframes and prototypes into production-ready code,
                        while maintaining a strong focus on <strong>accessibility</strong>, <strong>performance optimization</strong>,
                        and <strong>scalable architecture</strong>.
                    </p>
                    <p class="about-body">
                        I'm always exploring new technologies and best practices to stay ahead
                        of the curve — committed to delivering digital products that are not only
                        visually compelling but also built to last.
                    </p>
                </div>

                <!-- Quick facts — grid layout -->
                <div class="about-facts-grid mt-5" data-aos="fade-up" data-aos-delay="200">
                    <?php
                    $facts = [
                        ['icon' => 'bi-geo-alt-fill',    'label' => 'Location',  'value' => 'Panabo City, Davao Del Norte', 'color' => '#f59e0b'],
                        ['icon' => 'bi-briefcase-fill',  'label' => 'Role',      'value' => 'Front-End Developer',          'color' => '#7c3aed'],
                        ['icon' => 'bi-mortarboard-fill','label' => 'Education', 'value' => 'BS in Information Technology', 'color' => '#0ea5e9'],
                        ['icon' => 'bi-search',          'label' => 'Status',    'value' => 'Open to Opportunities',        'color' => '#22c55e'],
                        ['icon' => 'bi-envelope-fill',   'label' => 'Email',     'value' => $site['email'],                 'color' => '#ec4899'],
                    ];
                    foreach ($facts as $fact): ?>
                    <div class="about-fact-card" style="--fact-color: <?= e($fact['color']) ?>">
                        <div class="about-fact-card__icon">
                            <i class="bi <?= e($fact['icon']) ?>" aria-hidden="true"></i>
                        </div>
                        <div class="about-fact-card__text">
                            <span class="about-fact-card__label"><?= e($fact['label']) ?></span>
                            <span class="about-fact-card__value"><?= e($fact['value']) ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- CTA buttons -->
                <div class="mt-5 d-flex gap-3 flex-wrap justify-content-center" data-aos="fade-up" data-aos-delay="300">
                    <a href="#contact" class="btn btn-primary btn-lg">
                        <i class="bi bi-chat-dots-fill me-2" aria-hidden="true"></i>Let's Talk
                    </a>
                    <a href="<?= ASSETS_PATH ?>/files/Resume.pdf" class="btn btn-outline-light btn-lg" download>
                        <i class="bi bi-file-earmark-arrow-down-fill me-2" aria-hidden="true"></i>Download Resume
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
