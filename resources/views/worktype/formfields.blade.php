<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="gradeName" class="col-md-4 control-label"><strong>Work type Name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Work type name" class="form-control" id="workTypeName" name="wt_name" type="text">
            <span class="error">{{ $errors->first('grade_name') }}</span>
        </div>
    </div>
</div>