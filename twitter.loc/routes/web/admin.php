    <?php

    use App\Http\Controllers\Admin\CommentController as AdminCommentController;
    use App\Http\Controllers\Admin\DashboardController;
    use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
    use App\Http\Controllers\Admin\UserController as AdminUserController;
    use Illuminate\Support\Facades\Route;

    Route::group(["prefix" => "admin", 'as' => 'admin.', 'middleware' => ['auth', 'can:admin']], function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');

        Route::get('/ideas', [AdminIdeaController::class, 'index'])->name('ideas.index');

        Route::get('/comments', [AdminCommentController::class, 'index'])->name('comments.index');
        Route::delete('/comments{comment}', [AdminCommentController::class, 'destroy'])->name('comments.destroy');
    });
