@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidenavbar')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-6 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-block">
                                <h4 class="card-title pt-2">Number of posts</h4>
                            </div>
                            <div class="row px-2 no-gutters">
                                <div class="col-6">
                                    <h3 class="card card-block border-top-0 border-left-0 border-bottom-0">
                                        <i class="fa fa-file fa-3x" style="color: #1d68a7"></i>
                                    </h3>
                                </div>
                                <div class="col-6">
                                    <br>
                                    <h3 class="card card-block border-0">{{ $post_count }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-block">
                                <h4 class="card-title pt-2">Number of authors</h4>
                            </div>
                            <div class="row px-2 no-gutters">
                                <div class="col-6">
                                    <h3 class="card card-block border-top-0 border-left-0 border-bottom-0">
                                        <i class="fa fa-users fa-3x" style="color: #1d68a7"></i>
                                    </h3>
                                </div>
                                <div class="col-6">
                                    <br>
                                    <h3 class="card card-block border-0">{{ $author_count }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md">
                        <div class="card bg-success" >
                            <div class="card-header text-white">
                                Latest Post
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($new_posts as $post)
                                    <li class="list-group-item">{{ $post->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card bg-success" >
                            <div class="card-header text-white">
                                New Authors
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($new_authors as $author)
                                    <li class="list-group-item">{{ $author->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
