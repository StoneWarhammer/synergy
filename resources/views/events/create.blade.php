@extends('mainpage')
@section('events')
    <div class="d-flex" style="width: 97%; height: 97%;">
        <div class="d-flex flex-column bg-light rounded-3 h-75 w-75">
            <div class="card h-100 w-100 mb-3">
                <div class="card-body d-flex">
                    <form action="{{ route('events_store') }}" method="post" enctype="multipart/form-data" class="w-100">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control w-50 border-dark" id="floatingInput" placeholder="title" name="title" autocomplete="off">
                            <label for="floatingInput">Заголовок</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border-dark" id="floatingPassword" placeholder="subtitle" name="subtitle" autocomplete="off">
                            <label for="floatingPassword">Подзаголовок</label>
                        </div>
                        <div class="form-floating mb-3" style="height: 35%;">
                            <textarea id="task" class="form-control text-area border-dark" placeholder="task" name="task" autocomplete="off" style="height: 100%; resize: none;"></textarea>
                            <label for="task">Задание</label>
                        </div>
                        <div class="mb-3">
                            <input type="file" multiple name="file[]" id="" class="form-control border-dark">
                        </div>
                        <div class="w-100 d-flex justify-content-between">
                            <div class="form-floating mb-3 w-25">
                                <input type="text" id="airdatepicker" class="form-control border-dark" placeholder="title" name="end_time" autocomplete="off">
                                <label for="airdatepicker">Дата окончания</label>
                            </div>
                            <button class="btn btn-primary w-25 mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Выбрать студентов</button>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasRightLabel">Список групп</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="list-group">
                                        @foreach($groups as $group)
                                            @if ($loop->first) @continue @endif
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" type="radio" name="group" value="{{ $group->group_name }}" id="{{ $group->group_name }}">
                                                <label class="form-check-label" for="{{ $group->group_name }}" style="width: 90%;">{{ $group->group_name }}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3 w-25">
                            <input type="hidden" id="airdatepicker" class="form-control border-dark" placeholder="title" name="start_time" value="{{ now() }}" autocomplete="off">
                        </div>
                        <div>
                            <input type="hidden" name="author_id" value="{{ auth()->user()->id }}">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Опубликовать мероприятие</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row align-items-center flex-column w-25 bg-light ms-3">
            @foreach($errors->all() as $message)
                <div class="text-danger fs-5 mt-3">{{ $message }}</div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
@endsection
