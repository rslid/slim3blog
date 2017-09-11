<?php
/**
 * Created by PhpStorm.
 * User: zeno
 * Date: 10.09.17
 * Time: 15:50
 */

namespace SlimBlog\Middleware;

/**
 * Class Middleware
 *
 * @package SlimBlog\Middleware
 */
abstract class Middleware {

  /**
   * @var
   */
  protected $container;

  /**
   * Middleware constructor.
   *
   * @param $container
   */
  public function __construct($container) {
    $this->container = $container;
  }

  /**
   * Magic method for accessing container properties with shorter syntax.
   *
   * @param $prop
   *
   * @return mixed
   */
  public function __get($prop) {
    if ($this->container->{$prop}) {
      return $this->container->{$prop};
    }
  }

}