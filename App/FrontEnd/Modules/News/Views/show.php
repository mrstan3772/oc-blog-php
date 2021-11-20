<main id="main">
    <!-- ======= Blog Single Section ======= -->
    <section class="blog-wrapper sect-pt4" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-box">
                        <div class="post-thumb">
                            <img src="/{{ attribute(config, 'get', ['assets_path']) }}/images/blog/{{ news.newsCover }}" class="img-fluid" alt="">
                        </div>
                        <div class="post-meta">
                            <h1 class="article-title">{{ news.newsTitle | raw}}</h1>
                            <ul>
                                <li>
                                    <span class="bi bi-person"></span>
                                    <a href="#">{{ author.memberFirstName | raw}} {{ author.memberLastName | raw}}</a>
                                </li>
                                <li>
                                    <span class="bi bi-tag"></span>
                                    <a href="#">{{ news.newsCategory | raw}}</a>
                                </li>
                                <li>
                                    <span class="bi bi-chat-left-text"></span>
                                    <a href="#">{{ comment_count | raw }}</a>
                                </li>
                                <li>
                                    <span class="bi bi-clock"></span>
                                    <a href="#">{{ news.newsAddedDate|date('d/m/Y à H:h:i') | raw }}</a>
                                    {% if news.newsAddedDate|date('d/m/Y à H:h:i') != news.newsUpdateDate|date('d/m/Y à H:h:i')  %}
                                    <span> - </span>
                                    <a href="#">{{ news.newsUpdateDate|date('d/m/Y à H:h:i') | raw }} (MAJ)</a>
                                    {% endif %}
                                </li>
                            </ul>
                        </div>
                        <div class="article-lead-paragraph">
                            <blockquote class="blockquote">
                                <p class="mb-0">{{ news.newsLeadParagraph | raw }}</p>
                            </blockquote>
                        </div>
                        <div class="article-content">
                            {{ news.newsContent | raw }}
                        </div>
                    </div>
                    <div class="box-comments">
                        <div>
                            {% if user.hasFlash %}
                            {{ user.getFlash | raw }}
                            {% endif %}
                        </div>
                        <div class="title-box-2">
                            <h4 class="title-comments title-left">Commentaires ({{ comment_count | raw }})</h4>
                        </div>
                        <ul class="list-comments">
                            {% for comment in comments %}
                            {% if not comment.commentStatus and user_session.id == author_list[comment['id']]['id'] or comment.commentStatus %}
                            <li>
                                <div class="comment-avatar">
                                    <img src="/dist/images/member/{{ author_list[comment['id']]['memberProfilePicturePath'] | raw }}" alt="">
                                </div>
                                <div class="comment-details">
                                    <h4 class="comment-author">{{ author_list[comment['id']]['memberFirstName'] | raw }} {{ author_list[comment['commentNewsAuthorId']]['memberLastName'] | raw }}</h4>
                                    <span>{{ comment.commentDate|date('d/m/Y à H:h:i') | raw }}</span>
                                    <p>
                                        {{ comment.commentContent | raw }}
                                    </p>
                                    {% if user_session.id == author_list[comment['id']]['id'] %}
                                    {% if comment.commentStatus %}
                                    <p class="text-success text-end">VALIDÉ</p>
                                    {% elseif not comment.commentStatus %}
                                    <p class="text-warning text-end">EN ATTENTE DE VALIDATION</p>
                                    {% endif %}
                                    <p class="text-end"><a href="/comment-delete/{{ comment.id | raw }}" title="Supprimer" class="text-danger"><i class="bi bi-trash-fill"></i></i></a></p>
                                    {% endif %}
                                </div>
                            </li>
                            {% endif %}
                            {% endfor %}
                        </ul>
                    </div>
                    <div class="form-comments">
                        <div class="title-box-2">
                            <h3 class="title-left">
                                Laissez un commentaire
                            </h3>
                        </div>
                        <form action="/news/{{ news.id | raw }}" method="post" role="form" class="form-mf">
                            {{ comment_form | raw }}
                            {% if user_session %}
                            <div class="col-md-12 text-center">
                                <button type="submit" class="button button-a button-big button-rouded">Envoyez</button>
                            </div>
                            {% endif %}
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget-sidebar sidebar-search">
                        <h5 class="sidebar-title">Rechercher</h5>
                        <div class="sidebar-content">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Recherchez..." aria-label="Recherchez...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary btn-search" type="button">
                                            <span class="bi bi-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="widget-sidebar">
                        <h5 class="sidebar-title">Poste récent</h5>
                        <div class="sidebar-content">
                            <ul class="list-sidebar">
                                {% for news in recent_news %}
                                <li>
                                    <a href="/news/{{ news.id | raw }}">{{ news.newsTitle | raw }}</a>
                                </li>
                                {% endfor %}
                            </ul>
                        </div>
                    </div>
                    <div class="widget-sidebar">
                        <h5 class="sidebar-title">Archives</h5>
                        <div class="sidebar-content">
                            <ul class="list-sidebar">
                                {% for news in archive_news %}
                                <li>
                                    <a href="/news/{{ news.id | raw }}">{{ news.newsTitle | raw }}</a>
                                </li>
                                {% endfor %}
                            </ul>
                        </div>
                    </div>
                    <div class="widget-sidebar widget-tags">
                        <h5 class="sidebar-title">Tags</h5>
                        <div class="sidebar-content">
                            <ul>
                                <li>
                                    <a href="#">Web.</a>
                                </li>
                                <li>
                                    <a href="#">Design.</a>
                                </li>
                                <li>
                                    <a href="#">Travel.</a>
                                </li>
                                <li>
                                    <a href="#">Photoshop</a>
                                </li>
                                <li>
                                    <a href="#">Corel Draw</a>
                                </li>
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Blog Single Section -->
</main>