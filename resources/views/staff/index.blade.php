@section('title','Dashboard')
@extends('layouts.admin')

@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Add Staff</h2>      
                </div>
            </div>
        </section>
        <div class="col-md-12">
            <a href="{{route('staffcreate')}}" >
                <button class="btn btn-success pull-right">New staff</button>
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
                                    <th>StaffName</th>
                                    <th>Sex</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th width="80">Edit</th>
                                    <th width="80">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staffs as $staff)
                                <tr>
                                    <td>{{$staff->staff_id}}</td>
                                    <td>{{$staff->first_name}} {{$staff->last_name}}</td>
                                    <td>{{$staff->sex}}</td>
                                    <td>{{$staff->phone}}</td>
                                    <td>{{$staff->email}}</td>
                                    <td width="80">
                                        <button href="#staffEditModal" data-toggle="modal" data-target="#staffEditModal" class="btn btn-success edit-staff" data-identity="{{$staff->staff_id}}" data-last-name="{{$staff->last_name}}" data-middle-name="{{$staff->middle_name}}" data-frist-name="{{$staff->first_name}}" data-sex="{{$staff->sex}}" data-phone="{{$staff->phone}}" data-email="{{$staff->email}}">Edit</button>
                                    </td>
                                    <td width="80">
                                        <button href="#staffDeleteModal" data-toggle="modal" data-target="#staffDeleteModal" class="btn btn-danger destroy-staff" data-identity="{{$staff->staff_id}}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <?php echo $staffs->render(); ?>
                </div>
            </div>
        </div>
    </div>
    @include('staff.destroy')
    @include('staff.edit')
@endsection
