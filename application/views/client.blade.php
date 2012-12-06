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
<?php echo Form::open(URL::to_route('clients').'/'.$client->id, 'PUT', array('id' => 'createForm'));?>
    <fieldset>
        <field type="hidden" name="_method" value="PUT">
        <label>Company Name</label>
        {{$errors->first('company_name','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="Type something…" name="company_name" value="<? if(Input::old('company_name')){?>{{Input::old('company_name')}}<?} else {?>{{$client->company_name}}<?}?>">
        <label>Contact Name</label>
        {{$errors->first('contact_name','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="John Doe" name="contact_name" value="<? if(Input::old('contact_name')){?>{{Input::old('contact_name')}}<?} else {?>{{$client->contact_name}}<?}?>">
        <label>Contact Email</label>
        {{$errors->first('contact_email','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="foo@exapmple.com" name="contact_email" value="<? if(Input::old('contact_email')){?>{{Input::old('contact_email')}}<?} else {?>{{$client->contact_email}}<?}?>">
        <label>Contact Phone</label>
        {{$errors->first('contact_phone','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span6" placeholder="xxx-xxx-xxxx" name="contact_phone" value="<? if(Input::old('contact_phone')){?>{{Input::old('contact_phone')}}<?} else {?>{{$client->contact_phone}}<?}?>">
        <label>Hourly Rate</label>
        {{$errors->first('hour_billable_rate','<span class="help-inline animated flash">:message</span>')}}
        <div class="input-prepend input-append"><span class="add-on">$</span><input type="text" class="span2" name="hour_billable_rate" value="<? if(Input::old('hour_billable_rate')){?>{{Input::old('hour_billable_rate')}}<?} else {?>{{$client->hour_billable_rate}}<?}?>"><span class="add-on">.00</span></div>
        <label>Default Net Terms</label>
        {{$errors->first('net','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span2" name="net" value="<? if(Input::old('net')){?>{{Input::old('net')}}<?} else {?>{{$client->net}}<?}?>">
        <label>Company URL</label>
        {{$errors->first('company_url','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="http://www.example.com" name="company_url" value="<? if(Input::old('company_url')){?>{{Input::old('company_url')}}<?} else {?>{{$client->company_url}}<?}?>">
        <label>Company Logo</label>
        {{$errors->first('company_logo_url','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="http://www.example.com/image.jpg" name="company_logo_url" value="<? if(Input::old('company__logo_url')){?>{{Input::old('company__logo_url')}}<?} else {?>{{$client->company__logo_url}}<?}?>">
        <label>Company Phone</label>
        {{$errors->first('company_phone','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span6" placeholder="xxx-xxx-xxxx" name="company_phone" value="<? if(Input::old('company_phone')){?>{{Input::old('company_phone')}}<?} else {?>{{$client->company_phone}}<?}?>">
        <label>Address</label>
        {{$errors->first('client_address','<span class="help-inline animated flash">:message</span>')}}
        {{$errors->first('client_city','<span class="help-inline animated flash">:message</span>')}}
        {{$errors->first('client_state','<span class="help-inline animated flash">:message</span>')}}
        {{$errors->first('client_zip','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="XXXX Street Name" name="client_address" value="<? if(Input::old('client_address')){?>{{Input::old('client_address')}}<?} else {?>{{$client->client_address}}<?}?>">
        <input type="text" class="span6" placeholder="city" name="client_city" value="<? if(Input::old('client_city')){?>{{Input::old('client_city')}}<?} else {?>{{$client->client_city}}<?}?>">
        <select name="client_state" class="span3">
            <option <? if(Input::old('client_state')=="AL"){?>selected="selected"<?} elseif ($client->client_state=="AL"){?>selected="selected"<?}?> value="AL">AL</option>
            <option <? if(Input::old('client_state')=="AK"){?>selected="selected"<?} elseif ($client->client_state=="AK"){?>selected="selected"<?}?> value="AK">AK</option>
            <option <? if(Input::old('client_state')=="AZ"){?>selected="selected"<?} elseif ($client->client_state=="AZ"){?>selected="selected"<?}?> value="AZ">AZ</option>
            <option <? if(Input::old('client_state')=="AR"){?>selected="selected"<?} elseif ($client->client_state=="AR"){?>selected="selected"<?}?> value="AR">AR</option>
            <option <? if(Input::old('client_state')=="CA"){?>selected="selected"<?} elseif ($client->client_state=="CA"){?>selected="selected"<?}?> value="CA">CA</option>
            <option <? if(Input::old('client_state')=="CO"){?>selected="selected"<?} elseif ($client->client_state=="CO"){?>selected="selected"<?}?> value="CO">CO</option>
            <option <? if(Input::old('client_state')=="CT"){?>selected="selected"<?} elseif ($client->client_state=="CT"){?>selected="selected"<?}?> value="CT">CT</option>
            <option <? if(Input::old('client_state')=="DE"){?>selected="selected"<?} elseif ($client->client_state=="DE"){?>selected="selected"<?}?> value="DE">DE</option>
            <option <? if(Input::old('client_state')=="DC"){?>selected="selected"<?} elseif ($client->client_state=="DC"){?>selected="selected"<?}?> value="DC">DC</option>
            <option <? if(Input::old('client_state')=="FL"){?>selected="selected"<?} elseif ($client->client_state=="FL"){?>selected="selected"<?}?> value="FL">FL</option>
            <option <? if(Input::old('client_state')=="GA"){?>selected="selected"<?} elseif ($client->client_state=="GA"){?>selected="selected"<?}?> value="GA">GA</option>
            <option <? if(Input::old('client_state')=="HI"){?>selected="selected"<?} elseif ($client->client_state=="HI"){?>selected="selected"<?}?> value="HI">HI</option>
            <option <? if(Input::old('client_state')=="ID"){?>selected="selected"<?} elseif ($client->client_state=="ID"){?>selected="selected"<?}?> value="ID">ID</option>
            <option <? if(Input::old('client_state')=="IL"){?>selected="selected"<?} elseif ($client->client_state=="IL"){?>selected="selected"<?}?> value="IL">IL</option>
            <option <? if(Input::old('client_state')=="IN"){?>selected="selected"<?} elseif ($client->client_state=="IN"){?>selected="selected"<?}?> value="IN">IN</option>
            <option <? if(Input::old('client_state')=="IA"){?>selected="selected"<?} elseif ($client->client_state=="IA"){?>selected="selected"<?}?> value="IA">IA</option>
            <option <? if(Input::old('client_state')=="KS"){?>selected="selected"<?} elseif ($client->client_state=="KS"){?>selected="selected"<?}?> value="KS">KS</option>
            <option <? if(Input::old('client_state')=="KY"){?>selected="selected"<?} elseif ($client->client_state=="KY"){?>selected="selected"<?}?> value="KY">KY</option>
            <option <? if(Input::old('client_state')=="LA"){?>selected="selected"<?} elseif ($client->client_state=="LA"){?>selected="selected"<?}?> value="LA">LA</option>
            <option <? if(Input::old('client_state')=="ME"){?>selected="selected"<?} elseif ($client->client_state=="ME"){?>selected="selected"<?}?> value="ME">ME</option>
            <option <? if(Input::old('client_state')=="MD"){?>selected="selected"<?} elseif ($client->client_state=="MD"){?>selected="selected"<?}?> value="MD">MD</option>
            <option <? if(Input::old('client_state')=="MA"){?>selected="selected"<?} elseif ($client->client_state=="MA"){?>selected="selected"<?}?> value="MA">MA</option>
            <option <? if(Input::old('client_state')=="MI"){?>selected="selected"<?} elseif ($client->client_state=="MI"){?>selected="selected"<?}?> value="MI">MI</option>
            <option <? if(Input::old('client_state')=="MN"){?>selected="selected"<?} elseif ($client->client_state=="MN"){?>selected="selected"<?}?> value="MN">MN</option>
            <option <? if(Input::old('client_state')=="MS"){?>selected="selected"<?} elseif ($client->client_state=="MS"){?>selected="selected"<?}?> value="MS">MS</option>
            <option <? if(Input::old('client_state')=="MO"){?>selected="selected"<?} elseif ($client->client_state=="MO"){?>selected="selected"<?}?> value="MO">MO</option>
            <option <? if(Input::old('client_state')=="MT"){?>selected="selected"<?} elseif ($client->client_state=="MT"){?>selected="selected"<?}?> value="MT">MT</option>
            <option <? if(Input::old('client_state')=="NE"){?>selected="selected"<?} elseif ($client->client_state=="NE"){?>selected="selected"<?}?> value="NE">NE</option>
            <option <? if(Input::old('client_state')=="NV"){?>selected="selected"<?} elseif ($client->client_state=="NV"){?>selected="selected"<?}?> value="NV">NV</option>
            <option <? if(Input::old('client_state')=="NH"){?>selected="selected"<?} elseif ($client->client_state=="NH"){?>selected="selected"<?}?> value="NH">NH</option>
            <option <? if(Input::old('client_state')=="NJ"){?>selected="selected"<?} elseif ($client->client_state=="NJ"){?>selected="selected"<?}?> value="NJ">NJ</option>
            <option <? if(Input::old('client_state')=="NM"){?>selected="selected"<?} elseif ($client->client_state=="NM"){?>selected="selected"<?}?> value="NM">NM</option>
            <option <? if(Input::old('client_state')=="NY"){?>selected="selected"<?} elseif ($client->client_state=="NY"){?>selected="selected"<?}?> value="NY">NY</option>
            <option <? if(Input::old('client_state')=="NC"){?>selected="selected"<?} elseif ($client->client_state=="NC"){?>selected="selected"<?}?> value="NC">NC</option>
            <option <? if(Input::old('client_state')=="ND"){?>selected="selected"<?} elseif ($client->client_state=="ND"){?>selected="selected"<?}?> value="ND">ND</option>
            <option <? if(Input::old('client_state')=="OH"){?>selected="selected"<?} elseif ($client->client_state=="OH"){?>selected="selected"<?}?> value="OH">OH</option>
            <option <? if(Input::old('client_state')=="OK"){?>selected="selected"<?} elseif ($client->client_state=="OK"){?>selected="selected"<?}?> value="OK">OK</option>
            <option <? if(Input::old('client_state')=="OR"){?>selected="selected"<?} elseif ($client->client_state=="OR"){?>selected="selected"<?}?> value="OR">OR</option>
            <option <? if(Input::old('client_state')=="PA"){?>selected="selected"<?} elseif ($client->client_state=="PA"){?>selected="selected"<?}?> value="PA">PA</option>
            <option <? if(Input::old('client_state')=="RI"){?>selected="selected"<?} elseif ($client->client_state=="RI"){?>selected="selected"<?}?> value="RI">RI</option>
            <option <? if(Input::old('client_state')=="SC"){?>selected="selected"<?} elseif ($client->client_state=="SC"){?>selected="selected"<?}?> value="SC">SC</option>
            <option <? if(Input::old('client_state')=="SD"){?>selected="selected"<?} elseif ($client->client_state=="SD"){?>selected="selected"<?}?> value="SD">SD</option>
            <option <? if(Input::old('client_state')=="TN"){?>selected="selected"<?} elseif ($client->client_state=="TN"){?>selected="selected"<?}?> value="TN">TN</option>
            <option <? if(Input::old('client_state')=="TX"){?>selected="selected"<?} elseif ($client->client_state=="TX"){?>selected="selected"<?}?> value="TX">TX</option>
            <option <? if(Input::old('client_state')=="UT"){?>selected="selected"<?} elseif ($client->client_state=="UT"){?>selected="selected"<?}?> value="UT">UT</option>
            <option <? if(Input::old('client_state')=="VT"){?>selected="selected"<?} elseif ($client->client_state=="VT"){?>selected="selected"<?}?> value="VT">VT</option>
            <option <? if(Input::old('client_state')=="VA"){?>selected="selected"<?} elseif ($client->client_state=="VA"){?>selected="selected"<?}?> value="VA">VA</option>
            <option <? if(Input::old('client_state')=="WA"){?>selected="selected"<?} elseif ($client->client_state=="WA"){?>selected="selected"<?}?> value="WA">WA</option>
            <option <? if(Input::old('client_state')=="WV"){?>selected="selected"<?} elseif ($client->client_state=="WV"){?>selected="selected"<?}?> value="WV">WV</option>
            <option <? if(Input::old('client_state')=="WI"){?>selected="selected"<?} elseif ($client->client_state=="WI"){?>selected="selected"<?}?> value="WI">WI</option>
            <option <? if(Input::old('client_state')=="WY"){?>selected="selected"<?} elseif ($client->client_state=="WY"){?>selected="selected"<?}?> value="WY">WY</option>
        </select>
        <input type="text" class="span3" placeholder="zip" name="client_zip" value="<? if(Input::old('client_zip')){?>{{Input::old('client_zip')}}<?} else {?>{{$client->client_zip}}<?}?>">
        <label>Notes</label>
        {{$errors->first('notes','<span class="help-inline animated flash">:message</span>')}}
        <textarea name="notes" id="notes" cols="30" class="span12" rows="1"><? if(Input::old('notes')){?>{{Input::old('notes')}}<?} else {?>{{$client->notes}}<?}?></textarea>
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