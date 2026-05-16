<?php $skills = SKILLS; ?>
<section id="skills" class="section-padded section-alt" aria-labelledby="skills-heading">
    <div class="container">

        <!-- Section heading -->
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-label">What I Work With</span>
            <h2 id="skills-heading" class="section-title">My <span class="text-gradient">Skills</span></h2>
            <div class="section-divider" aria-hidden="true"></div>
        </div>

        <!-- Category tabs -->
        <div class="d-flex justify-content-center mb-5" data-aos="fade-up" data-aos-delay="100">
            <ul class="skills-tabs nav" role="tablist" id="skillsTabs">
                <?php $first = true; foreach ($skills as $category => $items): ?>
                <li class="nav-item" role="presentation">
                    <button class="skills-tab-btn <?= $first ? 'active' : '' ?>"
                            data-bs-toggle="tab"
                            data-bs-target="#tab-<?= e(strtolower(str_replace([' ', '&', '/'], '-', $category))) ?>"
                            type="button"
                            role="tab"
                            aria-selected="<?= $first ? 'true' : 'false' ?>">
                        <?= e($category) ?>
                    </button>
                </li>
                <?php $first = false; endforeach; ?>
            </ul>
        </div>

        <!-- Tab content -->
        <div class="tab-content skills-tab-content">
            <?php $first = true; foreach ($skills as $category => $items): ?>
            <?php $tabId = 'tab-' . strtolower(str_replace([' ', '&', '/'], '-', $category)); ?>
            <div class="tab-pane fade <?= $first ? 'show active' : '' ?>"
                 id="<?= e($tabId) ?>"
                 role="tabpanel">

                <div class="row gy-4" data-aos="fade-up">
                    <?php foreach ($items as $skill): ?>
                    <div class="col-md-6">
                        <div class="skill-item">
                            <div class="skill-header d-flex justify-content-between align-items-center mb-2">
                                <span class="skill-name"><?= e($skill['name']) ?></span>
                                <span class="skill-badge"><?= e(skillLabel($skill['level'])) ?></span>
                            </div>
                            <div class="skill-bar-track" role="progressbar"
                                 aria-valuenow="<?= $skill['level'] ?>"
                                 aria-valuemin="0" aria-valuemax="100"
                                 aria-label="<?= e($skill['name']) ?> proficiency: <?= $skill['level'] ?>%">
                                <div class="skill-bar-fill"
                                     style="--target-width: <?= $skill['level'] ?>%">
                                </div>
                            </div>
                            <div class="skill-pct text-end mt-1">
                                <small><?= $skill['level'] ?>%</small>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <?php $first = false; endforeach; ?>
        </div>

    </div>
</section>
