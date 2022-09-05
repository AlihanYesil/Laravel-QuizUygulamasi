<x-app-layout>
    <x-slot name="header">
        Quiz Oluştur    
    </x-slot>

    <div class="card">
        <div class="card-body">
           
            <form method="POST" action="{{ route('quizler.store') }}">
                @csrf

                <div class="form-group">
                    <label for="title">Quiz Başlığı</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" required>
                </div>
                <div class="form-group">
                    <label for="description"> Quiz Açıklama</label>
                    <textarea type="text-area" name="description" id="description"  rows="4" class="form-control"  value="{{old('description')}}"> </textarea>

                </div>
                <div  class="form-group" > 
                    <label for="checkbox">Quiz Bitiş Tarihi Olacak mı?</label>
                    <input type="checkbox"   id="checkbox" name="check" class="form-control" @if (old('finished_at')) checked @endif>
                </div>

                <div class="form-group" id="finished" @if(!old('finished_at')) style="display: none" @endif>
                    <label for="finished_at">Quiz Bitiş Tarihi  
                    </label>
                    <input type="datetime-local"  name="finished_at" id="finished_at" class="form-control" value="{{old('finished_at')}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success btn-sm btn-block"> Oluştur </button>
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
