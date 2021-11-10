<!-- ======= Rgistration Section ======= -->
<section id="registration" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(/<?= $config->get('assets_path') ?>/images/contact/overlay-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="registration-mf">
                    <div id="registration" class="box-shadow-full">
                        <div class="row">
                            <div class="col-md-12"><?php if ($user->hasFlash()) echo $user->getFlash(); ?></div>
                            <div class="col-md-6">
                                <div class="title-box-2">
                                    <h5 class="title-left">
                                        Inscrivez-vous
                                    </h5>
                                </div>
                                <div>
                                    <form action="/registration" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                                        <?= $form_registration ?>
                                        <label class="form-label"><input type="password" name="memberPasswordRepeat" id="memberPasswordRepeat" class="form-control" required="" maxlength="30" minlength="8" placeholder="RETAPEZ LE MOT DE PASSE"></label>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="button button-a button-big button-rouded">M'inscrire</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="title-box-2 pt-4 pt-md-0">
                                    <h5 class="title-left">
                                        J'ai un commpte
                                    </h5>
                                </div>
                                <div class="d-flex justify-content-center align-items-center sign-in">
                                    <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="/login" role="button">ME CONNECTEZ</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Registration Section -->