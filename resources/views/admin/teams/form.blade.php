<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <label for="first_name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="first_name" type="text" id="first_name" value="{{ isset($team->first_name) ? $team->first_name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($team->address) ? $team->address : ''}}" >
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('year_founded') ? 'has-error' : ''}}">
    <label for="year_founded" class="control-label">{{ 'Year Founded' }}</label>
    <input class="form-control" name="year_founded" type="date" id="year_founded" value="{{ isset($team->year_founded) ? $team->year_founded : ''}}" >
    {!! $errors->first('year_founded', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
