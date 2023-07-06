@extends('mainpage')
@section('events')
    <div class="d-flex" style="width: 97%; height: 97%;">
        <div class="d-flex flex-column bg-light rounded-3 h-75 w-75">
            <div class="card h-auto w-100 mb-3 pb-3" style="max-height: 90vh">
                <div class="card-body d-flex">
                    <form action="{{ route('post_store') }}" method="post" enctype="multipart/form-data" class="w-100">
                        @csrf
                        <div class="form-floating">
                            <input type="text" class="form-control w-50 border-dark" id="floatingInput" placeholder="title" name="title" autocomplete="off">
                            <label for="floatingInput">Заголовок</label>
                        </div>
                        <div class="d-flex w-100 mt-3">
                            <textarea id="task" name="content" autocomplete="off" class="w-auto"></textarea>
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <div class="pb-3">
                                <label for="files">Изображения для витрины поста</label>
                                <input type="file" multiple name="file[]" id="files" class="form-control border-dark">
                            </div>
                            <div class="form-floating w-25">
                                <input type="hidden" id="airdatepicker" class="form-control border-dark" placeholder="title" name="start_time" value="{{ now() }}" autocomplete="off">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">Опубликовать пост</button>
                            </div>
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
    <script src="https://cdn.tiny.cloud/1/o1f61qeq8law1uva6zsocgduqu028u4q96booylwx1hxwrm5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#task',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss fullscreen',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments fullscreen | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat ',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            height: '60vh',
            width: '60vw',
            resize: false,
            language: 'ru',
        });
    </script>
@endsection
