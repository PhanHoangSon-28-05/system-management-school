@extends('layouts.client')

@section('content')
    <form class="form" method="POST" action="{{ route('client.login.perform') }}">
        @csrf

        <h1 class="form__title">Login</h1>
        <div class="form__message form__message--error"></div>
        <div class="form__input-group">
            <input type="text" class="form__input" name="email" value="{{ old('email') }}"autofocus
                placeholder="Username or email">
            <div class="form__input-error-message">
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="form__input-group">
            <input type="password" name="password" value="{{ old('password') }}" class="form__input" autofocus
                placeholder="Password">
            <div class="form__input-error-message">
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
        <button class="form__button" type="submit">Continue</button>

    </form>
    <p class="form__text mt-2">
        <a href="{{ URL::route('client.register.show') }}">Don't have an account?
            Create account</a>
    </p>
@endsection
