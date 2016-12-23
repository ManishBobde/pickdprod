<aside class="lg-side">
    <div class="inbox-head">
        <h3>Published Posts</h3>
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
                <th class="text-center">Created by</th>
                <th class="text-center">Reviewer</th>
                <th class="text-center">Submitted date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="unread" href="#myModal" data-toggle="modal">
                    <td>{{str_limit($post->title,25)}}</td>
                    <td>{{str_limit($post->body,33)}}</td>
                    <td>{{$post->createdBy}}</td>
                    <td>{{$post->reviewedBy}}</td>
                    <td>{{$post->submittedDate}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</aside>