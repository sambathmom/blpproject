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
            <a href="{{route('worktypecreate')}}" >
                <button class="btn btn-success pull-right">Add new work type</button>
            </a>     
        </div>
        <div class="box">
            <div class="content">
                @if(Session::has('getmess')) 
                    <div class="row">       
                        <div class="alert alert-success col-md-12">
                            {{Session::get('getmess')}}                                               
                        </div> 
                    </div>                      
                @endif              
                <div class="col-md-12">
                    <table border="1" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Work Type Name</th>
                                <th width="80px">Edit</th>
                                <th width="80px">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($workTypes as $workType)
                            <tr>
                                <td>{{$workType->work_type_id}}</td>
                                <td>{{$workType->wt_name}}</td>
                                <td width="80px">
                                    <button href="#workTypeEditModal" data-toggle="modal" data-target="#workTypeEditModal" data-identity="{{$workType->work_type_id}}" class="edit-worktype btn btn-success" data-name="{{$workType->wt_name}}">Edit</button>
                                </td>
                                <td width="80px">
                                    <button href="#workTypeDestroyModal" data-toggle="modal" data-target="#workTypeDestroyModal" data-identity="{{$workType->work_type_id}}" class="destroy-worktype btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <?php echo $workTypes->render(); ?>
                </div>
            </div>
        </div>
    </div>
    @include('worktype.edit');
    @include('worktype.destroy')
@endsection