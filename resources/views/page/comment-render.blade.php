@foreach($comment as $com)
<div class="post comment" id="comment-{{$com->id}}">
  <div class="user-block row ">
    <img class="img-circle img-bordered-sm"  src="{{url('/storage/1544717424-daidien.jpg')}}" alt="user image">
        <span class="username">
          <a href="#">{{$com->user->name}}</a>

        </span>
    <span class="description">{{$com->created_at}}</span>
  </div>
  <!-- /.user-block -->
  <p>
    {{$com->content}}
  </p>
  <ul class="list-inline clearfix">
    <li class="username"><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
    <li class="username"><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
    </li>
    <li class="username">
      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
        (5)</a>
    </li>
    <li class="pull-right username">
      <a href="#" class="link-black text-sm more-comment">
        <i class="fa fa-angle-down margin-r-5"></i>
      </a>
    </li>
  </ul>
</div>
@endforeach
