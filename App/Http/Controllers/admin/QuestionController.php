<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    
    public function index($id)
    {
        $quiz= Quiz::whereId($id)->with('questions')->first() ?? abort(404,'Quiz Bulunamadı');
        return view("admin.question.list", compact("quiz"));
    }

   
    public function create($id)
    {
        $quiz= Quiz::find($id);
        return view('admin.question.create',compact('quiz'));
    }

  
    public function store(QuestionCreateRequest $request,$id)
    {   
        if($request->hasFile('image')) {
            $fileName = Str::slug($request->question).'.'.$request->image->extension();
            $fileNameWithUpload='uploads/'.$fileName;
            $request->image->move(public_path('uploads'),$fileName);
            $request->merge([
                'image'=>$fileNameWithUpload
            ]);
        }
        Quiz::find($id)->questions()->create($request->post());

        return redirect()->route('questions.index', $id)->withSuccess('Soru Başarıyla Oluşturuldu');
    }

    
    public function show($id)
    {
        //
    }

  
    public function edit($quiz_id,$question_id)
    {
        $question = Quiz::find($quiz_id)->questions()->whereId($question_id)->first() ?? abort(404,'Quiz veya Soru Bulunamadı');
        return view('admin.question.edit',compact('question'));

    }

   
    public function update(QuestionUpdateRequest $request, $quiz_id,$question_id)
    {
        if($request->hasFile('image')) {
            $fileName = Str::slug($request->question).'.'.$request->image->extension();
            $fileNameWithUpload='uploads/'.$fileName;
            $request->image->move(public_path('uploads'),$fileName);
            $request->merge([
                'image'=>$fileNameWithUpload
            ]);
        }
        Quiz::find($quiz_id)->questions()->whereId($question_id)->first()->update($request->post());

        return redirect()->route('questions.index', $quiz_id)->withSuccess('Soru Başarıyla Güncellendi');
    }

  
    public function destroy($quiz_id,$question_id)
    {
        Quiz::find($quiz_id)->questions()->whereId($question_id)->delete();
        return redirect()->route('questions.index', $quiz_id)->withSuccess('Soru Başarıyla Silindi');
        
    }
}
