<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

$app->add(new SlimBlog\Middleware\ValidationErrorsMiddleware($container));
$app->add(new SlimBlog\Middleware\SessionMiddleware($container));