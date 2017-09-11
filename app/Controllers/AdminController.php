<?php

namespace SlimBlog\Controllers;

/**
 * Class AdminController
 *
 * @package SlimBlog\Controllers
 */
class AdminController extends Controller {

  /**
   * Admin controller index method invoking Post model and admin index template.
   *
   * @param $request
   * @param $response
   *
   * @return mixed
   */
  public function index($request, $response) {
    $posts = $this->Posts->getAllPosts();
    return $this->view->render($response, 'admin/adminIndex.twig', array(
      'posts' => $posts
    ));
  }

  /**
   * Edit method invoking Post model with get request and admin edit template.
   * Render the posts edit form.
   *
   * @param $request
   * @param $response
   * @param $args
   *
   * @return mixed
   */
  public function getEdit($request, $response, $args) {
    $singlePost = $this->Posts->getSinglePost($args['id']);
    return $this->view->render($response, 'admin/edit.twig', array(
      'id' => $singlePost->id,
      'title' => $singlePost->title,
      'body' => $singlePost->body,
    ));
  }

  /**
   * Admin controller Edit method invoking Post model passing post form.
   *
   * @param $request
   * @param $response
   * @param $args
   *
   * @return mixed
   */
  public function postEdit($request, $response, $args) {
    $content = $request->getParsedBody();
    $this->Posts->updatePost($args['id'], $content['title'], $content['body']);
    return $response->withRedirect($this->router->pathFor('admin.index'));
  }

  /**
   * Admin controller Delete method invoking Post model.
   *
   * @param $request
   * @param $response
   * @param $args
   *
   * @return mixed
   */
  public function getDelete($request, $response, $args) {
    $this->Posts->deletePost($args['id']);
    return $response->withRedirect($this->router->pathFor('admin.index'));
  }

}
