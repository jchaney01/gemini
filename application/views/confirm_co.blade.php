@layout('layouts.single_col')

@section('content')
    <div class="row-fluid">
        <div class="offset2 span10">
            You have {{$status}} this change order.
        </div>
    </div>
@endsection