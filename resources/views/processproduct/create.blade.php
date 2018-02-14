@section('title','Dashboard')
@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Process Product</h2>      
                </div>
              
            </div>
        </section>  
        
        <div class="box">
            <div class="content">
                <div class="col-md-12">                        
                    <form action="{{url('processproduct/store')}}" method="POST">
                        <div class="col-md-12 form-group">
                            <div class="form-group row">
                                {{ csrf_field() }}
                                <label for="processMaterial" class="col-md-3 control-label"><strong>Process Material Name <span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="pm_id"  id="processMaterial">
                                        @foreach ($processmaterials as $processmaterial) 
                                            <option value="{{$processmaterial->pm_id}}">{{$processmaterial->pm_name}}</option>
                                        @endforeach
                                    </select> 
                                    <span class="error">
                                        {{ $errors->first('pm_id') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <div class="form-group row">
                                <label for="ppName" class="col-md-3 control-label"><strong>Process Product Name<span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <input placeholder="Process Product Name" class="form-control" id="ppName" name="pp_name" value="" type="text">
                                    <span class="error">
                                        {{ $errors->first('rp_name') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="form-group row">
                                <label for="staff" class="col-md-3 control-label"><strong>Staff name: <span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">                                      
                                    <select class="chzn-select chzn-rtl" tabindex="10" name="staff_id"  id="staff">
                                        @foreach ($staffs as $staff) 
                                            <option value="{{$staff->staff_id}}">{{$staff->first_name}} {{$staff->middle_name}} {{$staff->last_name}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <div class="form-group row">
                                <label for="qty" class="col-md-3 control-label"><strong>Quantity<span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <input placeholder="Quantity" class="form-control" id="qty" name="qty" value="" type="text">
                                    <span class="error">
                                        {{ $errors->first('qty') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <div class="form-group row">
                                <label for="cost" class="col-md-3 control-label"><strong>Cost <span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <input placeholder="Cost" class="form-control" id="cost" name="cost" value="" type="text">
                                        <span class="error">
                                        {{ $errors->first('cost') }}
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="border">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="{{url('processproduct/index')}}"><button type="button" class="btn btn-warning">Cancel</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
