<div id="laborCostEditModal" class="modal fade" role="dialog">
    <form action="{{route('laborcostupdate')}}" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit labor cost</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="lc_id" id="identityEdit">
                        <div class="col-md-12 form-group">
                            <div class="form-group row">
                                <label for="laborCostName" class="col-md-4 control-label"><strong>Labor cost name: <span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <input type="text" name="lc_name" class="form-control" id="laborCostName">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="form-group row">
                                <label for="laborCostName" class="col-md-4 control-label"><strong>Grade: <span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <select class="chzn-select chzn-rtl form-control" id="laborGrade" name="grade_id">
                                        @foreach ($grades as $grade)
                                            <option value="{{$grade->grade_id}}">{{$grade->grade_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="form-group row">
                                <label for="laborWorkType" class="col-md-4 control-label"><strong>Work type: <span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <select class="chzn-select chzn-rtl form-control" tabindex="10"  id="laborWorkType" name="work_type_id">
                                        @foreach ($workTypes as $workType)
                                            <option value="{{$workType->work_type_id}}">{{$workType->wt_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="form-group row">
                                <label for="qty" class="col-md-4 control-label"><strong>Quantity: <span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <input placeholder="Quantity" class="form-control" id="qty" name="qty" type="text">
                                    <span class="error">{{ $errors->first('qty') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="form-group row">
                                <label for="cost" class="col-md-4 control-label"><strong>Cost: <span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <input placeholder="cost" class="form-control" id="cost" name="cost" type="text">
                                    <span class="error">{{ $errors->first('cost') }}</span>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
              </div>
            </div>
        </div>  
    </form>
</div>