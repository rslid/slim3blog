<?php
/**
 * Created by PhpStorm.
 * User: zeno
 * Date: 10.09.17
 * Time: 23:49
 */

namespace SlimBlog\Session;

/**
 * Class Session
 *
 * @package SlimBlog\Session
 */
class Session {

  /**
   * @var
   */
  protected $container;

  /**
   * Session constructor.
   *
   * @param $container
   */
  public function __construct($container) {
    $this->container = $container;
  }

  /**
   * Method for user login.
   *
   * @param $email
   *    User email.
   * @param $pass
   *    User password.
   *
   * @return bool
   */
  public function login($email, $pass) {
    $user = $this->container->User->validateUser($email);

    if (!$user) {
      return false;
    }

    if (password_verify($pass, $user->password)) {
      $_SESSION['user'] = $user->id;
      $_SESSION['SESSION_START'] = time();
      return true;
    }

    return false;
  }

  /**
   * Method to check for active session.
   *
   * @return bool
   */
  public function checkLoginStatus() {
    return isset($_SESSION['user']);
  }

  /**
   * If there is an active session check for existing user with ID.
   *
   * @return bool
   */
  public function checkUser() {
    if (isset($_SESSION['user'])) {
      return $this->container->User->checkUserId($_SESSION['user']);
    }
    return false;
  }

  /**
   * Method for terminating user session.
   */
  public function logout() {
    unset($_SESSION['user']);
  }
}