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
                         <a href="/news/{{ news.id | raw }}"><img src="/{{ attribute(config, 'get', ['assets_path']) }}/images/blog/{{ news.newsCover | raw }}" alt="" class="img-fluid"></a>
                     </div>
                     <div class="card-body">
                         <div class="card-category-box">
                             <div class="card-category">
                                 <h6 class="category">{{ news.newsCategory | raw }}</h6>
                             </div>
                         </div>
                         <h3 class="card-title"><a href="/news/{{ news.id | raw }}">{{ news.newsTitle | raw }}</a></h3>
                         <p class="card-description">
                             {{ news.newsLeadParagraph | raw }}
                         </p>
                     </div>
                     <div class="card-footer">
                         <div class="post-author">
                             <img src="/dist/images/member/{{ author_list[news['id']]['memberProfilePicturePath'] | raw }}" alt="" class="avatar rounded-circle">
                             <span class="author">{{ author_list[news['id']]['memberFirstname'] | raw }} {{ author_list[news['id']]['memberLastName'] | raw }}</span>
                         </div>
                         <div class="post-date">
                             <span class="bi bi-clock"> {{ news.newsAddedDate|date('d/m/Y à H:h:i') | raw }}</span>
                         </div>
                     </div>
                 </div>
             </div>
             {% endfor %}
             <nav class="d-flex justify-content-center">
                 <ul class="pagination">
                     <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                     <li class="page-item {{ current_page == 1 ? 'disabled' : '' }}">
                         <a href="/news/page/{{ current_page - 1 }}" class="page-link">Précédente</a>
                     </li>
                     {% for page in 1..page_number %}
                     <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                     <li class="page-item {{ current_page == page ? 'active' : '' }}">
                         <a href="/news/page/{{ page | raw}}" class="page-link">{{ page | raw}}</a>
                     </li>
                     {% endfor %}
                     <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                     <li class="page-item {{ current_page == page_number|round(0, 'floor') ? 'disabled' : '' }}">
                         <a href="/news/page/{{ current_page + 1 }}" class="page-link">Suivante</a>
                     </li>
                 </ul>
             </nav>
         </div>
     </div>
 </section><!-- End Blog Section -->