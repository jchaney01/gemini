@section('jason')
    @foreach ($projects as $project)
        {{ $project->name }}<br>
    @endforeach
@endsection