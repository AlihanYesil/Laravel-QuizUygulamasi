<?php

use App\Http\Controllers\admin\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\QuizController;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=> 'auth'],function(){
    Route::get('panel',[MainController::class,'dashboard'])->name('dashboard');
    Route::get('quiz/detay/{slug}',[MainController::class,'quiz_detail'])->name('quiz.detail');
    Route::get('quiz/{slug}',[MainController::class,'quiz'])->name('quiz.join');
    Route::post('quiz/{slug}/result',[MainController::class,'result'])->name('quiz.result');
});

Route::group(
    ['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function () {
        Route::get('/', function () { return 'admin';})->name('admin');

        Route::get('quizler/{id}',[QuizController::class,'destroy'])->whereNumber('id')->name('quizler.destroy');
        Route::get('quizler/{id}/details',[QuizController::class,'show'])->whereNumber('id')->name('quizler.details');
        Route::get('quiz/{quiz_id}/questions/{question_id}',[QuestionController::class,'destroy'])->whereNumber('id')->name('questions.destroy');

        Route::resource('quizler',QuizController::class);
        Route::resource('quiz/{quiz_id}/questions',QuestionController::class);

    }
);
