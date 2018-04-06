<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="supplierCompany" class="col-md-4 control-label"><strong>Company name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
        {!! Form::text('company_name', null, array('placeholder' => 'CompanyName','class' => 'form-control', 'id'=>'supplierCompany')) !!}
            <span class="error">{{ $errors->first('company_name') }}</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="supplierContact" class="col-md-4 control-label"><strong>Contact person <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
           {!! Form::text('contact_person', null, array('placeholder' => 'Contact person','class' => 'form-control', 'id'=>'supplierContact')) !!}
            <span class="error">{{ $errors->first('contact_person') }}</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="supplierTitle" class="col-md-4 control-label"><strong>Conatact title <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
           {!! Form::text('contact_title', null, array('placeholder' => 'Conatact Title','class' => 'form-control', 'id'=>'supplierTitle')) !!}
            <span class="error">{{ $errors->first('contact_title') }}</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="supplierEmail" class="col-md-4 control-label"><strong>Email<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control', 'id'=>'supplierEmail')) !!}
            <span class="error">{{ $errors->first('email') }}</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="supplierPhone" class="col-md-4 control-label"><strong>Phone <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control', 'id'=>'supplierPhone')) !!}
            <span class="error">{{ $errors->first('phone') }}</span>
        </div>
    </div>
</div>