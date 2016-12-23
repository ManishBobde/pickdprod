<aside class="sm-side">
    <div class="user-head">
        <a class="inbox-avatar" href="javascript:;">
            <img width="64" hieght="60"
                 src="{{Auth::user()->profilePicUrl}}">
        </a>

        <div class="user-name">
            <h5><a href="#">{{$user->userName}}</a></h5>
            <span><a href="#">{{$user->email}}</a></span>
        </div>
    </div>
    <div class="inbox-body">

    </div>
    <ul class="inbox-nav inbox-divider">
        <li {{(Request::is('editor/home') ? 'class=active' : '') }}>
            <a href="{{ url('/editor/home') }}"><i class="fa fa-file"></i> Submitted Posts </a>

        </li>
        <li {{(Request::is('user/post/allpublished') ? 'class=active' : '') }}>
            <a href="{{ url('/user/post/allpublished') }}"><i class="fa fa-file-text"></i>Published
                Posts</a>
        </li>
        <li {{(Request::is('user/post/alldrafts') ? 'class=active' : '') }}>
            <a href="{{ url('/user/post/alldrafts') }}"><i class=" fa fa-external-link"></i> Drafts </a>
        </li>
        <li {{(Request::is('user/post/create') ? 'class=active' : '') }}>
            <a href="{{ url('/user/post/create') }}"><i class=" fa fa-folder-open-o"></i> Create Posts</a>
        </li>
        <li {{(Request::is('user/post/publish') ? 'class=active' : '') }}>
            <a href="{{ url('/user/post/publish') }}"><i class=" fa fa-automobile"></i> To be Published</a>
        </li>
        <li {{(Request::is('user/post/reassigned') ? 'class=active' : '') }}>
            <a href="{{ url('/user/post/reassigned') }}"><i class=" fa fa-reply"></i> Reassigned Posts</a>
        </li>
    </ul>
</aside>