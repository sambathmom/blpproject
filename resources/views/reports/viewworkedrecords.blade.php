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
                <div class="row">
                    <div class="margin-bottom-10px">
                        <div class="col-md-4">
                            <label class="col-md-3">From</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" id="startDate">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-md-3">To</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" id="endDate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12"> 
                    <table  border="1" class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th >Staff Name</th>
                                <th>Total quantity</th>
                                <th>Total lost</th>
                                <th>Total cost</th>
                                <th width="80px"> Detail</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php $i = 1 ?>
                            @foreach ($workedRecords as $workedRecord)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$workedRecord->last_name}} {{$workedRecord->middle_name}}{{$workedRecord->first_name}}</td>
                                    <td>{{$workedRecord->totalqty}}</td>
                                    <td></td> 
                                    <td>{{$workedRecord->totalcost}}</td>
                                    <td>
                                        <a href="{{url('reports/viewworkedrecordsdetail', $workedRecord->staff_id)}}" class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                            @endforeach                
                        </tbody>  
                    </table>   
                </div>
            </div>
        </div>
    </div> 
@endsection