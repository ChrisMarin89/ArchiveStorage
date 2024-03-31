@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header p-0">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mt-2">Show User: {{$user->email}}</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6 float-sm-right">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><button type="reset" class="btn btn-light btn-sm"><a href="/users" style="color: rgba(0, 0, 0, 0.9);"><i class="fas fa-arrow-left"></i> Back</a></button></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </li>
            </ul>
        </div>
</div>
<!-- /.content-header -->

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#general-chart" data-toggle="tab" style="color: rgba(0, 0, 0, 0.9);">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#permissions-chart" data-toggle="tab" style="color: rgba(0, 0, 0, 0.9);">Permissions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#status-chart" data-toggle="tab" style="color: rgba(0, 0, 0, 0.9);">Status</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content p-0">
                <div class="chart tab-pane active" id="general-chart" style="position: relative;">
                    <div class="chartjs-size-monitor">
                        <div class="mb-3">
                            <div class="form-group row">
                                <div class="col-2">
                                    <label for="name" class="form-label">Name</label>
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Type your name." readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group row">
                                <div class="col-2">
                                    <label for="lastname" class="form-label">Lastname</label>
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" placeholder="Type your lastname." readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group row">
                                <div class="col-2">
                                    <label for="email" class="form-label">Email</label>
                                </div>
                                <div class="col-3">
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}" aria-describedby="emailHelp" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="email" class="form-label">Profile</label>
                                    </div>  
                                    <div class="col-1">
                                        @if(count($user->getRoleNames())==0))
                                            <input type="email" class="form-control" name="profile" value="" aria-describedby="emailHelp" readonly>
                                        @else
                                            @foreach($roles as $role)
                                                @if($user->hasRole($role->name))
                                                    <input type="email" class="form-control" name="profile" value="{{$role->name}}" aria-describedby="emailHelp" readonly>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                    </div>            
                </div>

                <div class="chart tab-pane" id="permissions-chart" style="position: relative;">
                    <div class="chartjs-size-monitor">
                        <div class="col-2">
                            <table class="table table-hover table-sm table-striped">
                                <tbody>
                                    @foreach($permissions as $permission)
                                        @if($user->hasPermissionTo($permission->name))
                                            <tr>
                                                <td>{{$permission->name}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>   
                    </div>
                </div>

                <div class="chart tab-pane" id="status-chart" style="position: relative;">
                <div class="chartjs-size-monitor">
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="name" class="form-label">Created By</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="created_by" value="{{$user->created_by}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="name" class="form-label">Creation Date</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="created_at" value="{{$user->created_at}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="lastname" class="form-label">Modified by</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="updated_by" value="{{$user->updated_by}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="lastname" class="form-label">Modification Date</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="updated_at" value="{{$user->updated_at}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="email" class="form-label">Logins</label>
                                    </div>  
                                    <div class="col-2">
                                        <input type="email" class="form-control" name="logins" value="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection