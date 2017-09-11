<?php

/**
 * Created by PhpStorm.
 * User: zeno
 * Date: 10.09.17
 * Time: 02:03
 */

namespace SlimBlog\Models;

use \PDO;

/**
 * Class Posts
 *
 * @package SlimBlog\Models
 */
class Posts extends Model {

  /**
   * Method to retrieve all blog posts with pagination.
   *
   * @return mixed
   *    PDO object with available posts.
   */
  public function getAllPosts() {

    $select = "SELECT id, title FROM posts";
    $query = $this->db->prepare($select);
    $query->execute();

    // ToDo Use for pagination links
    $totalRows = $query->rowCount();
    $limit = 100;
    $totalPages = ceil($totalRows / $limit);
    $page = 1;
    $startingLimit = ($page - 1) * $limit;
    $show = "SELECT id, title FROM posts ORDER BY id DESC LIMIT $startingLimit, $limit";

    $pageResult = $this->db->prepare($show);
    $pageResult->execute();
    return $pageResult->fetchAll(PDO::FETCH_OBJ);
  }

  /**
   * Method to retrieve a single post by ID.
   *
   * @param $id
   *    Post ID
   *
   * @return mixed
   *    PDO Object with single post.
   */
  public function getSinglePost($id) {

    $singlePost = $this->db->prepare("SELECT id, title, body FROM posts WHERE id = :id");
    $singlePost->execute([
      'id' => $id
    ]);
    return $singlePost->fetch(PDO::FETCH_OBJ);
  }

  /**
   * Method to create/insert a post into DB.
   *
   * @param $title
   *    New post title.
   * @param $body
   *    New post body text.
   */
  public function createPost($title, $body) {

    $create_post = $this->db->prepare("INSERT INTO posts (title, body) VALUES (:title, :body)");
    $create_post->execute([
      'title' => $title,
      'body' => $body,
    ]);
  }

  /**
   * Method to update a single post.
   *
   * @param $id
   *    Id of the post.
   * @param $title
   *    New post title.
   * @param $body
   *    New post body.
   */
  public function updatePost($id, $title, $body) {
    $updatePost = $this->db->prepare("UPDATE posts set title = :title, body = :body WHERE (id = :id)");
    $updatePost->execute([
      'id' => $id,
      'title' => $title,
      'body' => $body,
    ]);
  }

  /**
   * Method to remove post from DB.
   *
   * @param $id
   *    Id of the post for removal.
   */
  public function deletePost($id) {
    $deletePost = $this->db->prepare("DELETE FROM posts WHERE (id = :id)");
    $deletePost->execute([
      'id' => $id
    ]);
  }

}
