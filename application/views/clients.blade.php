@layout('layouts.master')
@section('content_slide_1_left')
    @foreach($clients as $client)
        <div class="module">
            <h2><a <?if (count($client->project)){?>class="active" <?}?>href="#">{{$client->company_name}}</a></h2>
        </div>
    @endforeach
@endsection

@section('content_slide_1_right')
<form id="createProjectForm">
    <fieldset>
        <label>Project Name</label>
        <input type="text" class="span12" placeholder="Type something…">
        <label>Budget</label>
        <div class="controls controls-row">
            <input class="span3" id="dollars" type="text" placeholder="dollars">
            <input class="span3" id="hours" type="text" placeholder="hours">
            <input class="span6" id="po" type="text" placeholder="PO/ATN">
        </div>
        <label>Due</label>
        <input type="date">
        <label class="checkbox">
            <input class="hideIt" type="checkbox" id="advanced"> Advanced
        </label>
        <div class="hidden">
            <label>Status</label>
            <select name="status" id="status">
                <option value="active">Active</option>
                <option value="pending">Pending</option>
                <option value="invoice">Waiting to Invoice</option>
                <option value="complete">Complete</option>
            </select>
            <label>Repo Name</label>
            <input class="span12" type="text" placeholder="Type something…">
            <label>Repo URL</label>
            <input class="span12" type="text" placeholder="ssh://git@caxserve.com:NAME">
            <label>Notes</label>
            <textarea class="span12" name="notes" cols="30" rows="1"></textarea>
        </div>
        <label class="checkbox">
            <input type="checkbox" class="hideIt" name="feature" id="feature" value="1"> Feature
        </label>
        <div class="hidden">
            <label class="checkbox">
                <input type="checkbox" name="personal_feature" id="personal_feature" value="1"> Personal feature?
            </label>
            <label class="checkbox">
                <input type="checkbox" name="authrequired" id="authrequired" value="1"> Auth required?
            </label>
            <label>Description</label>
            <textarea class="span12" name="description" cols="30" rows="1"></textarea>
            <label>Personal description</label>
            <textarea class="span12" name="personal_desc" cols="30" rows="1"></textarea>
            <label>Group</label>
            <select name="group" id="group">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <label>Live URL</label>
            <input class="span12" type="text" placeholder="http://domain.com" name="live_url">
            <label>Full res URL</label>
            <input class="span12" type="text" placeholder="http://domain.com/image_full.jpg" name="full_image_url">
            <label>Large Thumbnail</label>
            <input class="span12" type="text" placeholder="http://domain.com/image_large.jpg" name="large_thumb_url">
            <label>Small Thumbnail</label>
            <input class="span12" type="text" placeholder="http://domain.com/image_small.jpg" name="small_thumb_url">
        </div>
        <button type="submit" class="btn btn-inverse"><i class="icon-white icon-plus"></i> New</button>
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