@section('title','Dashboard')
@extends('layouts.admin')
@section('content')


    <div class="content-wrapper">

        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>RawMaterial</h2>      
                </div>
            </div>
        </section>  
      
                <div class="col-md-12">
                  <a href="{{url('rawmaterial/create')}}">
                    <button class="colortext btn btn-success pull-right">AddNew RawMaterial</button>  
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
                          <th scope="col">SupplierName</th>
                          <th scope="col">GradeName</th>
                          <th scope="col">RawMaterailName</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Cost</th>
                          <th width="80">Edit</th>
                          <th width="80">Delete</th>
                        </tr>
                      </thead>
                      <tbody>  
                       @foreach ($rawmaterial as $rawmaterial) 
                        <tr>
                            <td>{{$rawmaterial->company_name}}</td>
                            <td>{{$rawmaterial->grade_id}}</td>
                            <td>{{$rawmaterial->rm_name}}</td>
                            <td>{{$rawmaterial->qty}}</td>
                            <td>{{$rawmaterial->cost}}</td>
                         
                            <td width="80">
                                <a type="button" href="#editRawMaterail"  data-toggle="modal" class="editRawMaterail btn btn-success" data-id="{{$rawmaterial->rm_id}}" data-supplier-id="{{$rawmaterial->company_name}}" data-grade-id="{{$rawmaterial->grade_id}}" data-rawname="{{$rawmaterial->rm_name}}" data-rawqty="{{$rawmaterial->qty}}" data-rawcost="{{$rawmaterial->cost}}">Edit</a>
                            </td>
                            <td width="80">
                                 <button type="button" data-toggle="modal" data-target="#deletRaw" class="delet_supplier btn btn-danger"  data-id="{{$rawmaterial->rm_id}}">Delete</button>
                            </td>
                        </tr>
                        @endforeach                    
                      </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
    @include('rawmaterial.destroy')
    @include('rawmaterial.edit')
 

@endsection