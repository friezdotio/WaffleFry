### *** WaffleFry IS NOT PRODUCTION READY. WAIT FOR version 1.0 ***

# WaffleFry Framework

WaffleFry is a very small REST API built for PHP. Easy to use stand-alone or with an existing MVC framework.

## Installation

Installation is very simple. Just upload and then edit config.php in the root.

1. If you run WaffleFry in a sub folder be sure to uncomment `define('URL_SUB_FOLDER', 'WaffleFry);` and change it the correct folder name.
2. You can enable or disable the use of a database. If you enable it, be sure to use the correct database information.
3. OPTIONAL: `define('ENABLE_CORS', true);` allows you to enable CORs right from the framework if you cannot enable it on your webserver.
4. OPTIONAL: `define('ENABLE_DASHBOARD', true);` allows you to enable the dashboard. This is great for debuggining, but it is recommended that you disbale it in production.

## Dashboard

To access the dashboard just point your browser to the root or index of the resource you want to access. For example, `index.php/user` You will then see any get/insert/update/delete methods you have in that resource. 

## Model Directory

Any classes in this files is automatically injected into the framework. This is useful to keep logic clean from your REST resources. To access methods in the model directory do `this->class->method()`

## How to use WaffleFry

WaffleFry is very easy to use. You simply just add the resources you need for your REST API into the root directory of /resources. You then add your get/delete/insert/update methods to that class. You can also add other logic to these classes but just remember, to be RESTful you must only call get, delete, insert, or update publicly. There is also a model directory in your resources directory. You can add any additonal logic here if you want to keep your REST classes clean.

Be sure to leave a response in your REST methods. `http_response_code(200);` and also be sure that you JSON encode your returns using `json_encode()` or if you want to encode the entire query you can use out built in method `$this->query2json($query)`. This will be more automated in the future.

```php
  public function get()
    {   
        // Call any model
        $users = $this->usermodel->getUsers($id);
        
        // Include a response code
        http_response_code(200);
        
        print json_encode($users);
    }
```

To call your dashboard (if enabled): `index.php/user`
To call your API method: `index.php/user/get`
To call your API with a variable: `index.php/user/get/variable`

### Note

When using AJAX or other means to call your REST API you must call your methods using the URL and not using the DATA parameter. If you do need to use the data paramer just simply do `$_POST['variable']` and do not define any arguments to that method. Choosing to use the `data` argument instead of passing the parameters via the URL will cause dashboard to not work at this time. We are coming up with a solution for this. 

# TINY Framework

WaffleFry is a fork of panique/tiny. Although a lot of the code is rewritten, we kept the parts that we liked the most. Below is the documentation for those parts.

##Servers configs for

### NGINX

```nginx
server {
    listen 80 default_server;
    listen [::]:80 default_server ipv6only=on;

    root /var/www/tiny;
    index index.php index.html index.htm;

    server_name localhost;

    location / {
        try_files $uri $uri/ /index.php?$args;
    }

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }
}
```

## Goodies

TINY comes with a little [PDO debugger tool](https://github.com/panique/pdo-debug), trying to emulate your PDO-SQL
statements.

## MYSQL & PDO

For extreme simplicity, all data-handling methods are in application/model/model.php. This is for sure not really
professional, but the most simple implementation. Have a look how getAllSongs() in model.php looks like: Pure and
super-simple PDO.

```php
public function getAllSongs()
{
    $sql = "SELECT id, artist, track, link FROM song";
    $query = $this->db->prepare($sql);
    $query->execute();
    
    return $query->fetchAll();
}
```

## LICENSE

WaffleFry uses the Apache License (see LICENSE file), however, we forked this project from panique/tiny which is under MIT. There is only a small portion of the code that is sill panique/tiny. The following methods were not touched and is still under MIT.

- application.php - getUrlWithoutModRewrite()
- application.php - __construct() (We made some modifications)
- controller.php - openDatabaseConnection()
- pdo-debug.php - Everything

For information about panique/tiny please visit:

- @package php-mvc
- @author Panique
- @link http://www.php-mvc.net
- @link https://github.com/panique/php-mvc/
- @license http://opensource.org/licenses/MIT MIT License
