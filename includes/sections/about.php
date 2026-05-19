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
                        <div class="avatar-initials"><?= e(initials($site['name'])) ?></div>
                    </div>
                    <!-- Floating stat bubbles -->
                    <div class="stat-bubble stat-bubble--tl" aria-label="4th year student">
                        <span class="stat-num">4th</span>
                        <span class="stat-lbl">Year</span>
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
                        I'm a <strong>4th Year BSIT Student</strong> at <strong>Davao Del Norte State College</strong>,
                        passionate about <strong>UI/UX Design</strong> and <strong>Front-End Development</strong> —
                        crafting clean, intuitive, and visually engaging digital experiences.
                    </p>
                    <p class="about-body">
                        I love turning ideas into beautiful, functional interfaces. From wireframes and prototypes
                        to responsive web pages, I focus on creating designs that are not just attractive but
                        also user-centered and accessible.
                    </p>
                    <p class="about-body">
                        Currently on my internship, I'm gaining hands-on experience building real-world projects,
                        collaborating with teams, and continuously growing my skills in design tools and
                        modern front-end technologies.
                    </p>

                    <!-- Quick facts -->
                    <ul class="about-facts list-unstyled mt-4">
                        <?php
                        $facts = [
                            ['icon' => 'bi-geo-alt-fill',    'label' => 'Location',  'value' => 'Panabo City, Davao Del Norte'],
                            ['icon' => 'bi-briefcase-fill',  'label' => 'Status',    'value' => 'Internship / Opportunities'],
                            ['icon' => 'bi-mortarboard-fill','label' => 'Education', 'value' => 'BSIT – Davao Del Norte State College'],
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

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
