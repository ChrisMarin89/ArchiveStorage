@extends('layouts.app')

@section('content')
<form action="{{route('profile.update', 1)}}" method="POST">
@method('PATCH')
@csrf
    <!-- Content Header (Page header) -->
    <div class="content-header p-0">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="mt-2">Settings: {{$user->email}}</h6>
                            </div><!-- /.col -->
                            <div class="col-sm-6 float-sm-right">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><button type="reset" class="btn btn-light btn-sm"><a href="/users" style="color: rgba(0, 0, 0, 0.9);"><i class="fas fa-arrow-left"></i> Back</a></button></li>
                                    <li class="breadcrumb-item"><button type="submit" class="btn btn-light btn-sm"><i class="far fa-save"></i> Save</button></li>
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
                        <a class="nav-link" href="#security-chart" data-toggle="tab" style="color: rgba(0, 0, 0, 0.9);">Security</a>
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
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Type your name.">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="lastname" class="form-label">Lastname</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" placeholder="Type your lastname.">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label for="email" class="form-label">Language</label>
                                    </div>  
                                    <div class="col-1">
                                        <select name="lang">
                                        @if($user->lang == "en")
                                            <option value="en" selected>en</option>
                                            <option value="es">es</option>
                                        @elseif($user->lang == "es")
                                            <option value="en" >en</option>
                                            <option value="es" selected>es</option>
                                        @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>            
                    </div>


                    <div class="chart tab-pane" id="security-chart" style="position: relative;">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class="mb-3">
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <label for="password" class="form-label">Password</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if ($errors->any())
                <div class="card-footer text-muted">
                    <div class="row">
                        <div class="col text-center">Errors</div>
                    </div><!-- /.row -->
                    @foreach ($errors->all() as $error) 
                    <div class="row">
                        <div class="col">{{ $error }}</div>
                    </div><!-- /.row -->
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</form>

@endsection