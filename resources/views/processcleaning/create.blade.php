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
                            <form action="{{route('processcleaningstore')}}" method="post">
                                <div class="row">
                                    @include('processcleaning/formfields')
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <a href="{{route('gradeindex')}}">
                                            <button type="button" class="btn btn-warning">Cancel</button>
                                        </a>
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
