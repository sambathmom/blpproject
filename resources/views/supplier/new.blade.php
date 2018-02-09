@section('title','Dashboard')
@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Supplier</h2>      
                </div>
              
            </div>
        </section>  
        
        <div class="box">
            <div class="content">
                <div class="col-md-12">                        
                    <form action="{{url('/supplier/store')}}" method="post">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <label for="CompanyName" class="col-md-3 control-label"><strong>CompanyName: <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="CompanyName" class="form-control" id="CompanyName" name="company_name" type="text">
                                        <span class="error">
                                            {{ $errors->first('company_name') }}
                                         </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="contact" class="col-md-3 control-label"><strong>Contact Person <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="Contact Person" class="form-control" id="contact" name="contact_person" value="" type="text">
                                        <span class="error">
                                            {{ $errors->first('contact_person') }}
                                         </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="title" class="col-md-3 control-label"><strong>Conatact Title <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="Conatact Title" class="form-control" id="title" name="contact_title" value="" type="text">
                                        <span class="error">
                                            {{ $errors->first('contact_title') }}
                                         </span>
                                    </div>
                            
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="email" class="col-md-3 control-label"><strong>Email<span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="Email" class="form-control" id="email" name="email" value="" type="email">
                                        <span class="error">
                                            {{ $errors->first('email') }}
                                         </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="phone" class="col-md-3 control-label"><strong>Phone <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="Phone" class="form-control" id="phone" name="phone" value="" type="text">
                                         <span class="error">
                                            {{ $errors->first('phone') }}
                                         </span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="border">
                            <div class="col-xs-12 col-sm-10 col-md-10">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{url('supplier/index')}}"><button class="btn btn-warning">Cancel</button></a>
                            </div>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>
@endsection
