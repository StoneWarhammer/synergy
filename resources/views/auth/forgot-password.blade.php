@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center fs-3">Forgot password</div>
        <div class="card mt-5 w-50 m-auto">
            <div class="card-body d-flex flex-column">
                @if(session('status'))
                    <div class="border border-success border-opacity-50 rounded border-3 text-center p-3">We have emailed your password reset link</div>
                @endif
                <form action="{{ route('password.request') }}" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input name="email" type="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}} {{ $errors->has('password') ? 'is-invalid' : ''}}" id="email" aria-describedby="emailHelp">
                        @error('email')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Send reset link</button>
                </form>
            </div>
        </div>
    </div>
@endsection
