<?php
$site        = SITE;
$formMessage = $formMessage ?? null;
$formError   = $formError   ?? false;
?>
<section id="contact" class="section-padded section-alt" aria-labelledby="contact-heading">
    <div class="container">

        <!-- Section heading -->
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-label">Say Hello</span>
            <h2 id="contact-heading" class="section-title">Get In <span class="text-gradient">Touch</span></h2>
            <div class="section-divider" aria-hidden="true"></div>
        </div>

        <div class="row gy-5 justify-content-center">

            <!-- Contact info column -->
            <div class="col-lg-4" data-aos="fade-right">
                <div class="contact-info">
                    <p class="contact-intro">
                        Whether you have a project in mind, a question, or just want to say hi —
                        my inbox is always open. I'll try my best to get back to you!
                    </p>

                    <ul class="contact-details list-unstyled mt-4">
                        <?php
                        $details = [
                            ['icon'=>'bi-envelope-fill',  'label'=>'Email',    'value'=>$site['email'],   'href'=>'mailto:'.$site['email']],
                            ['icon'=>'bi-github',         'label'=>'GitHub',   'value'=>'View Profile',   'href'=>$site['github']],
                            ['icon'=>'bi-linkedin',       'label'=>'LinkedIn', 'value'=>'Connect',        'href'=>$site['linkedin']],
                        ];
                        foreach ($details as $d): ?>
                        <li class="contact-detail-item">
                            <span class="cd-icon"><i class="bi <?= e($d['icon']) ?>" aria-hidden="true"></i></span>
                            <div>
                                <span class="cd-label"><?= e($d['label']) ?></span>
                                <a href="<?= e($d['href']) ?>" class="cd-value" target="_blank" rel="noopener noreferrer">
                                    <?= e($d['value']) ?>
                                </a>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <!-- Availability card -->
                    <div class="availability-card mt-4">
                        <span class="status-dot" aria-hidden="true"></span>
                        <div>
                            <strong>Currently Available</strong>
                            <p class="mb-0 small">Open to freelance &amp; full-time roles</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form column -->
            <div class="col-lg-7" data-aos="fade-left">

                <!-- Flash message -->
                <?php if ($formMessage): ?>
                <div class="alert <?= $formError ? 'alert-danger' : 'alert-success' ?> alert-dismissible fade show mb-4"
                     role="alert">
                    <i class="bi <?= $formError ? 'bi-exclamation-triangle-fill' : 'bi-check-circle-fill' ?> me-2"
                       aria-hidden="true"></i>
                    <?= e($formMessage) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>

                <form id="contactForm"
                      class="contact-form"
                      method="POST"
                      action="#contact"
                      novalidate>

                    <input type="hidden" name="contact_submit" value="1">

                    <div class="row g-3">

                        <!-- Name (optional) -->
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text"
                                       id="contact_name"
                                       name="name"
                                       class="form-control"
                                       placeholder="Jane Doe"
                                       autocomplete="name"
                                       value="<?= e($_POST['name'] ?? '') ?>">
                                <label for="contact_name">
                                    <i class="bi bi-person-fill me-1" aria-hidden="true"></i>Full Name <span class="text-muted small">(optional)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="email"
                                       id="contact_email"
                                       name="email"
                                       class="form-control"
                                       placeholder="jane@example.com"
                                       required
                                       autocomplete="email"
                                       value="<?= e($_POST['email'] ?? '') ?>">
                                <label for="contact_email">
                                    <i class="bi bi-envelope-fill me-1" aria-hidden="true"></i>Email Address
                                </label>
                            </div>
                        </div>

                        <!-- Subject -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text"
                                       id="contact_subject"
                                       name="subject"
                                       class="form-control"
                                       placeholder="Project enquiry"
                                       required
                                       minlength="3"
                                       value="<?= e($_POST['subject'] ?? '') ?>">
                                <label for="contact_subject">
                                    <i class="bi bi-chat-quote-fill me-1" aria-hidden="true"></i>Subject
                                </label>
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea id="contact_message"
                                          name="message"
                                          class="form-control contact-textarea"
                                          placeholder="Tell me about your project..."
                                          required
                                          minlength="10"><?= e($_POST['message'] ?? '') ?></textarea>
                                <label for="contact_message">
                                    <i class="bi bi-pencil-fill me-1" aria-hidden="true"></i>Your Message
                                </label>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="col-12">
                            <button type="submit" id="contactSubmitBtn" class="btn btn-primary w-100 py-3 submit-btn">
                                <i class="bi bi-send-fill me-2" aria-hidden="true"></i>
                                Send Message
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

    </div>
</section>
