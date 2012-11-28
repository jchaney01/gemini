@layout('layouts.single_col_no_slide')

@section('content')

    <div class="row-fluid">
        <div class="offset2 span10">
            <form class="form-horizontal ">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>

                    <div class="controls">
                        <input type="text" id="inputEmail" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Password</label>

                    <div class="controls">
                        <input type="password" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox"> Remember me
                        </label>
                        <button type="submit" class="btn btn-inverse">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('top_right')

@endsection


