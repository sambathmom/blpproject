<div id="editRawMaterail" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Edit RawMaterial</h4>
            </div>
            <div class="modal-body">                                   
                 <form action="{{url('rawmaterial/update/')}}" method="POST" >
                        <div class="row">
                                <div class="col-md-12 form-group">
                                    <div class="form-group row">
                                        {{ csrf_field() }}
                                        <input type="text" name="supplier_id" id="identityEdit" >
                                        <label for="supplierId" class="col-md-3 control-label"><strong>SupplierName: <span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">
                                             <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="supplier_id"  id="supplierId">
                                             @foreach ($supplier as $supplier) 
                                             <option value="{{$supplier->supplier_id}}">{{$supplier->company_name}}</option>
                                            @endforeach

                                        </select>  
                                            {{ $errors->first('company_name') }}
                                         </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="form-group row">
                                        <label for="rawGrade" class="col-md-3 control-label"><strong>GradeName<span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">
                                            <input placeholder="Contact Person" class="form-control" id="rawGrade" name="grade_id" type="text" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="form-group row">
                                        <label for="rawName" class="col-md-3 control-label"><strong>RawMaterialName<span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">
                                            <input placeholder="RawMaterialName" class="form-control" id="rawName" name="rm_name"  type="text">
                                        </div>
                                
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="form-group row">
                                        <label for="rawQty" class="col-md-3 control-label"><strong>Quantity<span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">
                                            <input placeholder="Quantity" class="form-control" id="rawQty" name="qty" type="text">
                                            <span class="error">
                                            {{ $errors->first('qty') }}
                                         </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="form-group row">
                                        <label for="rawCost" class="col-md-3 control-label"><strong>Cost <span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">
                                            <input placeholder="Cost" class="form-control" id="rawCost" name="cost" type="text">
                                            <span class="error">
                                            {{ $errors->first('cost') }}
                                         </span>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Update"></input>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        </div>
                </form>  
            </div>
        </div>
    </div>
</div>
