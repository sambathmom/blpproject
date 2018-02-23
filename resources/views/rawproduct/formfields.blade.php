<div class="col-md-12 form-group">
        <div class="form-group row">
            <label for="rmId" class="col-md-3 control-label"><strong>RawMaterialName<span class="required" aria-required="true">* </span></strong></label>
            <div class="col-md-7">
                <select name="rm_id"  id="rmId" class="chzn-select chzn-rtl" tabindex="10">
                    @foreach($rawMaterials as $rawMaterial)
                      <option value="{{$rawMaterial->rm_id}}">{{$rawMaterial->rm_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
        <div class="form-group row">
            <label for="rawGrade" class="col-md-3 control-label"><strong>GradeName<span class="required" aria-required="true">* </span></strong></label>
            <div class="col-md-7">
                <select  name="grade_id"  id="rawGrade" class="chzn-select chzn-rtl" tabindex="10">
                    @foreach ($grade as $grade) 
                        <option value="{{$grade->grade_id}}" selected="">{{$grade->grade_name}}</option>
                   @endforeach
                </select>  
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
        <div class="form-group row">
            <label for="rawPro" class="col-md-3 control-label"><strong>RawProductName<span class="required" aria-required="true">* </span></strong></label>
            <div class="col-md-7">
                <input placeholder="RawProductName" class="form-control" id="rawPro" name="rp_name"  type="text">
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
        <div class="form-group row">
            <label for="rawQty" class="col-md-3 control-label"><strong>Quantity<span class="required" aria-required="true">* </span></strong></label>
            <div class="col-md-7">
                <input placeholder="Quantity" class="form-control" id="rawQty" name="qty" type="text">
                <span class="error">
                {{ $errors->first('qty') }}
                </span>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
        <div class="form-group row">
            <label for="rawCost" class="col-md-3 control-label"><strong>Cost <span class="required" aria-required="true">* </span></strong></label>
            <div class="col-md-7">
                <input placeholder="Cost" class="form-control" id="rawCost" name="cost" type="text">
                <span class="error">
                {{ $errors->first('cost') }}
                </span>
            </div>
        </div>
    </div>
</div>