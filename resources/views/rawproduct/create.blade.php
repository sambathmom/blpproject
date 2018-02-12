@section('title','Dashboard')
@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>RawProduct</h2>      
                </div>
              
            </div>
        </section>  
        
        <div class="box">
            <div class="content">
                <div class="col-md-12">                        
                    <form action="{{url('/rawproduct/store')}}" method="post">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <label for="rp_id" class="col-md-3 control-label"><strong>RawMaterialName: <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                       
                                        <select class="chzn-select chzn-rtl" tabindex="10" name="rm_id"  id="supplier_id">
                                             @foreach ($rawmaterials as $rawmaterial) 
                                             <option value="{{$rawmaterial->rm_id}}">{{$rawmaterial->rm_name}}</option>
                                            @endforeach

                                        </select> 
                                        <span>
                                            {{ $errors->first('rm_id') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="grade_id" class="col-md-3 control-label"><strong>GradeName<span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                      
                                         <select class="chzn-select chzn-rtl" tabindex="10" name="grade_id"  id="grade_id">
                                             @foreach ($grades as $grade) 
                                             <option value="{{$grade->grade_id}}">{{$grade->grade_name}}</option>
                                            @endforeach

                                        </select> 
                                        <span>
                                            {{ $errors->first('grade_id') }}
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="rpname" class="col-md-3 control-label"><strong>RawProduct Name<span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="RawProduct Name" class="form-control" id="rpname" name="rp_name" value="" type="text">
                                        <span class="error">
                                            {{ $errors->first('rp_name') }}
                                         </span>
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
                        </div> 
                        <div class="border">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                 <button type="submit" class="btn btn-success">Save</button>
                                 <a href="{{url('rawproduct/index')}}"><button type="button" class="btn btn-warning">Cancel</button></a>
                            </div>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>
@endsection