<div class="modal fade" id="postModal"
     tabindex="-1" role="dialog"
     aria-labelledby="postModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"
                    id="postModalLabel"></h4>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ url('/user/post/create') }}">
                <fieldset id="formstate">
                    <div class="modal-body">
                        <input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
                        <input name="postId" id="postid" type="hidden"/>
                        <input name="creatorId" id="creatorid" type="hidden"/>
                        <input name="postType" id="posttype" type="hidden"/>
                        <input name="state" id="post-state" value="1" type="hidden"/>
                        <input name="imageUrl" id="image-url-hidden" type="hidden"/>


                        <div class="form-group">
                            <label class="col-lg-2 control-label">Post Title</label>

                            <div class="col-lg-10">
                                <input type="text" placeholder="enter post title" name="title" id="post-title"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Post content</label>

                            <div class="col-lg-10">
                        <textarea rows="5" cols="10" class="form-control" id="post-content" name="body"
                                  placeholder="enter post content"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Source Title</label>

                            <div class="col-lg-10">
                                <input type="text" placeholder="enter source title" name="sourceTitle" id="source-title"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Source URL</label>

                            <div class="col-lg-10">
                                <input type="url" placeholder="enter source url" name="sourceUrl" id="source-url"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Category</label>

                            <div class="col-lg-10">
                                <select name="category" id="post-category" class="col-lg-6 form-control">
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Image</label>

                            <div class="col-lg-10">
                                <input type="file" id="files" name="imageUrl" accept="image/*"
                                       onchange="readURL(this);"/>
                                <img width="64" height="60" id="image-url" alt="No Image">
                                <img id="blah"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="delete" value="delete" type="submit"
                                class="btn btn-danger"
                                >Delete
                        </button>
                        <button name="submit" value="submit" type="submit" class="btn btn-primary">
                            Submit
                        </button>
                        <button type="submit" name="save" value="save" class="btn btn-primary">
                            Save
                        </button>
                        <input type="reset" value="Reset" class="btn btn-warning"/>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>