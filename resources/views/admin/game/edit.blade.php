@extends('../admin.layout')
@section('active14')
    ان
    active
@endsection
@section('main')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="my-auto mb-0 content-title">الألعاب</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/ قائمة
                    الألعاب</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('games.update', $game->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <h3 class="title-card mb-5 text-center sub-title">تعديل اللعبة</h3>
                            <div class="col-12 col-lg-6 col-md-6 col-xl-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">أسم اللاعب</label>
                                    <input type="text" name="title" id=""
                                        class="form-control @error('title') is-invalid @enderror" placeholder="العنوان"
                                        required aria-describedby="helpId" value="{{ $game->title }}" />
                                    @error('title')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 col-xl-6 mb-3">
                                <label for="" class="form-label">الصوره</label>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror" aria-describedby="helpId" />
                                @error('image')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-6 col-md-6 col-xl-6 mb-3">
                                <label for="" class="form-label">الخلفيه</label>
                                <input type="file" name="background_image" id="background_image"
                                    class="form-control @error('background_image') is-invalid @enderror"
                                    aria-describedby="helpId" />
                                @error('background_image')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-6 col-md-6 col-xl-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">الحاله</label>
                                    <select class="form-control" name="status" id="" required>
                                        <option value="0" {{ $game->status == 0 ? 'selected' : '' }}>غير مفعل</option>
                                        <option value="1" {{ $game->status == 1 ? 'selected' : '' }}>مفعل</option>
                                    </select>
                                </div>
                            </div>



                            <div class="text-center">
                                <button class="btn btn-md btn-primary" type="submit">تاكيد</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
