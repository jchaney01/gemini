@layout('layouts.master')
@section('content_slide_1_left')
<h1>{{$projects[0]->name}}</h1>

<h2>{{$projects[0]->po}}</h2>
<? if ($projects[0]->issue_tracking_url){?>
<div class="module">
    <a href="{{$projects[0]->issue_tracking_url}}">
        <div>Issue Tracking</div>
    </a>
    <p>This project is currently being tracked.<br>
        Click the link to go to the tracker.
    </p>
</div>
    <? } ?>
<? if ($projects[0]->repo_url){?>
<div class="module">
    <a rel="popover" data-original-title="URL" data-content="{{$projects[0]->repo_url}}" data-trigger="hover" data-placement="right" href="#">
        <div>Code Repository</div>
    </a>

    <p>{{$projects[0]->repo_name}}
    </p>
</div>
<? } ?>
<button style="margin: 10px 0 10px 0;" class="btn btn-inverse"><a style="color: white" href="#"><i class="icon-white icon-pencil"></i> Edit</a></button>
<button style="margin: 10px 0 10px 5px;" class="btn btn-inverse"><a style="color: white" href="#"><i class="icon-white icon-remove"></i> Delete</a></button>
@endsection

@section('content_slide_1_right')
@if(Session::get('status_msg'))
<div class="alert alert-success fade in">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{Session::get('status_msg')}}</strong>
</div>
@endif
<form id="createProjectForm" method="post" action="{{URL::to_route('projects')}}">
    <fieldset>
        <label>Client</label>
        {{$errors->first('client_id','<span class="help-inline animated flash">:message</span>')}}
        <select name="client_id" id="client">
            <option value=""></option>x
            @foreach($clients as $client)
                <option <?php if(Input::old('client_id')==$client->id){?>selected="selected"<?}?> value="{{$client->id}}">{{$client->company_name}}</option>
            @endforeach
        </select>
        <label>Project Name</label>
        {{$errors->first('name','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="Type something…" value="{{Input::old('name')}}" name="name">
        <label>Budget</label>
        {{$errors->first('budgeted_dollars','<span class="help-inline animated flash">:message</span>')}}
        {{$errors->first('budgeted_hours','<span class="help-inline animated flash">:message</span>')}}
        {{$errors->first('po','<span class="help-inline animated flash">:message</span>')}}
        <div class="controls controls-row">
            <input class="span3" id="dollars" type="text" placeholder="dollars" value="{{Input::old('budgeted_dollars')}}" name="budgeted_dollars">
            <input class="span3" id="hours" type="text" placeholder="hours" value="{{Input::old('budgeted_hours')}}" name="budgeted_hours">
            <input class="span6" id="po" type="text" placeholder="PO/ATN" value="{{Input::old('budgeted_po')}}" name="po">
        </div>
        <label>Due</label>
        {{$errors->first('due_date','<span class="help-inline animated flash">:message</span>')}}
        <input type="date" value="{{Input::old('due_date')}}" name="due_date">
        <label class="checkbox">
            <input class="hideIt" type="checkbox" name="advanced" <?php if(Input::old('advanced')){?>checked="checked"<?}?> id="advanced"> Advanced
        </label>
        <div class="hidden" <?php if(Input::old('advanced')){?>style="display: block;opacity: 1;height:auto;width:auto;visibility:visible;"<?}?>>
            <label>Status</label>
            {{$errors->first('status','<span class="help-inline animated flash">:message</span>')}}
            <select name="status" id="status">
                <option <?php if(Input::old('status')=='active'){?>selected="selected"<?}?> value="active">Active</option>
                <option <?php if(Input::old('status')=='pending'){?>selected="selected"<?}?> value="pending">Pending</option>
                <option <?php if(Input::old('status')=='invoice'){?>selected="selected"<?}?> value="invoice">Waiting to Invoice</option>
                <option <?php if(Input::old('status')=='complete'){?>selected="selected"<?}?> value="complete">Complete</option>
            </select>
            <label>Repo Name</label>
            {{$errors->first('repo_name','<span class="help-inline animated flash">:message</span>')}}
            <input class="span12" name="repo_name" type="text" placeholder="Type something…" value="{{Input::old('repo_name')}}">
            <label>Repo URL</label>
            {{$errors->first('repo_url','<span class="help-inline animated flash">:message</span>')}}
            <input class="span12" type="text" name="repo_url" placeholder="ssh://git@caxserve.com:NAME" value="{{Input::old('repo_url')}}">
            <label>Notes</label>
            {{$errors->first('notes','<span class="help-inline animated flash">:message</span>')}}
            <textarea class="span12" name="notes" cols="30" rows="1">{{Input::old('notes')}}</textarea>
            <label>Time Reporting Override</label>
            {{$errors->first('tro','<span class="help-inline animated flash">:message</span>')}}
            <select name="tro" id="tro">
                <option <?php if(!Input::old('tro')){?>selected="selected"<?}?> value="">None</option>
                @foreach($users as $user)
                <option <?php if(Input::old('tro')==$user->id){?>selected="selected"<?}?> value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                @endforeach
            </select>
        </div>
        <label class="checkbox">
            <input type="checkbox" class="hideIt" name="feature" <?php if(Input::old('feature')){?>checked="checked"<?}?> id="feature" value="1"> Feature
        </label>
        <div class="hidden" <?php if(Input::old('feature')){?>style="display: block;opacity: 1;height:auto;width:auto;visibility:visible;"<?}?>>
            <label class="checkbox">
                <input type="checkbox" name="personal_feature" id="personal_feature" <?php if(Input::old('personal_feature')){?>checked="checked"<?}?> value="1"> Personal feature?
            </label>
            <label class="checkbox">
                <input type="checkbox" name="authrequired" id="authrequired" value="1" <?php if(Input::old('authrequired')){?>checked="checked"<?}?>> Auth required?
            </label>
            <label>Description</label>
            <textarea class="span12" name="description" cols="30" rows="1">{{Input::old('description')}}</textarea>
            <label>Personal description</label>
            <textarea class="span12" name="personal_desc" cols="30" rows="1">{{Input::old('personal_desc')}}</textarea>
            <label>Group</label>
            <select name="group" id="group">
                <option <?php if(Input::old('group')==1){?>selected="selected"<?}?> value="1">1</option>
                <option <?php if(Input::old('group')==2){?>selected="selected"<?}?> value="2">2</option>
                <option <?php if(Input::old('group')==3){?>selected="selected"<?}?> value="3">3</option>
                <option <?php if(Input::old('group')==4){?>selected="selected"<?}?> value="4">4</option>
            </select>
            <label>Live URL</label>
            {{$errors->first('live_url','<span class="help-inline animated flash">:message</span>')}}
            <input class="span12" value="{{Input::old('live_url')}}" type="text" placeholder="http://domain.com" name="live_url">
            <label>Full res URL</label>
            {{$errors->first('full_image_url','<span class="help-inline animated flash">:message</span>')}}
            <input class="span12" value="{{Input::old('full_image_url')}}" type="text" placeholder="http://domain.com/image_full.jpg" name="full_image_url">
            <label>Large Thumbnail</label>
            {{$errors->first('large_thumb_url','<span class="help-inline animated flash">:message</span>')}}
            <input class="span12" type="text" value="{{Input::old('large_thumb_url')}}" placeholder="http://domain.com/image_large.jpg" name="large_thumb_url">
            <label>Small Thumbnail</label>
            {{$errors->first('small_thumb_url','<span class="help-inline animated flash">:message</span>')}}
            <input class="span12" type="text" value="{{Input::old('small_thumb_url')}}" placeholder="http://domain.com/image_small.jpg" name="small_thumb_url">
        </div>
        <button type="submit" class="btn btn-inverse"><i class="icon-white icon-plus"></i> New</button>
    </fieldset>
</form>@endsection
@section("centralNav")
<div class="span4"><a href="http://apple.com1" class="active">Overview</a></div>
<div class="span4"><a href="http://apple.com1" class="">Time Logs</a></div>
<div class="span4"><a href="http://apple.com1" class="">Change Orders</a></div>
@endsection

@section('content_slide_2_left')
    @foreach ($projects[0]->timesheet as $timesheet)
       {{$timesheet->user->first_name}}<br/>
    @endforeach
@endsection

@section('content_slide_3_left')
fhfgh
@endsection




@section('scripts')
{{Asset::scripts()}}
@endsection

@section('form_confirm')
{{Session::get('name')}}
@endsection