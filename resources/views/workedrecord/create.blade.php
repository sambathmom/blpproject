@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Work Record</h2>      
                </div> 
            </div>
        </section>  
        <div class="box">
            <div class="content">
                <div class="col-md-12">                        
                    <form action="{{url('/workedrecord/store')}}" method="post">
                        <div class="row">
                          <input type ="hidden" value="{{ Auth::user()->id }}"  name="user_id">
                           @include('workedrecord.formfields')           
                        </div> 
                        <div class="border">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                 <button type="submit" class="btn btn-success">Save</button>
                                 <a href="{{url('workedrecord/index')}}"><button type="button" class="btn btn-warning">Cancel</button></a>
                            </div>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>
@endsection
