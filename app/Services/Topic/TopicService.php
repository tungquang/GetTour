<?php
namespace App\Services\Topic;

use App\Model\Topic;
use App\Services\Topic\Base\BaseAccessTopicService;
use App\Interfaces\TopicServiceInterface;
 /**
  *
  */
 class TopicService extends BaseAccessTopicService implements TopicServiceInterface
 {
     public function __construct(Topic $topic)
     {
        $this->topic = $topic;
     }
     /*
     *Method to show all Topic is active
     */
     public function index()
     {

         return view('admin.topic.topic')->with([
             'home'    => $this->topic->getTopic('home')->get(),
             'tour'    => $this->topic->getTopic('tour')->get(),
             'hotel'   => $this->topic->getTopic('hotel')->get(),
             'travel'  => $this->topic->getTopic('travel')->get(),
             'contact' => $this->topic->getTopic('contact')->get(),
             'user'    => $this->user()
          ]);
     }

     /*
     * Method to show all Topic is disable
     */

     public function indexBan()
     {
       return view('admin.topic.topic-ban')
               ->with([
           'topics' => $this->topic->getBan(),
           'user'    => $this->user()
         ]);
     }

     public function store($request)
     {
       $this->UploadFile($request);
       $data = [
         'img'       => $this->img,
         'content'   =>$request->content,
         'id_admin'  => $this->user()->id,
         'type'      => $request->type
       ];
       $this->topic->create($data);
     }
     public function create()
     {
       dd('xxx6');
     }
     public function edit($id)
     {
       dd('xxxxxx5');
     }
     /*
        Method to set topic in page
     */
     public function show($data)
     {
       $user = $this->user();

       $set = $this->topic->setTopic($data,$user);

       if($set)
       {
         return response()->json($value = true);
       }
       return response()->json($value = false);

     }
     public function update($request,$id)
     {

       $topic = $this->topic->getbyIdOrFind($id);
       if($topic)
       {
         $flage = $topic->update(['content' => $request->content]);
         if($flage)
         {
           $id = $topic->type.'-'.$topic->id;
           $data = [
             'id'      => $id,
             'content' => $topic->content
           ];
           return response()->json($data);
         }
         return response()->json($flage);

       }
       return response()->json($value = false);

     }
     public function destroy($id,$satus)
     {

       $topic = $this->topic->DeleteOrGet($id,$satus);
       if ($topic) {
          $type = $this->topic->find($id)->type;
          $id = $type.'-'.$topic;
          return response()->json($id);
       }
       return Response::json(['errors'=>1]);
     }
 }
