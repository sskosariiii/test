@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="comments">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2>create post</h2>
            <form method="post" action="{{ route('post.store') }}" class="comments__form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="comments__form-info">
                    <div class="comments__form-field">
                        <input id="comments__form-label-name" name="title" placeholder="Title" type="text"
                               class="comments__form-input">
                        <label class="comments__form-label" for="comments__form-label-name">
                            <span class="comments__form-label-text">title</span>
                        </label>
                    </div>
                    <div class="comments__form-field">
                        <textarea id="comments__form-label-text" name="body" placeholder="Text" type="text"
                                  class="comments__form-input comments__form-textarea"></textarea>
                        <label class="comments__form-label" for="comments__form-label-text">
                            <span class="comments__form-label-text">text</span>
                        </label>
                    </div>
                    <input type="hidden" name="user_id" value="{{  Auth::user()->id }}">
                </div>
                <input type="submit" id="submit" class="comments__form-submit">
            </form>
        </div>
    </div>

@endsection

@section('js')
    @parent
    {{--for ajax--}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
@endsection
