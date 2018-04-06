@section('title','Dashboard')
@extends('layouts.admin')

@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>List of clean product</h2>      
                </div>
            </div>
        </section> 
         
        @if ($message = Session::get('getmessage'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="col-md-12">
            @permission('pc-create')
            <a href="{{url('processcleaning/create')}}" >
                <span class="pull-right"><i class="fa fa-plus"></i> New clean product</span>
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
                                    <th>Clean product</th>
                                    <th>Staff</th>
                                    <th>Grade</th>
                                    <th>Process material</th>
                                    <th>Qauntity</th>
                                    <th>Cost</th>
                                    @permission('pc-edit', 'pc-delete')
                                    <th width="110">Actions</th>
                                    @endpermission
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cleanProducts as $cleanProduct)
                                <tr>
                                    <td>{{$cleanProduct->cp_id}}</td>
                                    <td>{{$cleanProduct->cp_name}}</td>
                                    <td>{{$cleanProduct->first_name}} {{$cleanProduct->middle_name}} {{$cleanProduct->last_name}}</td>
                                    <td>{{$cleanProduct->grade_name}}</td>
                                    <td>{{$cleanProduct->pm_name}}</td>
                                    <td>{{$cleanProduct->qty}}</td>
                                    <td>{{$cleanProduct->cost}}</td>
                                    @permission('pc-edit', 'pc-delete')
                                    <td width="110">
                                        @permission('pc-edit')
                                        <a href="#cleanProductEditModal" data-toggle="modal" data-target="#cleanProductEditModal" data-identity="{{$cleanProduct->cp_id}}" data-cp-name="{{$cleanProduct->cp_name}}" data-grade="{{$cleanProduct->grade_id}}" data-staff="{{$cleanProduct->staff_id}}" data-process-materail="{{$cleanProduct->pm_id}}" data-qty="{{$cleanProduct->qty}}" data-cost="{{$cleanProduct->cost}}" class="edit-cleanproduct">
                                            <i class="fa fa-edit fa-lg btn btn-success"></i>
                                        </a>
                                        @endpermission

                                        @permission('pc-delete')
                                        <a href="#cleanProductDestroyModal" data-toggle="modal" data-target="#cleanProductDestroyModal" data-identity="{{$cleanProduct->cp_id}}" class="destroy-cleanProduct">
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
    @include('processcleaning.edit')
    @include('processcleaning.destroy')
@endsection