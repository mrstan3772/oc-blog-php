<!-- ======= About Section ======= -->
<section id="about" class="about-mf sect-pt4 route">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="box-shadow-full">
                    <div>
                        {% if user.hasFlash %}
                        {{ user.getFlash | raw }}
                        {% endif %}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6 col-md-5">
                                    <div class="about-img">
                                        <img src="/dist/images/member/{{ user_session.memberProfilePicturePath | raw }}" class="img-fluid rounded b-shadow-a" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-7">
                                    <div class="about-info">
                                        <p><span class="title-s">ID: </span> <span>{{ user_session.memberPseudonym | raw }}</span></p>
                                        <p><span class="title-s">Nom: </span> <span>{{ user_session.memberLastName | raw }}</span></p>
                                        <p><span class="title-s">Prénom: </span> <span>{{ user_session.memberFirstName | raw }}</span></p>
                                        <p>
                                            <span class="title-s">Genre: </span> <span>
                                                {% if user_session.memberGender == 'M' %}
                                                    {{ 'Masculin' | raw }}
                                                {% elseif user_session.memberGender == 'F' %}
                                                    {{ 'Féminin' | raw }}
                                                {% elseif user_session.memberGender == 'Autre' %}
                                                    {{ 'Autre' | raw }}
                                                {% endif %}
                                            </span>
                                        </p>
                                        <p><span class="title-s">EMAIL: </span> <span>{{ user_session.memberEmailAddress | raw }}</span></p>
                                        <p>
                                            <span class="title-s">Adresse: </span> <span>
                                                {% if user_session.memberHomeAddress is empty %}
                                                    {{ 'N/A' | raw }}
                                                {% else %}
                                                    {{ user_session.memberHomeAddress | raw }} {{ user_session.memberZipCode | raw }} {{ user_session.memberCityNameFrFr | raw }}
                                                {% endif %}
                                            </span>
                                        </p>
                                        <p>
                                            <span class="title-s">Pays: </span> <span>
                                                {% if user_session.memberCountryNameFrFr is empty %}
                                                    {{ 'N/A' | raw }}
                                                {% else %}
                                                    {{ user_session.memberCountryNameFrFr | raw }}
                                                {% endif %}
                                            </span>
                                        </p>
                                        <p>
                                            <span class="title-s">Date de naissance: </span> <span>
                                                {% if user_session.memberDateOfBirth|date('Y') == copyright_date %}
                                                    {{ 'N/A' | raw }}
                                                {% else %}
                                                    {{ user_session.memberDateOfBirth|date('d/m/Y à H:h:i') | raw }}
                                                {% endif %}
                                            </span>
                                        </p>
                                        <p>
                                            <span class="title-s">Téléphone: </span> <span>
                                                {% if user_session.memberPhoneNumber is empty %}
                                                    {{ 'N/A' | raw }}
                                                {% else %}
                                                    {{ user_session.memberPhoneNumber | raw }}
                                                {% endif %}
                                            </span>
                                        </p>
                                        <p><span class="title-s">Inscrit(e) depuis le: </span> <span>{{ user_session.memberRegistrationDate|date('d/m/Y à H:h:i') | raw }}</span></p>
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
                                    {% if user_session.memberBioFrFr is empty %}
                                        {{ 'N/A' | raw }}
                                    {% else %}
                                        {{ user_session.memberBioFrFr | raw }}
                                    {% endif %}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center socials">
                        <ul>
                            <li><a href="{{ user_session.memberFacebookPageUrl is empty ? '#' : user_session.memberFacebookPageUrl | raw }}"><span class="ico-circle"><i class="bi bi-facebook"></i></span></a></li>
                            <li><a href="{{ user_session.memberInstagramPageUrl is empty ? '#' : user_session.memberInstagramPageUrl | raw }}"><span class="ico-circle"><i class="bi bi-instagram"></i></span></a></li>
                            <li><a href="{{ user_session.memberYoutubePageUrl is empty ? '#' : user_session.memberYoutubePageUrl | raw }}"><span class="ico-circle"><i class="bi bi-youtube"></i></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->