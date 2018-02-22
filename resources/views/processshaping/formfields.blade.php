<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="pocessProduct" class="col-md-4 control-label"><strong>Process product name <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="pp_id"  id="pocessProduct">
                @foreach ($processProducts as $processProduct) 
                    <option value="{{$processProduct->pp_id}}">{{$processProduct->pp_name}}</option>
                @endforeach
            </select> 
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
        </div>
<<<<<<< HEAD
    </div>
</div>  

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="shapingName" class="col-md-4 control-label"><strong> Process shaping name<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input type="text" name="ps_name" class="form-control" id="shapingName" >
            <span class="error">{{ $errors->first('ps_name') }}</span>
=======
    </div>  
    <div class="col-md-12 form-group">
        <div class="form-group row">
            <label for="shapingName" class="col-md-4 control-label"><strong> Process shaping name<span class="required" aria-required="true">* </span></strong></label>
            <div class="col-md-7">
                <input type="text" name="ps_name" class="form-control" id="shapingName" >
                <span class="error">{{ $errors->first('ps_name') }}</span>
            </div>
>>>>>>> 702debaa9e3daf0a132f87a73220cfbfde51ae6e
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="shapingQty" class="col-md-4 control-label"><strong>Quantity<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input type="text" name="qty" class="form-control" id="shapingQty">
            <span class="error">{{ $errors->first('qty') }}</span>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="ppCost" class="col-md-4 control-label"><strong>Cost<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input type="text" name="cost" class="form-control" id="shapingCost">
            <span class="error">{{ $errors->first('cost') }}</span>
        </div>
    </div>
</div>