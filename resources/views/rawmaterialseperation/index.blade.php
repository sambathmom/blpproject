@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Raw material superation</h2>      
                </div>
            </div>
        </section> 

        @if ($message = Session::get('getmessage'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="col-md-12">
            @permission('rms-create')
            <a href="{{url('rawmaterialseperation/create')}}">
                <i class="fa fa-plus pull-right">New Raw Product</i>  
            </a>   
            @endpermission
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
                                <th>Staff </th>
                                <th> Quantity</th>
                                <th scope="col">Cost</th>
                                @permission('rms-edit', 'rms-delete')
                                <th width="80">Actions</th>
                                @endpermission
                            </tr>
                        </thead>
                        <tbody>  
                        @foreach ($rawProducts as $rawProduct) 
                            <tr>
                                <td>{{$rawProduct->rp_id}}</td>
                                <td>{{$rawProduct->rm_name}}</td>
                                <td>{{$rawProduct->grade_name}}</td>
                                <td>{{$rawProduct->rp_name}}</td>
                                <td>{{$rawProduct->first_name}} {{$rawProduct->middle_name}} {{$rawProduct->last_name}}</td>                                
                                <td>{{$rawProduct->qty}}</td>
                                <td>{{$rawProduct->cost}}</td>
                                @permission('rms-edit', 'rms-delete')
                                <td width="110" >
                                    @permission('rms-edit')
                                    <a href="#rawMaterialSuperation" data-target="#rawMaterialSuperation"  data-toggle="modal" class="editRawPro"
                                    data-id="{{$rawProduct->rp_id}}" data-rmid="{{$rawProduct->rm_id}}"
                                    data-grade="{{$rawProduct->grade_id}}" data-name="{{$rawProduct->rp_name}}"
                                    data-qty="{{$rawProduct->qty}}" data-cost="{{$rawProduct->cost}}"
                                    data-staff="{{$rawProduct->staff_id}}"
                                    >   
                                        <i class="fa fa-edit btn btn-success"></i>
                                    </a>
                                    @endpermission
                               
                                    @permission('rms-delete')
                                    <a href="#deleteRawPro" data-toggle="modal" data-target="#deleteRawPro" class="delete-rawproduct"  
                                    data-id="{{$rawProduct->rp_id}}"><i class="fa fa-trash btn btn-danger"></i></a>
                                    @endpermission
                                </td>
                                @endpermission
                            </tr>
                            @endforeach                    
                        </tbody>  
                    </table>

                    {!!  $rawProducts->render() !!}     
                </div>
            </div>
        </div>
    </div>
@include('rawmaterialseperation.edit')
@include('rawmaterialseperation.destroy')   
@endsection