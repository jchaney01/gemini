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
            <li><a href="#">{{$project->name}}</a></li>
        @endforeach
    </ul>
</div>
@endsection