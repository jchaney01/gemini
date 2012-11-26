@section('jason')
    @foreach ($projects as $project)
        {{ $project->client->company_name }}<br>
    @endforeach
@endsection