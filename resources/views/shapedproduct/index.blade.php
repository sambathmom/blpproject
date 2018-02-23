@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Shaped product</h2>      
                </div>
            </div>
        </section>  
        <div class="col-md-12">
            <a href="{{url('shapedproduct/create')}}">
                <i class="fa fa-plus pull-right">New shaped product </i>
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
                    <div class="table-responsive">
                        <table  border="1" class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Staff name</th>
                                    <th>Process material</th>
                                    <th>Grade name</th>
                                    <th>Shaped product name</th>
                                    <th>Quantity</th>
                                    <th>Cost</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($shapedProducts as $shapedProduct) 
                                <tr>
                                    <td>{{$shapedProduct->sp_id}}</td>
                                    <td>{{$shapedProduct->first_name}}  {{$shapedProduct->middle_name}}{{$shapedProduct->last_name}}</td>
                                    <td>{{$shapedProduct->pm_name}}</td>
                                    <td>{{$shapedProduct->grade_name}}</td>
                                    <td>{{$shapedProduct->sp_name}}</td>
                                    <td>{{$shapedProduct->qty}}</td>
                                    <td>{{$shapedProduct->cost}}</td>
                                    <td>
                                        <a type="button" href="#editShaping"  data-toggle="modal"
                                        class="edit-shaping btn btn-success" 
                                        data-id ="{{$shapedProduct->sp_id}}" 
                                        data-staff="{{$shapedProduct->staff_id}}"
                                        data-process-material ="{{$shapedProduct->pm_id}}"
                                        data-grade="{{$shapedProduct->grade_id}}"
                                        data-shaping-name = "{{$shapedProduct->sp_name}}" 
                                        data-sqty = "{{$shapedProduct->qty}}"
                                        data-scost ="{{$shapedProduct->cost}}"
                                        ><i class="fa fa-edit"></i></a>
                                        <a type="button" data-toggle="modal" data-target="#deleteProcessShaping" her="#deleteProcessShaping"
                                         class="delete-shaping btn btn-danger"  data-id="{{$shapedProduct->sp_id}}">
                                         <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach                    
                            </tbody>
                        </table>  
                    </div> 
                    {!!  $shapedProducts->render() !!}
                </div>
            </div>
        </div>
    </div>
   @include('shapedproduct.edit')
   @include('shapedproduct.destroy')
@endsection