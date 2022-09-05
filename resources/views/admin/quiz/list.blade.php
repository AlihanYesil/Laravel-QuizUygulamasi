<x-app-layout>
    <x-slot name="header">
        Quizler
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('quizler.create') }}" class="btn  btn-sm btn-outline-primary "> <i class="fa fa-plus"></i> ekleme
                </a>
                <button id="ara" class="btn  btn-sm btn-outline-warning " data-toggle="modal" data-target="#formara" > <i class="fa fa-search"></i> Ara
                </button>
                <form class="float-right" method="GET"  >
                <button  class="btn  btn-sm btn-outline-info"  type="submit" > <i class="fa fa-refresh"></i> Yenile
                </form>
                </button>
            </h5>

            <form method="GET" action=" " id="formara"  class="modal"  role="dialog">
                <div class="modal-dialog" >
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-secondary ">Ara</h5>
                        <button id="ara" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="title" class="form-control" placeholder="Quiz Adı">
                        </div>
                        <div class="col-md-6">
                            <select name="status" class="form-control">
                                <option value="">Durum Seçiniz</option>
                                <option value="draft">Taslak</option>
                                <option value="active">Aktif</option>
                                <option value="passive">Pasif</option>
                            </select>
                        </div>
                       </div>
                      </div>
                      <div class="modal-footer">
                        <button  type="submit"    class="btn btn-outline-warning">Ara</button>
                      </div>
                    </div>
                </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Quiz</th>
                            <th scope="col">Soru Sayısı</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Bitiş Tarihi</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $quiz)
                            <tr>
                                <td scope="row">{{ $quiz->title }}</td>
                                <td scope="row">{{ $quiz->questions_count }}</td>
                                <td>
                                    @switch($quiz->status)
                                        @case('active')
                                        @if (!$quiz->finished_at )
                                            <span class="badge badge-success">Aktif </span>
                                        @elseif ($quiz->finished_at>now())
                                            <span class="badge badge-success">Aktif </span>
                                        @else
                                            <span class="badge badge-secondary">Tarihi Dolmuş </span>
                                        @endif
                                        @break

                                        @case('passive')
                                            <span class="badge badge-danger">Pasif </span>
                                        @break

                                        @case('draft')
                                            <span class="badge badge-warning">Taslak </span>
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    <span
                                        title="{{ $quiz->finished_at }}">{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : ' - ' }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('questions.index', $quiz->id) }}"
                                        class="btn btn-sm btn-warning"><i class="fa fa-question"></i> Sorular</a>
                                    <a href="{{ route('quizler.edit', $quiz->id) }}" class="btn btn-sm btn-primary"><i
                                            class="fa fa-edit"></i> Düzenle</a>
                                    <a href="{{ route('quizler.destroy', $quiz->id) }}" class="btn btn-sm btn-danger"><i
                                            class="fa fa-times"></i> Sil</a>
                                    <a href="{{ route('quizler.details', $quiz->id) }}" class="btn btn-sm btn-secondary"><i
                                                class="fa fa-info-circle"></i> </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $quizzes->withQueryString()->links() }}
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#ara').click(function() {
                $('#formara').toggle();
            });
        </script>
    </x-slot>

</x-app-layout>
