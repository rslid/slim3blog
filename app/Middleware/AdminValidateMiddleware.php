<?php
/**
 * Created by PhpStorm.
 * User: zeno
 * Date: 11.09.17
 * Time: 13:14
 */

namespace SlimBlog\Middleware;

/**
 * Class AdminValidateMiddleware
 *
 * @package SlimBlog\Middleware
 */
class AdminValidateMiddleware extends Middleware {

  /**
   * @var
   */
  protected $container;

  /**
   * AdminValidateMiddleware constructor.
   *
   * @param $container
   */
  public function __construct($container) {
    $this->container = $container;
  }

  /**
   * Check is user trying to reach forbidden route.
   *
   * @param $request
   * @param $response
   * @param $next
   *
   * @return mixed
   */
  public function __invoke($request, $response, $next) {

    $authorized = $this->container->Session->checkLoginStatus();

    if ($authorized) {
      // authorized, call next middleware
      return $next($request, $response);
    }

    // not authorized, don't call next middleware, return our own response
    // another option is to redirect to signin form
    $body = $response->getBody();
    $body->write('Forbidden section');

    return $response
      ->withBody($body)
      ->withStatus(403);
  }

}