<?php
use App\Models\Task;
use Illuminate\Http\Response;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {
 return view('welcome');
 // echo  "<h1>Home Page</h1>";
});
*/
Route::get('/about',function(){
    echo '<h1>About Us page</h1>';
});

Route::get('/xxx', function () {
    return 'Hello';
})->name('Hello');

Route::get('/hallo', function () {
    //return redirect()->route('helloc');

    return redirect()->route('Hello');
});

Route::get('/greet/{name}', function ($name) {
    return 'Hello ' . $name . '!';
});

Route::fallback(function () {
    return 'Still got somewhere!';
});
Route::permanentRedirect('/old-url', '/new-url');

Route::get('/18plus',function(){
    return "Lets chill our mood";
})->name('adult');

Route::get('age/{age}',function($age){
    if($age>=18){
        return redirect()->route('adult');
    }else{
        return "You are not allowed to access this page";
    }
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });
    Route::get('/users', function () {
        return 'Admin Users';
    });
});

/*

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

$tasks = [
  new Task(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Task(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Task(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Task(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];
*/

Route::get('/', function(){
 return redirect()->route('tasks.index');
});


Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');
Route::view('/tasks/create','create')->name('tasks.create');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {

    /*$data = $request->validated();

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();*/

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'The Task created successfully');
})->name('tasks.store');


Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    //$data = $request->validated();
    //$task = Task::findOrFail($id);
    //$task->title = $data['title'];
    //$task->description = $data['description'];
    //$task->long_description = $data['long_description'];
    //$task->save();

    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');



Route::delete('/tasks/{task}',function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')->with('success','Task is deleted Successfully');
})->name('tasks.destroy');



Route::put('/tasks/{task}/toggle-comple',function (Task $task){

    $task->toggleComplete();

    return redirect()->back()->with('success','Tasks updated succesfully !');
})->name('tasks.status');