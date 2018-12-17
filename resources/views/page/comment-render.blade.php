<div class="post">
  <div class="user-block row ">
    <img class="img-circle img-bordered-sm"  src="{{url('/storage/1544717424-daidien.jpg')}}" alt="user image">
        <span class="username">
          <a href="#">Jonathan Burke Jr.</a>

        </span>
    <span class="description">Shared publicly - 7:30 PM today</span>
  </div>
  <!-- /.user-block -->
  <p>
    Lorem ipsum represents a long-held tradition for designers,
    typographers and the like. Some people hate it and argue for
    its demise, but others ignore the hate as they create awesome
    tools to help create filler text for everyone from bacon lovers
    to Charlie Sheen fans.
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
  <div class="clearfix" id="more-comment">
    <ul class="dropdown list">
      <li>
        <div class="post ">
          <div class="user-block row ">
            <img class="img-circle img-bordered-sm"  src="{{url('/storage/1544717424-daidien.jpg')}}" alt="user image">
                <span class="username">
                  <a href="#">Jonathan Burke Jr.</a>

                </span>

          </div>
          <!-- /.user-block -->
          <p>
            Lorem ipsum represents a long-held tradition for designers,
            typographers and the like. Some people hate it and argue for
            its demise, but others ignore the hate as they create awesome
            tools to help create filler text for everyone from bacon lovers
            to Charlie Sheen fans.
          </p>
          <p><span class="description">  7:30 PM today</span></p>
          <ul class="list-inline clearfix">
            <li class="username"><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
            <li class="username"><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
            </li>
            <li class="pull-right username">
              <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                (5)</a>
            </li>
          </ul>
          <div class="post clearfix">
            <div class="user-block clearfix">
              <img class="img-circle img-bordered-sm" src="{{url('/storage/1544717424-daidien.jpg')}}" alt="User Image">
              <span class="description">Bình luận của bạn ?</span>
            </div>
            <!-- form post -->
            <div class="clearfix">
              <form class="form-horizontal form">
                @csrf
                <div class="col-sm-9 form-group margin-bottom-none">
                    <input type="text" name="user" class="hidden" value="52">
                    <input name="content" class="form-control input-sm" placeholder="Hãy cho chúng tô biếtý kiến của bạn ?">
                </div>
                <div class="col-sm-3 pull-right">
                    <button type="submit" class="btn btn-default pull-right btn-block btn-sm submit-comment"> Bình luận</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>


</div>
