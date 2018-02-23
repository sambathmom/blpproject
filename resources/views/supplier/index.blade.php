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
        <div class="col-md-12">
            <a href="{{url('supplier/create')}}">
                <button class="colortext btn btn-success pull-right">New supplier</button>  
            </a>   
            @if(Session::has ('getmessage'))
                <div class="alert alert-success col-sm-3 pull-right">
                    {{Session::get('getmessage')}}
                </div>
                @endif   
        </div>
        <div class="box">
            <div class="content">
                <div class="col-md-12"> 
                   <table  border="1" class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Company Name</th>
                          <th scope="col">Contact Person</th>
                          <th scope="col">Contact Title</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th width="80">Edit</th>
                          <th width="80">Delete</th>
                        </tr>
                      </thead>
                      <tbody>  
                       @foreach ($suppliers as $supplier) 
                        <tr>
                            <td>{{$supplier->company_name}}</td>
                            <td>{{$supplier->contact_person}}</td>
                            <td>{{$supplier->contact_title}}</td>
                            <td>{{$supplier->email}}</td>
                            <td>{{$supplier->phone}}</td>
                            <th width="80">
                                <a type="button" href="#editSupplier"  data-toggle="modal" data-target="#editSupplier" class="edit-supplier btn btn-success" data-id="{{$supplier->supplier_id}}" data-company="{{$supplier->company_name}}" data-contact="{{$supplier->contact_person}}" data-title="{{$supplier->contact_title}}" data-email="{{$supplier->email}}" data-phone="{{$supplier->phone}}"><i class="fa fa-edit"></i></a>
                            </th>
                            <th width="80">
                                 <button type="button" data-toggle="modal" data-target="#deleteSupplier" class="deleteSupplier btn btn-danger" data-id="{{$supplier->supplier_id}}">Delete</button>
                            </th>
                        </tr>
                        @endforeach                      
                      </tbody>
                    </table>
                   {!!  $suppliers->render() !!}
                </div>
            </div>
        </div>
    </div>
    @include('supplier.destroy')
    @include('supplier.edit')
@endsection