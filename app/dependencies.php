<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['view'] = function ($container) {
  $view = new \Slim\Views\Twig($container->get('settings')['view']['template_path'],
    [
      'debug' => true,
      'cache' => false,
    ]);
  $view->addExtension(new \Slim\Views\TwigExtension(
    $container->router,
    $container->request->getUri()
  ));
  // Enable Twig debug.
  $view->addExtension(new \Twig_Extension_Debug());

  return $view;
};

$container['HomeController'] = function ($container) {
  return new \SlimBlog\Controllers\HomeController($container);
};

$container['PostController'] = function ($container) {
  return new \SlimBlog\Controllers\PostController($container);
};

$container['AdminController'] = function ($container) {
  return new \SlimBlog\Controllers\AdminController($container);
};

$container['AuthController'] = function ($container) {
  return new \SlimBlog\Controllers\AuthController($container);
};

$container['Posts'] = function ($container) {
  return new \SlimBlog\Models\Posts($container);
};

$container['User'] = function ($container) {
  return new \SlimBlog\Models\User($container);
};

$container['Validator'] = function () {
  return new \SlimBlog\Validation\Validator;
};

$container['db'] = function ($container) {
  return \SlimBlog\Database\Database::instance($container->get('settings')['db'])->connection;
};

$container['Session'] = function ($container) {
  return new \SlimBlog\Session\Session($container);
};