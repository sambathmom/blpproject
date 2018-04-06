<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="name" class="col-md-4 control-label"><strong>Name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="email" class="col-md-4 control-label"><strong>Email: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="password" class="col-md-4 control-label"><strong>Password: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="confirmPassword" class="col-md-4 control-label"><strong>Confirm Password: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="role" class="col-md-4 control-label"><strong>Role: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
</div>