@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Process materail</h2>      
                </div>
            </div>
        </section>  
        <div class="col-md-12">
            <a href="{{url('processmaterail/create')}}">
                <button class="colortext btn btn-success pull-right">New process materail</button>
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
                                <th scope="col">Staff name</th>
                                <th scope="col">Raw product name</th>
                                <th scope="col">Process materail name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Cost</th>
                                <th width="80">Edit</th>
                                <th width="80">Delete</th>
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($processMaterials as $processMaterial) 
                                <tr>
                                    <td>{{$processMaterial->first_name}}  {{$processMaterial->middle_name}}{{$processMaterial->last_name}}</td>
                                    <td>{{$processMaterial->rp_name}}</td>
                                    <td>{{$processMaterial->pm_name}}</td>
                                    <td>{{$processMaterial->qty}}</td>
                                    <td>{{$processMaterial->cost}}</td>
                                    <td width="80">
                                        <a type="button" href="#editProccess"  data-toggle="modal" class="editProccess btn btn-success"
                                        data-id="{{$processMaterial->pm_id}}"
                                        data-staff ="{{$processMaterial->staff_id}}"
                                        data-rpname="{{$processMaterial->rp_id}}" 
                                        data-proname="{{$processMaterial->pm_name}}" data-proqty="{{$processMaterial->qty}}"
                                        data-procost="{{$processMaterial->cost}}">Edit</a>
                                    </td>
                                    <td width="80">
                                        <button type="button" data-toggle="modal" data-target="#deleteProcess" class="delete-proccess btn btn-danger"  
                                        data-id="{{$processMaterial->pm_id}}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach                    
                            </tbody>
                        </table>    
                    </div>
                   {!!  $processMaterials->render() !!}
                </div>
            </div>
        </div>
    </div>
 @include('processmaterial.edit')
 @include('processmaterial.destroy')
@endsection