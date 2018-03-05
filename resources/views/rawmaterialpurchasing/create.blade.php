@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Buy raw meterail</h2>      
                </div>
            </div>
        </section>  
        <div class="box">
            <div class="content">
                <div class="col-md-12">  
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form action="{{url('/rawmaterialpurchasing/store')}}" method="post">
                                <div class="row">
                                    @include('rawmaterialpurchasing.formfields')
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <a href="{{url('rawmaterialspurchasing/index')}}"><button type="button" class="btn btn-warning">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection
