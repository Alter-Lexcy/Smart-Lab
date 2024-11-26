    <?php

    use App\Http\Controllers\AssessmentController;
    use App\Http\Controllers\Auth\RegisterController;
    use App\Http\Controllers\ClassesController;
    use App\Http\Controllers\CommentController;
    use App\Http\Controllers\TaskController;
    use App\Http\Controllers\TeacherController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\StudentController;
    use App\Http\Controllers\SubjectController;
    use App\Http\Controllers\MateriController;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\SearchController;


    Auth::routes();

    Route::post('register-murid', [RegisterController::class, 'registerMurid'])->name('register_murid');
    Route::post('register-guru', [RegisterController::class, 'registerGuru'])->name('register_guru');

    Route::get('/',[function(){return view('Users.landing');}]);

    // Route Admin
    Route::middleware(['auth','role:Admin'])->group(function(){
        Route::get('/admin', [HomeController::class, 'index'])->name('home');
        Route::resource('subject',SubjectController::class);
        Route::resource('classes', ClassesController::class);
        Route::resource('materis',MateriController::class);
        Route::resource('tasks', TaskController::class);
        Route::resource('assesments', AssessmentController::class);
        Route::resource('comments', CommentController::class);
        Route::resource('teachers', TeacherController::class);
        Route::get('/search', [SearchController::class, 'index'])->name('search');
        Route::get('/Students',[StudentController::class,'User'])->name('Students');
        Route::put('/update/{user}', [TeacherController::class, 'assign'])->name('assignTeacher');
    });

    // Route Guru
    Route::middleware(['auth','role:Guru|Admin'])->group(function(){
        Route::get('/guru',function(){
            return view('Guru.index');
        });
    });

    // Route Murid
    Route::middleware('auth')->group(function(){
        
    });
