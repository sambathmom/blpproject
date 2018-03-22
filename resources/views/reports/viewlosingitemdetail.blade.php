@section('title','Dashboard')
@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>View losing raw material list</h2>      
                </div>
            </div>
        </section>  
      
        <div class="box">
            <div class="coWntent">
                <div class="col-md-12"> 
                    <h4>Raw product: {{$rawProduct->rp_name}}</h4>
                    <table  border="1" class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Process material name</th>
                                <th>Staff</th>
                                <th>Process cleaning losing</th>
                                <th>Staff</th>
                                <th>Process drying losing</th>
                                <th>Staff</th>
                                <th>Process shaping losing</th>
                                <th>Overall yeild</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php $i = 1; $totalCleaningLost = 0; $totalDryingLost = 0; $totalShapingLost = 0; ?>
                            @foreach ($processMaterialLosings as $processMaterialLosing)
                                <?php $totalYeild = number_format(($processMaterialLosing->shapedqty / $processMaterialLosing->qty) * 100, 2) ?>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$processMaterialLosing->pm_name}}</td>   
                                    <td>{{$processMaterialLosing->cleanstaff}}</td>                                  
                                    <td>{{$processMaterialLosing->qty - $processMaterialLosing->cleanqty}}</td>
                                    <td>{{$processMaterialLosing->driedstaff}}</td>
                                    <td>{{$processMaterialLosing->cleanqty - $processMaterialLosing->driedqty}}</td>
                                    <td>{{$processMaterialLosing->shapedstaff}}</td>
                                    <td>{{$processMaterialLosing->driedqty - $processMaterialLosing->shapedqty}}</td>
                                    @if ($totalYeild > 90)
                                    <td class="bgc-green">
                                        {{number_format(($processMaterialLosing->shapedqty / $processMaterialLosing->qty) * 100, 2)}}%
                                    </td>
                                    @else 
                                    <td class="bgc-red">
                                        {{number_format(($processMaterialLosing->shapedqty / $processMaterialLosing->qty) * 100, 2)}}%
                                    </td>
                                    @endif
                                </tr>
                                <?php 
                                    $totalCleaningLost = $totalCleaningLost + ($processMaterialLosing->qty - $processMaterialLosing->cleanqty);
                                    $totalDryingLost = $totalDryingLost + ($processMaterialLosing->cleanqty - $processMaterialLosing->driedqty);
                                    $totalShapingLost = $totalShapingLost + ($processMaterialLosing->shapedqty - $processMaterialLosing->driedqty);
                                ?>
                            @endforeach                
                        </tbody>  
                    </table>   
                    <p>Total lost in cleaning process: {{$totalCleaningLost}}</p>
                    <p>Total lost in drying process: {{$totalDryingLost}}</p>
                    <p>Total lost in shaping process: {{$totalShapingLost}}</p>
                </div>
            </div>
        </div>
    </div> 
@endsection