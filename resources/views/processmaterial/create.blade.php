@section('title','Dashboard')
@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Process Material</h2>      
                </div>
              
            </div>
        </section>  
        
        <div class="box">
            <div class="content">
                <div class="col-md-12">                        
                    <form action="{{url('processmaterial/store')}}" method="POST">
                        <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    {{ csrf_field() }}
                                    <label for="rawproduct" class="col-md-3 control-label"><strong>RawProduct Name <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="rp_id"  id="rawproduct">
                                             @foreach ($rawproducts as $rawproduct) 
                                             <option value="{{$rawproduct->rp_id}}">{{$rawproduct->rp_name}}</option>
                                            @endforeach
                                        </select> 
                                        <span class="error">
                                            {{ $errors->first('rp_id') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="pmName" class="col-md-3 control-label"><strong>Process Materail Name<span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="Process Materail Name" class="form-control" id="pmName" name="pm_name" value="" type="text">
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
                            <div class="border">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                     <button type="submit" class="btn btn-success">Save</button>
                                     <a href="{{url('processmaterial/index')}}"><button type="button" class="btn btn-warning">Cancel</button></a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
