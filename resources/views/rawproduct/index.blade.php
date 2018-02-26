@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Raw product</h2>      
                </div>
            </div>
        </section>  
        <div class="col-md-12">
            <a href="{{url('rawproduct/create')}}">
                <button class="colortext btn btn-success pull-right">New Raw Product</button>  
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
                                <th scope="col">Row Material</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Raw Prduct</th>
                                <th>Staff</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Cost</th>
                                <th width="80">Edit</th>
                                <th width="80">Delete</th>
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
                                <td width="80">
                                    <a type="button" href="#editRawProduct"  data-toggle="modal" class="editRawPro btn btn-success"
                                    data-id="{{$rawProduct->rp_id}}" data-rmid="{{$rawProduct->rm_id}}"
                                    data-grade="{{$rawProduct->grade_id}}" data-name="{{$rawProduct->rp_name}}"
                                    data-qty="{{$rawProduct->qty}}" data-cost="{{$rawProduct->cost}}">Edit</a>
                                </td>
                                <td width="80">
                                    <button type="button" data-toggle="modal" data-target="#deleteRawPro" class="delete-rawProduct btn btn-danger"  
                                    data-id="{{$rawProduct->rp_id}}">Delete</button>
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