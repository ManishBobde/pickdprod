@extends('layouts.curator.app')

@section('content')

    <aside class="lg-side">
      <div class="inbox-head">
        <h3>Create New Post</h3>
      </div>
      <div class="inbox-body">
        <div class="create-post">
          <form role="form" class="form-horizontal">
            <div class="form-group">
              <label class="col-lg-2 control-label">Post Title</label>
              <div class="col-lg-10">
                <input type="text" placeholder="enter post title" id="post-title" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">Post content</label>
              <div class="col-lg-10">
                <textarea rows="10" cols="30" class="form-control" id="post-content" name="" placeholder="enter post content"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">Source Title</label>
              <div class="col-lg-10">
                <input type="text" placeholder="enter source title" id="source-title" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">Source URL</label>
              <div class="col-lg-10">
                <input type="text" placeholder="enter source url" id="source-url" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label"></label>
              <div class="col-lg-10">
                <div class="control-group">
                  <label class="radio-inline"><input type="radio" name="optradio">Upload Video </label>
                  <label class="radio-inline"><input type="radio" name="optradio">Uplaod Image</label>
                  <label class="radio-inline">  
                    <span class="btn green fileinput-button">
                      <i class="fa fa-plus fa fa-white"></i>
                      <span>Attachment</span>
                      <input type="file" name="files[]" multiple="">
                    </span>
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-send" type="submit">Save</button>
                <button class="btn btn-danger" type="submit">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </aside>
@endsection