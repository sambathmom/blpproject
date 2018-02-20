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
                <button class="colortext btn btn-success pull-right">New grade</button>
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
                                    <th width="80px">Edit</th>
                                    <th width="80px">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($grades as $grade)
                                <tr>
                                    <td>{{$grade->grade_id}}</td>
                                    <td>{{$grade->grade_name}}</td>
                                    <td width="80px">
                                        <button href="#gradeEditModal" data-toggle="modal" data-target="#gradeEditModal" data-identity="{{$grade->grade_id}}" class="edit-grade btn btn-success" data-name="{{$grade->grade_name}}">Edit</button>
                                    </td>
                                    <td width="80px">
                                        <button href="#gradeDestroyModal" data-toggle="modal" data-target="#gradeDestroyModal" data-identity="{{$grade->grade_id}}" class="destroy-grade btn btn-danger">Delete</button>
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