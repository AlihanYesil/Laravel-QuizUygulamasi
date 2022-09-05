<x-app-layout>
    <x-slot name="header"> {{ $quiz->title }} </x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->my_rank)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sıralama
                            <span class="badge badge-success badge-pill">{{$quiz->my_rank}}</span>
                             </li>
                            @endif
                        @if ($quiz->my_result)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Puan
                              <span class="badge badge-success badge-pill">{{$quiz->my_result->point}}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Doğru / Yanlış  Sayısı
                              <span class="badge badge-success badge-pill">{{$quiz->my_result->correct}} </span> /
                              <span class="badge badge-danger badge-pill">{{$quiz->my_result->wrong}} </span>
                          </li>
                        @endif
                        @if ($quiz->finished_at)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Son Katılım Tarih
                              <span title="{{$quiz->finished_at}}"class="badge badge-secondary badge-pill">{{$quiz->finished_at->diffForHumans()}}</span>
                          </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                         Soru Sayısı
                            <span class="badge badge-secondary badge-pill">{{$quiz->questions_count}}</span>
                        </li>
                        @if ($quiz->details)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Katılımcı sayısı
                              <span class="badge badge-secondary badge-pill">{{$quiz->details['join_count']}}</span>
                          </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ortalama Puan
                            <span class="badge badge-secondary badge-pill">{{$quiz->details['average']}}</span>
                        </li> 
                        @endif
                    </ul>
                    @if (count($quiz->top_ten)>0)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">İlk 10 Katılımcı </h5>
                            <ul class="list-group row ">
                               @foreach ($quiz->top_ten  as $result )
                                <li class="list-group-item d-flex justify-content-between align-items-center ">
                                    <strong class="h5  ">{{$loop->iteration}}.</strong>
                                    <img class="rounded-full" src="{{$result->user->profile_photo_url}}" >
                                    <span @if(auth()->user()->id==$result->user_id) class="text-danger" @endif >{{$result->user->name}}</span> 
                                <span class="badge badge-success badge-pill   ">{{$result->point}}</span>
                                </li>
 
                               @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                   
                </div>
                <div   div class="col-md-8 ">
                    {{ $quiz->description }}

                    @if ($quiz->my_result)
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-outline-warning btn-block my-3 btn-sm">Quiz'i Görüntüle</a>
                    @elseif ($quiz->finished_at>now())
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-outline-primary btn-block my-3 btn-sm">Quize Katıl</a>
    
                    @endif
                </div>
              
                
            </div>
            </p>
        </div>
    </div>
    </div>

</x-app-layout>
