<div id="editProccess" class="modal fade" role="dialog">
    <form action="{{url('processmaterial/update')}}" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit process materail</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="pm_id" id="identityEdit">
                        <div class="col-md-12 form-group">
                            <div class="form-group row">
                                <label for="rpName" class="col-md-4 control-label"><strong>Raw product name <span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                     <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="rp_id"  id="rpName">
                                             @foreach ($rawProducts as $rawProduct) 
                                             <option value="{{$rawProduct->rp_id}}">{{$rawProduct->rp_name}}</option>
                                            @endforeach
                                        </select> 
                                    <span class="error">{{ $errors->first('rp_name') }}</span>
                                </div>
                            </div>
                        </div>   
                        <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <div class="form-group row">
                                <label for="staff" class="col-md-4 control-label"><strong>Staff name: <span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="staff_id"  id="staff">
                                        @foreach ($staffs as $staff) 
                                        <option value="{{$staff->staff_id}}">{{$staff->first_name}}  {{$staff->middle_name}}{{$staff->last_name}}</option>
                                        @endforeach
                                    </select> 
                                    <span class="error">
                                        {{ $errors->first('staff_id') }}
                                    </span>
                                </div>
                            </div>
                      </div> 
                         <div class="col-md-12 form-group">
                            <div class="form-group row">
                                <label for="proName" class="col-md-4 control-label"><strong>Raw process name<span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <input type="text" name="pm_name" class="form-control" id="proName" >
                                    <span class="error">{{ $errors->first('pm_name') }}</span>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-12 form-group">
                            <div class="form-group row">
                                <label for="pQty" class="col-md-4 control-label"><strong>Quantity<span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <input type="text" name="qty" class="form-control" id="pQty">
                                    <span class="error">{{ $errors->first('pm_name') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="form-group row">
                                <label for="pCost" class="col-md-4 control-label"><strong>Cost<span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <input type="text" name="cost" class="form-control" id="pCost">
                                    <span class="error">{{ $errors->first('pm_name') }}</span>
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