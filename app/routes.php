<?php
// Routes

$app->get('/', 'HomeController:index')->setName('home');

$app->group('/posts', function () {
  $this->get('/single/{id}', 'PostController:displaySingle')
    ->setName('posts.displaySingle');
  $this->post('/create', 'PostController:postCreatePost')->setName('posts.createPost');
  $this->get('/create', 'PostController:getCreatePost');
});

$app->group('/auth', function () {
  $this->get('/signup',  'AuthController:getSignUp')->setName('auth.signup');
  $this->post('/signup', 'AuthController:postSignUp');
  $this->get('/signin',  'AuthController:getSignIn')->setName('auth.signin');
  $this->post('/signin', 'AuthController:postSignIn');
  $this->get('/signout', 'AuthController:getSignOut')->setName('auth.signout');
});

// This middleware should be separated, make it more clean.
$app->group('/admin', function () {
  $this->get('/list',  'AdminController:index')->setName('admin.index');
  $this->get('/edit/{id}', 'AdminController:getEdit')->setName('admin.edit');
  $this->post('/edit/{id}', 'AdminController:postEdit');
  $this->get('/delete/{id}', 'AdminController:getDelete')->setName('admin.delete');
})->add(new SlimBlog\Middleware\AdminValidateMiddleware($container));
