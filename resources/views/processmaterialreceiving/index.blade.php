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
            <a href="{{url('processmaterialreceiving/create')}}">
                <span class="pull-right"><i class="fa fa-plus"></i>New process material</span>
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
                                    <th>Raw product name</th>
                                    <th>Process material name</th>
                                    <th>Quantity</th>
                                    <th>Cost</th>
                                    <th width="110">Actions</th>
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($processMaterials as $processMaterial) 
                                <tr>
                                    <td>{{$processMaterial->pm_id}}</td>
                                    <td>{{$processMaterial->first_name}}  {{$processMaterial->middle_name}}{{$processMaterial->last_name}}</td>
                                    <td>{{$processMaterial->rp_name}}</td>
                                    <td>{{$processMaterial->pm_name}}</td>
                                    <td>{{$processMaterial->qty}}</td>
                                    <td>{{$processMaterial->cost}}</td>
                                    <td width="110">
                                        <a href="#editProccess"  data-toggle="modal" class="editProccess"
                                        data-id="{{$processMaterial->pm_id}}"
                                        data-staff ="{{$processMaterial->staff_id}}"
                                        data-rpname="{{$processMaterial->rp_id}}" 
                                        data-proname="{{$processMaterial->pm_name}}" data-proqty="{{$processMaterial->qty}}"
                                        data-procost="{{$processMaterial->cost}}">
                                            <i class="fa fa-edit fa-lg btn btn-success"></i>
                                        </a>
                                        <a data-toggle="modal" data-target="#deleteProcess" class="delete-proccess"  
                                        data-id="{{$processMaterial->pm_id}}">
                                            <i class="fa fa-trash fa-lg btn btn-danger"></i>
                                        </a>
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
 @include('processmaterialreceiving.edit')
 @include('processmaterialreceiving.destroy')
@endsection