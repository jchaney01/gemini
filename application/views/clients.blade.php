@layout('layouts.master')
@section('content_slide_1_left')
    @foreach($clients as $client)
        <div class="module">
            <h2><a <?if (count($client->project)){?>class="active" <?}?>href="#">{{$client->company_name}}</a></h2>
        </div>
    @endforeach
@endsection

@section('content_slide_1_right')
<form id="createProjectForm" method="post" action="{{URL::to_route('clients')}}">
    <fieldset>
        <label>Company Name</label>
        {{$errors->first('company_name','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="Type something…" name="company_name">
        <label>Contact Name</label>
        {{$errors->first('contact_name','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="John Doe" name="contact_name">
        <label>Contact Email</label>
        {{$errors->first('contact_email','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="foo@exapmple.com" name="contact_email">
        <label>Contact Phone</label>
        {{$errors->first('contact_phone','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span6" placeholder="xxx-xxx-xxxx" name="contact_phone">
        <label>Hourly Rate</label>
        {{$errors->first('hour_billable_rate','<span class="help-inline animated flash">:message</span>')}}
        <div class="input-prepend input-append"><span class="add-on">$</span><input type="text" class="span2" placeholder="75" name="hour_billable_rate" value="75"><span class="add-on">.00</span></div>
        <label>Company URL</label>
        {{$errors->first('company_url','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="http://www.example.com" name="company_url">
        <label>Company Phone</label>
        {{$errors->first('company_phone','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span6" placeholder="xxx-xxx-xxxx" name="company_phone">
        <label>Address</label>
        {{$errors->first('client_address','<span class="help-inline animated flash">:message</span>')}}
        {{$errors->first('client_city','<span class="help-inline animated flash">:message</span>')}}
        {{$errors->first('client_state','<span class="help-inline animated flash">:message</span>')}}
        {{$errors->first('client_zip','<span class="help-inline animated flash">:message</span>')}}
        <input type="text" class="span12" placeholder="XXXX Street Name" name="client_address">
        <input type="text" class="span6" placeholder="city" name="client_city">
        <select name="client_state" class="span3">
            <option value="AL">AL</option>
            <option value="AK">AK</option>
            <option value="AZ">AZ</option>
            <option value="AR">AR</option>
            <option value="CA">CA</option>
            <option value="CO">CO</option>
            <option value="CT">CT</option>
            <option value="DE">DE</option>
            <option value="DC">DC</option>
            <option value="FL">FL</option>
            <option value="GA">GA</option>
            <option value="HI">HI</option>
            <option value="ID">ID</option>
            <option value="IL">IL</option>
            <option value="IN">IN</option>
            <option value="IA">IA</option>
            <option value="KS">KS</option>
            <option value="KY">KY</option>
            <option value="LA">LA</option>
            <option value="ME">ME</option>
            <option value="MD">MD</option>
            <option value="MA">MA</option>
            <option value="MI">MI</option>
            <option value="MN">MN</option>
            <option value="MS">MS</option>
            <option value="MO">MO</option>
            <option value="MT">MT</option>
            <option value="NE">NE</option>
            <option value="NV">NV</option>
            <option value="NH">NH</option>
            <option value="NJ">NJ</option>
            <option value="NM">NM</option>
            <option value="NY">NY</option>
            <option value="NC">NC</option>
            <option value="ND">ND</option>
            <option value="OH">OH</option>
            <option value="OK">OK</option>
            <option value="OR">OR</option>
            <option value="PA">PA</option>
            <option value="RI">RI</option>
            <option value="SC">SC</option>
            <option value="SD">SD</option>
            <option value="TN">TN</option>
            <option value="TX">TX</option>
            <option value="UT">UT</option>
            <option value="VT">VT</option>
            <option value="VA">VA</option>
            <option value="WA">WA</option>
            <option value="WV">WV</option>
            <option value="WI">WI</option>
            <option value="WY">WY</option>
        </select>
        <input type="text" class="span3" placeholder="zip" name="client_zip">
        <label>Notes</label>
        {{$errors->first('notes','<span class="help-inline animated flash">:message</span>')}}
        <textarea name="notes" id="notes" cols="30" class="span12" rows="1"></textarea>
        <div><button type="submit" class="btn btn-inverse"><i class="icon-white icon-plus"></i> New</button></div>
    </fieldset>
</form>
{{Session::get('status_msg')}}
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