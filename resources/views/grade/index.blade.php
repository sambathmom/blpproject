@section('title','Dashboard')
@extends('layouts.admin')

@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>List grade</h2>      
                </div>
            </div>
        </section> 

        @if ($message = Session::get('getmessage'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="col-md-12">
            <a href="{{route('gradecreate')}}" >
                <span class="pull-right"><i class="fa fa-plus"></i> New grade</span>
            </a>     
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

                                    @permission('grade-edit', 'grade-delete')
                                    <th width="110">Actions</th>
                                    @endpermission
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach($grades as $grade)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$grade->grade_name}}</td>

                                    @permission('grade-edit', 'grade-delete')
                                    <td width="110">
                                        @permission('grade-edit')
                                        <a href="#gradeEditModal" data-toggle="modal" data-target="#gradeEditModal" data-identity="{{$grade->grade_id}}" class="edit-grade" data-name="{{$grade->grade_name}}">
                                            <i class="fa fa-edit fa-lg btn btn-success"></i>
                                        </a>
                                        @endpermission

                                        @permission('grade-delete')
                                        <a href="#gradeDestroyModal" data-toggle="modal" data-target="#gradeDestroyModal" data-identity="{{$grade->grade_id}}" class="destroy-grade">
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
                    <?php echo $grades->render(); ?>
                </div>
            </div>
        </div>
    </div>
    @include('grade.edit')
    @include('grade.destroy')
@endsection