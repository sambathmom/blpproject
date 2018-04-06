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

        @if ($message = Session::get('getmessage'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="col-md-12">
            @permission('wt-create')
            <a href="{{route('worktypecreate')}}" >
                <span class="pull-right"><i class="fa fa-plus"></i> New work type</sapn>
            </a>    
            @endpermission 
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
                                    @permission('wt-edit', 'wt-delete')
                                    <th width="110">Actions</th>
                                    @endpermission
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($workTypes as $workType)
                                <tr>
                                    <td>{{$workType->wt_id}}</td>
                                    <td>{{$workType->wt_name}}</td>
                                    @permission('wt-edit', 'wt-delete')
                                    <td width="110">
                                        @permission('wt-edit')
                                        <a href="#workTypeEditModal" data-toggle="modal" data-target="#workTypeEditModal" data-identity="{{$workType->wt_id}}" class="edit-worktype" data-name="{{$workType->wt_name}}">
                                            <i class="fa fa-edit fa-lg btn btn-success"></i>
                                        </a>
                                        @endpermission

                                        @permission('wt-delete')
                                        <a href="#workTypeDestroyModal" data-toggle="modal" data-target="#workTypeDestroyModal" data-identity="{{$workType->wt_id}}" class="destroy-worktype">
                                            <i class="fa fa-trash fa-lg btn btn-danger"></i>
                                        </a>
                                        @endpermission
                                    </td>
                                    @endpermission
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
