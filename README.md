# Slim 3 Sample Blog Application

This is fairly simple application created to practice MVC programming and get introduced to Slim 3 Framework. All comments, notes and pull requests are welcome.

Dependencies
---
* [Slim Framework](http://slimframework.com)
* [Twig](http://twig.sensiolabs.org)
* [Bootstrap](http://getbootstrap.com)
* [Respect Validation](https://github.com/Respect/Validation)

Install
---
* Import .sql file located in data folder
* Run 'php composer.phar install' or 'composer install' in root directory
* Start the local webserver by using:

       php -S localhost:8888 -t public public/index.php
* Enter correct database settings in app/settings.php 
* Login with example@mail.bg/demo321

Features
---
* Create, edit and delete posts.
* Register and sign in new users.
* Fields validation.


ToDo List
---
* Csrf protection
* Exceptions handling
* Flash messages
* Different user roles and actions
* Installation script
* Multilingual setup

Author
---
**Velizar Zlatev**
