 <!-- ======= Blog Section ======= -->
 <section id="blog" class="blog-mf sect-pt4 route">
     <div class="container">
         <div class="row">
             <div class="col-sm-12">
                 <div class="title-box text-center">
                     <h3 class="title-a">
                         Blog
                     </h3>
                     <p class="subtitle-a">
                         Ici je vous partage mes dernières découvertes et expériences hight-tech
                     </p>
                     <div class="line-mf"></div>
                 </div>
             </div>
         </div>
         <div class="row">
             <?php foreach ($news_list as $news) : ?>
                 <div class="col-md-4">
                     <div class="card card-blog">
                         <div class="card-img">
                             <a href="blog-single.html"><img src="/<?= $config->get('assets_path') ?>/images/blog/<?= $news['newsCover'] ?>" alt="" class="img-fluid"></a>
                         </div>
                         <div class="card-body">
                             <div class="card-category-box">
                                 <div class="card-category">
                                     <h6 class="category"><?= $news['newsCategory'] ?></h6>
                                 </div>
                             </div>
                             <h3 class="card-title"><a href="blog-single.html"><?= $news['newsTitle'] ?></a></h3>
                             <p class="card-description">
                                 <?= $news->newsLeadParagraph() ?>
                             </p>
                         </div>
                         <div class="card-footer">
                             <div class="post-author">
                                     <img src="/<?= $config->get('assets_path') ?>/images/any/<?= $author_list[$news['id']]['memberProfilePicturePath'] ?>" alt="" class="avatar rounded-circle">
                                     <span class="author"><?= $author_list[$news['id']]['memberFirstname']?> <?= $author_list[$news['id']]['memberLastName']?></span>
                             </div>
                             <div class="post-date">
                                 <span class="bi bi-clock"></span> <?= $news['newsAddedDate']->format('d/m/Y à H\hi') ?>
                             </div>
                         </div>
                     </div>
                 </div>
             <?php endforeach; ?>
         </div>
     </div>
 </section><!-- End Blog Section -->