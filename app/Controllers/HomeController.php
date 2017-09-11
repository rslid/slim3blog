<?php
/**
 * Created by PhpStorm.
 * User: zeno
 * Date: 09.09.17
 * Time: 10:17
 */

namespace SlimBlog\Controllers;


/**
 * Class HomeController
 *
 * @package SlimBlog\Controllers
 */
class HomeController extends Controller {

  /**
   * Application homepage - invoking Post model for data and rendering homepage template.
   *
   * @param $request
   * @param $response
   *
   * @return mixed
   */
  public function index($request, $response) {
    $posts = $this->Posts->getAllPosts();
    return $this->view->render($response, 'index.twig', array(
     'posts' => $posts
    ));
  }

}