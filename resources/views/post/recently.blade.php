@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="row">
                <div class="col-md-12 item">
                    <div class="item-in ">
                        <h4>{{ $post->title }}</h4>
                        <div class="seperator"></div>
                        <br>
                        <p>{{ $post->body }}</p>
                        {{--show comments--}}
                        <h4>__comments</h4>
                        @foreach($post->comment as $comments)
                            <article>
                                <h4><a href="#"> {{ $comments->user->name }}</a></h4>
                                <time>{{$comments->created_at}}</time>
                                <like></like>
                                <p>{{ $comments->comment }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    @parent
    {{--for ajax--}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
@endsection