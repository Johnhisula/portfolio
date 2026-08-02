<?php $experiences = EXPERIENCE; ?>
<section id="experience" class="section-padded" aria-labelledby="exp-heading">
    <div class="container">

        <!-- Section heading -->
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-label">Career Journey</span>
            <h2 id="exp-heading" class="section-title">
                Work <span class="text-gradient">Experience</span>
            </h2>
            <div class="section-divider" aria-hidden="true"></div>
        </div>

        <!-- Timeline -->
        <div class="exp-timeline">
            <?php foreach ($experiences as $index => $exp): ?>
            <div class="exp-timeline-item"
                 data-aos="fade-up"
                 data-aos-delay="<?= $index * 100 ?>"
                 style="--exp-color: <?= e($exp['color']) ?>">

                <!-- Timeline connector -->
                <div class="exp-timeline-connector">
                    <div class="exp-timeline-dot">
                        <i class="bi <?= e($exp['icon']) ?>" aria-hidden="true"></i>
                    </div>
                    <?php if ($index < count($experiences) - 1): ?>
                    <div class="exp-timeline-line"></div>
                    <?php endif; ?>
                </div>

                <!-- Content card -->
                <div class="exp-card">
                    <div class="exp-card__header">
                        <div class="exp-card__title-wrap">
                            <span class="exp-type-badge <?= $exp['type'] === 'project' ? 'exp-type--project' : 'exp-type--work' ?>">
                                <?= $exp['type'] === 'project' ? 'Project' : 'Work' ?>
                            </span>
                            <h3 class="exp-card__title"><?= e($exp['title']) ?></h3>
                            <p class="exp-card__company">
                                <i class="bi bi-building me-1" aria-hidden="true"></i>
                                <?= e($exp['company']) ?>
                            </p>
                            <p class="exp-card__location">
                                <i class="bi bi-geo-alt me-1" aria-hidden="true"></i>
                                <?= e($exp['location']) ?>
                            </p>
                        </div>
                        <div class="exp-card__date">
                            <i class="bi bi-calendar3 me-1" aria-hidden="true"></i>
                            <?= e($exp['date_start']) ?> — <?= e($exp['date_end']) ?>
                        </div>
                    </div>

                    <?php if ($exp['description']): ?>
                    <p class="exp-card__desc">
                        <em>"<?= e($exp['description']) ?>"</em>
                    </p>
                    <?php endif; ?>

                    <ul class="exp-card__tasks">
                        <?php foreach ($exp['tasks'] as $task): ?>
                        <li>
                            <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                            <?= e($task) ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
