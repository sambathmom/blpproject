@section('title','Dashboard')
@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Wroked Record</h2>      
                </div>
            </div>
        </section>  
        <div class="col-md-12">
            <a href="{{url('workedrecord/create')}}" >
                <i class="fa fa-plus pull-right"> New Work record</i>
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
                                <th> #</th>
                                <th> Staff </th>
                                <th> Labor cost </th>
                                <th> Work type </th>
                                <th> Memo</th>
                                <th> Quantity</th>
                                <th> Actions</th>
                            </tr>
                        </thead>
                        <tbody>  
                            @foreach ($workedRecords as $workedRecord) 
                            <tr>
                                <td>{{$workedRecord->wr_id}} </td>
                                <td>{{$workedRecord->first_name}}  {{$workedRecord->middle_name}}{{$workedRecord->last_name}}</td>
                                <td>{{$workedRecord->lc_name}}</td>
                                <td>{{$workedRecord->wt_name}}</td>
                                <td>{{$workedRecord->memo}}</td>
                                <td>{{$workedRecord->qty}}</td>
                                <td >
                                    <a  href="#editWorkedRecord"  
                                      data-target="#editWorkedRecord"  
                                      data-toggle="modal"
                                      class="edit-worked-record" 
                                      data-staff="{{$workedRecord->staff_id}}"
                                      data-id="{{$workedRecord->wr_id}}"
                                      data-laborcost="{{$workedRecord->lc_id}}"
                                      data-worktype ="{{$workedRecord->wt_id}}"
                                      data-memo="{{$workedRecord->memo}}"
                                      data-qty ="{{$workedRecord->qty}}">
                                        <i class="fa fa-edit fa-lg btn btn-success"></i>
                                    </a>
                                    <a class="delete-worked-record " data-toggle="modal" 
                                      data-target="#deleteWorkedRecord" data-id="{{$workedRecord->wr_id}}">
                                      <i class="fa fa-trash fa-lg btn btn-danger"></i>
                                    </a> 
                                </td>
                            </tr>
                            @endforeach                
                                
                      </tbody>
                    </table>   
                     {!!  $workedRecords->render() !!}     
                </div>
            </div>
        </div>
    </div>
  @include('workedrecord.destroy')
  @include('workedrecord.edit')

@endsection