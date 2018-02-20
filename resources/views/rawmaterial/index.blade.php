@section('title','Dashboard')
@extends('layouts.admin')
@section('content')


    <div class="content-wrapper">

        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Buy raw material</h2>      
                </div>
            </div>
        </section>  
        <div class="col-md-12">
            <a href="{{url('rawmaterial/create')}}">
                <button class="colortex t btn btn-success pull-right">New raw material</button>  
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
                                    <th scope="col">Raw materail name</th>
                                    <th scope="col">Staff name</th>
                                    <th scope="col">Supplier name</th>
                                    <th scope="col">Grade name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Cost</th>
                                    <th width="80">Edit</th>
                                    <th width="80">Delete</th>
                                    <th width="80">Show</th>
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($rawMaterials as $rawMaterial) 
                                <tr>
                                    <td>{{$rawMaterial->rm_name}}</td>
                                    <td>{{$rawMaterial->first_name}}  {{$rawMaterial->middle_name}}{{$rawMaterial->last_name}}</td>
                                    <td>{{$rawMaterial->company_name}}</td>
                                    <td>{{$rawMaterial->grade_name}}</td>
                                    <td>{{$rawMaterial->qty}}</td>
                                    <td>{{$rawMaterial->cost}}</td>
                                    <td >
                                        <a type="button" href="#editRawMaterail"  data-toggle="modal" class="editRawMaterail btn btn-success" data-staff="{{$rawMaterial->staff_id}}" data-id="{{$rawMaterial->rm_id}}" data-supplier="{{$rawMaterial->supplier_id}}" data-grade="{{$rawMaterial->grade_id}}" data-rawname="{{$rawMaterial->rm_name}}" data-rawqty="{{$rawMaterial->qty}}" data-rawcost="{{$rawMaterial->cost}}">Edit</a>
                                    </td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#deletRaw" class="delete-materail btn btn-danger"  data-id="{{$rawMaterial->rm_id}}">Delete</button>
                                    </td>
                                    <td>
                                        <a type="button" href="{{url ('rawmaterial/show/'. $rawMaterial->rm_id )}}" class="delete-materail btn btn-success">Show</a>
                                    </td>
                                </tr>
                                @endforeach                    
                            </tbody>
                        </table>
                    </div>  
                    {!!  $rawMaterials->render() !!}     
                </div>
            </div>
        </div>
    </div>
    @include('rawmaterial.destroy')
    @include('rawmaterial.edit')
@endsection