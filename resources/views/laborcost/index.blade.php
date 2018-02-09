@section('title','Dashboard')
@extends('layouts.admin')

@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Dashboard</h2>      
                </div>
            </div>
        </section>  
        <div class="col-md-12">
            <a href="{{route('laborcostcreate')}}" >
                <button class="btn btn-success pull-right">Add new labor cost</button>
            </a>     
        </div>
        <div class="box">
            <div class="content">
                @if(Session::has('getmess')) 
                    <div class="row">       
                        <div class="alert alert-success col-md-12">
                            {{Session::get('getmess')}}                                               
                        </div> 
                    </div>                      
                @endif              
                <div class="col-md-12">
                    <table border="1" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Work Type Name</th>
                                <th>Grade</th>
                                <th>Work type</th>
                                <th width="80px">Edit</th>
                                <th width="80px">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laborCosts as $laborCost)
                            <tr>
                                <td>{{$laborCost->lc_id}}</td>
                                <td>{{$laborCost->lc_name}}</td>
                                <td>{{$laborCost->grade_name}}</td>
                                <td>{{$laborCost->wt_name}}</td>
                                <td width="80px">
                                    <button href="#laborCostEditModal" data-toggle="modal" data-target="#laborCostEditModal" data-identity="{{$laborCost->lc_id}}" data-laborcost-name="{{$laborCost->lc_name}}" data-grade="{{$laborCost->grade_id}}" data-work-type="{{$laborCost->work_type_id}}" data-qty="{{$laborCost->qty}}" data-cost="{{$laborCost->cost}}" class="edit-laborcost btn btn-success">Edit</button>
                                </td>
                                <td width="80px">
                                    <button href="#laborCostDestroyModal" data-toggle="modal" data-target="#laborCostDestroyModal" data-identity="{{$laborCost->lc_id}}" class="destroy-laborcost btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('laborcost.edit')
    @include('laborcost.destroy')
@endsection