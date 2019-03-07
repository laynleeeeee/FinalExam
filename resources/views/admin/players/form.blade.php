<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <label for="first_name" class="control-label">{{ 'First Name' }}</label>
    <input class="form-control" name="first_name" type="text" id="first_name" value="{{ isset($player->first_name) ? $player->first_name : ''}}" required>
    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
    <label for="last_name" class="control-label">{{ 'Last Name' }}</label>
    <input class="form-control" name="last_name" type="text" id="last_name" value="{{ isset($player->last_name) ? $player->last_name : ''}}" required>
    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('height') ? 'has-error' : ''}}">
    <label for="height" class="control-label">{{ 'Height' }}</label>
    <input class="form-control" name="height" type="text" id="height" value="{{ isset($player->height) ? $player->height : ''}}" required>
    {!! $errors->first('height', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('birth_date') ? 'has-error' : ''}}">
    <label for="birth_date" class="control-label">{{ 'Birth Date' }}</label>
    <input class="form-control" name="birth_date" type="date" id="birth_date" value="{{ isset($player->birth_date) ? $player->birth_date : ''}}" required>
    {!! $errors->first('birth_date', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
    {!! Form::label('team_id', 'Team', ['class' => 'control-label']) !!}
    {!! Form::select('team_id', $teams, null, ['class' => 'form-control', 'id' => 'teams']) !!}
    {!! $errors->first('team_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
