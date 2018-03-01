<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
<input type="hidden" name="user_id" class="form-control" id="user" value="{{ Auth::user()->id }}">  

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="staff" class="col-md-4 control-label"><strong>Staff name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="staff_id"  id="staff">
                @foreach ($staffs as $staff) 
                    <option value="{{$staff->staff_id}}">{{$staff->first_name}}  {{$staff->middle_name}}{{$staff->last_name}}</option>
                @endforeach
            </select> 
        </div>
    </div>
</div> 

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="rawProduct" class="col-md-4 control-label"><strong>Raw product name <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="rp_id"  id="rawProduct">
                @foreach ($rawProducts as $rawProduct) 
                    <option value="{{$rawProduct->rp_id}}">{{$rawProduct->rp_name}}</option>
                @endforeach
            </select> 
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="processMaterial" class="col-md-4 control-label"><strong>Process material name<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input type="text" name="pm_name" class="form-control" id="processMaterial" >
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