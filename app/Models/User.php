<?php
/**
 * Created by PhpStorm.
 * Date: 10.09.17
 * Time: 01:13
 */

namespace SlimBlog\Models;

/**
 * Class User
 *
 * @package SlimBlog\Models
 */
class User extends Model {

  /**
   * Method to register a new user.
   *
   * @param $email
   *    Email of the user.
   * @param $name
   *    Display name for the user.
   * @param $password
   *    Password of the user.
   *
   * @return mixed
   */
  public function registerUser($email, $name, $password) {
      $createUser = $this->db->prepare("INSERT INTO users (email, username, password) VALUES (:email, :username, :password)");
      return $createUser->execute([
        'email' => $email,
        'username' => $name,
        'password' => $password,
      ]);
  }

  /**
   * Method to check for existing user by email.
   *
   * @param $email
   *    Email of the user.
   * @return mixed
   */
  public function validateUser($email) {
    $userLookup = $this->db->prepare("SELECT id, password FROM users WHERE email = :email");
    $userLookup->execute([
      'email' => $email
    ]);
    return $userLookup->fetch(\PDO::FETCH_OBJ);
  }

  /**
   * Method to check for existing user by Id.
   *
   * @param $id
   *    Id of the user.
   * @return mixed
   */
  public function checkUserId($id) {
    $userLookup = $this->db->prepare("SELECT username FROM users WHERE id = :id");
    $userLookup->execute([
      'id' => $id
    ]);
    return $userLookup->fetch(\PDO::FETCH_OBJ);
  }

}