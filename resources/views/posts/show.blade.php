@extends('mainpage')
@section('events')
<div class="d-flex w-100 h-100 justify-content-center align-items-center">
    <div class="d-flex justify-content-center bg-light rounded-3" style="width: 97%; height: 97%;">
        <div class="card w-75 overflow-auto">
            <div class="card-header">
                {{ $post->title }}
            </div>
            <div class="card-body">
                {!! $post->content !!}
            </div>
            @if(count($post->files) >= 1)
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-inner h-100" style="background-color: rgba(138,138,138,0.1);">
                            @foreach($post->files as $file)
                                @if($loop->first)
                                    <div class="carousel-item active">
                                        <a id="open"><img src="{{ asset('storage/'. $file->file) }}"
                                                          style="max-height: 20rem; margin: 0 auto;"
                                                          class="d-block cursor_pointer" alt="..."></a>
                                        <div class="popup_container" id="popup_container">
                                            <div class="popup">
                                                <button id="close" class="popup_close">x</button>
                                                <img style="max-height: 720px; max-width: 1280px"
                                                     src="{{ asset('storage/'. $file->file) }}" class="" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <a id="open"><img src="{{ asset('storage/'. $file->file) }}"
                                                          style="max-height: 20rem; margin: 0 auto;"
                                                          class="d-block cursor_pointer" alt="..."></a>
                                        <div class="popup_container" id="popup_container">
                                            <div class="popup">
                                                <button id="close" class="popup_close">x</button>
                                                <img style="max-height: 720px; max-width: 1280px"
                                                     src="{{ asset('storage/'. $file->file) }}" class="" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="{{ asset('script.js') }}" ></script>
@endsection
