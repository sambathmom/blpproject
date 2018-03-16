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
                    <table  border="1" class="table table-striped">
                        <thead class="thead-dark">
                            {{$staff->last_name}}  {{$staff->middle_name}}{{$staff->first_name}}
                            <tr>
                                <th>#</th>
                                <th>Process material name</th>
                                <th>Losing qauntity</th>
                                <th>Overall yeild</th>
                                <th>Total cost</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php $i = 1 ; $total = 0; $totalQty = 0; ?>
                            @foreach ($staffWorks as $staffWork)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$staffWork->pm_name}}</td>
                                    <td>{{$staffWork->qty - $staffWork->cleanqty}}</td> 
                                    <td>{{number_format(($staffWork->shapedqty / $staffWork->qty) * 100, 2)}}%</td>
                                    <td></td>
                                </tr>
                                <?php 
                                    $totalQty = $totalQty + $staffWork->cleanqty;
                                    $total = $total + ($staffWork->qty - $staffWork->cleanqty);
                                    $cost = ($totalQty * $staffWork->cost) / 100;
                                    //$total = $total + number_format(($staffWork->shapedqty / $staffWork->qty) * 100, 2)
                                ?>
                            @endforeach                
                        </tbody>  
                    </table>   
                    <p>Total lost: {{$total}}</p>
                    <p>Total qauntity: {{$totalQty}}</p>
                    <p>Total cost: {{$cost}} </p>
                </div>
            </div>
        </div>
    </div> 
@endsection