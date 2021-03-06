@section('title','Dashboard')
@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Raw material list</h2>      
                </div>
            </div>
        </section> 

        @if ($message = Session::get('getmessage'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="col-md-12">
            @permission('rmp-create')
            <a href="{{url('rawmaterialpurchasing/create')}}">
                <span class="pull-right"><i class="fa fa-plus"></i> Raw material list</span>  
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
                                    <th>Raw materail name</th>
                                    <th>Staff name</th>
                                    <th>Supplier name</th>
                                    <th>Grade name</th>
                                    <th>Quantity</th>
                                    <th>Cost</th>
                                    <th>Date</th>
                                    @permission('rmp-edit', 'rmp-delete')
                                    <th width="110">Actions</th>
                                    @endpermission
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($rawMaterials as $rawMaterial) 
                                <tr>
                                    <td>{{$rawMaterial->rm_id}}</td>
                                    <td>{{$rawMaterial->rm_name}}</td>
                                    <td>{{$rawMaterial->first_name}}  {{$rawMaterial->middle_name}}{{$rawMaterial->last_name}}</td>
                                    <td>{{$rawMaterial->company_name}}</td>
                                    <td>{{$rawMaterial->grade_name}}</td>
                                    <td>{{$rawMaterial->qty}}</td>
                                    <td>{{$rawMaterial->cost}}</td>
                                    <td>{{$rawMaterial->updated_at}}</td>
                                    @permission('rmp-edit', 'rmp-delete')
                                    <td width="110">
                                        @permission('rmp-edit')
                                        <a href="#editRawMaterail"  data-toggle="modal" class="editRawMaterail" data-staff="{{$rawMaterial->staff_id}}" data-id="{{$rawMaterial->rm_id}}" data-supplier="{{$rawMaterial->supplier_id}}" data-grade="{{$rawMaterial->grade_id}}" data-rawname="{{$rawMaterial->rm_name}}" data-rawqty="{{$rawMaterial->qty}}" data-rawcost="{{$rawMaterial->cost}}">
                                            <i class="fa fa-edit fa-lg btn btn-success"></i>
                                        </a>
                                        @endpermission

                                        @permission('rmp-delete')
                                        <a data-toggle="modal" data-target="#deletRaw" class="delete-materail"  data-id="{{$rawMaterial->rm_id}}">
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
                    {!!  $rawMaterials->render() !!}     
                </div>
            </div>
        </div>
    </div>
    @include('rawmaterialpurchasing.destroy')
    @include('rawmaterialpurchasing.edit')
@endsection