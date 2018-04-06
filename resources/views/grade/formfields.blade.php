<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="gradeName" class="col-md-4 control-label"><strong>Grade Name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('grade_name', null, array('placeholder' => 'grade name','class' => 'form-control', 'id' => 'gradeName')) !!}
            <span class="error">{{ $errors->first('grade_name') }}</span>
        </div>
    </div>
</div>