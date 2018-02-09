<div id="workTypeEditModal" class="modal fade" role="dialog">
    <form action="{{route('worktypeupdate')}}" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit work type</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="work_type_id" id="identityEdit">
                        <div class="col-md-12 form-group">
                            <div class="form-group row">
                                <label for="gradeName" class="col-md-3 control-label"><strong>Work type Name: <span class="required" aria-required="true">* </span></strong></label>
                                <div class="col-md-7">
                                    <input placeholder="Work type name" class="form-control" id="workTypeName" name="wt_name" type="text">
                                    <span class="error">{{ $errors->first('grade_name') }}</span>
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