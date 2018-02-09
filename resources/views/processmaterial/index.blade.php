@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Process Materail</h2>      
                </div>
            </div>
        </section>  
                <div class="col-md-12">
                  <a href="{{url('processmaterail/create')}}">
                    <button class="colortext btn btn-success pull-right">AddNew Process Materail</button>
                  </a>   
                </div>    
        <div class="box">
            <div class="content">
                <div class="col-md-12"> 
                @if(Session::has ('getmessage'))
                        <div class="alert alert-success col-sm-10">
                          {{Session::get('getmessage')}}
                        </div>
                     @endif       
                   <table  border="1" class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Raw Product Name</th>
                          <th scope="col">Process Materail Name</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Cost</th>
                          <th width="80">Edit</th>
                          <th width="80">Delete</th>
                        </tr>
                      </thead>
                      <tbody>  
                       @foreach ($processmaterials as $processmaterial) 
                        <tr>
                            <td>{{$processmaterial->rp_name}}</td>
                            <td>{{$processmaterial->pm_name}}</td>
                            <td>{{$processmaterial->qty}}</td>
                            <td>{{$processmaterial->cost}}</td>
                            <td width="80">
                                <a type="button" href="#editProccess"  data-toggle="modal" class="editProccess btn btn-success" data-id="{{$processmaterial->pm_id}}" data-rpname="{{$processmaterial->rp_id}}" data-proname="{{$processmaterial->pm_name}}" data-proqty="{{$processmaterial->qty}}" data-procost="{{$processmaterial->cost}}">Edit</a>
                            </td>
                            <td width="80">
                                 <button type="button" data-toggle="modal" data-target="#deleteProcess" class="delete-proccess btn btn-danger"  data-id="{{$processmaterial->pm_id}}">Delete</button>
                            </td>
                        </tr>
                        @endforeach                    
                      </tbody>
                    </table>        
                </div>
            </div>
        </div>
    </div>
 @include('processmaterial.edit')
 @include('processmaterial.destroy')
@endsection