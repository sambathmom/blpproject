@section('title','Dashboard')
@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Add Staff</h2>      
                </div>
              
            </div>
        </section>  
        
        <div class="box">
            <div class="content">
                <div class="col-md-12">                         
                    <form action="{{route('staffinsert')}}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="firstName" class="col-md-3 control-label"><strong>First Name: <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="First name" class="form-control" id="firstName" name="first_name" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="middleName" class="col-md-3 control-label"><strong>Middle Name:</label>
                                    <div class="col-md-7">
                                        <input placeholder="Middle name" class="form-control" id="middleName" name="middle_name" value="" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="lastName" class="col-md-3 control-label"><strong>Last Name: <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="Last name" class="form-control" id="lastName" name="last_name" value="" type="text">
                                    </div>                           
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="sex" class="col-md-3 control-label"><strong>Sex: <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="sex" id="sex">
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="email" class="col-md-3 control-label"><strong>Email: <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="Email" class="form-control" id="email" name="email" value="" type="text">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="phone" class="col-md-3 control-label"><strong>Phone: <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="Phone" class="form-control" id="phone" name="phone" value="" type="text">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="picture" class="col-md-3 control-label"><strong>Picture: <span class="required" aria-required="true">*</span></strong></label>
                                    <div class="col-md-7">
                                        <input type="file" name="picture" id="picture" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="border">
                            <div class="col-xs-12 col-sm-10 col-md-10">
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                            </div>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>
@endsection
