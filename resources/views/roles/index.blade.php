@section('title','Dashboard')
@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>List of roles</h2>      
                </div>
            </div>
        </section>  
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="box">
            <div class="content">
                <div class="col-md-12">  

                <div class="table-responsive"> 
                        <table border="1" class="table table-striped dataTable">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th width="160px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td width="110">
                                        <a href="{{ route('roles.show',$role->id) }}">
                                            <i class="fa fa-eye fa-lg btn btn-success"></i>
                                        </a>

                                        @permission('role-edit')
                                        <a href="{{ route('roles.edit',$role->id) }}">
                                            <i class="fa fa-edit fa-lg btn btn-success"></i>
                                        </a>
                                        @endpermission

                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger fa-lg'] )  }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $roles->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
