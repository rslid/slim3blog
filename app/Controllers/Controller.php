<?php
/**
 * Created by PhpStorm.
 * User: zeno
 * Date: 08.09.17
 * Time: 03:47
 */

namespace SlimBlog\Controllers;

/**
 * Class Controller
 *
 * @package SlimBlog\Controllers
 */
abstract class Controller {

  /**
   * @var $container DI container
   */
  protected $container;

  /**
   * Controller constructor.
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