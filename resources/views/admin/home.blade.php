R@extends('layouts.admin.app')

@section('content')

        <div class="container pad-b-50">
            <div class="row">
                <div class="col-xs-12 col-lg-8 col-md-8">
                    <div class="col-md-12 right-box">
                        <div class="row heading">
                            <h3>List of Users</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Developers</h3>
                                        <div class="pull-right">
                                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
                                    </div>
                                    <table class="table table-hover" id="dev-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$loop->index + 1 }}</td>
                                                <td>{{$user->userName}}</td>
                                                <td>{{$user->email}}</td>
                                                <td class="text-center"><a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"></span> Manage</a></td>
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <p>Name: <span>Sagar</span></p>
                                                                <p>Email-ID: <span>Sagar</span></p>
                                                                <p>Mobile: <span>Sagar</span></p>
                                                                <p>Age: <span>Sagar</span></p>
                                                                <p>Sex: <span>Sagar</span></p>
                                                                <p>Role: <span>Sagar</span></p>
                                                                Change Role:
                                                                <!-- Our Special dropdown has class show-on-hover -->
                                                                <div class="btn-group show-on-hover">
                                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                                        Select Role to be change <span class="caret"></span>
                                                                    </button>
                                                                    <ul class="dropdown-menu" role="menu">

                                                                        <li><a href="#">Curator</a></li>
                                                                        <li><a href="#">Editor</a></li>
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Disable</button>
                                                                <button type="button" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                {{ $users->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-lg-4 col-md-4">
                    <div class="col-md-12 right-box">
                        <div class="row heading">
                            <h3>Add User</h3>
                        </div>
                        @include('partials._errors')
                        <form class="form-horizontal pad-b-10" method="post" action="/user/add">
                            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                            <fieldset>
                                <!-- Text input-->
                                <div class="control-group">
                                <label class="control-label" for="userid">First Name</label>
                                    <div class="controls">
                                        <input required="" id="userid" name="firstName" type="text" class="form-control" placeholder="First Name" class="input-medium" required="">
                                    </div>
                                </div>
                                <div class="control-group">
                                <label class="control-label" for="userid">Last Name</label>
                                    <div class="controls">
                                        <input required="" id="userid" name="lastName" type="text" class="form-control" placeholder="Last Name" class="input-medium" required="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="userid">Email ID</label>
                                    <div class="controls">
                                        <input required="" id="userid" name="email" type="text" class="form-control" placeholder="Enter Email-ID" class="input-medium" required="">
                                    </div>
                                </div><br/>
                                <div class="radio">
                                    <label><input type="radio" name="role" value="editor">Editor</label> &nbsp;&nbsp;
                                    <label><input type="radio" name="role" value="curator">Curator</label>
                                </div>
                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="signin"></label>
                                    <div class="controls">
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                </div>
            </div>

        </div>
@endsection
