<!-- ======= Connection Section ======= -->
<section id="connection" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(/<?= $config->get('assets_path') ?>/images/contact/overlay-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="connection-mf">
                    <div id="connection" class="box-shadow-full">
                        <div class="row">
                            <div class="col-md-12"><?php if ($user->hasFlash()) echo $user->getFlash(); ?></div>
                            <div class="col-md-6">
                                <div class="title-box-2">
                                    <h5 class="title-left">
                                        Connectez-vous
                                    </h5>
                                </div>
                                <div>
                                    <form action="/connection" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                                        <?= $form_connection ?>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="button button-a button-big button-rouded">Me connectez</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="title-box-2 pt-4 pt-md-0">
                                    <h5 class="title-left">
                                        Je ne dispose d'aucun compte
                                    </h5>
                                </div>
                                <div class="d-flex justify-content-center align-items-center sign-in">
                                    <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="/registration" role="button">M'INSCRIRE</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Connection Section -->