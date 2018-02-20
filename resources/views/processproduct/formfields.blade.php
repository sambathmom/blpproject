<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="col-md-12 form-group">  
    <div class="form-group row">
        <label for="pmName" class="col-md-4 control-label"><strong>Process Material Name <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="pm_id"  id="pmName">
                @foreach ($processMaterials as $processMaterial) 
                    <option value="{{$processMaterial->pm_id}}">{{$processMaterial->pm_name}}</option>
                @endforeach
            </select> 
        </div>
    </div>
</div> 

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="staff" class="col-md-4 control-label"><strong>Staff<span class="required" aria-required="true"> * </span></strong></label>
        <div class="col-md-7">
            <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="staff_id"  id="staff">
                @foreach ($staffs as $staff) 
                    <option value="{{$staff->staff_id}}">{{$staff->first_name}} {{$staff->middle_name}} {{$staff->last_name}}</option>
                @endforeach
            </select> 
        </div>
    </div>
</div> 

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="ppName" class="col-md-4 control-label"><strong> Process Product Name<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input type="text" name="pp_name" class="form-control" id="ppName" >
            <span class="error">{{ $errors->first('pp_name') }}</span>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="ppQty" class="col-md-4 control-label"><strong>Quantity<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input type="text" name="qty" class="form-control" id="ppQty">
            <span class="error">{{ $errors->first('pm_name') }}</span>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="ppCost" class="col-md-4 control-label"><strong>Cost<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input type="text" name="cost" class="form-control" id="ppCost">
            <span class="error">{{ $errors->first('pm_name') }}</span>
        </div>
    </div>
</div>