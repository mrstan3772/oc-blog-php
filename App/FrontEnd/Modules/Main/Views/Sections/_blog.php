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
             {% for news in news_list %}
             <div class="col-md-4">
                 <div class="card card-blog">
                     <div class="card-img">
                         <a href="news/{{ news.id | raw }}"><img src="/{{ attribute(config, 'get', ['assets_path']) }}/images/blog/{{ news.newsCover | raw }}" alt="" class="img-fluid"></a>
                     </div>
                     <div class="card-body">
                         <div class="card-category-box">
                             <div class="card-category">
                                 <h6 class="category">{{ news.newsCategory | raw }}</h6>
                             </div>
                         </div>
                         <h3 class="card-title"><a href="news/{{ news.id | raw }}">{{ news.newsTitle | raw }}</a></h3>
                         <p class="card-description">
                             {{ news.newsLeadParagraph | raw }}
                         </p>
                     </div>
                     <div class="card-footer">
                         <div class="post-author">
                             <img src="/dist/images/member/{{ author_list[news['id']]['memberProfilePicturePath'] | raw }}" alt="" class="avatar rounded-circle">
                             <span class="author">{{ author_list[news['id']]['memberFirstName'] | raw }} {{ author_list[news['id']]['memberLastName'] | raw }}</span>
                         </div>
                         <div class="post-date">
                             <span class="bi bi-clock"></span> {{ news.newsAddedDate|date('d/m/Y à H:h:i') | raw }}
                         </div>
                     </div>
                 </div>
             </div>
             {% endfor %}
             <p class="d-flex justify-content-center pt-3"><a class="btn btn-primary btn js-scroll px-4" href="/news" role="button">TOUT AFFICHER</a></p>
         </div>
     </div>
 </section><!-- End Blog Section -->