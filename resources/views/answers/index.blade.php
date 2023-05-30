@extends('mainpage')
@section('events')
    <div class="d-flex flex-column bg-light rounded-3" style="width: 97%; height: 97%;">
        @if(session('rate'))
            <div class="border border-success border-opacity-50 rounded border-3 text-center">{{ session('rate') }}</div>
        @endif
        @foreach($answers as $answer)
            <div class="card w-75 mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <div><a href="{{ route('answers_show', ['answer' => $answer->id]) }}" class="fs-3 text-decoration-none text-capitalize">{{ $answer->answer_author->last_name }} {{ $answer->answer_author->first_name }}</a></div>
                        <div>{{ $answer->created_at }}</div>
                    </div>
                    <div>
                        @foreach($answer->event->answer_rate as $rate)
                            @if($rate->answer_author_id == $answer->answer_author_id)
                                <div id="rate" class="fs-3">{{ $rate->rate }}</div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        var rates = document.querySelectorAll("#rate");
        rates.forEach(rate => {
            if (rate.innerText === '2') {
                rate.style.color = 'red';
            }
            if (rate.innerText === '3') {
                rate.style.color = 'darkorange';
            }
            if (rate.innerText === '4') {
                rate.style.color = 'olivedrab';
            }
            if (rate.innerText === '5') {
                rate.style.color = 'green';
            }
        });
    </script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('6b547f89b30a17842dfe', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('store_answer');
        channel.bind('store_answer', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
@endsection
