@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 item">
                <div class="item-in ">
                    <h4>   {{ $post->title }} </h4>
                    <div class="seperator"></div>
                    <br>
                    <p> {{ $post->body }} </p>
                </div>
            </div>
        </div>
        {{--show comments--}}
        <section id="app" class="comments">
            @foreach($post->comment as $comments)
                <article>
                    <h4><a href="#"> {{ $comments['user']->name }}</a></h4>
                    <time>{{
                    $comments->created_at}}</time>
                    <like></like>
                    <p> {{ $comments->comment }}</p>
                </article>
            @endforeach

        </section>

        {{-- comment post --}}

        <div class="comments">
            <h2>Leave a comment</h2>
            @if(Auth::check())
                <form method="post" action="{{ route('comment.create') }}" class="comments__form">
                    {{ csrf_field() }}
                    <div class="comments__form-info">

                        <div class="comments__form-field">
                        <textarea id="comments__form-label-text" name="comment" placeholder="Express your thoughts"
                                  type="text" class="comments__form-input comments__form-textarea"></textarea>
                            <label class="comments__form-label" for="comments__form-label-text">
                                <span class="comments__form-label-text">Express your thoughts</span>
                            </label>
                        </div>
                        <input type="hidden" name="user_id" value="{{  Auth::user()->id }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">

                    </div>
                    <input type="submit" id="submit" class="comments__form-submit">
                </form>
            @else
                <p>
                    Please <a href="{{ route('login') }}">login</a> to post a comment.</p>
            @endif
            <div class="comments__list">
                <!-- Comments -->
            </div>
        </div>
    </div>

@endsection

@section('js')
    @parent
    {{--for ajax--}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
@endsection