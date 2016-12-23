<aside class="lg-side">
    <div class="inbox-head">
        <h3>Drafted Posts</h3>
    </div>
    <div class="inbox-body">
        <div class="mail-option">
            <li><span>{{$posts->links()}}</span></li>
        </div>
        <table class="table table-inbox table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Created date</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="unread" data-toggle="modal"
                    data-target="#postModal" data-formstate="{{$formState}}" data-id="{{$post->id}}"
                    data-creatorid="{{$post->creatorId}}" data-reviewerid="{{$post->reviewerId}}"
                    data-title="{{$post->title}}" data-body="{{$post->body}}"
                    data-stateid="{{$post->stateId}}" data-sourcetitle="{{$post->sourceTitle}}"
                    data-sourceurl="{{$post->sourceUrl}}"
                    data-posttype="{{$post->postType}}" data-category="{{$post->categoryId}}" data-header="{{$title}}"
                    data-imageurl="{{$post->imageUrl}}">
                    <td>{{str_limit($post->title,25)}}</td>
                    <td>{{str_limit($post->body,33)}}</td>
                    <td>{{$post->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('draftedmodal')
    </div>
</aside>