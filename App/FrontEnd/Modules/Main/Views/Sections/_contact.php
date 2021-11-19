<!-- ======= Contact Section ======= -->
<section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(/<?= $config->get('assets_path') ?>/images/contact/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="contact-mf">
                    <div id="contact" class="box-shadow-full">
                        <div class="row"><?php if ($user->hasFlash()) print_r($user->getFlash()); ?></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="title-box-2">
                                    <h5 class="title-left">
                                        Envoyez-nous un message
                                    </h5>
                                </div>
                                <div>
                                    <form action="/" method="post" role="form" class="php-email-form">
                                        <?= $form_contact ?>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="button button-a button-big button-rouded">Envoyer un message</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="title-box-2 pt-4 pt-md-0">
                                    <h5 class="title-left">
                                        Contactez-nous
                                    </h5>
                                </div>
                                <div class="more-info">
                                    <p class="lead">
                                        Je reste à votre écoute 7j/7 si jamais vous avez des questions, doléances ou simplement souhaitez avoir des recommandations.
                                        Si vous voulez prendre rapidement contact avec moi n'hésitez pas me joindre sur les réseaux sociaux ou nous purrons échanger plus simplement.
                                    </p>
                                    <ul class="list-ico">
                                        <li><span class="bi bi-geo-alt"></span> 22 Allée des Frères Voisin, 75015 Paris</li>
                                        <li><span class="bi bi-phone"></span> + 33 7 82 49 89 79</li>
                                        <li><span class="bi bi-envelope"></span> stanleylouisjean@dhoruba.com</li>
                                    </ul>
                                </div>
                                <div class="socials">
                                    <ul>
                                        <li><a href="#contact"><span class="ico-circle"><i class="bi bi-facebook"></i></span></a></li>
                                        <li><a href="#contact"><span class="ico-circle"><i class="bi bi-instagram"></i></span></a></li>
                                        <li><a href="#contact"><span class="ico-circle"><i class="bi bi-twitter"></i></span></a></li>
                                        <li><a href="#contact"><span class="ico-circle"><i class="bi bi-linkedin"></i></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->