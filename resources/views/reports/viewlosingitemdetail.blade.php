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
                    <table  border="1" class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th >Raw material name</th>
                                <th>Total quantity</th>
                                <th>Losing quantity</th>
                                <th width="80px"> Detail</th>
                            </tr>
                        </thead>
                        <tbody>  
                            {{$i = 1}}
                            @foreach ($losingRawMaterials as $losingRawMaterial)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$losingRawMaterial->rm_name}}</td>                                     
                                    <td>{{$losingRawMaterial->qty}}</td>
                                    <td>{{$losingRawMaterial->qty - $losingRawMaterial->totalqty}}</td>
                                    <td>
                                        <a href="{{url('reports/viewworkedrecordsdetail', $losingRawMaterial->rm_id)}}" class="btn btn-success">Detail</a>
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