@extends('layouts.app')
@section('content')

   @if (count($tasks))
      @foreach ($tasks as $task)
      <div>
        <a href="{{route('tasks.show',['id'=> $task->id]) }}">{{$task->title}}</a>
      </div>
      @endforeach
   @else
   <div> There are no task </div>
  @endif
  
@endsection