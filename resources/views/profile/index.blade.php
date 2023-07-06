@extends('layouts.main')
@section('content')
    <div class="container rounded bg-white mb-3">
        <div class="row h-75">
            <div class="col-md-3 border-right" style="max-height: 70vh">
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
                <div class="d-flex justify-content-center flex-column text-center">
                    <span class="text-black-50">{{ auth()->user()->email }}</span>
                    <span class="text-black text-capitalize fs-4">
                        @if(auth()->user()->role === 'teacher')
                            Преподаватель
                        @elseif(auth()->user()->group->group_name === "-")
                            Абитуриент
                        @else
                            Студент
                        @endif
                    </span>
                    @if(auth()->user()->role === 'teacher' || auth()->user()->group->group_name === "-")
                    @else
                        <span class="text-black text-capitalize fs-4">Группа: {{ auth()->user()->group->group_name }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-4 border-right" style="max-height: 70vh">
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
                            <div class="text-center">
                                <button class="btn btn-primary mt-3 profile-button" type="submit">Изменить пароль</button>
                                <button class="btn btn-primary mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Изменить паспортные данные</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-mb-4 border-right" style="width: 416px; height:263px; max-height: 50vh">
                <div class="d-flex justify-content-center flex-column rounded-3 mt-5 passport_fon h-100 w-100">
                    <div class="d-flex justify-content-center flex-grow-1 ps-3">
                        <div class="d-flex flex-column flex-grow-1 pt-3">
                            <div class="d-flex align-items-end">
                                <span class="d-flex align-items-center fs-6" style="position: relative; top: 87px; left: 55px"> {{ auth()->user()->passport_date }}</span>
                            </div>
                        </div>
                        <div class="vertical_text d-flex justify-content-center fs-5 text-danger">
                            <span class="pb-3">{{ auth()->user()->passport_serial_code }}</span>
                            <span>{{ auth()->user()->passport_number_code }}</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">Паспорт</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <form action="{{ route('edit_passport') }}" method="post">
                        @csrf
                        <label for="passport_date" class="form-label">Дата выдачи паспорта</label>
                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                        <input name="passport_date" type="date" value="{{ auth()->user()->passport_date }}" class="form-control  w-75 {{ $errors->has('passport_date') ? 'is-invalid' : ''}}" id="passport_date">
                        <div class="pt-3">
                            <label for="passport_serial_code" class="form-label">Серийный номер паспорта</label>
                            <input name="passport_serial_code" placeholder="1 2 3 4" value="{{ auth()->user()->passport_serial_code }}" maxlength="4" type="text" class="form-control w-75 {{ $errors->has('passport_serial_code') ? 'is-invalid' : ''}}" id="passport_serial_code">
                            @error('passport_serial_code')
                            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="pt-3">
                            <label for="passport_number_code" class="form-label">Код паспорта</label>
                            <input name="passport_number_code" placeholder="1 2 3 4 5 6" value="{{ auth()->user()->passport_number_code }}" maxlength="6" type="text" class="form-control  w-75 {{ $errors->has('passport_number_code') ? 'is-invalid' : ''}}" id="passport_number_code">
                            @error('passport_number_code')
                            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary profile-button mt-5" type="submit">Сохранить изменения</button>
                    </form>
                </div>
            </div>
        </div>
        @if(auth()->user()->group->group_name !== '-')
            <div class="row h-25 d-flex flex-column">
                <div class="fs-5 fw-bold text-center" style="height: 15%;">Оценки</div>
                <div class="d-flex gap-1 flex-wrap">
                    @foreach($rates as $rate)
                        <a class="cursor_pointer text-decoration-none" tabindex="0" title="{{$rate->event->title}}" data-bs-content="{{$rate->event->start_time}}" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top"><div id="rate" class="border border-dark d-flex justify-content-center align-items-center fs-5" style="height: 40px; width: 40px;">{{ $rate->rate }}</div></a>
                      @endforeach
                </div>
            </div>
        @endif
    </div>
    <script src="{{asset('script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })

        const popover = new bootstrap.Popover('.popover-dismiss', {
            trigger: 'focus'
        })
    </script>
@endsection
