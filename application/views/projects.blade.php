@layout('layouts.dual_col_3_slide')

@section('content_slide_3_left')
    @foreach ($changeorders as $changeorder)
        {{ $changeorder->project->client->company_name }}
    @endforeach
@endsection

@section('top_right')
<div id="projectList">
    <ul>
        @foreach ($projects as $project)
            <li><a href="{{URL::to_route('projects')}}/{{$project->id}}">{{$project->name}}</a></li>
        @endforeach
    </ul>
</div>
@endsection


@section('content_slide_1_left')
<h1>{{$projects[0]->name}}</h1>

<h2>{{$projects[0]->po}}</h2>

<div class="overviewModule">
    <a href="#">
        <div>Issue Tracking</div>
    </a>

    <p>This project is currently being tracked.<br>
        Click the link to go to the tracker
    </p>
</div>
<div class="overviewModule">
    <a href="#">
        <div>Code Repository</div>
    </a>

    <p>This project is currently under version control.<br>
        The repo name is BLAH
    </p>
</div>
@endsection