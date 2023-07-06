@extends('mainpage')
@section('events')
    <div class="d-flex" style="width: 97%; height: 97%;">
        <div class="d-flex flex-column bg-light rounded-3 h-100 w-75">
            <div class="card h-100 w-100">
                <div class="card-body d-flex h-100 overflow-auto">
                    <form action="{{ route('events_show_store', ['event' => $event->id]) }}" method="post" enctype="multipart/form-data" class="w-100">
                        @csrf
                        <div class="form-floating mb-3">
                            <div class="text-capitalize fs-4">{{ $event->title }}</div>
                        </div>
                        <div class="form-floating mb-3">
                            <div class="text-capitalize fs-4">{{ $event->subtitle }}</div>
                        </div>
                        <div class="form-floating mb-3 h-25">
                            <textarea id="task" class="form-control text-area border-dark" placeholder="" name="task" disabled autocomplete="off" style="height: 100%; resize: none;">{{ $event->task }}</textarea>
                            <label for="task">Задание</label>
                        </div>
                        <div class="d-flex flex-column border border-dark rounded-3 mb-3">
                            @foreach($event->files as $file)
                                <a href="{{ asset('storage/events/files/'.$file->file) }}" download="" class="border p-2 text-decoration-none d-flex justify-content-between ps-3 pe-3"><div>Файл: {{ $file->file }}</div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg></a>
                            @endforeach
                        </div>
                        @if(auth()->user()->role == 'teacher')
                            <a href="{{ route('answers', ['event' => $event->id]) }}" class="btn btn-success">Ответы студентов</a>
                        @endif
                        @if(auth()->user()->role == 'student')
                            <div class="border border-primary mb-3"></div>
                            <div class="form-floating mb-3">
                                <div class="text-capitalize fs-4">Ответ</div>
                            </div>
                            <div class="form-floating mb-3 h-25" >
                                <textarea id="answer" class="form-control text-area border-dark" placeholder="Ответ" name="answer" autocomplete="off" style="height: 100%; resize: none;"></textarea>
                                <label for="answer">Ответ</label>
                            </div>
                            <div class="mb-3">
                                <input type="file" multiple name="file[]" id="" class="form-control border-dark">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="answer_author_id" id="" class="form-control border-dark" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="answer_event_id" id="" class="form-control border-dark" value="{{ $event->id }}">
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-success">Отправить ответ</button>
                                <div>Преподаватель: {{ $event->author->last_name }} {{ $event->author->first_name }} {{ $event->author->middle_name }}  </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column w-25 ms-3 bg-light rounded-3">
            <div class="card h-100 w-100 overflow-auto">
                <div class="fs-5 ms-2 mt-2">Участники:</div>
                @foreach($users as $user)
                    @if($user->group->group_name == $event->group)
                        <a class="me-1 ms-1 mt-2 d-flex align-items-center justify-content-between p-2 event_member rounded-2 cursor_pointer text-decoration-none text-dark noselect">
                            <div class="d-flex align-items-center">
                                <div><img src="{{ asset('storage/avatar-' . $user->id . '.png') }}" height="32px" width="32px" class="rounded-circle me-1"></div>
                                <div>{{$user->last_name}} {{$user->first_name}}</div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                </svg>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
