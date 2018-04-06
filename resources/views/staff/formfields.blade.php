<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="firstName" class="col-md-4 control-label"><strong>First name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
          {!! Form::text('first_name', null, array('placeholder' => 'First name','class' => 'form-control','id'=>'firstName')) !!}
            <span class="error">{{ $errors->first('first_name') }}</span>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="middleName" class="col-md-4 control-label"><strong>Middle Name:</label>
        <div class="col-md-7">
        {!! Form::text('middle_name', null, array('placeholder' => 'Middle name','class' => 'form-control','id'=>'middleName')) !!}
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="lastName" class="col-md-4 control-label"><strong>Last Name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
             {!! Form::text('last_name', null, array('placeholder' => 'Last name','class' => 'form-control','id'=>'lastName')) !!}
            <span class="error">{{ $errors->first('last_name') }}</span>
        </div>                           
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="sex" class="col-md-4 control-label"><strong>Sex: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input type="radio" name="sex" value="Male" id="male"> Male
            <input type="radio" name="sex" value="Female" id="female"> Female
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="email" class="col-md-4 control-label"><strong>Email: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control','id'=>'email')) !!}
            <span class="error">{{ $errors->first('email') }}</span>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="phone" class="col-md-4 control-label"><strong>Phone: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
           {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control', 'id'=>'phone')) !!}
            <span class="error">{{ $errors->first('phone') }}</span>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="picture" class="col-md-4 control-label"><strong>Picture: <span class="required" aria-required="true">*</span></strong></label>
        <div class="col-md-7">
            <input type="file" name="picture" id="picture" class="form-control">
            <span class="error">{{ $errors->first('picture') }}</span>
        </div>
    </div>
</div>