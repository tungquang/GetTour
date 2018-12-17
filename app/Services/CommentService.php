<?php
namespace App\Services;

use Auth;
use App\Model\Comment;
use App\Model\Comment1;
use App\Model\Hotel;
use App\Model\Tour;
use App\Model\Car;
use App\Interfaces\CommentServiceInterface;

/**
 *
 */
class CommentService implements CommentServiceInterface
{

  function __construct(Comment $comment,Comment1 $comment1)
  {
    $this->comment = $comment;
    $this->comment1 = $comment1;
  }

  private function user()
  {
    if(Auth::user())
    {
      return [
        'user' => Auth::user(),
        'admin' => 1
      ];
    }
    if(Auth::guard('customer')->user())
    {
      return [
        'user' => Auth::guard('customer')->user(),
        'admin' => 0
      ];
    }

  }

  public function store($request,$type,$id_post)
  {

    $user = $this->user();

    //check exit post
    $post = $this->checkPostExit($id_post,$type);
    // /// check comment 1;
    if($request->user)
    {
      $data =[
        'id_comment' => $id_post,
        'id_user' => $user['user']->id,
        'content' => $request->content,
        'admin'   => $user['admin']
      ];
      $comment = $this->comment1->create($data);
      try {

      } catch (\Exception $e) {
         $comment = false;
      }


      return response()->json($comment);
    }
    // esle then create comment
    $data =[
      'id_post' => $id_post,
      'type'    => $type,
      'id_user' => $user['user']->id,
      'content' => $request->content,
      'admin'   => $user['admin']
    ];
    $comment = $this->comment->create($data);

    $view = view('page.comment-render')->render();
    return response()->json($view);
  }
 /*
 * Method to check post exit
 * If post has exit then return post,
 * Else  return null
 */
  private function checkPostExit($id,$type)
  {
    switch ($type) {
      case 'tour':
          $tour = new Tour();
          $post = $tour->getbyIdOrFind($id);
        break;
      case 'hotel':
          $hotel = new Tour();
          $post = $hotel->getbyIdOrFind($id);
        break;
      case 'car':
          $car = new Tour();
          $post = $car->getbyIdOrFind($id);
        break;

      default:
          return [];
        break;
    }
    return $post;
  }
}
