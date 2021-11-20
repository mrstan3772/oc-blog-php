<div class="pcoded-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10"></h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">{{ title | raw }}</a></li>
                        <li class="breadcrumb-item"><a href="/admin/news-insert">{{ title_page | raw }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {% if user.hasFlash %}
        {{ user.getFlash | raw }}
        {% endif %}
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>AJOUTER UN BILLET DE BLOG</h5>
                </div>
                <div class="card-body">
                    <h5>Système d'édition</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="/admin/news-insert" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <p>
                                        {{ form | raw }}
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn  btn-primary">AJOUTER</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>