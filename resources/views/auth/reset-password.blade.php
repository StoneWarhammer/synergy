@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center fs-3">Смена пароля</div>
        <div class="card mt-5 w-50 m-auto">
            <div class="card-body d-flex flex-column">
                <form action="{{ route('password.update') }}" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->token }}">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email адрес</label>
                        <input name="email" type="email" value="{{ old('email', $request->email) }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}} {{ $errors->has('password') ? 'is-invalid' : ''}}" id="email" aria-describedby="emailHelp">
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
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                        <input name="password_confirmation" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password_confirmation">
                        @error('password')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Сменить пароль</button>
                </form>
            </div>
        </div>
    </div>
@endsection
