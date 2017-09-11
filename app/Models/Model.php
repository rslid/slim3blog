<?php
/**
 * Created by PhpStorm.
 * Date: 10.09.17
 * Time: 03:33
 */

namespace SlimBlog\Models;

/**
 * Class Model
 *
 * @package SlimBlog\Models
 */
abstract class Model {

  /**
   * @var
   */
  protected $container;

  /**
   * Model constructor.
   *
   * @param $container
   */
  public function __construct($container) {
    $this->container = $container;

  }

  /**
   * Magic method to access container properties with shorter syntax.
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