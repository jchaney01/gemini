@layout('layouts.single_col_no_slider')







@section('content')
<h1>
    @if($client->company_name)
        {{$client->company_name}}
    @else
        {{$client->contact_name}}
    @endif
</h1>
<h2>{{$projects[0]->po}}</h2>
<div class="module">
    <a href="{{$projects[0]->issue_tracking_url}}">
        <div>Issue Tracking</div>
    </a>
    <p>This project is currently being tracked.<br>
        Click the link to go to the tracker.
    </p>
</div>
<div class="module">
    <a rel="popover" data-original-title="URL" data-content="{{$projects[0]->repo_url}}" data-trigger="hover" data-placement="right" href="#">
        <div>Code Repository</div>
    </a>
    <p>{{$projects[0]->repo_name}}
    </p>
</div>
@if(Auth::user()->access_lvl >= 100)
<button style="margin: 10px 0 10px 0;" class="btn btn-inverse"><a style="color: white" href="#"><i class="icon-white icon-pencil"></i> Edit</a></button>
<button style="margin: 10px 0 10px 5px;" class="btn btn-inverse"><a style="color: white" href="#"><i class="icon-white icon-remove"></i> Delete</a></button>
@endif
@endsection







@section('scripts')
{{Asset::scripts()}}
@endsection