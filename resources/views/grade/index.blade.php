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
            <a href="{{route('gradecreate')}}">
                <a class="pull-right"><i class="fa fa-plus"></i> Add new grade</a>
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
                                    <th>Grade Name</th>
                                    <th width="110">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($grades as $grade)
                                <tr>
                                    <td>{{$grade->grade_id}}</td>
                                    <td>{{$grade->grade_name}}</td>
                                    <td width="110">
                                        <a href="#gradeEditModal" data-toggle="modal" data-target="#gradeEditModal" data-identity="{{$grade->grade_id}}" class="edit-grade" data-name="{{$grade->grade_name}}">
                                            <i class="fa fa-edit fa-lg btn btn-success"></i>
                                        </a>
                                        <a href="#gradeDestroyModal" data-toggle="modal" data-target="#gradeDestroyModal" data-identity="{{$grade->grade_id}}" class="destroy-grade">
                                            <i class="fa fa-trash fa-lg btn btn-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <?php echo $grades->render(); ?>
                </div>
            </div>
        </div>
    </div>
    @include('grade.edit')
    @include('grade.destroy')
@endsection