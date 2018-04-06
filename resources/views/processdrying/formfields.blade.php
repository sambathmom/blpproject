<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<input type="hidden" name="user_id" class="form-control" id="user" value="{{ Auth::user()->id }}">
<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="staff" class="col-md-4 control-label"><strong>Staff name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select tabindex="10"  id="staff" name="staff_id" class="chzn-select chzn-rtl">
                @foreach ($staffs as $staff)
                    <option value="{{$staff->staff_id}}">{{$staff->first_name}} {{$staff->middle_name}} {{$staff->last_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="processMaterial" class="col-md-4 control-label"><strong>Process material: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select tabindex="10"  id="processMaterial" name="pm_id" class="chzn-select chzn-rtl">
                @foreach ($processMaterials as $processMaterial)
                    <option value="{{$processMaterial->pm_id}}">{{$processMaterial->pm_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="grade" class="col-md-4 control-label"><strong>Grade: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select id="grade" name="grade_id" class="chzn-select chzn-rtl" tabindex="10">
                @foreach ($grades as $grade)
                    <option value="{{$grade->grade_id}}">{{$grade->grade_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="driedProductName" class="col-md-4 control-label"><strong>Dried product name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('dp_name', null, array('placeholder' => 'Drying process name','class' => 'form-control', 'id' => 'driedProductName')) !!}
            <span class="error">{{ $errors->first('dp_name') }}</span>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="qty" class="col-md-4 control-label"><strong>Qauntity: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('qty', null, array('placeholder' => 'Qauntity','class' => 'form-control', 'id' => 'qty')) !!}
            <span class="error">{{ $errors->first('qty') }}</span>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="cost" class="col-md-4 control-label"><strong>Cost: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('cost', null, array('placeholder' => 'Cost','class' => 'form-control', 'id' => 'cost')) !!}
            <span class="error">{{ $errors->first('cost') }}</span>
        </div>
    </div>
</div>