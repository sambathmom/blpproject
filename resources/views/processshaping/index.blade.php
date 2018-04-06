@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Process shaping list</h2>      
                </div>
            </div>
        </section>

        @if ($message = Session::get('getmessage'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="col-md-12">
            @permission('ps-create')
            <a href="{{url('processshaping/create')}}">
                <i class="fa fa-plus pull-right">New process shaping</i>
            </a> 
            @endpermission   
        </div>
            
        <div class="box">
            <div class="content">
                <div class="col-md-12"> 
                    <div class="table-responsive">
                        <table  border="1" class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Staff name</th>
                                    <th>Process material</th>
                                    <th>Grade name</th>
                                    <th>Porcess shaping name</th>
                                    <th>Quantity</th>
                                    <th>Cost</th>
                                    @permission('ps-edit', 'ps-delete')
                                    <th>Actions</th>
                                    @endpermission
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($processShapings as $processShaping) 
                                <tr>
                                    <td>{{$processShaping->sp_id}}</td>
                                    <td>{{$processShaping->first_name}}  {{$processShaping->middle_name}}{{$processShaping->last_name}}</td>
                                    <td>{{$processShaping->pm_name}}</td>
                                    <td>{{$processShaping->grade_name}}</td>
                                    <td>{{$processShaping->sp_name}}</td>
                                    <td>{{$processShaping->qty}}</td>
                                    <td>{{$processShaping->cost}}</td>
                                    @permission('ps-edit', 'ps-delete')
                                    <td>
                                        @permission('ps-edit')
                                        <a type="button" href="#editShaping"  data-toggle="modal"
                                        class="edit-shaping btn btn-success" 
                                        data-id ="{{$processShaping->sp_id}}" 
                                        data-staff="{{$processShaping->staff_id}}"
                                        data-process-material ="{{$processShaping->pm_id}}"
                                        data-grade="{{$processShaping->grade_id}}"
                                        data-shaping-name = "{{$processShaping->sp_name}}" 
                                        data-sqty = "{{$processShaping->qty}}"
                                        data-scost ="{{$processShaping->cost}}"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endpermission

                                        @permission('ps-delete')
                                        <a type="button" data-toggle="modal" data-target="#deleteProcessShaping" her="#deleteProcessShaping"
                                        class="delete-shaping btn btn-danger"  data-id="{{$processShaping->sp_id}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        @endpermission
                                    </td>
                                    @endpermission
                                </tr>
                                @endforeach                    
                            </tbody>
                        </table>  
                    </div> 
                    {!!  $processShapings->render() !!}
                </div>
            </div>
        </div>
    </div>
   @include('processshaping.edit')
   @include('processshaping.destroy')
@endsection