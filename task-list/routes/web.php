<?php
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Task;

Route::get('', function(){
    return redirect()->route('tasks.index');
});
Route::get('/tasks', function (){
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create','create')->name('tasks.create');

Route::get('/tasks/{id}/edit', function($id){
    return view('edit',[
        'task'=>Task::findOrFail($id)
    ]);

})->name('tasks.edit');

Route::get('/tasks/{id}', function($id){
    return view('show',[
        'task'=>Task::findOrFail($id)
    ]);

})->name('tasks.show');

Route::post('/tasks', function(Request $request) {
    $data=$request->validate([
        'title'=>'required|max:255',
        'description'=>'required',
        'long_description'=>'required'
    ]);

    $task = new Task;
    $task->title= $data['title'];
    $task->description=$data['description'];
    $task->long_description=$data['long_description'];

    $task->save();

    return redirect()->route('tasks.show',['id'=>$task->id])
        ->with('success','Task created Successfully!');
})->name('tasks.store');


Route::put('/tasks/{id}', function($id, Request $request) {
    $data=$request->validate([
        'title'=>'required|max:255',
        'description'=>'required',
        'long_description'=>'required'
    ]);

    $task = Task::findOrFail($id);
    $task->title= $data['title'];
    $task->description=$data['description'];
    $task->long_description=$data['long_description'];
    $task->save();

    return redirect()->route('tasks.show',['id'=>$task->id])
        ->with('success','Task updated Successfully!');
})->name('tasks.update');

Route::get('/hello', function () {
    $task= Task::pluck('title');
   
    return json_encode($task);
})-> name('hello');


Route::get('/hi', function() {
   return redirect()->route('hello'); 
});
Route::get('/greet/{name}', function($name){
    return "Hello $name";
});

Route::get('/db', function () {
    return view('db');
});

// Route::fallback(function (){
//     return "Still got somewhere";
// });

//GET
//POST
//PUT
//DELETE
