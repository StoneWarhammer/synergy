@extends('mainpage')
@section('events')
    <div class="d-flex" style="width: 97%; height: 97%;">
        <div class="d-flex flex-column bg-light rounded-3 h-100 w-75">
            <div class="card h-100 w-100">
                <div class="card-body d-flex h-100 overflow-auto">
                    <form action="{{ route('answers_store', ['answer' => $answer->id]) }}" method="post" enctype="multipart/form-data" class="w-100">
                        @csrf
                        <div class="form-floating mb-3">
                            <div class="text-capitalize fs-4">{{ $answer->event->title }} </div>
                        </div>
                        <div class="form-floating mb-3">
                            <div class="text-capitalize fs-4">{{ $answer->event->subtitle }}</div>
                        </div>
                        <div class="form-floating mb-3 h-25">
                            <textarea id="task" class="form-control text-area border-dark" placeholder="" name="task" disabled autocomplete="off" style="height: 100%; resize: none;">{{ $answer->event->task }}</textarea>
                            <label for="task">Задание</label>
                        </div>
                        <div class="d-flex flex-column border border-dark rounded-3 mb-3">
                            @foreach($answer->event->files as $file)
                                <a href="{{ asset('storage/'.$file->file) }}" download="" class="border p-2 text-decoration-none d-flex justify-content-between ps-3 pe-3"><div>File: {{ $file->file }}</div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg></a>
                            @endforeach
                        </div>
                            <div class="border border-primary mb-3"></div>
                            <div class="form-floating mb-3">
                                <div class="text-capitalize fs-4">Ответ</div>
                            </div>
                            <div class="form-floating mb-3 h-25" >
                                <textarea id="answer" class="form-control text-area border-dark" placeholder="Ответ" disabled name="answer" autocomplete="off" style="height: 100%; resize: none;">{{ $answer->answer }}</textarea>
                                <label for="answer">Ответ</label>
                            </div>
                            <div class="mb-3">
                                @foreach($answer->files as $file)
                                    <a href="{{ asset('storage/'.$file->file) }}" download="" class="border p-2 text-decoration-none d-flex justify-content-between ps-3 pe-3"><div>File: {{ $file->file }}</div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                        </svg></a>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="answer_author_id" id="" class="form-control border-dark" value="{{ $answer->answer_author->id }}">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="event_id" id="" class="form-control border-dark" value="{{ $answer->event->id }}">
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex w-50 gap-5">
                                    <button type="submit" class="btn btn-success">Поставить оценку</button>
                                    <select class="form-select w-50" name="rate" id="">
                                        <option selected>Выберите оценку</option>
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <div>Текущая:
                                    @foreach($answer->event->answer_rate as $rate)
                                        @if($rate->answer_author_id == $answer->answer_author_id)
                                            {{ $rate->rate }}
                                        @endif
                                    @endforeach
                                </div>
                                <div>
                                    <div>
                                        Выполнил: {{ $answer->answer_author->last_name }} {{ $answer->answer_author->first_name }} {{ $answer->answer_author->middle_name }}
                                    </div>
                                    <div>
                                        Преподаватель: {{ $answer->event->author->last_name }} {{ $answer->event->author->first_name }} {{ $answer->event->author->middle_name }}
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
