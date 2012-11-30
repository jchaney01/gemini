@layout('layouts.dual_col_3_slide')

@section('content_slide_1_left')
<h1>{{$projects[0]->name}}</h1>

<h2>{{$projects[0]->po}}</h2>
<? if ($projects[0]->issue_tracking_url){?>
<div class="overviewModule">
    <a href="{{$projects[0]->issue_tracking_url}}">
        <div>Issue Tracking</div>
    </a>
    <p>This project is currently being tracked.<br>
        Click the link to go to the tracker.
    </p>
</div>
    <? } ?>
<? if ($projects[0]->repo_url){?>
<div class="overviewModule">
    <a rel="popover" data-original-title="URL" data-content="{{$projects[0]->repo_url}}" data-trigger="hover" data-placement="right" href="#">
        <div>Code Repository</div>
    </a>

    <p>This project is currently under version control.<br>
        The repo name is {{$projects[0]->repo_name}}
    </p>
</div>
<? } ?>
@endsection

@section('content_slide_1_right')

<form>
    <fieldset>
        <legend>Create a project</legend>
        <label>Name</label>
        <input type="text" placeholder="Type something…">
        <span class="help-block">Must be unique.</span>
        <label>Status</label>
        <select name="status" id="status">
            <option value="active">Active</option>
            <option value="pending">Pending</option>
            <option value="invoice">Waiting to Invoice</option>
            <option value="complete">Complete</option>
        </select>
        <label>Due</label>
        <input type="date">
        <label>Client</label>
        <select name="client" id="client">
            @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->company_name}}</option>
            @endforeach
        </select>
        <label>Budget</label>

        <div class="controls controls-row">

            <input class="span2" id="dollars" type="text">
            <input class="span2" id="hours" type="text">

        </div>





        <label class="checkbox">
            <input type="checkbox"> Check me out
        </label>
        <button type="submit" class="btn">Submit</button>
    </fieldset>
</form>@endsection


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