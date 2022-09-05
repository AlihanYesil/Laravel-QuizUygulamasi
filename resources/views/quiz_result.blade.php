<x-app-layout>
    <x-slot name="header"> {{ $quiz->title }} Sonucu </x-slot>

    <div class="card">
        <div class="card-body">
           
            <div class="alert alert-warning">
                Puanınız: <b>{{ $quiz->my_result->point }}</b> -            
                <i class="fa  fa-circle text-info"></i>   İşaretlediğin Şık          
                <i class="fa  fa-check text-success"></i>   Doğru Cevap          
                <i class="fa  fa-times text-danger"></i>    Yanlış Cevap         

            </div>

                @foreach ($quiz->questions as $question )
                    
             
                <div class="my-4">
                <hr />
                @if ($question->correct_answer == $question->my_answer->answer)
                <i class="fa fa-check text-success"></i>
                @else
                <i class="fa fa-times text-danger"></i>
                    
                @endif
                {{$loop->iteration}}-)
                <strong> {{$question->question}} </strong> <span class="text-warning float-right">Katılımcılar <strong>%{{$question->true_percent}}</strong>  oranında doğru cevapladılar</span>
                @if ($question->image)
                <img src="{{asset($question->image)}}" class="img-responsive py-3 px-3" style="width:20%;">
                 @endif
                <div class="form-check ">
                    @if ("answer1" == $question->correct_answer )
                    <i class="fa fa-check text-success"></i>
                    @elseif ("answer1" == $question->my_answer->answer)
                    <i class="fa fa-circle text-info"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{$question->id}}1">
                      {{$question->answer1}}
                    </label>
                  </div>
                  <div class="form-check">
                    @if ("answer2" == $question->correct_answer )
                    <i class="fa fa-check text-success"></i>
                    @elseif ("answer2" == $question->my_answer->answer)
                    <i class="fa fa-circle text-info"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{$question->id}}2">
                      {{$question->answer2}}
                    </label>
                  </div>
                  <div class="form-check">
                    @if ("answer3" == $question->correct_answer )
                    <i class="fa fa-check text-success"></i>
                    @elseif ("answer3" == $question->my_answer->answer)
                    <i class="fa fa-circle text-info"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{$question->id}}3">
                      {{$question->answer3}}
                    </label>
                  </div>
                  <div class="form-check">
                    @if ("answer4" == $question->correct_answer )
                    <i class="fa fa-check text-success"></i>
                    @elseif ("answer4" == $question->my_answer->answer)
                    <i class="fa fa-circle text-info"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{$question->id}}4">
                      {{$question->answer4}}
                    </label>
                  </div>
                </div>
             
                
                @endforeach
            
        </div>
    </div>

</x-app-layout>
