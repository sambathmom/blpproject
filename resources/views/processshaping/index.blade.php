@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Process shaping</h2>      
                </div>
            </div>
        </section>  
        <div class="col-md-12">
            <a href="{{url('processshaping/create')}}">
                <button class="colortext btn btn-success pull-right">New process shaping</button>
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
                                <th scope="col">Process product name</th>
                                <th scope="col">Process shaping name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Cost</th>
                                <th width="80">Edit</th>
                                <th width="80">Delete</th>
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($processShapings as $processShaping) 
                                <tr>
                                    <td>{{$processShaping->first_name}}  {{$processShaping->middle_name}}{{$processShaping->last_name}}</td>
                                    <td>{{$processShaping->pp_name}}</td>
                                    <td>{{$processShaping->ps_name}}</td>
                                    <td>{{$processShaping->qty}}</td>
                                    <td>{{$processShaping->cost}}</td>
                                    <td width="80">
                                        <a type="button" href="#editShaping"  data-toggle="modal"
                                        class="edit-shaping btn btn-success" 
                                        data-id ="{{$processShaping->ps_id}}" 
                                        data-staff="{{$processShaping->staff_id}}"
                                        data-process-shaping ="{{$processShaping->pp_id}}"
                                        data-shaping-name = "{{$processShaping->ps_name}}" 
                                        data-sqty = "{{$processShaping->qty}}"
                                        data-scost ="{{$processShaping->cost}}"
                                        >Edit</a>
                                    </td>
                                    <td width="80">
                                        <button type="button" data-toggle="modal" data-target="#deleteProcessShaping" class="delete-shaping btn btn-danger"  data-id="{{$processShaping->ps_id}}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach                    
                            </tbody>
                        </table>  
                    </div> 
                    {!!  $processShapings->render() !!}
                </div>
            </div>
        </div>
    </div>
   @include('processshaping.edit')
   @include('processshaping.destroy')
@endsection