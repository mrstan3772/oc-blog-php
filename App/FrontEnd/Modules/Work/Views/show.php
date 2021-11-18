<main id="main">
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper swiper-initialized swiper-horizontal swiper-pointer-events">
                        <div class="swiper-wrapper align-items-center" id="swiper-wrapper-6c47dcab88266131" aria-live="off" style="transform: translate3d(-3424px, 0px, 0px); transition-duration: 0ms;">
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-next swiper-slide-duplicate-prev" data-swiper-slide-index="2" role="group" aria-label="3 / 3" style="width: 856px;">
                                <img src="assets/img/portfolio-details-3.jpg" alt="">
                            </div>

                            <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0" role="group" aria-label="1 / 3" style="width: 856px;">
                                <img src="/<?= $config->get('assets_path') ?>/images/work/<?= $work->sliders[0]?>" alt="">
                            </div>

                            <div class="swiper-slide" data-swiper-slide-index="1" role="group" aria-label="2 / 3" style="width: 856px;">
                                <img src="/<?= $config->get('assets_path') ?>/images/work/<?= $work->sliders[1]?>" alt="">
                            </div>

                            <div class="swiper-slide swiper-slide-prev swiper-slide-duplicate-next" data-swiper-slide-index="2" role="group" aria-label="3 / 3" style="width: 856px;">
                                <img src="/<?= $config->get('assets_path') ?>/images/work/<?= $work->sliders[2]?>" alt="">
                            </div>

                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-active" data-swiper-slide-index="0" role="group" aria-label="1 / 3" style="width: 856px;">
                                <img src="/<?= $config->get('assets_path') ?>/images/work/<?= $work->sliders[0]?>" alt="">
                            </div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Information du projet</h3>
                        <ul>
                            <li><strong>Categorie</strong>: <?= $work->category ?></li>
                            <li><strong>Client</strong>: <?= $work->client ?></li>
                            <li><strong>Project date</strong>: <?= $work->date ?></li>
                            <li><strong>Project URL</strong>: <a href="<?= $work->url ?>" target="blank"><?= $work->url ?></a></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2><?= $work->title ?></h2>
                        <p>
                            <?=  $work->content ?>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->
</main>