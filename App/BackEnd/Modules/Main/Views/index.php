<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-header-title">
                        <h5 class="m-b-10"><?= $title ?></h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><?= $title_page ?></a></li>
                        <li class="breadcrumb-item">Tableau de bord</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row"><?php if ($user->hasFlash()) echo $user->getFlash(); ?></div>
    <div class="row">
        <!-- support-section start -->
        <!-- <div class="col-xl-6 col-md-12">
                <div class="card flat-card">
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="material-icons-two-tone text-primary mb-1">group</i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>1000</h5>
                                    <span>Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-none d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="material-icons-two-tone text-primary mb-1">language</i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>$1252</h5>
                                    <span>Revenue</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="material-icons-two-tone text-primary mb-1">unarchive</i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>600</h5>
                                    <span>Growth</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="material-icons-two-tone text-primary mb-1">swap_horizontal_circle</i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>3550</h5>
                                    <span>Returns</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-none d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="material-icons-two-tone text-primary mb-1">cloud_download</i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>3550</h5>
                                    <span>Downloads</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="material-icons-two-tone text-primary mb-1">shopping_cart</i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>100%</h5>
                                    <span>Order</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card support-bar overflow-hidden">
                            <div class="card-body pb-0">
                                <h2 class="m-0">53.94%</h2>
                                <span class="text-primary">Conversion Rate</span>
                                <p class="mb-3 mt-3">Number of conversions divided by the total visitors. </p>
                            </div>
                            <div id="support-chart"></div>
                            <div class="card-footer border-0 bg-primary text-white background-pattern-white">
                                <div class="row text-center">
                                    <div class="col">
                                        <h4 class="m-0 text-white">10</h4>
                                        <span>2018</span>
                                    </div>
                                    <div class="col">
                                        <h4 class="m-0 text-white">15</h4>
                                        <span>2017</span>
                                    </div>
                                    <div class="col">
                                        <h4 class="m-0 text-white">13</h4>
                                        <span>2016</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card support-bar overflow-hidden">
                            <div class="card-body pb-0">
                                <h2 class="m-0">1432</h2>
                                <span class="text-primary">Order delivered</span>
                                <p class="mb-3 mt-3">Total number of order delivered in this month.</p>
                            </div>
                            <div class="card-footer border-0">
                                <div class="row text-center">
                                    <div class="col">
                                        <h4 class="m-0">130</h4>
                                        <span>May</span>
                                    </div>
                                    <div class="col">
                                        <h4 class="m-0">251</h4>
                                        <span>June</span>
                                    </div>
                                    <div class="col">
                                        <h4 class="m-0 ">235</h4>
                                        <span>July</span>
                                    </div>
                                </div>
                            </div>
                            <div id="support-chart1"></div>
                        </div>
                    </div>
                </div>
            </div> -->
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
        <!-- support-section end -->
        <!-- customer-section start -->
        <div class="col-xl-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6>Satisfaction des clients</h6>
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
                                    <?php foreach ($news_list as $news) : ?>
                                        <tr>
                                            <td><?= $news['id'] ?></td>
                                            <td><?= $news['newsTitle'] ?></td>
                                            <td><img src="/<?= $config->get('assets_path') ?>/images/blog/<?= $news['newsCover'] ?>" alt="miniature du billet de blog" width="80" class="img-20"></td>
                                            <td><?= $author_list[$news['id']]['memberFirstname'] ?> <?= $author_list[$news['id']]['memberLastName'] ?></td>
                                            <td><?= $author_list[$news['id']]['id'] ?></td>
                                            <td><?= $news['newsLeadParagraph'] ?></td>
                                            <td><?= $news['newsCategory'] ?></td>
                                            <td><?= $news['newsAddedDate']->format('d/m/Y à H\hi') ?></td>
                                            <td><?= $news['newsUpdateDate']->format('d/m/Y à H\hi') ?></td>
                                            <td><?php if ($news['newsArchive']) {
                                                    echo '<i class="fas fa-check-square"></i>';
                                                } else {
                                                    echo '<i class="fas fa-window-close"></i>';
                                                } ?></td>
                                            <td><a href="/admin/news-update-<?= $news['id'] ?>"><i class="icon feather icon-edit f-16  text-success"></i></a><a href="/admin/news-delete-<?= $news['id'] ?>"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-xl-6 col-md-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card prod-p-card background-pattern">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5">Total Profit</h6>
                                    <h3 class="m-b-0">$1,783</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="material-icons-two-tone text-primary">card_giftcard</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card prod-p-card bg-primary background-pattern-white">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5 text-white">Total Orders</h6>
                                    <h3 class="m-b-0 text-white">15,830</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="material-icons-two-tone text-white">local_mall</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card prod-p-card bg-primary background-pattern-white">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5 text-white">Average Price</h6>
                                    <h3 class="m-b-0 text-white">$6,780</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="material-icons-two-tone text-white">monetization_on</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card prod-p-card background-pattern">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5">Product Sold</h6>
                                    <h3 class="m-b-0">6,784</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="material-icons-two-tone text-primary">local_offer</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card feed-card">
                <div class="card-header">
                    <h5>Feeds</h5>
                </div>
                <div class="feed-scroll" style="height:385px;position:relative;">
                    <div class="card-body">
                        <div class="row m-b-25 align-items-center">
                            <div class="col-auto p-r-0">
                                <i data-feather="bell" class="bg-light-primary feed-icon p-2 wid-30 hei-30"></i>
                            </div>
                            <div class="col">
                                <a href="#!">
                                    <h6 class="m-b-5">You have 3 pending tasks. <span class="text-muted float-right f-14">Just Now</span></h6>
                                </a>
                            </div>
                        </div>
                        <div class="row m-b-25 align-items-center">
                            <div class="col-auto p-r-0">
                                <i data-feather="shopping-cart" class="bg-light-danger feed-icon p-2 wid-30 hei-30"></i>
                            </div>
                            <div class="col">
                                <a href="#!">
                                    <h6 class="m-b-5">New order received <span class="text-muted float-right f-14">30 min ago</span></h6>
                                </a>
                            </div>
                        </div>
                        <div class="row m-b-25 align-items-center">
                            <div class="col-auto p-r-0">
                                <i data-feather="file-text" class="bg-light-success feed-icon p-2 wid-30 hei-30"></i>
                            </div>
                            <div class="col">
                                <a href="#!">
                                    <h6 class="m-b-5">You have 3 pending tasks. <span class="text-muted float-right f-14">Just Now</span></h6>
                                </a>
                            </div>
                        </div>
                        <div class="row m-b-25 align-items-center">
                            <div class="col-auto p-r-0">
                                <i data-feather="bell" class="bg-light-primary feed-icon p-2 wid-30 hei-30"></i>
                            </div>
                            <div class="col">
                                <a href="#!">
                                    <h6 class="m-b-5">You have 4 tasks Done. <span class="text-muted float-right f-14">1 hours ago</span></h6>
                                </a>
                            </div>
                        </div>
                        <div class="row m-b-25 align-items-center">
                            <div class="col-auto p-r-0">
                                <i data-feather="file-text" class="bg-light-success feed-icon p-2 wid-30 hei-30"></i>
                            </div>
                            <div class="col">
                                <a href="#!">
                                    <h6 class="m-b-5">You have 2 pending tasks. <span class="text-muted float-right f-14">Just Now</span></h6>
                                </a>
                            </div>
                        </div>
                        <div class="row m-b-25 align-items-center">
                            <div class="col-auto p-r-0">
                                <i data-feather="shopping-cart" class="bg-light-danger feed-icon p-2 wid-30 hei-30"></i>
                            </div>
                            <div class="col">
                                <a href="#!">
                                    <h6 class="m-b-5">New order received <span class="text-muted float-right f-14">4 hours ago</span></h6>
                                </a>
                            </div>
                        </div>
                        <div class="row m-b-25 align-items-center">
                            <div class="col-auto p-r-0">
                                <i data-feather="shopping-cart" class="bg-light-danger feed-icon p-2 wid-30 hei-30"></i>
                            </div>
                            <div class="col">
                                <a href="#!">
                                    <h6 class="m-b-5">New order Done <span class="text-muted float-right f-14">Just Now</span></h6>
                                </a>
                            </div>
                        </div>
                        <div class="row m-b-25 align-items-center">
                            <div class="col-auto p-r-0">
                                <i data-feather="file-text" class="bg-light-success feed-icon p-2 wid-30 hei-30"></i>
                            </div>
                            <div class="col">
                                <a href="#!">
                                    <h6 class="m-b-5">You have 5 pending tasks. <span class="text-muted float-right f-14">5 hours ago</span></h6>
                                </a>
                            </div>
                        </div>
                        <div class="row m-b-0 align-items-center">
                            <div class="col-auto p-r-0">
                                <i data-feather="bell" class="bg-light-primary feed-icon p-2 wid-30 hei-30"></i>
                            </div>
                            <div class="col">
                                <a href="#!">
                                    <h6 class="m-b-5">You have 4 tasks Done. <span class="text-muted float-right f-14">2 hours ago</span></h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- customer-section end -->
    </div>
    <!-- [ Main Content ] end -->
</div>