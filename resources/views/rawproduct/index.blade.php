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
                    <button class="colortext btn btn-success pull-right">AddNew RawProduct</button>  
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
                          <th scope="col">RawMaterialName</th>
                          <th scope="col">GradeName</th>
                          <th scope="col">RawPrductName</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Cost</th>
                          <th width="80">Edit</th>
                          <th width="80">Delete</th>
                        </tr>
                      </thead>
                      <tbody>  
                       @foreach ($rawproducts as $rawproduct) 
                        <tr>
                            <td>{{$rawproduct->rm_name}}</td>
                            <td>{{$rawproduct->grade_name}}</td>
                            <td>{{$rawproduct->rp_name}}</td>
                            <td>{{$rawproduct->qty}}</td>
                            <td>{{$rawproduct->cost}}</td>
                           
                         
                            <td width="80">
                                <a type="button" href="#editRawProduct"  data-toggle="modal" class="editRawPro btn btn-success" data-id="{{$rawproduct->rp_id}}" data-rmid="{{$rawproduct->rm_id}}" data-grade="{{$rawproduct->grade_id}}" data-name="{{$rawproduct->rp_name}}" data-qty="{{$rawproduct->qty}}" data-cost="{{$rawproduct->cost}}">Edit</a>
                            </td>
                            <td width="80">
                                <button type="button" data-toggle="modal" data-target="#deleteRawPro" class="delete-rawproduct btn btn-danger"  data-id="{{$rawproduct->rp_id}}">Delete</button>
                            </td>
                        </tr>
                        @endforeach                    
                      </tbody>
                    </table>
                     {!!  $rawproduct->render() !!}     
                </div>
            </div>
        </div>
    </div>
   @include('rawproduct.destroy')
   @include('rawproduct.edit')
 

@endsection