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
                    <a class="nav-link" href="#security-chart" data-toggle="tab" style="color: rgba(0, 0, 0, 0.9);">Security</a>
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
                                <div class="col-1">
                                    <label for="name" class="form-label">Name</label>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-2">
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Type your name." readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group row">
                                <div class="col-1">
                                    <label for="lastname" class="form-label">Lastname</label>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-2">
                                    <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" placeholder="Type your lastname." readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group row">
                                <div class="col-1">
                                    <label for="email" class="form-label">Email</label>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-3">
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}" aria-describedby="emailHelp" readonly>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>

                <div class="chart tab-pane" id="permissions-chart" style="position: relative;">
                    <div class="chartjs-size-monitor">
                        Permissions table
                    </div>
                </div>

                <div class="chart tab-pane" id="security-chart" style="position: relative;">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class="">security</div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                </div>

                <div class="chart tab-pane" id="status-chart" style="position: relative;">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class="">status</div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection