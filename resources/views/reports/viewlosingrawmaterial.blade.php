@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>View losing raw material list</h2>      
                </div>
            </div>
        </section>  
      
        <div class="box">
            <div class="content">
                <div class="row">
                    <div class="margin-bottom-10px">
                        <div class="col-md-4">
                            <label class="col-md-3">From</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control datepicker" id="startDate" name="start">                    
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-md-3">To</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control datepicker" id="endDate" name="end">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="append-table"> 
                </div>
            </div>
        </div>
    </div> 
@endsection