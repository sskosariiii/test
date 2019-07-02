@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success" id="error">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="row justify-content-center">

            <section class="title container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>blog</h1>
                        <div class="seperator"></div>
                    </div>
                </div>
            </section>
            <!-- Start Blog Layout -->
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            @foreach( $posts as $post)
                                <div class="col-md-6 item">
                                    <div class="item-in ">
                                        <h4> {{ $post->title }} </h4>
                                        <div class="seperator"></div>
                                        <p class="cutText"> {{ $post->body }}  </p>
                                        <a href="{{ route('post.show' , $post->id )}}">Read More
                                            <i class="fa fa-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection