@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Process shaping</h2>      
                </div>
            </div>
        </section>  
        <div class="box">
            <div class="content">
                <div class="col-md-12">                        
                    <form action="{{url('processshaping/store')}}" method="POST">
                        <div class="col-md-12 form-group">
                            <div class="form-group row">
                                {{ csrf_field() }}
                            @include('processshaping.formfields')
                            <div class="border">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                     <button type="submit" class="btn btn-success">Save</button>
                                     <a href="{{url('processshaping/index')}}"><button type="button" class="btn btn-warning">Cancel</button></a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
