@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>View worked reocrd list</h2>      
                </div>
            </div>
        </section>  
      
        <div class="box">
            <div class="content">
                <div class="col-md-12">                   
                    <p> Details worked records of {{$staff->last_name}}(ID = {{$staff->staff_id}})</p>          
                    <table  border="1" class="table table-striped dataTables_wrapper form-inline dt-bootstrap">
                        <thead class="thead-dark">
                            <tr>
                                <th >No</th>
                                <th>Task</th>
                                <th>Date</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Cost</th>
                                <th>Total cost</th>                              
                            </tr>
                        </thead>
                        <tbody>  
                            <tr>
                            <?php $i = 1 ?>
                            @foreach ($workedRecords as $workedRecord)
                                    <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$workedRecord->workType}}</td>
                                    <td>{{$workedRecord->date}}</td>
                                    <td>{{$workedRecord->babyLotName}}</td>
                                    <td>{{$workedRecord->Quantity}}</td>
                                    <td>{{$workedRecord->cost}}</td>
                                    <td>{{$workedRecord->cost*$workedRecord->Quantity}}</td>
                                </tr>
                            @endforeach  
                            </tr>
                        </tbody>  
                    </table>   
                </div>
            </div>
        </div>
    </div> 
@endsection