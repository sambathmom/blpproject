<div id="editRawProduct" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Edit RawProduct</h4>
            </div>
            <div class="modal-body">                                   
                 <form action="{{url('rawproduct/update/')}}" method="POST" >
                        <div class="row">
                                <div class="col-md-12 form-group">
                                    <div class="form-group row">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="rp_id" id="identityEdit" >
                                        <label for="rmId" class="col-md-3 control-label"><strong>RawMaterialName<span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">
                                             <select name="rm_id"  id="rmId" class="chzn-select chzn-rtl" tabindex="10">
                                              @foreach($rawmaterials as $rawmaterial)
                                               <option value="{{$rawmaterial->rm_id}}">{{$rawmaterial->rm_name}}</option>
                                               @endforeach
                                             </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="form-group row">
                                        <label for="rawGrade" class="col-md-3 control-label"><strong>GradeName<span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">
                                            <select  name="grade_id"  id="rawGrade" class="chzn-select chzn-rtl" tabindex="10">
                                                @foreach ($grade as $grade) 
                                                 <option value="{{$grade->grade_id}}" selected="">{{$grade->grade_name}}</option>
                                                 @endforeach

                                             </select>  
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <div class="form-group row">
                                        <label for="staff" class="col-md-3 control-label"><strong>Staff name: <span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">                                      
                                            <select class="chzn-select chzn-rtl" tabindex="10" name="staff_id"  id="staff">
                                                @foreach ($staffs as $staff) 
                                                    <option value="{{$staff->staff_id}}">{{$staff->first_name}} {{$staff->middle_name}} {{$staff->last_name}}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="form-group row">
                                        <label for="rawPro" class="col-md-3 control-label"><strong>RawProductName<span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">
                                            <input placeholder="RawProductName" class="form-control" id="rawPro" name="rp_name"  type="text">
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

