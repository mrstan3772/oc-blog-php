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
                {% for key, work in works|cast_to_array %}
                <div class="col-md-4">
                    <div class="work-box">
                        <a href="/{{ attribute(config, 'get', ['assets_path']) }}/images/work/{{ work[1].cover | raw }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                            <div class="work-img">
                                <img src="/{{ attribute(config, 'get', ['assets_path']) }}/images/work/{{ work[1].cover | raw }}" alt="" class="img-fluid">
                            </div>
                        </a>
                        <div class="work-content">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2 class="w-title">{{ work[1].title | raw }}</h2>
                                    <div class="w-more">
                                        <span class="w-ctegory">{{ work[1].category | raw }}</span> / <span class="w-date">{{ work[1].date | raw }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="w-like">
                                        <a href="/work/{{work[0]|replace({'_': '-'})}}"> <span class="bi bi-plus-circle"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {% endfor %}

            </div>
        </div>
    </section><!-- End Portfolio Section -->