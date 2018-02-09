@section('title','Dashboard')
@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Add labor cost</h2>      
                </div>
              
            </div>
        </section>  
        
        <div class="box">
            <div class="content">
                <div class="col-md-12">                         
                    <form action="{{route('laborcoststore')}}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="laborCostName" class="col-md-3 control-label"><strong>Labor cost name: <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input type="text" name="lc_name" class="form-control" id="laborCostName">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="laborCostName" class="col-md-3 control-label"><strong>Grade: <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <select class="chzn-select chzn-rtl form-control" id="gradeId" name="grade_id">
                                            @foreach ($grades as $grade)
                                                <option value="{{$grade->grade_id}}">{{$grade->grade_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="workType" class="col-md-3 control-label"><strong>Work type: <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <select class="chzn-select chzn-rtl form-control" tabindex="10"  id="workTypeId" name="work_type_id" >
                                            @foreach ($workTypes as $workType)
                                                <option value="{{$workType->work_type_id}}">{{$workType->wt_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="qty" class="col-md-3 control-label"><strong>Quantity: <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="Quantity" class="form-control" id="qty" name="qty" value="" type="text">
                                        <span class="error">{{ $errors->first('qty') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="cost" class="col-md-3 control-label"><strong>Cost: <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="cost" class="form-control" id="cost" name="cost" value="" type="text">
                                        <span class="error">{{ $errors->first('cost') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="border">
                            <div class="col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{route('laborcostindex')}}">
                                    <button type="button" class="btn btn-warning">Cancel</button>
                                </a>
                            </div>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>
@endsection
