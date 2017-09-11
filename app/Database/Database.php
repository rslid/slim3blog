<?php
/**
 * Created by PhpStorm.
 * User: zeno
 * Date: 08.09.17
 * Time: 18:14
 */

namespace SlimBlog\Database;


use \PDO;

/**
 * Class Database
 *
 * @package SlimBlog\Database
 */
final class Database {
  // Implement Singleton pattern even though in php is considered useless/bad practice.

  /**
   * @var null
   */
  static private $instance = null;

  /**
   * Database constructor.
   *
   * @param $conf
   */
  private function __construct($conf) {
      $this->connection = new PDO('mysql:host=' . $conf['host'] . '; dbname=' .  $conf['dbname'], $conf['dbuser'], $conf['dbpass']);

      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }

  /**
   * @throws \Exception
   */
  public function __clone() {
    throw new \Exception("Can't clone a singleton");
  }

  /**
   * @param $conf
   *
   * @return null|\SlimBlog\Database\Database
   */
  public static function instance($conf) {

    if (is_null(self::$instance)) {
      self::$instance = new self($conf);
    }
    return self::$instance;
  }
}