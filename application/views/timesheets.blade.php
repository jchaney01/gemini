@layout('layouts.dual_col_no_slider')
@section('content_left')
    @foreach($timesheets as $timesheet)
        <div class="module">
            blah
        </div>
    @endforeach
@endsection

@section('content_right')
@if(Session::get('status_msg'))
<div class="alert alert-success fade in <?if(!Session::get('type')){?>alert-error<?}?>">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{Session::get('status_msg')}}</strong>
</div>
@endif
<?php echo Form::open(URL::to_route('timesheets'), 'POST', array('id' => 'createForm'));?>
    <fieldset>
        <label>Project</label>
        {{$errors->first('project_id','<span class="help-inline animated flash">:message</span>')}}
        <select name="project_id" id="project">
            <option value=""></option>
            @foreach($projects as $project)
            <option <?php if(Input::old('project_id') == $project->id){?>selected="selected"<?}?> value="{{$project->id}}">{{$project->name}}</option>
            @endforeach
        </select>

        <label>Time</label>
        {{$errors->first('time_start','<span class="help-inline animated flash">:message</span>')}}
        {{$errors->first('time_stop','<span class="help-inline animated flash">:message</span>')}}
        <div class="input-append"><input type="text" class="span4" placeholder="start" name="time_start" value="{{Input::old('time_start')}}"><button class="btn btn-inverse" type="button"><i class="icon-white icon-cog"></i> Auto</button></div>
        <div class="input-append"><input type="text" class="span4" placeholder="stop" name="time_stop" value="{{Input::old('time_stop')}}"><button class="btn btn-inverse" type="button"><i class="icon-white icon-cog"></i> Auto</button></div>

        <label>Date</label>
        {{$errors->first('date','<span class="help-inline animated flash">:message</span>')}}
        <input type="date" value="{{Input::old('date')}}" name="date">
        <label>Description</label>
        {{$errors->first('desc','<span class="help-inline animated flash">:message</span>')}}
        <textarea name="desc" class="span12">{{Input::old('desc')}}</textarea>
        <div>
            <button type="submit" class="btn btn-inverse"><i class="icon-white icon-plus"></i> Add Timesheet</button>
            <button style="margin: 30px 0 10px 5px;" class="btn btn-success"><a style="color: #ffffff;" href="http://nitra.creativeacceleration.com?key={{Auth::user()->login_key}}"><i class="icon-white icon-share-alt"></i> Nitra</a></button>
        </div>
    </fieldset>
</form>
@endsection

@section('scripts')
{{Asset::scripts()}}
@endsection