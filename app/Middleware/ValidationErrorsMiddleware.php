<?php

namespace SlimBlog\Middleware;


/**
 * Class ValidationErrorsMiddleware
 *
 * @package SlimBlog\Middleware
 */
class ValidationErrorsMiddleware extends Middleware {

  /**
   * Add required template variables to global view scope.
   *
   * @param $request
   * @param $response
   * @param $next
   *
   * @return mixed
   */
  public function __invoke($request, $response, $next) {
    if(isset($_SESSION['errors'])) {
      $this->container->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
      unset($_SESSION['errors']);
    }

    $response = $next($request, $response);
    return $response;
  }

}
