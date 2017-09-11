<?php

namespace SlimBlog\Middleware;


/**
 * Class SessionMiddleware
 *
 * @package SlimBlog\Middleware
 */
class SessionMiddleware extends Middleware {

  /**
   * @var
   */
  protected $container;

  /**
   * SessionMiddleware constructor.
   *
   * @param $container
   */
  public function __construct($container) {
    $this->container = $container;
    }

  /**
   * Check for active session and invalidate expired ones.
   * Add required template variables to global view scope.
   *
   * @param $request
   * @param $response
   * @param $next
   *
   * @return mixed
   */
  public function __invoke($request, $response, $next) {
    $this->container->view->getEnvironment()->addGlobal('auth', [
      'check' => $this->container->Session->checkLoginStatus(),
      'user' => $this->container->Session->checkUser(),
    ]);

    $authorized = $this->container->Session->checkLoginStatus();
    if ($authorized) {
      // Destroy user session 5 minutes after login.
      if (isset($_SESSION['SESSION_START']) && (time() - $_SESSION['SESSION_START'] > 300)) {
        session_unset();
        session_destroy();
      }
    }

    $response = $next($request, $response);
    return $response;
  }

}
