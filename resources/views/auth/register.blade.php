@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center fs-3">Register</div>
        <div class="card mt-5 w-50 m-auto">
            <div class="card-body d-flex flex-column">
                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" aria-describedby="emailHelp">
                        @error('email')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input name="first_name" type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}" id="first_name">
                        @error('first_name')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input name="last_name" type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : ''}}" id="last_name">
                        @error('last_name')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input name="middle_name" type="text" class="form-control {{ $errors->has('middle_name') ? 'is-invalid' : ''}}" id="middle_name">
                        @error('middle_name')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="w-50">
                            <label for="passport_serial_code" class="form-label">Serial number of the passport</label>
                            <input name="passport_serial_code" maxlength="4" type="text" class="form-control w-75 {{ $errors->has('passport_serial_code') ? 'is-invalid' : ''}}" id="passport_serial_code">
                            @error('passport_serial_code')
                            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-50">
                            <label for="passport_number_code" class="form-label">Passport code</label>
                            <input name="passport_number_code" maxlength="6" type="text" class="form-control  w-75 {{ $errors->has('passport_number_code') ? 'is-invalid' : ''}}" id="passport_number_code">
                            @error('passport_number_code')
                            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="w-50">
                            <label for="passport_date" class="form-label">Passport issue date</label>
                            <input name="passport_date" type="date" class="form-control  w-75 {{ $errors->has('passport_date') ? 'is-invalid' : ''}}" id="passport_date">
                            @error('passport_date')
                            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
