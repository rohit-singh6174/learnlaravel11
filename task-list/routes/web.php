<?php

use Illuminate\Support\Facades\Route;

class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {
    }
}

//Initialize tasks array
$tasks = [
    new Task(1, 'Buy groceries', 'Task 1 description', 'Task 1 long description', false, '2023-03-01 12:00:00', '2023-03-01 12:00:00'),
    new Task(2, 'Sell old stuff', 'Task 2 description', null, false, '2023-03-02 12:00:00', '2023-03-02 12:00:00'),
    new Task(3, 'Learn programming', 'Task 3 description', 'Task 3 long description', true, '2023-03-03 12:00:00', '2023-03-03 12:00:00'),
    new Task(4, 'Take dogs for a walk', 'Task 4 description', null, false, '2023-03-04 12:00:00', '2023-03-04 12:00:00'),
];


Route::get('/', function () use ($tasks) {
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::get('/{id}', function($id){
    return 'One single task';
})->name('tasks.show');


// Route::get('/hello', function () {
//     return "Hello";
// })-> name('hello');

// Route::get('/hi', function() {
//    return redirect()->route('hello'); 
// });
// Route::get('/greet/{name}', function($name){
//     return "Hello $name";
// });

Route::fallback(function (){
    return "Still got somewhere";
});
//GET
//POST
//PUT
//DELETE
