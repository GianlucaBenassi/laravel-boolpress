@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- title --}}
        <h2 class="text-center mb-5">{{$post->title}}</h2>
        {{-- content --}}
        <p>{{$post->content}}</p>
        {{-- Id --}}
        <span class="d-block"><strong>Id:</strong> {{$post->id}}</span>
        {{-- Slug --}}
        <span class="d-block"><strong>Slug:</strong> {{$post->slug}}</span>
        {{-- Published --}}
        @if ($post->published == 0)
            <span class="badge badge-secondary">Draft</span>
        @else
            <span class="badge badge-success">Published</span>
        @endif
        {{-- Category --}}
        @if ($post->category)
            <span class="d-block"><strong>Category:</strong> {{$post->category->name}}</span>
        @else
            <span class="d-block"><strong>Category:</strong> Null</span>
        @endif
        {{-- Tags --}}
        <div>
            <strong>Tags:</strong>
            @if (count($post->tags) > 0)
                @foreach ($post->tags as $tag)
                <span class="badge badge-success">{{$tag->name}}</span>
                @endforeach
            @else 
                <span>Null</span>
            @endif
        </div>
        {{-- Creation date --}}
        <span class="d-block mb-5"><strong>Created:</strong> {{$post->created_at}}</span>

        <a href="{{route('posts.index')}}"><button type="button" class="btn btn-dark">Posts list</button></a>
        <a href="{{route('posts.edit', $post->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
        {{-- modal delete button --}}
        <button type="button" class="btn btn-danger ml-auto" data-toggle="modal" data-target="#deleteModal">Delete</button>

        {{-- modal --}}
        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Are you sure to delete <strong>{{$post->title}}</strong>?</h5>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{-- delete form --}}
                        <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="mt-5">Comments list:</h3>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Content</th>
                    <th scope="col">Approved</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <th scope="row">{{$comment->id}}</th>

                        @if ($comment->name)  
                            <td>{{$comment->name}}</td>
                        @else
                            <td>Guest</td>
                        @endif

                        <td>{{$comment->content}}</td>

                        <td>
                            @if (!$comment->approved)
                                <form action="{{route('comments.update', $comment->id)}}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-primary">Approve</button>
                                </form>
                            @else
                                <h4><span class="badge badge-success">Approved</span></h4>
                            @endif
                        </td>

                        <td>
                            <button type="button" class="btn btn-danger ml-auto" data-toggle="modal" data-target="#commentDelete{{$comment->id}}">Delete</button>

                            {{-- comment modal --}}
                            <div class="modal fade" id="commentDelete{{$comment->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Are you sure to delete this comment?</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            {{-- delete form --}}
                                            <form action="{{route('comments.destroy', $comment->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection