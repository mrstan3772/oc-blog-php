<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-header-title">
                        <h5 class="m-b-10">{{ title | raw }}</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">{{ title_page | raw }}</a></li>
                        <li class="breadcrumb-item">Tableau de bord</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        {% if user.hasFlash %}
        {{ user.getFlash | raw }}
        {% endif %}
    </div>
    <div class="row">
        <div class="col-xl-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Rapport mensuel des prestations de services</h5>
                </div>
                <div class="card-body">
                    <div class="row pb-2">
                        <div class="col-auto m-b-10">
                            <h3 class="mb-1">€21,356.46</h3>
                            <span>Revenu total</span>
                        </div>
                        <div class="col-auto m-b-10">
                            <h3 class="mb-1">€1935.6</h3>
                            <span>Moyenne</span>
                        </div>
                    </div>
                    <div id="account-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6>Billet de blog</h6>
                    <span>Il faut un effort continu pour maintenir un niveau élevé de satisfaction des clients qu'ils soient des particuliers ou des entreprises.</span>
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col">
                            <div id="satisfaction-chart"></div>
                        </div>
                    </div>
                    <span>
                        Le taux de satisfaction client correspond alors au pourcentage de clients se disant « très » ou « assez » satisfaits.
                    </span>
                    <br>
                    <strong>Comment calculer le CSAT ?</strong>
                    <p>
                        Le CSAT se calcule de la manière suivant : nombre de réponses positives / nombre total de réponses x100. Par exemple, sur 100 répondants à votre questionnaire de satisfaction client, si 300 ont répondu « Très satisfait » et 500 « Satisfait », votre CSAT égal à 80 %.
                    </p>
                    <p>
                        Les questionnaires CSAT <strong>séduisent de nombreuses entreprises par leur simplicité et leur modularité</strong>.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12 blog-post">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Billets de blog</h5>
                </div>
                <div class="pro-scroll" style="height:720px;position:relative;">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Image</th>
                                        <th>Nom auteur</th>
                                        <th>ID auteur</th>
                                        <th>Châpo</th>
                                        <th>Catégorie</th>
                                        <th>Date d'ajout</th>
                                        <th>Modifié le</th>
                                        <th>Archivé</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {% for news in news_list %}
                                    <tr>
                                        <td>{{ news.id | raw }}</td>
                                        <td>{{ news.newsTitle | raw }}</td>
                                        <td><img src="/{{ attribute(config, 'get', ['assets_path']) }}/images/blog/{{ news.newsCover | raw }}" alt="miniature du billet de blog" width="80" class="img-20"></td>
                                        <td>{{ author_list[news['id']]['memberFirstName'] | raw }} {{ author_list[news['id']]['memberLastName'] | raw }}</td>
                                        <td>{{ author_list[news['id']]['id'] | raw }}</td>
                                        <td>{{ news.newsLeadParagraph | raw }}</td>
                                        <td>{{ news.newsCategory | raw }}</td>
                                        <td>{{ news.newsAddedDate|date('d/m/Y à H:h:i') | raw }}</td>
                                        <td>{{ news.newsUpdateDate|date('d/m/Y à H:h:i') | raw }}</td>
                                        <td>
                                            {% if news.newsArchive %}
                                            <i class="fas fa-check-square"></i>
                                            {% else %}
                                            <i class="fas fa-window-close"></i>
                                            {% endif %}
                                        </td>
                                        <td><a href="/admin/news-update-{{ news.id | raw }}"><i class="icon feather icon-edit f-16  text-success"></i></a><a href="/admin/news-delete-{{ news.id | raw }}"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                    </tr>
                                    {% endfor %}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12 blog-post">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Liste des commentaires</h5>
                </div>
                <div class="pro-scroll" style="height:720px;position:relative;">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ID Post</th>
                                        <th>ID Auteur</th>
                                        <th>Contenu</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {% for comment in comment_list %}
                                    <tr>
                                        <td>{{ comment.id | raw }}</td>
                                        <td>{{ comment.commentNewsId | raw }}</td>
                                        <td>{{ comment.commentNewsAuthorId | raw }}</td>
                                        <td>{{ comment.commentContent | raw }}</td>
                                        <td>{{ comment.commentDate|date('d/m/Y à H:h:i') | raw }}</td>
                                        <td>
                                            {% if comment.commentStatus %}
                                            <label class="badge bg-light-success">Validé</label>
                                            {% else %}
                                            <label class="badge bg-light-warning">En attente de validation</label>
                                            {% endif %}
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            {% if not comment.commentStatus %}
                                            <a href="/admin/comment-validate-{{ comment.id | raw }}"><i class="icon feather icon-check-circle f-16 text-success"></i></a>
                                            {% else %}
                                            <a href="/admin/comment-delete-{{ comment.id | raw }}"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a>
                                            {% endif %}
                                        </td>
                                    </tr>
                                    {% endfor %}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>