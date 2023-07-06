@extends('mainpage')
@section('events')
    <div class="d-flex flex-column bg-light rounded-3 overflow-auto" style="width: 97%; height: 97%;">
        @if(auth()->user()->role == 'teacher')
            @foreach($events as $event)
                @if(auth()->user()->id == $event->author->id)
                    <div class="card h-25 w-75 m-3">
                        <div class="card-header">
                            <div><a href="{{ route('events_show', ['event' => $event->id]) }}"
                                    class="fs-3 text-decoration-none text-capitalize">{{ $event->title }}</a></div>
                            <div>{{ $event->subtitle }}</div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-end">
                            <div>
                                Преподаватель: {{ $event->author->last_name }} {{ $event->author->first_name }} {{ $event->author->middle_name }}</div>
                            <div>Start: {{ $event->start_time }} - End: {{ $event->end_time }}</div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
        @if(auth()->user()->role == 'student')
            @foreach($events as $event)
                @if(auth()->user()->group->group_name == $event->group && $event->visible !== 'no' )
                    <div class="card h-25 w-75 m-3">
                        <div class="card-header">
                            <div><a href="{{ route('events_show', ['event' => $event->id]) }}"
                                    class="fs-3 text-decoration-none text-capitalize">{{ $event->title }}</a></div>
                            <div>{{ $event->subtitle }}</div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-end">
                            <div>
                                Преподаватель: {{ $event->author->last_name }} {{ $event->author->first_name }} {{ $event->author->middle_name }}</div>
                            <div>Start: {{ $event->start_time }} - End: {{ $event->end_time }}</div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@endsection
