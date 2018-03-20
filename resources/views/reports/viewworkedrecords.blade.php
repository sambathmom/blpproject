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
                                <th>WorkType</th>
                                <th width="80px"> Detail</th>
                            </tr>
                        </thead>
                        <tbody>  
                            {{$i = 1}}
                            @foreach ($workedRecords as $workedRecord)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                    {{$workedRecord->first_name}} {{$workedRecord->middle_name}}{{$workedRecord->last_name}}</td>
                                    <td>
                                        {{$workedRecord->totalqty}}
                                    </td>
                                    <td>
                                         @if($workedRecord->wt_id==1)
                                            <p>no lave losing in raw mateial purshcaing</p>
                                        @elseif($workedRecord->wt_id==2)
                                            <p>no lave losing in raw mateial seperation</p>
                                        @else  
                                            
                                        @endif   
                                    </td> 
                                    <td>   
                                            {{$workedRecord->totalcost}}
                                    </td>
                                    <th>{{$workedRecord->wt_id}}</th>
                                    <td>
                                    <?php
                                        $detail = [
                                            $workedRecord->staff_id,
                                            $workedRecord->wt_id
                                        ]
                                     ?>
                                        <a href="{{url('reports/viewworkedrecordsdetail', $detail)}}" class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                                {{ $i++ }}
                            @endforeach                
                        </tbody>  
                    </table>   
                </div>
            </div>
        </div>
    </div> 
@endsection