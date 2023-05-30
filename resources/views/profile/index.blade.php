@extends('layouts.main')
@section('content')
    <div class="container rounded bg-white mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center mt-5 border card">
                    <img class="card-img-top img-fluid" width="300px" height="300px" src="{{ asset('storage/avatar-' . auth()->id() . '.png') }}">
                    <div class="card-body">
                        @error('image')
                        {{$message}}
                        @enderror
                        <form action="{{ route('validate_image') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control border-dark" type="file" name="image">
                            <button class="btn btn-outline-dark pb-0 pt-0" type="submit">Изменить аватар</button>
                        </form>
                    </div>
                </div>
            </div>
{{--                    <span class="text-black-50">{{ auth()->user()->email }}</span>--}}
{{--                    <span class="text-black text-capitalize mt-3 fs-4">Роль: {{ auth()->user()->role }}</span>--}}
{{--                    @if(auth()->user()->group->group_name)--}}
{{--                        <span class="text-black text-capitalize mt-3 fs-4">{{ auth()->user()->group->group_name }}</span>--}}
{{--                    @endif--}}
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Настройки профиля</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 text-primary fs-3 text-nowrap">{{ auth()->user()->last_name}} {{ auth()->user()->first_name }} {{ auth()->user()->middle_name }}</div>
                    </div>
                    <div class="row mt-3">
                        <form action="{{ route('update_password') }}" method="post">
                            @csrf
                            <div class="col-md-12"><label class="labels">Пароль</label><input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="Текущий пароль" value="">
                                <span class="text-danger">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-12"><label class="labels">Новый пароль</label><input type="password" name="new_password" class="form-control {{ $errors->has('new_password') ? 'is-invalid' : ''}}" placeholder="Новый пароль" value="">
                                <span class="text-danger">
                                    @error('new_password')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-12"><label class="labels">Подтвержение пароля</label><input type="password" name="new_password_confirmation" class="form-control {{ $errors->has('new_password_confirmation') ? 'is-invalid' : ''}}" placeholder="Подтвержение нового пароля" value="">
                                <span class="text-danger">
                                    @error('new_password_confirmation')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            @if ($message = Session::get('success'))
                                <span class="text-success">{{$message}}</span>
                            @endif
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Сохранить изменения</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
