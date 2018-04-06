@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Supplier</h2>      
                </div>
            </div>
        </section> 

        @if ($message = Session::get('getmessage'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="col-md-12">
            @permission('supplier-create')
            <a href="{{url('supplier/create')}}">
                <span class="pull-right">
                    <i class="fa fa-plus"> Add new supplier</i>
                </span>  
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
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Contact Person</th>
                                    <th scope="col">Contact Title</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    @permission('supplier-edit', 'supplier-delete')
                                    <th width="110">Actions</th>
                                    @endpermission
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($suppliers as $supplier) 
                                <tr>
                                    <td>{{$supplier->supplier_id}}</td>
                                    <td>{{$supplier->company_name}}</td>
                                    <td>{{$supplier->contact_person}}</td>
                                    <td>{{$supplier->contact_title}}</td>
                                    <td>{{$supplier->email}}</td>
                                    <td>{{$supplier->phone}}</td>
                                    @permission('supplier-edit', 'supplier-delete')
                                    <td width="110">
                                        @permission('supplier-edit')
                                        <a href="#editSupplier"  data-toggle="modal" data-target="#editSupplier" class="edit-supplier" data-id="{{$supplier->supplier_id}}" data-company="{{$supplier->company_name}}" data-contact="{{$supplier->contact_person}}" data-title="{{$supplier->contact_title}}" data-email="{{$supplier->email}}" data-phone="{{$supplier->phone}}">
                                            <i class="fa fa-edit fa-lg btn btn-success"></i>
                                        </a>
                                        @endpermission

                                        @permission('supplier-delete')
                                        <a data-toggle="modal" data-target="#deleteSupplier" class="deleteSupplier" data-id="{{$supplier->supplier_id}}">
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
                   {!!  $suppliers->render() !!}
                </div>
            </div>
        </div>
    </div>
    @include('supplier.destroy')
    @include('supplier.edit')
@endsection