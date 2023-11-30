@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('login.perform') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1 class="h3 mb-3 fw-normal">Login</h1>
        @include('layouts.admin.messages')
        <div>
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="username"
                required="required" autofocus />
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        <div>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password"
                required="required" />
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div>
            <button class="btn btn-default" type="submit">Log in</button>
        </div>
    </form>
@endsection
