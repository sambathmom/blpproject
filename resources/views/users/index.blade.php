@section('title','Dashboard')
@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>List of users</h2>      
                </div>
            </div>
        </section> 

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="col-md-12">
            @permission('wt-create')
            <a href="{{route('users.create')}}" >
                <span class="pull-right"><i class="fa fa-plus"></i> New user</sapn>
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
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th width="160px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->roles))
                                            @foreach($user->roles as $v)
                                            <label class="label label-success">{{ $v->display_name }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td width="110">
                                        <a href="{{ route('users.show',$user->id) }}">
                                            <i class="fa fa-eye fa-lg btn btn-success"></i>
                                        </a>

                                        @permission('user-edit')
                                        <a href="{{ route('users.edit',$user->id) }}">
                                            <i class="fa fa-edit fa-lg btn btn-success"></i>
                                        </a>
                                        @endpermission

                                        @permission('user-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger fa-lg'] )  }}
                                        {!! Form::close() !!}
                                        @endpermission
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $data->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
