<x-app-layout>
    <x-slot name="header">
        Quiz Güncelle    
    </x-slot>

    <div class="card">
        <div class="card-body">
           
            <form method="POST" action="{{ route('quizler.update',$quiz->id) }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="title">Quiz Başlığı</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$quiz->title}}" required>
                </div>
                <div class="form-group">
                    <label for="description"> Quiz Açıklama</label>
                    <textarea type="text-area" name="description" id="description"  rows="4" class="form-control"> {{$quiz->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="status"> Quiz Durumu</label>
                    <select type="text-area" name="status" id="status"  rows="4" class="form-control">
                        @if ($quiz->questions_count<4)   
                        <option value="active"  disabled @if($quiz->status == 'active') selected @endif> Aktif Yapabilmek için en az 4 soru girmelisiniz.</option>
                        @else
                        <option value="active"   @if($quiz->status == 'active') selected @endif>Aktif</option>

                        @endif
                        <option value="passive" @if($quiz->status == 'passive') selected @endif>Pasif</option>
                        <option value="draft" @if($quiz->status == 'draft') selected @endif>Taslak</option>
                        </select>
                </div>
                <div  class="form-group" > 
                    <label for="checkbox">Quiz Bitiş Tarihi Olacak mı?</label>
                    <input type="checkbox"  id="checkbox" name="check" class="form-control" @if( $quiz->finished_at ) checked  @endif>
                </div>

                <div class="form-group" id="finished" @if(!$quiz->finished_at) style="display: none" @endif>
                    <label for="finished_at">Quiz Bitiş Tarihi  
                    </label>
                    <input type="datetime-local"  name="finished_at" id="finished_at" class="form-control" value="{{$quiz->finished_at}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success btn-sm btn-block"> Güncelle </button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
    <script>
        $('#checkbox').change(function(){
           if($('#checkbox').is(':checked') ){
            $('#finished').show();
           }
           else
           $('#finished').hide();

        })
        </script>    
    </x-slot>
</x-app-layout>
