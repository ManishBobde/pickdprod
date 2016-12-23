@extends('layouts.admin.app')
@section('content')

    <div class="container">
        <div class="mail-box">
            @include('layouts.sidebar')
            <aside class="lg-side">
                <div class="inbox-head">
                    <h3>User Profile</h3>
                </div>
                <!-- /. ROW  -->
                <!-- Main Form Starts-->
                <div class="inbox-body">
                    <div class="create-post">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group" style="width:50%;">
                                            <label for="disabledSelect">Name</label>
                                            <input class="form-control" id="disabledInput" type="text"
                                                   name="firstname" placeholder="Name" value="{{$user->userName}}"
                                                   readonly/>
                                        </div>
                                        <div class="form-group input-group" style="width:50%;">
                                            <label for="disabledSelect">Email</label>

                                            <input type="email" class="form-control" name="email"
                                                   placeholder="Email" value="{{$user->email}}" readonly/>
                                        </div>
                                        <div class="form-group input-group" style="width:50%;">

                                            <span class="input-group-addon">+ 91 </span>
                                            <input type="text" class="form-control" name="mobileNumber"
                                                   value="{{$user->mobileNumber}}"
                                                   placeholder="Enter Mobile Number"/>
                                        </div>
                                        <div class="form-group" style="width:50%;">
                                            <label for="disabledSelect">City</label>

                                            <input type="text" class="form-control" name="city" value="Test"
                                                   placeholder="City"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection