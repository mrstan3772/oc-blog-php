[![Codacy Badge](https://app.codacy.com/project/badge/Grade/ce75832c26154a978d17bba002e361b5)](https://www.codacy.com/gh/mrstan3772/oc-blog-php/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=mrstan3772/oc-blog-php&amp;utm_campaign=Badge_Grade)

# STANLEY BLOG

I put at your disposal the whole project leading to the creation of a personal blog. It was entirely designed in PHP with a home-made framework. A demonstration of the site will be available soon. It's provided with a set of resources including this one:
- the images of the posts
- the text documents
- the fonts
- etc.

This project has been realized in a first time with the objective to enhance my image and my online presence and in a second time to use all my skills in back-end development to build a reliable site from A to Z without using web design tools such as CMS or frameworks.

This site use parallax design on one-page model. On this page you will find : 
- the home page: includes a common background image for all pages of the part accessible to front-office visitors. We have my name with a scrolling text showing my activities 
- About : A description of my career with my resume
- Services: My areas of expertise
- Works : The projects i worked on.
- Blog: The blog posts to keep you informed of news
- Contact: A contact form to reach me
- User system: Register to comment on blog posts and why not add articles (contact me beforehand to have sufficient rights).

The site is currently only available in French. However, the framwork supports translation in other languages based on configuration file.


## Prerequisites:
In order to make this project work, you must:
- Use **PHP 8.0.X | 8.1.X**
- Download composer to install PHP dependencies (link: https://getcomposer.org/)
- Download the PDO extension for PostgreSQL (on linux with debian based systems ```sudo apt install php8.0-pgsql`` or on 
[windows](https://www.postgresqltutorial.com/postgresql-php/connect/))
- Download NGINX preferably, otherwise use another web server, but you will have to adapt NGINX configuration on you own.


## Installation

### Dependencies

Use the command `compose install` from the project root directory(oc-blog-php). Do not answer questions if you see any during the installation (press enter to skip). Once this step is done you will have all the necessary dependencies for the main project.

The second step is to install the dependencies for the framework but before that you will have to download the repository. To do so, go to the directory `./Lib/SamplePHPFramework` from the root directory (oc-blog-php).
Then type in a terminal : `git clone https://gitlab.dhoruba.com/xwete/samplephpframework.git`
After that copy the content folder to: `./Lib/SamplePHPFramework` 
Finally install the dependencies from the directory `./Lib/SamplePHPFramework` :  `compose install`


## Deployment


### Application Configuration

Add a `.env` file to the root of the directory. On the example below adapt the configuration according to your credentials for the values `DB_PGSL` which concerns the PostgreSQL database and `SMTP` if you want to run the contact form.

```env
DB_PGSQL_HOST="localhost
DB_PGSQL_PORT=5432
DB_PGSQL_DB="blog
DB_PGSQL_USER="postgres
DB_PGSQL_PASS="userpassword"

DB_MYSQL_HOST="localhost"
DB_MYSQL_DB="blog"
DB_MYSQL_USER="root"
DB_MYSQL_PASS="userpassword"

SMTP_HOST="my.smtp.host.com"
SMTP_PORT=587
SMTP_USER="useremail@host.com"
SMTP_PASS="userpassword"
SMTP_RECIPIENT="useremail@host.com"
```
Found this example in the root folder under the file name [".env.example"](https://github.com/mrstan3772/oc-blog-php/blob/main/.env.example)


### Nginx Configuration

```conf
server {
    listen 443 ssl http2;
    keepalive_timeout 70;

    ssl_protocols TLSv1 TLSv1.1 TLSv1.2;
    ssl_ciphers EECDH+CHACHA20:EECDH+AES128:RSA+AES128:EECDH+AES256:RSA+AES256:EECDH+3DES:RSA+3DES:!MD5;
    ssl_certificate "/path/to/ssl/cert/cert.crt";
    ssl_certificate_key "/path/to/ssl/key/priv.key";
    ssl_session_cache shared:SSL:10m;
    ssl_session_timeout 10m;
    
    server_name stanleylouisjean.blog;

   # To Web folder in root repository
    root /path/to/webroot/Web/;

    index bootstrap.php;

    client_max_body_size 100M;

    location ~ /\. {
        deny all;
        access_log off;
        log_not_found off;
    }

    location / {
        autoindex off;
        try_files $uri $uri/ @missing;
    }

    location /admin {
        try_files $uri $uri/ @missing-admin;
    }

    location @missing-admin {
        rewrite ^(.*)$ /bootstrap.php?app=BackEnd last;
    }

    location @missing {
        rewrite ^(.*)$ /bootstrap.php?app=FrontEnd last;
    }    
   
   # To work with PHP-FPM on linux debian based system
   # Windows: https://www.nginx.com/resources/wiki/start/topics/examples/phpfastcgionwindows/
    location ~ $\.php$ {
        try_files $uri $uri/ @missing;
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;    
    }

    error_page 404 /404.php;
   
    # Create an "error" and "access" file at the path of your choice
    error_log /path/to/error/log/error;
    access_log /path/to/access/log/access;
}
```

### Hosts Configuration

Add stanleylouisjean.blog (or another domain but change it in the "server_name" directive of the nginx configuration) to the hosts file.

Windows : https://www.liquidweb.com/kb/edit-host-file-windows-10/ | Linux: https://vitux.com/linux-hosts-file/


### Creating tables in the database (PostgreSQL)

From now on, we will focus on creating the tables required to record the user information. All we have to do is open the **"DB "** directory at the root and import the following script:  

- [**"blog.sql"**](https://github.com/mrstan3772/oc-blog-php/blob/main/DB/blog.sql)


## Version

Version : 1.0.0

We use SemVer for versioning. For more details, see [link](https://semver.org/).


## Authors

**Stanley LOUIS JEAN** - *Web Dev* - [MrStan](https://github.com/mrstan3772)


## License

![GPL-v3](https://zupimages.net/up/21/46/iarl.png)


## Thanks
Blog made from the template provided by : 
https://bootstrapmade.com/