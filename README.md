# OAB GP TOOLKIT Website

## Token to access the resources page:
- B4dPCv=3dp
- arterial

Link: https://gptoolkit.com.au/resources/B4dPCv=3dp

### Adding more token:
On the file  source/Boot/Config.php you can add more variants of token:
```php
define("CONF_URL_TOKEN",['B4dPCv=3dp','arterial']);
```


## Project setup


### Requirements

- PHP 7.4 or higher
- MySql
- Apache or Ngnix
- Composer


### Cloning the project:
```
git clone https://USERONBITBUCKET@bitbucket.org/arterialmarketing/oab-microsite.git
```

### Running composer:
```
composer update 
```

In case you have php 8 or higher, you need to run the 
composer update with a parameter ignore requirements 
```
composer update --ignore-platform-reqs
```

## Creating config file:
Create Config.php under the following path: source/Boot/Config.php and copy all the content from the file source/Boot/Config.php.txt.
After that make the configuration as your local environmental.

Import the Database.sql


### Database Connection
File: source/boot/Config.inc.php
```php
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "database_name");
```

### Check the URL
File: source/boot/Config.inc.php
```php
define("CONF_URL_BASE", "https://www.arterialeducation.com.au");
define("CONF_URL_TEST", "https://www.localhost/localfolder");
```


## HTML files:
Path: themes/website<br>
Note: if you change the theme name under themes/website, you must update it on config file: 
```php
define("CONF_VIEW_THEME", "website");
```

All the assets are sitting on the themes/website/assets and if you want to add/remove css/js you must change it 
on the minify folder on the path: souce/Boot/Minify/Website.php
```php
// Adding css: 
$minCSS->add(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/css/new-style.css");

// Adding js: 
$minCSS->add(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js/new-script.js");
```

Minified files:
```php
//Minify CSS
$minCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/dist/style.css");

//Minify JS
$minJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/dist/script.js");
```

## Routes:

### Availables routes:
You can add/change the routes on the index.php:
```php
$router->get("/","Web:home");
$router->get("/resources","Web:resources");

// post example
$router->post("/resources","Web:resources");

// Get with param:
$router->get("/resources/{param}","Web:resources");
```

### Front-Controller:
Path: source/Router/Web.php

### Do NOT COMMITTING Local config files to REPO

You can ignore config files excluding those from GIT

```
git update-index --skip-worktree .htaccess
git update-index --skip-worktree source/Boot/Config.php
git update-index --skip-worktree source/Boot/Minify/Website.php
```


###Relatives links:
Link:
use the follow method: url()
```html
<a href="<?= url(); ?>"> link </a>
<a href="<?= url("/privacy-policy"); ?>"> link </a>
```

Img:
use the follow method: theme()
```html
<img class="hero" src="<?= theme("/edm/edm7/images/hero_edm7.jpg"); ?>" alt="" />
```

.htaccess file (minimum to run the system)
```apacheconfig
RewriteEngine On
Options All -Indexes

# ROUTER WWW Redirect.
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteRule ^ https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER HTTPS Redirect
RewriteCond %{HTTP:X-Forwarded-Proto} !https
RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER URL Rewrite
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^(.*)$ index.php?route=/$1
```

Google analytics
```html
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=XXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'XXXXX');
</script>
```

## Dependencies:
- [`Router`](https://packagist.org/packages/coffeecode/router)
- [`PHP Mailes`](https://github.com/PHPMailer/PHPMailer)
- [`ext-pdo`](https://packagist.org/packages/php-kit/ext-pdo)
- [`League Plates`](https://packagist.org/packages/league/plates)
- [`Minify Files`](https://packagist.org/packages/matthiasmullie/minify)
- [`Bootstrap Framework`](https://getbootstrap.com/)


## Resources:
- [`PHP FIG`](https://www.php-fig.org)
- [`PHP Standart Recommendations`](https://www.php-fig.org/psr/)
- [`PHP The Right Way`](https://phptherightway.com/)
- [`PHP.net`](https://www.php.net/)
