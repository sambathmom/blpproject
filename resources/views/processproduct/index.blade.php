@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Process Proudcut</h2>      
                </div>
            </div>
        </section>  
                <div class="col-md-12">
                    <a href="{{url('processproduct/create')}}">
                        <button class="colortext btn btn-success pull-right">AddNew Process Product</button>
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
                            <th scope="col">Process Material Name</th>
                            <th scope="col">Process Product Name</th>
                            <th scope="col">Staff</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Cost</th>
                            <th width="80">Edit</th>
                            <th width="80">Delete</th>
                        </tr>
                      </thead>
                      <tbody>  
                       @foreach ($processProducts as $processProduct) 
                        <tr>

                            <td>{{$processproduct->pp_id}}</td>
                            <td>{{$processproduct->pm_name}}</td>
                            <td>{{$processproduct->pp_name}}</td>
                            <td>{{$processproduct->first_name}} {{$processproduct->middle_name}} {{$processproduct->last_name}}</td>
                            <td>{{$processproduct->qty}}</td>
                            <td>{{$processproduct->cost}}</td>
                            <td width="80">
                                <a type="button" href="#editProccess"  data-toggle="modal"
                                     class="edit-pproduct btn btn-success" data-id="{{$processproduct->pp_id}}" 
                                     data-staff="{{$processproduct->staff_id}}" data-pmname="{{$processproduct->pm_id}}" 
                                     data-ppname="{{$processproduct->pp_name}}" data-ppqty="{{$processproduct->qty}}"
                                     data-ppcost="{{$processproduct->cost}}">Edit</a>
                            </td>
                            <td width="80">
                                 <button type="button" data-toggle="modal" data-target="#deletePproduct" class="delete-pproduct btn btn-danger"  data-id="{{$processProduct->pp_id}}">Delete</button>
                            </td>
                        </tr>
                        @endforeach                    
                      </tbody>
                    </table>   
                        {!!  $processProducts->render() !!}
     
                </div>
            </div>
        </div>
    </div>
   @include('processproduct.edit')
   @include('processproduct.destroy')
@endsection