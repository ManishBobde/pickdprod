<aside class="lg-side">
    <div class="inbox-head">
        <h3>Create New Post</h3>
    </div>
    <div class="inbox-body">
        <div class="create-post">

            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ url('/user/post/create') }}">
                <input name="_token" type="hidden" value="{!! csrf_token() !!}"/>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Post Title</label>

                    <div class="col-lg-10">
                        <input type="text" placeholder="enter post title" name="title" id="post-title"
                               class="form-control" value="{{old('title')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Post content</label>

                    <div class="col-lg-10">
                        <textarea rows="10" cols="30" class="form-control" id="post-content" name="body"
                                  placeholder="enter post content" value="{{old('body')}}">{{old('body')}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Source Title</label>

                    <div class="col-lg-10">
                        <input type="text" placeholder="enter source title" name="sourceTitle" id="source-title"
                               class="form-control" value="{{old('sourceTitle')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Source URL</label>

                    <div class="col-lg-10">
                        <input type="url" placeholder="enter source url" name="sourceUrl" id="source-url"
                               class="form-control" value="{{old('sourceUrl')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Select Categories</label>

                    <div class="col-lg-10">
                        @foreach($categories->chunk(3) as $chunk)
                            <div class="row">
                                @foreach ($chunk as $category)
                                    <div class="col-xs-4"><label><input type="radio" name="category"
                                                                        value="{{$category->id}}">
                                            {{ $category->categoryName }}</label></div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Post T
                        ype</label>

                    <div class="col-lg-10">
                        <div class="control-group">
                            <label class="radio-inline"><input type="radio" accept="image/*"
                                                               onchange="hideAttachment(this)" id="image"
                                                               name="postType" value="1">Text</label>
                            <label class="radio-inline"><input type="radio" accept="video/*"
                                                               onchange="hideAttachment(this)" id="video"
                                                               name="postType" value="2">Video</label>
                            <label class="radio-inline"><input type="radio" disabled onchange="hideAttachment(this)"
                                                               id="facts" name="postType" value="3">Facts</label>
                            <label class="radio-inline">
                    <span class="btn green fileinput-button">
                      <i class="fa fa-plus fa fa-white"></i>
                      <span>Attachment</span>
                      <input type="file" id="files" name="imageUrl" accept="image/*" onchange="readURL(this);"/>
                      <img id="blah"/>
                    </span>
                            </label>
                        </div>
                        {{--<br/>
                        <input type="url" id="videofile" name="videoUrl" placeholder="Enter YouTube URL" />--}}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary load_button" name="submit" value="submit" type="submit">Submit</button>
                        <button class="btn btn-send " name="save" value="save" type="submit">Save</button>
                        <input type="reset" value="Reset" class="btn btn-danger"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</aside>