<?php
/**
 * Created by PhpStorm.
 * User: zeno
 * Date: 10.09.17
 * Time: 04:25
 */

namespace SlimBlog\Controllers;

use Respect\Validation\Validator as v;

/**
 * Class AuthController
 *
 * @package SlimBlog\Controllers
 */
class AuthController extends Controller {

  /**
   * Invoke signin form template.
   *
   * @param $request
   * @param $response
   *
   * @return mixed
   */
  public function getSignIn($request, $response)
  {
    return $this->view->render($response, 'auth/signIn.twig');
  }

  /**
   * Invoke Sesssion model by passing sign in form with post.
   *
   * @param $request
   * @param $response
   *
   * @return mixed
   */
  public function postSignIn($request, $response) {

    $validation = $this->Validator->validate($request, [
      'email' => v::noWhitespace()->notEmpty(),
      'password' => v::noWhitespace()->notEmpty(),
    ]);

    if ($validation->failed()) {
      return $response->withRedirect($this->router->pathFor('auth.signin'));
    }

    $logged = $this->Session->login(
      $request->getParam('email'),
      $request->getParam('password')
    );

    if (!$logged) {
      return $response->withRedirect($this->router->pathFor('auth.signin'));
    }

    return $response->withRedirect($this->router->pathFor('home'));
  }

  /**
   * Invoke signup form template.
   *
   * @param $request
   * @param $response
   *
   * @return mixed
   */
  public function getSignup($request, $response) {
    return $this->view->render($response, 'auth/signUp.twig', array(
    ));
  }

  // ToDo: Implement filter/sanitize class

  /**
   * Invoke User model by passing signup form with post.
   * Invoke validation models.
   *
   * @param $request
   * @param $response
   *
   * @return mixed
   */
  public function postSignup($request, $response) {

    $validation = $this->Validator->validate($request, [
      'email' => v::noWhitespace()->notEmpty(),
      'username' => v::notEmpty()->alpha(),
      'password' => v::noWhitespace()->notEmpty(),
    ]);

    if ($validation->failed()) {
      return $response->withRedirect($this->router->pathFor('auth.signup'));
    }

    $params = [
      'email' => $request->getParam('email'),
      'username' => $request->getParam('username'),
      'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
    ];

    $this->User->registerUser($params['email'], $params['username'], $params['password']);

    return $response->withRedirect($this->router->pathFor('home'));
  }

  /**
   * Invoke signout methods from User model.
   *
   * @param $request
   * @param $response
   *
   * @return mixed
   */
  public function getSignOut($request, $response)
  {
    $this->Session->logout();

    return $response->withRedirect($this->router->pathFor('home'));
  }
}