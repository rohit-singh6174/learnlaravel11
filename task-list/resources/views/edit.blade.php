@extends('layouts.app')

@section('title','Edit Task')

@section('styles')
    <style>
        .error-message{
            color: red;
            font-size:0.8rem;
        }
    </style>
@endsection

@section('content')
    <form action="{{route('tasks.update',['id'=>$task->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input text="text" name="title" id="title" value="{{$task->title}}"/>
            @error('title')
                <p class="error-message"> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{$task->description}}</textarea>
            @error('description')
            <p class="error-message"> {{$message}}</p>
             @enderror
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description">{{$task->long_description}}</textarea>
            @error('long_description')
            <p class="error-message"> {{$message}}</p>
             @enderror
        </div>

        <div>
         <input type="submit" name="submit" value="Edit Task"/>
        </div>
    </form>
@endsection