<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;
class QuizController extends Controller
{
     
    public function index()
    {   
        $quizzes = Quiz::withCount('questions');

        if(request()->get('title')){

            $quizzes=  $quizzes->where('title','like','%'.request()->get('title').'%');
        
        }else if(request()->get('status')){
         
            $quizzes= $quizzes->where('status',request()->get('status'));
        }
        $quizzes = $quizzes->paginate(5);
        return view('admin.quiz.list', compact('quizzes'));
    }

 
    public function create()
    {
        return view('admin.quiz.create');
        
    }

  
    public function store(QuizCreateRequest $request)
    {   
        Quiz::create(($request->post()));
        return redirect()->route('quizler.index')->withSuccess('Quiz Başarıyla Oluşturuldu.');
    }

  
    public function show($id)
    {
        $quiz = Quiz::with('top_ten.user','results.user')->withCount('questions')->find($id) ?? abort(404, 'Quiz bulunamadı');
        return view('admin.quiz.show',compact('quiz'));
    }

   
    public function edit($id)
    {
        $quiz= Quiz::withCount('questions')->find($id) ?? abort(404,'Quiz Bulunamadı');
        return view('admin.quiz.edit',compact('quiz'));
    }

   
    public function update(QuizUpdateRequest $request, $id)
    {
        $quiz= Quiz::find($id) ?? abort(404,'Quiz Bulunamadı');
        
        Quiz::find($id)->update($request->except(['_method','_token','check']));
        return  redirect()->route('quizler.index')->withSuccess('Quiz Başarıyla Güncellendi.');
    }

  
    public function destroy($id)
    {
        $quiz= Quiz::find($id) ?? abort(404,'Quiz Bulunamadı');
        $quiz->delete();
       return redirect()->route('quizler.index')->withSuccess('Quiz Başarıyla Silindi.');
    }   
}
