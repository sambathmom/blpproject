@section('title','Dashboard')
@extends('layouts.admin')

@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>List of Staff</h2>      
                </div>
            </div>
        </section>

        @if ($message = Session::get('getmessage'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="col-md-12">
            @permission('staff-create')
            <a href="{{route('staffcreate')}}" >
                <i class="fa fa-plus pull-right">New staff</i>
            </a>     
            @endpermission
        </div> 
   
        <div class="box">
            <div class="content">
                <div class="col-md-12">
                    <div class="table-responsive"> 
                        <table border="1" class="table table-striped dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>StaffName</th>
                                    <th>Sex</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    @permission('staff-edit', 'staff-delete')
                                    <th width="110">Actions</th>
                                    @endpermission
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staffs as $staff)
                                <tr>
                                    <td>{{$staff->staff_id}}</td>
                                    <td>{{$staff->first_name}} {{$staff->middle_name}} {{$staff->last_name}}</td>
                                    <td>{{$staff->sex}}</td>
                                    <td>{{$staff->phone}}</td>
                                    <td>{{$staff->email}}</td>
                                    @permission('staff-edit', 'staff-delete')
                                    <td width="110">
                                        @permission('staff-edit')
                                        <a href="#staffEditModal" data-toggle="modal" data-target="#staffEditModal" class="edit-staff" data-identity="{{$staff->staff_id}}" data-last-name="{{$staff->last_name}}" data-middle-name="{{$staff->middle_name}}" data-frist-name="{{$staff->first_name}}" data-sex="{{$staff->sex}}" data-phone="{{$staff->phone}}" data-email="{{$staff->email}}">
                                            <i class="fa fa-edit fa-lg btn btn-success"></i>
                                        </a>
                                        @endpermission

                                        @permission('staff-edit')
                                        <a href="#staffDeleteModal" data-toggle="modal" data-target="#staffDeleteModal" class="destroy-staff" data-identity="{{$staff->staff_id}}">
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
                    <?php echo $staffs->render(); ?>
                </div>
            </div>
        </div>
    </div>
    @include('staff.destroy')
    @include('staff.edit')
@endsection
