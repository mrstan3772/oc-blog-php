    <!-- ======= Portfolio Section ======= -->
    <section id="work" class="portfolio-mf sect-pt4 route">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">
                            Portfolio
                        </h3>
                        <p class="subtitle-a">
                            Une bref aperçu de mes projets
                        </p>
                        <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($works as $key => $work) : ?>
                    <div class="col-md-4">
                        <div class="work-box">
                            <a href="/<?= $config->get('assets_path') ?>/images/work/<?= $work->cover ?>" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                <div class="work-img">
                                    <img src="/<?= $config->get('assets_path') ?>/images/work/<?= $work->cover ?>" alt="" class="img-fluid">
                                </div>
                            </a>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title"><?= $work->title ?></h2>
                                        <div class="w-more">
                                            <span class="w-ctegory"><?= $work->category ?></span> / <span class="w-date"><?= $work->date ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="w-like">
                                            <a href="/work/<?= str_replace('_', '-', $key) ?>"> <span class="bi bi-plus-circle"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section><!-- End Portfolio Section -->