@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>View worked reocrd detail</h2>      
                </div>
            </div>
        </section>  
      
        <div class="box">
            <div class="content">
                <div class="row">
                    <div class="col-md-12"> 
                   
                    <p> {{$staff->last_name}}</p>
                  
                        <table  border="1" class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                  
                                    <th >WorkType</th>
                                    <th>Baby lot</th>
                                    <th>Input quantity</th>
                                    <th>Output quantity</th>
                                    <th>Losing</th>
                                    <th>PCS</th>
                               
                                </tr>
                            </thead>
                            <tbody>  
                                    <tr>
                                 
                                    @foreach ($workedRecords as $workedRecord)
                                    @if($workedRecord->wt_id==1)
                                        <tr>
                                            <td>{{$workedRecord->workType}}</td>
                                            <td>{{$workedRecord->cleanMaterial}}</td>
                                            <td>{{$workedRecord->rawQuantity}}</td>
                                            <td>{{$workedRecord->cleanQuantity}}</td>
                                            <td>{{$workedRecord->rawQuantity-$workedRecord->cleanQuantity}}</td>
                                            <td></td>
                                        </tr>
                                    @elseif($workedRecord->wt_id==4)
                                        <tr>
                                            <td>{{$workedRecord->workType}}</td>
                                            <td>{{$workedRecord->cleanMaterial}}</td>
                                            <td>{{$workedRecord->rawQuantity}}</td>
                                            <td>{{$workedRecord->cleanQuantity}}</td>
                                            <td>{{$workedRecord->rawQuantity-$workedRecord->cleanQuantity}}</td>
                                            
                                            <td></td>
                                        </tr>
                                    @elseif($workedRecord -> wt_id == 5)
                                        <tr>
                                            <td>{{$workedRecord->workType}}</td>
                                            <td>{{$workedRecord->cleanMaterial}}</td>
                                            <td>{{$workedRecord->cleanQuantity}}</td>
                                            <td>{{$workedRecord->quantityDired}}</td>
                                            <td>{{$workedRecord->cleanQuantity-$workedRecord->quantityDired}}</td>
                                            
                                            <td></td>
                                        </tr>
                                  
                                   @elseif($workedRecord -> wt_id == 6)
                                        <tr>
                                            <td>{{$workedRecord->workType}}</td>
                                            <td>{{$workedRecord->cleanMaterial}}</td>
                                            <td>{{$workedRecord->cleanQuantity-$workedRecord->quantityDired}}</td>
                                            <td>{{$workedRecord->cleanQuantity}}</td>
                                            <td>{{$workedRecord->quantityDired}}</td>
                                            <td></td>
                                        </tr>
                                   @endif

                                    @endforeach  
                                    </tr>
                            </tbody>  
                        </table>   
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection