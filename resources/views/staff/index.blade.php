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
        <div class="box">
            <div class="content">
                @if(Session::has('getmess'))
                <div class="col-md-12 row">              
                    <div class="alert alert-success">
                        {{Session::get('getmess')}}                       
                    </div>                       
                </div>
                @endif
                <div class="col-md-12">
                    <table border="1" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>StaffName</th>
                                <th>Sex</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($staffs as $staff)
                            <tr>
                                <td>{{$staff->staff_id}}</td>
                                <td>{{$staff->last_name}} {{$staff->middle_name}} {{$staff->frist_name}}</td>
                                <td>{{$staff->sex}}</td>
                                <td>{{$staff->phone}}</td>
                                <td>{{$staff->email}}</td>
                                <td >
                                    <a href="{{ route('staffedit',$staff->staff_id) }}"><i class="fa fa-edit"></i></a>
                                    <a href="{{url('staff/delete/'.$staff->id)}}"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <?php echo $staffs->render(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
