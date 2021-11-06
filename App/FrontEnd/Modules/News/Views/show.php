<main id="main">
    <!-- ======= Blog Single Section ======= -->
    <section class="blog-wrapper sect-pt4" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-box">
                        <div class="post-thumb">
                            <img src="/<?= $config->get('assets_path') ?>/images/blog/<?= $news['newsCover'] ?>" class="img-fluid" alt="">
                        </div>
                        <div class="post-meta">
                            <h1 class="article-title"><?= $news['newsTitle'] ?></h1>
                            <ul>
                                <li>
                                    <span class="bi bi-person"></span>
                                    <a href="#"><?= $author['memberFirstname'] ?> <?= $author['memberLastName'] ?></a>
                                </li>
                                <li>
                                    <span class="bi bi-tag"></span>
                                    <a href="#"><?= $news['newsCategory'] ?></a>
                                </li>
                                <li>
                                    <span class="bi bi-chat-left-text"></span>
                                    <a href="#"><?= count($comments) ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="article-lead-paragraph">
                            <blockquote class="blockquote">
                                <p class="mb-0"><?= $news['newsLeadParagraph'] ?></p>
                            </blockquote>
                        </div>
                        <div class="article-content">
                            <?= $news['newsContent'] ?>
                        </div>
                    </div>
                    <div class="box-comments">
                        <div class="title-box-2">
                            <h4 class="title-comments title-left">Commentaires (<?= count($comments) ?>)</h4>
                        </div>
                        <ul class="list-comments">
                            <?php foreach ($comments as $comment) : ?>
                                <li>
                                    <div class="comment-avatar">
                                        <img src="/<?= $config->get('assets_path') ?>/images/member/<?= $author_list[$comment['id']]['memberProfilePicturePath'] ?>" alt="">
                                    </div>
                                    <div class="comment-details">
                                        <h4 class="comment-author"><?= $author_list[$comment['id']]['memberFirstName'] ?> <?= $author_list[$comment['id']]['memberLastName'] ?></h4>
                                        <span><?= $comment['commentDate']->format('d/m/Y à H\hi') ?></span>
                                        <p>
                                            <?= $comment['commentContent'] ?>
                                        </p>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="form-comments">
                        <div class="title-box-2">
                            <h3 class="title-left">
                                Laissez un commentaire
                            </h3>
                        </div>
                        <form class="form-mf">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-mf" id="inputName" placeholder="Name *" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control input-mf" id="inputEmail1" placeholder="Email *" required="">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <input type="url" class="form-control input-mf" id="inputUrl" placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <textarea id="textMessage" class="form-control input-mf" placeholder="Comment *" name="message" cols="45" rows="8" required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="button button-a button-big button-rouded">Send Message</button>
                                </div>
                            </div>
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
                                <?php foreach ($recent_news as $news) : ?>
                                    <li>
                                        <a href="/news/<?= $news['id'] ?>"><?= $news['newsTitle'] ?></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <div class="widget-sidebar">
                        <h5 class="sidebar-title">Archives</h5>
                        <div class="sidebar-content">
                            <ul class="list-sidebar">
                                <?php foreach ($archive_news as $news) : ?>
                                    <li>
                                        <a href="/news/<?= $news['id'] ?>"><?= $news['newsTitle'] ?></a>
                                    </li>
                                <?php endforeach ?>
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