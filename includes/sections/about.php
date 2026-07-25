<?php $site = SITE; ?>
<section id="about" class="section-padded" aria-labelledby="about-heading">
    <div class="container">

        <!-- Section heading -->
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-label">Get to Know Me</span>
            <h2 id="about-heading" class="section-title">About <span class="text-gradient">Me</span></h2>
            <div class="section-divider" aria-hidden="true"></div>
        </div>

        <div class="row align-items-center gy-5">

            <!-- Avatar column -->
            <div class="col-lg-5 text-center" data-aos="fade-right">
                <div class="about-avatar-wrap">
                    <div class="about-avatar">
                        <?php $profilePath = PUBLIC_PATH . '/assets/images/profile.jpg'; ?>
                        <img src="<?= ASSETS_PATH ?>/images/profile.jpg?v=<?= filemtime($profilePath) ?>" alt="<?= e($site['name']) ?>" class="avatar-img">
                    </div>
                    <!-- Floating stat bubbles -->
                    <div class="stat-bubble stat-bubble--tl" aria-label="BSIT Graduate">
                        <span class="stat-num">BSIT</span>
                        <span class="stat-lbl">Graduate</span>
                    </div>
                    <div class="stat-bubble stat-bubble--br" aria-label="6 projects delivered">
                        <span class="stat-num">6+</span>
                        <span class="stat-lbl">Projects</span>
                    </div>
                </div>
            </div>

            <!-- Content column -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="about-content">
                    <p class="about-intro">
                        I'm a <strong>Bachelor of Science in Information Technology</strong> graduate from <strong>Davao Del Norte State College</strong>,
                        passionate about <strong>UI/UX Design</strong>, <strong>Front-End Development</strong>, and <strong>Data Entry</strong> —
                        crafting clean, intuitive, and visually engaging digital experiences.
                    </p>
                    <p class="about-body">
                        I love turning ideas into beautiful, functional interfaces. From wireframes and prototypes
                        to responsive web pages, I focus on creating designs that are not just attractive but
                        also user-centered and accessible.
                    </p>
                    <p class="about-body">
                        With hands-on experience from internship and real-world projects,
                        I thrive on collaborating with teams and continuously growing my skills in design tools and
                        modern front-end technologies.
                    </p>
                    <p class="about-body">
                        As a <strong>Data Entry Specialist</strong>, I bring precision, speed, and attention to detail
                        in managing and organizing data — ensuring accuracy and efficiency in every task.
                    </p>

                    <!-- Quick facts -->
                    <ul class="about-facts list-unstyled mt-4">
                        <?php
                        $facts = [
                            ['icon' => 'bi-geo-alt-fill',    'label' => 'Location',  'value' => 'Panabo City, Davao Del Norte'],
                            ['icon' => 'bi-briefcase-fill',  'label' => 'Role',      'value' => 'Data Entry Specialist'],
                            ['icon' => 'bi-search',           'label' => 'Status',    'value' => 'Open to Opportunities'],
                            ['icon' => 'bi-mortarboard-fill','label' => 'Education', 'value' => 'BS Information Technology – Davao Del Norte State College'],
                            ['icon' => 'bi-envelope-fill',   'label' => 'Email',     'value' => $site['email']],
                        ];
                        foreach ($facts as $fact): ?>
                        <li class="fact-item">
                            <span class="fact-icon"><i class="bi <?= e($fact['icon']) ?>" aria-hidden="true"></i></span>
                            <span class="fact-label"><?= e($fact['label']) ?>:</span>
                            <span class="fact-value"><?= e($fact['value']) ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="mt-4 d-flex gap-3 flex-wrap">
                        <a href="#contact" class="btn btn-primary">
                            <i class="bi bi-chat-dots-fill me-2" aria-hidden="true"></i>Let's Talk
                        </a>
                        <a href="<?= ASSETS_PATH ?>/files/Resume.pdf" class="btn btn-outline-light" download>
                            <i class="bi bi-file-earmark-arrow-down-fill me-2" aria-hidden="true"></i>Download Resume
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
