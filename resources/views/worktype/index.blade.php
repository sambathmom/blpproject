@section('title','Dashboard')
@extends('layouts.admin')

@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Work Type</h2>      
                </div>
            </div>
        </section>  
        <div class="col-md-12">
            <a href="{{route('worktypecreate')}}" >
                <span class="pull-right"><i class="fa fa-plus"></i> New work type</sapn>
            </a>     
            @if(Session::has ('getmessage'))
                <div class="alert alert-success col-sm-3 pull-right">
                    {{Session::get('getmessage')}}
                </div>
            @endif   
        </div>
        <div class="box">
            <div class="content">                        
                <div class="col-md-12">
                    <div class="table-responsive"> 
                        <table border="1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Work Type Name</th>
                                    <th width="110">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($workTypes as $workType)
                                <tr>
                                    <td>{{$workType->work_type_id}}</td>
                                    <td>{{$workType->wt_name}}</td>
                                    <td width="110">
                                        <a href="#workTypeEditModal" data-toggle="modal" data-target="#workTypeEditModal" data-identity="{{$workType->work_type_id}}" class="edit-worktype" data-name="{{$workType->wt_name}}">
                                            <i class="fa fa-edit fa-lg btn btn-success"></i>
                                        </a>
                                        <a href="#workTypeDestroyModal" data-toggle="modal" data-target="#workTypeDestroyModal" data-identity="{{$workType->work_type_id}}" class="destroy-worktype">
                                            <i class="fa fa-trash fa-lg btn btn-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('worktype.edit');
    @include('worktype.destroy')
@endsection
