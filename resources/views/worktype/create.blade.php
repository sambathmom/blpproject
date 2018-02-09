@section('title','Dashboard')
@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Dashboard</h2>      
                </div>
            </div>
        </section>  
        
        <div class="box">
            <div class="content">
                <div class="col-md-12">
                    <form action="{{route('worktypestroe')}}" method="post">
                        <div class="row">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="col-md-12 form-group">
                                <div class="form-group row">
                                    <label for="workTypeName" class="col-md-3 control-label"><strong>Work type Name: <span class="required" aria-required="true">* </span></strong></label>
                                    <div class="col-md-7">
                                        <input placeholder="Work type name" class="form-control" id="workTypeName" name="wt_name" type="text">
                                        <span class="error">{{ $errors->first('wt_name') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="border ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="{{route('worktypeindex')}}">
                                        <button type="button" class="btn btn-warning">Cancel</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
@endsection
