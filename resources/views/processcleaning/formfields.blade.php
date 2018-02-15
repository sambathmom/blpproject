<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="processCleaningName" class="col-md-4 control-label"><strong>Process Cleaning name<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Process Cleaning Name" class="form-control" id="processCleaningName" name="pc_name"  type="text">
            {{ $errors->first('pc_name') }}
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">                             
        <label for="processProduct" class="col-md-4 control-label"><strong>Process Product: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select name="pp_id"  id="processProduct" class="chzn-select chzn-rtl" tabindex="10">
                @foreach ($processProducts as $processProduct) 
                    <option value="{{$processProduct->pp_id}}">{{$processProduct->pp_name}}</option>
                @endforeach
            </select> 
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="staff" class="col-md-4 control-label"><strong>Staff name: <span class="required" aria-required="true">* </span></strong></label>
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
        <label for="qty" class="col-md-4 control-label"><strong>Qauntity<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Qauntity" class="form-control" id="qty" name="qty"  type="text">
        </div>
        <span class="error">{{ $errors->first('qty') }}</span>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="cost" class="col-md-4 control-label"><strong>Cost<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Cost" class="form-control" id="cost" name="cost" type="text">
            <span class="error">{{ $errors->first('cost') }}</span>
        </div>
    </div>
</div>