@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary">Create Post</a>

                    <table class="table mt-5">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <th>{{$post->title}}</th>
                            <th> <a href="/posts/{{$post->id}}/edit" class = "btn btn-success">EDIT</a></th>
                            <th>   {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id],'method'=>'Post']) !!}
                                {{Form ::hidden('_method','DELETE')}}
                                {{form::submit('Delete',['class'=>'btn btn-danger'])}}
                                {!! Form::close() !!}</th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
