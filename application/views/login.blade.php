@layout('layouts.single_col')

@section('content')
    <div class="row-fluid">
        <div class="offset2 span10">
            <form class="form-horizontal" method="post" action="{{URL::to_route('login')}}">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>

                    <div class="controls">
                        <input type="text" id="inputEmail" placeholder="Email" name="email">
                        {{$errors->first('username','<span class="help-inline animated flash">:message</span>')}}
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Password</label>

                    <div class="controls">
                        <input type="password" id="inputPassword" placeholder="Password" name="password">
                        {{$errors->first('password','<span class="help-inline animated flash">:message</span>')}}
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-inverse">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection