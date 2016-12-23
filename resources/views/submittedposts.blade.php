<aside class="lg-side">
    <div class="inbox-head">
        <h3>{{str_plural($title)}}</h3>
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
                <th class="text-center">Status</th>
                <th class="text-center">Created by</th>
                <th class="text-center">Reviewer</th>
                <th class="text-center">Submitted date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="unread" data-toggle="modal"
                    data-target="#postModal" data-formstate="{{$formState}}" data-id="{{$post->id}}"
                    data-creatorid="{{$post->creatorId}}" data-reviewerid="{{$post->reviewerId}}"
                    data-title="{{$post->title}}" data-body="{{$post->body}}"
                    data-submitteddate="{{$post->submittedDate}}" data-stateid="{{$post->stateId}}"
                    data-sourcetitle="{{$post->sourceTitle}}" data-sourceurl="{{$post->sourceUrl}}"
                    data-posttype="{{$post->postType}}" data-header="{{$title}}" data-category="{{$post->categoryId}}"
                    data-imageurl="{{$post->imageUrl}}">
                    <td>{{str_limit($post->title,25)}}</td>
                    <td>{{str_limit($post->body,33)}}</td>
                    <td>{{$post->stateName}}</td>
                    <td>{{$post->createdBy}}</td>
                    <td>{{$post->reviewedBy}}</td>
                    <td>{{$post->submittedDate}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(isset($toBePublishPost))
            @include('publishmodal')
        @else
            @include('modal')
        @endif

    </div>
</aside>