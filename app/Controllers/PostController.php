<?php

namespace SlimBlog\Controllers;

/**
 * Class PostController
 *
 * @package SlimBlog\Controllers
 */
class PostController extends Controller {

  /**
   * Render post creation template.
   *
   * @param $request
   * @param $response
   *
   * @return mixed
   */
  public function getCreatePost($request, $response) {
      return $this->view->render($response, 'posts/createPost.twig');
  }

  /**
   * Invoke Post model by passing create post form with post request.
   *
   * @param $request
   * @param $response
   *
   * @return mixed
   */
  public function postCreatePost($request, $response) {
    $args = $request->getParsedBody();
    $this->Posts->createPost($args['title'], $args['body']);
    return $response->withRedirect($this->router->pathFor('home'));
  }

  /**
   * Invoke Post model for single post data, render in single post template.
   *
   * @param $request
   * @param $response
   * @param $args
   *
   * @return mixed
   */
  public function displaySingle($request, $response, $args) {
    $singlePost = $this->Posts->getSinglePost($args['id']);
    return $this->view->render($response, 'posts/singlePost.twig', array(
      'singlePost' => $singlePost
    ));
  }

}
