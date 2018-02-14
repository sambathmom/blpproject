@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Process cleaning</h2>      
                </div>
            </div>
        </section>  
        <div class="col-md-12">
            <a href="{{route('processcleaningcreate')}}">
            <button class="colortext btn btn-success pull-right">New process cleaning</button>
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
                            <th scope="col">Process Cleaning</th>
                            <th scope="col">Process Product</th>
                            <th>Staff</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Cost</th>
                            <th width="80">Edit</th>
                            <th width="80">Delete</th>
                        </tr>
                      </thead>
                      <tbody>  
                        @foreach ($processCleanings as $processCleaning) 
                        <tr>
                            <td>{{$processCleaning->pc_id}}</td>
                            <td>{{$processCleaning->pc_name}}</td>
                            <td>{{$processCleaning->pp_name}}</td>
                            <td>{{$processCleaning->first_name}} {{$processCleaning->middle_name}} {{$processCleaning->last_name}}</td>
                            <td>{{$processCleaning->qty}}</td>
                            <td>{{$processCleaning->cost}}</td>
                            <td width="80">
                                <a type="button" href="#processCleaningEditModal"  data-target="#processCleaningEditModal" data-toggle="modal" class="edit_proccess_cleaning btn btn-success" 
                                data-identity="{{$processCleaning->pc_id}}"  data-staff="{{$processCleaning->staff_id}}" data-pc-name="{{$processCleaning->pc_name}}"
                                data-process-product="{{$processCleaning->pp_id}}" data-qty="{{$processCleaning->qty}}"
                                data-cost="{{$processCleaning->cost}}">Edit</a>
                            </td>
                            <td width="80">
                                <a href="#processCleaningDeleteModal" data-toggle="modal" data-target="#processCleaningDeleteModal" class="delete-proccess-cleaning btn btn-danger"  
                                data-identity="{{$processCleaning->pc_id}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach                    
                      </tbody>
                    </table>       
                   {!!  $processCleanings->render() !!}
                </div>
            </div>
        </div>
    </div>
    @include('processcleaning.edit')
    @include('processcleaning.destroy')
@endsection