@layout('layouts.master')
@section('content_slide_1_left')
<form>
    <input type="text" id="filter" placeholder="filter">
</form>
    @foreach($passwords as $password)
        <div class="module filterable">
            <h2><a <?if (count($password->project)){?>class="active" <?}?>href="{{URL::to_route('password')}}/{{$password->id}}">
                @if ($password->company_name)
                    {{$password->company_name}}
                @else
                    {{$password->contact_name}}
                @endif
            </a></h2>
        </div>
    @endforeach
@endsection

@section('content_slide_1_right')
@if(Session::get('status_msg'))
<div class="alert alert-success fade in <?if(!Session::get('type')){?>alert-error<?}?>">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{Session::get('status_msg')}}</strong>
</div>
@endif
<?php echo Form::open(URL::to_route('passwords'), 'POST', array('id' => 'createForm'));?>
    <fieldset>
        <label>Name</label>
        {{$errors->first('name','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="Type something…" name="name" value="{{Input::old('name')}}">
        <label>Client</label>
        {{$errors->first('client_id','<span class="help-inline animated flash">:message</span>')}}
        <select name="client_id" id="client">
            <option value=""></option>x
            @foreach($clients as $client)
            <option <?php if(Input::old('client_id')==$client->id){?>selected="selected"<?}?> value="{{$client->id}}">{{$client->company_name}}</option>
            @endforeach
        </select>
        <div><button type="submit" class="btn btn-inverse"><i class="icon-white icon-plus"></i> New</button></div>
    </fieldset>
</form>

@endsection

@section('content_slide_2_left')

@endsection

@section('content_slide_3_left')

@endsection




@section('scripts')
{{Asset::scripts()}}
@endsection

@section('form_confirm')

@endsection