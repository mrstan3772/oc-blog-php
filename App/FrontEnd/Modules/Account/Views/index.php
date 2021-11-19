<!-- ======= About Section ======= -->
<section id="about" class="about-mf sect-pt4 route">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="box-shadow-full">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6 col-md-5">
                                    <div class="about-img">
                                        <img src="/dist/images/member/<?= $user_session['memberProfilePicturePath'] ?>" class="img-fluid rounded b-shadow-a" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-7">
                                    <div class="about-info">
                                        <p><span class="title-s">ID: </span> <span><?= $user_session['memberPseudonym'] ?></span></p>
                                        <p><span class="title-s">Nom: </span> <span><?= $user_session['memberLastName'] ?></span></p>
                                        <p><span class="title-s">Prénom: </span> <span><?= $user_session['memberFirstName'] ?></span></p>
                                        <p>
                                            <span class="title-s">Genre: </span> <span>
                                                <?php
                                                if ($user_session['memberGender'] === 'M') {
                                                    echo 'Masculin';
                                                } else if ($user_session['memberGender'] === 'F') {
                                                    echo 'Féminin';
                                                } else if ($user_session['memberGender'] === 'Autre') {
                                                    echo 'Autre';
                                                }
                                                ?>
                                            </span>
                                        </p>
                                        <p><span class="title-s">EMAIL: </span> <span><?= $user_session['memberEmailAddress'] ?></span></p>
                                        <p>
                                            <span class="title-s">Adresse: </span> <span>
                                                <?php if (empty($user_session['memberHomeAddress'])) : ?>
                                                    <?= 'N/A' ?>
                                                <?php else : ?>
                                                    <?php echo $user_session['memberHomeAddress'], ', ', $user_session['memberZipCode'], ', ', $user_session['memberCityNameFrFr'] ?>
                                                <?php endif ?>
                                            </span>
                                        </p>
                                        <p>
                                            <span class="title-s">Pays: </span> <span>
                                                <?php if (empty($user_session['memberCountryNameFrFr'])) : ?>
                                                    <?= 'N/A' ?>
                                                <?php else : ?>
                                                    <?= $user_session['memberCountryNameFrFr'] ?>
                                                <?php endif ?>
                                            </span>
                                        </p>
                                        <p>
                                            <span class="title-s">Date de naissance: </span> <span>
                                                <?php if ($user_session['memberDateOfBirth']->format('Y') === $copyright_date) : ?>
                                                    <?= 'N/A' ?>
                                                <?php else : ?>
                                                    <?= $user_session['memberDateOfBirth']->format('d/m/Y à H\hi') ?>
                                                <?php endif ?>
                                            </span>
                                        </p>
                                        <p>
                                            <span class="title-s">Téléphone: </span> <span>
                                                <?php if (empty($user_session['memberPhoneNumber'])) : ?>
                                                    <?= 'N/A' ?>
                                                <?php else : ?>
                                                    <?= $user_session['memberPhoneNumber'] ?>
                                                <?php endif ?>
                                            </span>
                                        </p>
                                        <p><span class="title-s">Inscrit(e) depuis le: </span> <span><?= $user_session['memberRegistrationDate']->format('d/m/Y à H\hi') ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-me pt-4 pt-md-0">
                                <div class="title-box-2">
                                    <h5 class="title-left">
                                        BIO
                                    </h5>
                                </div>
                                <p class="lead">
                                    <?php if (empty($user_session['memberBioFrFr'])) : ?>
                                        <?= 'N/A' ?>
                                    <?php else : ?>
                                        <?= $user_session['memberBioFrFr'] ?>
                                    <?php endif ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center socials">
                        <ul>
                            <li><a href="<?php if (empty($user_session['memberFacebookPageUrl'])) {
                                                echo '#';
                                            } else {
                                                echo $user_session['memberFacebookPageUrl'];
                                            } ?>"><span class="ico-circle"><i class="bi bi-facebook"></i></span></a></li>
                            <li><a href="<?php if (empty($user_session['memberInstagramPageUrl'])) {
                                                echo '#';
                                            } else {
                                                echo $user_session['memberInstagramPageUrl'];
                                            } ?>"><span class="ico-circle"><i class="bi bi-instagram"></i></span></a></li>
                            <li><a href="<?php if (empty($user_session['memberYoutubePageUrl'])) {
                                                echo '#';
                                            } else {
                                                echo $user_session['memberYoutubePageUrl'];
                                            } ?>"><span class="ico-circle"><i class="bi bi-youtube"></i></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->