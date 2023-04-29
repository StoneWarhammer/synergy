@extends('layouts.main')
@section('content')
    <div class="container rounded bg-white mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" height="150px" src="{{ asset('storage/avatar-' . auth()->id() . '.png') }}">
                    <span>
                        @error('image')
                        {{$message}}
                        @enderror
                        <form action="{{ route('validate_image') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="form-file-input" type="file" name="image">
                            <button class="btn btn-outline-dark pb-0 pt-0" type="submit">Edit</button>
                        </form>
                    </span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 text-primary fs-3 text-nowrap">{{ auth()->user()->last_name}} {{ auth()->user()->first_name }} {{ auth()->user()->middle_name }}</div>
                    </div>
                    <div class="row mt-3">
                        <form action="{{ route('update_password') }}" method="post">
                            @csrf
                            <div class="col-md-12"><label class="labels">Password</label><input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="Current Password" value="">
                                <span class="text-danger">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-12"><label class="labels">New Password</label><input type="password" name="new_password" class="form-control {{ $errors->has('new_password') ? 'is-invalid' : ''}}" placeholder="New Password" value="">
                                <span class="text-danger">
                                    @error('new_password')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-12"><label class="labels">Password Confirmation</label><input type="password" name="new_password_confirmation" class="form-control {{ $errors->has('new_password_confirmation') ? 'is-invalid' : ''}}" placeholder="New password confirmation" value="">
                                <span class="text-danger">
                                    @error('new_password_confirmation')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            @if ($message = Session::get('success'))
                                <span class="text-success">{{$message}}</span>
                            @endif
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                </div>
            </div>
        </div>
    </div>
@endsection
