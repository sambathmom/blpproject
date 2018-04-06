@section('title','Dashboard')
@extends('layouts.admin')

@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Labor Cost</h2>      
                </div>
            </div>
        </section>  

        @if ($message = Session::get('getmessage'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="col-md-12">
            @permission('lc-create')
            <a href="{{route('laborcostcreate')}}" >
                <span class="pull-right"><i class="fa fa-plus"></i> New labor cost</span>
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
                                    <th>Grade</th>
                                    <th>Work type</th>

                                    @permission('lc-edit', 'lc-delete')
                                    <th width="110">Actions</th>
                                    @endpermission
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laborCosts as $laborCost)
                                <tr>
                                    <td>{{$laborCost->lc_id}}</td>
                                    <td>{{$laborCost->lc_name}}</td>
                                    <td>{{$laborCost->grade_name}}</td>
                                    <td>{{$laborCost->wt_name}}</td>

                                    @permission('lc-edit', 'lc-delete')
                                    <td width="110">
                                        @permission('lc-edit')
                                        <a href="#laborCostEditModal" data-toggle="modal" data-target="#laborCostEditModal" data-identity="{{$laborCost->lc_id}}" data-laborcost-name="{{$laborCost->lc_name}}" data-grade="{{$laborCost->grade_id}}" data-work-type="{{$laborCost->wt_id}}" data-qty="{{$laborCost->qty}}" data-cost="{{$laborCost->cost}}" class="edit-laborcost">
                                            <i class="fa fa-edit fa-lg btn btn-success"></i>
                                        </a>
                                        @endpermission

                                        @permission('lc-delete')
                                        <a href="#laborCostDestroyModal" data-toggle="modal" data-target="#laborCostDestroyModal" data-identity="{{$laborCost->lc_id}}" class="destroy-laborcost">
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
    @include('laborcost.edit')
    @include('laborcost.destroy')
@endsection