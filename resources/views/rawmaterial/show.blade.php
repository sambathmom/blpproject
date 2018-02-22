@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Raw Product</h2>      
                </div>
            </div>
        </section>  
        <div class="col-md-12">
            <a href="{{url('rawproduct/create')}}">
            <span class="pull-right"><i class="fa fa-plus"></i> New raw materil separation</span>  
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
                                <th>#</th>
                                <th>Row Material</th>
                                <th>Grade</th>
                                <th>Raw Prduct</th>
                                <th>Staff</th>
                                <th>Quantity</th>
                                <th>Cost</th>
                                <th>Date</th>
                                <th width="110">Actions</th>
                            </tr>
                        </thead>
                        <tbody>  
                            @foreach ($rawProducts as $rawProduct) 
                            <tr>
                                <td>{{$rawProduct->rp_id}}</td>
                                <td>{{$rawProduct->rm_name}}</td>
                                <td>{{$rawProduct->grade_name}}</td>
                                <td>{{$rawProduct->first_name}} {{$rawProduct->middle_name}} {{$rawProduct->last_name}}</td>
                                <td>{{$rawProduct->rp_name}}</td>
                                <td>{{$rawProduct->qty}}</td>
                                <td>{{$rawProduct->cost}}</td>
                                <td>{{$rawProduct->updated_at}}</td>
                                <td width="110">
                                    <a href="#editRawProduct"  data-toggle="modal" class="editRawPro"
                                    data-id="{{$rawProduct->rp_id}}" data-rmid="{{$rawProduct->rm_id}}"
                                    data-grade="{{$rawProduct->grade_id}}" data-name="{{$rawProduct->rp_name}}"
                                    data-qty="{{$rawProduct->qty}}" data-cost="{{$rawProduct->cost}}">
                                        <i class="fa fa-edit fa-lg btn btn-success"></i>
                                    </a>
                                    <a href="#deleteRawPro" data-toggle="modal" data-target="#deleteRawPro" class="delete-rawProduct"  
                                    data-id="{{$rawProduct->rp_id}}">
                                        <i class="fa fa-trash fa-lg btn btn-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach                    
                        </tbody>  
                    </table>
                    {!!  $rawProducts->render() !!}     
                </div>
            </div>
        </div>
    </div>
   @include('rawproduct.destroy')
   @include('rawproduct.edit')
@endsection