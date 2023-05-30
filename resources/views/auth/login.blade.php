@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center fs-3">Авторизация</div>
        <div class="card mt-5 w-50 m-auto">
            <div class="card-body d-flex flex-column">
                @if(session('status'))
                    <div class="border border-success border-opacity-50 rounded border-3 text-center p-3">{{ session('status') }}</div>
                @endif
                <form action="{{ route('login') }}" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email адрес</label>
                        <input name="email" type="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}} {{ $errors->has('password') ? 'is-invalid' : ''}}" id="email" aria-describedby="emailHelp">
                        @error('email')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password">
                        @error('password')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1 text-end">
                        <a href="{{ route('password.request') }}">Забыли пароль?</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Авторизоваться</button>
                </form>
            </div>
        </div>
    </div>
@endsection
