@extends('layout.layout')

@section('page_title', 'Update Article: ' . $article->title)

@section('content')
    <section id="main">
        <div class="container">

            {{-- Вывод ошибок --}}
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <form action="{{ route('article.update', $article) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input value="{{$article->title}}" type="text" name="title" id="title">
                </div>

                <div class="form-group">
                    <label for="short_text">Short text:</label>
                    <input value="{{$article->short_text}}" type="text" name="short_text" id="short_text">
                </div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" cols="30" rows="10">{{$article->content}}</textarea>
                </div>

                <div class="image-preview">
                    <img src="{{$article->image_url}}" alt="">
                </div>

                <style>
                    .image-preview{
                        height: 400px;
                    }

                    .image-preview img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }
                </style>

                <div class="form-group">
                    <label for="photo">Photo:</label>
                    <input type="file" name="photo" id="photo">
                </div>

                <br />
                <button class="button">Update Article</button>
            </form>
        </div>
    </section>
@endsection()
