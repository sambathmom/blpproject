@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Process driying</h2>      
                </div> 
            </div>
        </section> 

        <div class="col-md-12">    
             @if(Session::has('getmessage')) 
                <div class="row">       
                    <div class="alert alert-success col-md-3" pull-right>
                        {{Session::get('getmessage')}}                                               
                    </div> 
                </div>                      
            @endif   
        </div>
         
        <div class="box">
            <div class="content">
                <div class="col-md-12">  
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form action="{{url('/processdriying/store')}}" method="post">
                                <div class="row">
                                    @include('processdriying/formfields')
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <a href="{{url('processdriying/index')}}"><button type="button" class="btn btn-warning">Cancel</button></a>
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

