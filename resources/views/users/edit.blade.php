@extends('layouts.app')

@section('content')
<form action="{{route('users.update', $user->id)}}" method="POST">
@method('PATCH')
@csrf
    <!-- Content Header (Page header) -->
    <div class="content-header p-0">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="mt-2">Edit User: {{$user->email}}</h6>
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
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Type your name.">
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
                                        <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" placeholder="Type your lastname.">
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
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}" aria-describedby="emailHelp">
                                    </div>
                                </div>
                            </div>
                        </div>            
                    </div>

                    <div class="chart tab-pane" id="permissions-chart" style="position: relative;">
                        <div class="chartjs-size-monitor">
                            <select multiple="multiple" name="duallistbox_permissions" class="duallistbox" title="duallistbox">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3" selected="selected">Option 3</option>
                                <option value="option4">Option 4</option>
                                <option value="option5">Option 5</option>
                                <option value="option6" selected="selected">Option 6</option>
                                <option value="option7">Option 7</option>
                                <option value="option8">Option 8</option>
                                <option value="option9">Option 9</option>
                                <option value="option10">Option 10</option>
                                <option value="option11">Option 11</option>
                                <option value="option12">Option 12</option>
                                <option value="option13">Option 13</option>
                                <option value="option14">Option 14</option>
                            </select>
                        
                            <script>
                                var duallistbox = $('.duallistbox').bootstrapDualListbox({
                                    nonSelectedListLabel: 'Available Permissions',
                                    selectedListLabel: 'Assigned Permissions',
                                    preserveSelectionOnMove: 'moved',
                                    moveOnSelect: false,
                                    infoText: false,
                                    infoTextFiltered: false,
                                    selectorMinimalHeight: 300

                                });
                            </script>
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