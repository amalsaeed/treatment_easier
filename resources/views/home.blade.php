@extends('layout.app')
@section('style')
    <style>

        .img{

            margin: auto;

        }
        }
    </style>



@section('content')
    <main role="main">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
        </div>
        <div class="container">
            <!-- Example row of columns -->
       </div> <!-- /container -->
    <div class = "img">
        <img src="{{asset('dist/images/fa.png')}}" width="100" height="100">
        <img src="{{asset('dist/images/tw.png')}}" width="100" height="100">
        <img src="{{asset('dist/images/ins.png')}}" width="100" height="100">
        <img src="{{asset('dist/images/wh.png')}}" width="100" height="100">
        <img src="{{asset('dist/images/sc.png')}}" width="100" height="100">
    </div>
    </main>
@endsection



