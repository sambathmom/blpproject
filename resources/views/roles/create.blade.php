@section('title','Dashboard')
@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Add new role</h2>      
                </div>
            </div>
        </section>  
        
        @if (count($errors) > 0) 
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="box">
            <div class="content">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                                <div class="row">
                                    @include('roles/formfields')
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <a href="{{route('roles.index')}}">
                                            <button type="button" class="btn btn-warning">Cancel</button>
                                        </a>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
