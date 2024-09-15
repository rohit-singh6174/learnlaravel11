<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index PHP</title>
</head>
<body>
  <div>
   @if (count($tasks))
      @foreach ($tasks as $task)
      <div>
        <a href="{{route('tasks.show',['id'=> $task->id]) }}">{{$task->title}}</a>
      </div>
      @endforeach
   @else
   <div> There are no task </div>
  @endif
  
  </div>
    
</body>
</html>