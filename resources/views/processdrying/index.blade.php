@section('title','Dashboard')
@extends('layouts.admin')

@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>List of dried product</h2>      
                </div>
            </div>
        </section> 

        @if ($message = Session::get('getmessage'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="col-md-12">
            @permission('pd-create')
            <a href="{{url('processdrying/create')}}" >
                <span class="pull-right"><i class="fa fa-plus"></i> New dired product</span>
            </a>    
            @endpermission 
        </div>
        
        <div class="box">
            <div class="content">           
                <div class="col-md-12">
                    <div class="table-responsive"> 
                        <table border="1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Dried product</th>
                                    <th>Staff</th>
                                    <th>Grade</th>
                                    <th>Process material</th>
                                    <th>Qauntity</th>
                                    <th>Cost</th>
                                    @permission('pd-edit', 'pd-delete')
                                    <th width="110">Actions</th>
                                    @endpermission
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($driedProducts as $driedProduct)
                                <tr>
                                    <td>{{$driedProduct->dp_id}}</td>
                                    <td>{{$driedProduct->dp_name}}</td>
                                    <td>{{$driedProduct->first_name}} {{$driedProduct->middle_name}} {{$driedProduct->last_name}}</td>
                                    <td>{{$driedProduct->grade_name}}</td>
                                    <td>{{$driedProduct->pm_name}}</td>
                                    <td>{{$driedProduct->qty}}</td>
                                    <td>{{$driedProduct->cost}}</td>
                                    @permission('pd-edit', 'pd-delete')
                                    <td width="110">
                                        @permission('pd-edit')
                                        <a href="#driedProductEditModal" data-toggle="modal" data-target="#driedProductEditModal" data-identity="{{$driedProduct->dp_id}}" data-dp-name="{{$driedProduct->dp_name}}" data-grade="{{$driedProduct->grade_id}}" data-staff="{{$driedProduct->staff_id}}" data-process-materail="{{$driedProduct->pm_id}}" data-qty="{{$driedProduct->qty}}" data-cost="{{$driedProduct->cost}}" class="edit-driedproduct">
                                            <i class="fa fa-edit fa-lg btn btn-success"></i>
                                        </a>
                                        @endpermission

                                        @permission('pd-delete')
                                        <a href="#driedProductDestroyModal" data-toggle="modal" data-target="#driedProductDestroyModal" data-identity="{{$driedProduct->dp_id}}" class="destroy-driedproduct">
                                            <i class="fa fa-trash fa-lg btn btn-danger"></i>
                                        </a>
                                        @endpermission
                                    </td>
                                    @endpermission
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('processdrying.edit')
    @include('processdrying.destroy')
@endsection