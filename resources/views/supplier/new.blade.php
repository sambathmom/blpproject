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
                            @include('supplier.formfields')
                        </div> 
                        <div class="border">
                            <div class="col-xs-12 col-sm-10 col-md-10">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{url('supplier/index')}}"><button type="button" class="btn btn-warning">Cancel</button></a>
                            </div>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>
@endsection
