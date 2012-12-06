@layout('layouts.dual_col_no_slider')







@section('content_left')
<h1>
    @if($client->company_name)
        {{$client->company_name}}
    @else
        {{$client->contact_name}}
    @endif
</h1>
<h2><a href="mailto:{{$client->contact_email}}">{{$client->contact_name}}</a></h2><h2><a href="tel:{{$client->contact_phone}}">{{$client->contact_phone}}</a></h2>
<div class="module">
    <a target="_blank" href="{{$client->company_url}}">
        <div>{{$client->company_url}}</div>
    </a>
    <p>{{$client->client_address}}<br/>{{$client->client_city}}, {{$client->client_state}} {{$client->client_zip}}<br/>{{$client->company_phone}}
    </p>
</div>
@endsection


@section('content_right')
<form id="createProjectForm" method="post" action="{{URL::to_route('clients')}}/{{$client->id}}">
    <fieldset>
        <field type="hidden" name="_method" value="PUT">
        <label>Company Name</label>
        {{$errors->first('company_name','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="Type something…" name="company_name" value="{{Input::old('company_name')}}">
        <label>Contact Name</label>
        {{$errors->first('contact_name','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="John Doe" name="contact_name" value="{{Input::old('contact_name')}}">
        <label>Contact Email</label>
        {{$errors->first('contact_email','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="foo@exapmple.com" name="contact_email" value="{{Input::old('contact_email')}}">
        <label>Contact Phone</label>
        {{$errors->first('contact_phone','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span6" placeholder="xxx-xxx-xxxx" name="contact_phone" value="{{Input::old('contact_phone')}}">
        <label>Hourly Rate</label>
        {{$errors->first('hour_billable_rate','<span class="help-inline animated flash">:message</span>')}}
        <div class="input-prepend input-append"><span class="add-on">$</span><input type="text" class="span2" name="hour_billable_rate" value=""><span class="add-on">.00</span></div>
        <label>Default Net Terms</label>
        {{$errors->first('net','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span2" name="net" value="30">
        <label>Company URL</label>
        {{$errors->first('company_url','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="http://www.example.com" name="company_url" value="{{Input::old('company_url')}}">
        <label>Company Logo</label>
        {{$errors->first('company_logo_url','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="http://www.example.com/image.jpg" name="company_logo_url" value="{{Input::old('company_logo_url')}}">
        <label>Company Phone</label>
        {{$errors->first('company_phone','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span6" placeholder="xxx-xxx-xxxx" name="company_phone" value="{{Input::old('company_phone')}}">
        <label>Address</label>
        {{$errors->first('client_address','<span class="help-inline animated flash">:message</span>')}}
        {{$errors->first('client_city','<span class="help-inline animated flash">:message</span>')}}
        {{$errors->first('client_state','<span class="help-inline animated flash">:message</span>')}}
        {{$errors->first('client_zip','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="XXXX Street Name" name="client_address" value="{{$name = Input::old('client_address')}}">
        <input type="text" class="span6" placeholder="city" name="client_city" value="{{Input::old('client_city')}}">
        <select name="client_state" class="span3">
            <option <?php if(Input::old('client_state')=="AL"){?>selected="selected"<?}?> value="AL">AL</option>
            <option <?php if(Input::old('client_state')=="AK"){?>selected="selected"<?}?> value="AK">AK</option>
            <option <?php if(Input::old('client_state')=="AZ"){?>selected="selected"<?}?> value="AZ">AZ</option>
            <option <?php if(Input::old('client_state')=="AR"){?>selected="selected"<?}?> value="AR">AR</option>
            <option <?php if(Input::old('client_state')=="CA"){?>selected="selected"<?}?> value="CA">CA</option>
            <option <?php if(Input::old('client_state')=="CO"){?>selected="selected"<?}?> value="CO">CO</option>
            <option <?php if(Input::old('client_state')=="CT"){?>selected="selected"<?}?> value="CT">CT</option>
            <option <?php if(Input::old('client_state')=="DE"){?>selected="selected"<?}?> value="DE">DE</option>
            <option <?php if(Input::old('client_state')=="DC"){?>selected="selected"<?}?> value="DC">DC</option>
            <option <?php if(Input::old('client_state')=="FL"){?>selected="selected"<?}?> value="FL">FL</option>
            <option <?php if(Input::old('client_state')=="GA"){?>selected="selected"<?}?> value="GA">GA</option>
            <option <?php if(Input::old('client_state')=="HI"){?>selected="selected"<?}?> value="HI">HI</option>
            <option <?php if(Input::old('client_state')=="ID"){?>selected="selected"<?}?> value="ID">ID</option>
            <option <?php if(Input::old('client_state')=="IL"){?>selected="selected"<?}?> value="IL">IL</option>
            <option <?php if(Input::old('client_state')=="IN"){?>selected="selected"<?}?> value="IN">IN</option>
            <option <?php if(Input::old('client_state')=="IA"){?>selected="selected"<?}?> value="IA">IA</option>
            <option <?php if(Input::old('client_state')=="KS"){?>selected="selected"<?}?> value="KS">KS</option>
            <option <?php if(Input::old('client_state')=="KY"){?>selected="selected"<?}?> value="KY">KY</option>
            <option <?php if(Input::old('client_state')=="LA"){?>selected="selected"<?}?> value="LA">LA</option>
            <option <?php if(Input::old('client_state')=="ME"){?>selected="selected"<?}?> value="ME">ME</option>
            <option <?php if(Input::old('client_state')=="MD"){?>selected="selected"<?}?> value="MD">MD</option>
            <option <?php if(Input::old('client_state')=="MA"){?>selected="selected"<?}?> value="MA">MA</option>
            <option <?php if(Input::old('client_state')=="MI"){?>selected="selected"<?}?> value="MI">MI</option>
            <option <?php if(Input::old('client_state')=="MN"){?>selected="selected"<?}?> value="MN">MN</option>
            <option <?php if(Input::old('client_state')=="MS"){?>selected="selected"<?}?> value="MS">MS</option>
            <option <?php if(Input::old('client_state')=="MO"){?>selected="selected"<?}?> value="MO">MO</option>
            <option <?php if(Input::old('client_state')=="MT"){?>selected="selected"<?}?> value="MT">MT</option>
            <option <?php if(Input::old('client_state')=="NE"){?>selected="selected"<?}?> value="NE">NE</option>
            <option <?php if(Input::old('client_state')=="NV"){?>selected="selected"<?}?> value="NV">NV</option>
            <option <?php if(Input::old('client_state')=="NH"){?>selected="selected"<?}?> value="NH">NH</option>
            <option <?php if(Input::old('client_state')=="NJ"){?>selected="selected"<?}?> value="NJ">NJ</option>
            <option <?php if(Input::old('client_state')=="NM"){?>selected="selected"<?}?> value="NM">NM</option>
            <option <?php if(Input::old('client_state')=="NY"){?>selected="selected"<?}?> value="NY">NY</option>
            <option <?php if(Input::old('client_state')=="NC"){?>selected="selected"<?}?> value="NC">NC</option>
            <option <?php if(Input::old('client_state')=="ND"){?>selected="selected"<?}?> value="ND">ND</option>
            <option <?php if(Input::old('client_state')=="OH"){?>selected="selected"<?}?> value="OH">OH</option>
            <option <?php if(Input::old('client_state')=="OK"){?>selected="selected"<?}?> value="OK">OK</option>
            <option <?php if(Input::old('client_state')=="OR" || !Input::old('client_state')){?>selected="selected"<?}?> value="OR">OR</option>
            <option <?php if(Input::old('client_state')=="PA"){?>selected="selected"<?}?> value="PA">PA</option>
            <option <?php if(Input::old('client_state')=="RI"){?>selected="selected"<?}?> value="RI">RI</option>
            <option <?php if(Input::old('client_state')=="SC"){?>selected="selected"<?}?> value="SC">SC</option>
            <option <?php if(Input::old('client_state')=="SD"){?>selected="selected"<?}?> value="SD">SD</option>
            <option <?php if(Input::old('client_state')=="TN"){?>selected="selected"<?}?> value="TN">TN</option>
            <option <?php if(Input::old('client_state')=="TX"){?>selected="selected"<?}?> value="TX">TX</option>
            <option <?php if(Input::old('client_state')=="UT"){?>selected="selected"<?}?> value="UT">UT</option>
            <option <?php if(Input::old('client_state')=="VT"){?>selected="selected"<?}?> value="VT">VT</option>
            <option <?php if(Input::old('client_state')=="VA"){?>selected="selected"<?}?> value="VA">VA</option>
            <option <?php if(Input::old('client_state')=="WA"){?>selected="selected"<?}?> value="WA">WA</option>
            <option <?php if(Input::old('client_state')=="WV"){?>selected="selected"<?}?> value="WV">WV</option>
            <option <?php if(Input::old('client_state')=="WI"){?>selected="selected"<?}?> value="WI">WI</option>
            <option <?php if(Input::old('client_state')=="WY"){?>selected="selected"<?}?> value="WY">WY</option>
        </select>
        <input type="text" class="span3" placeholder="zip" name="client_zip" value="{{Input::old('client_zip')}}">
        <label>Notes</label>
        {{$errors->first('notes','<span class="help-inline animated flash">:message</span>')}}
        <textarea name="notes" id="notes" cols="30" class="span12" rows="1">{{Input::old('notes')}}</textarea>
        <div>
            <button type="submit" class="btn btn-inverse"><i class="icon-white icon-ok"></i> Update</button>
            <button style="margin: 30px 0 10px 5px;" class="btn btn-danger"><a id="delete" style="color: #ffffdfgdfgdfgfdff;" data-method="delete" href="{{URL::to_route('clients')}}/{{$client->id}}"><i class="icon-white icon-remove"></i> Delete</a></button>
        </div>
    </fieldset>
</form>
@endsection




@section('scripts')
{{Asset::scripts()}}
@endsection