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
                    <form action="{{ route('games.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <h3 class="title-card mb-5 text-center sub-title">اضافة لعبة</h3>
                            <div class="col-12 col-lg-6 col-md-6 col-xl-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">أسم اللاعب</label>
                                    <input type="text" name="title" id=""
                                        class="form-control @error('title') is-invalid @enderror" placeholder="العنوان"
                                        required aria-describedby="helpId" />
                                    @error('title')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                               <div class="col-12 col-lg-6 col-md-6 col-xl-4 mb-3">
                                <label for="" class="form-label">الصوره</label>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror" aria-describedby="helpId" />
                                @error('image')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                             <div class="col-12 col-lg-6 col-md-6 col-xl-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">الحاله</label>
                                    <select class="form-control" name="status" id="" required>
                                        <option value="0">غير مفعل</option>
                                        <option value="1">مفعل</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 col-xl-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">وصف قصير</label>
                                    <input type="text" name="meta_description" id="meta_description"
                                        class="form-control @error('meta_description') is-invalid @enderror"
                                        placeholder="وصف قصير" aria-describedby="helpId" required maxlength="70" />
                                    @error('meta_description')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 col-xl-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">أختيار الدوله</label>
                                    <select class="form-control" name="country_id" id="country_id">
                                        @isset($countries)
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">الوصف</label>
                                <textarea class="form-control" name="description" id="description" required rows="6" placeholder="الوصف...."></textarea>
                            </div>
                            
                            <div class="col-12 col-lg-6 col-md-6 col-xl-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">السعر</label>
                                    <input type="number" name="price" id="price"
                                        class="form-control @error('price') is-invalid @enderror" placeholder="السعر"
                                        required aria-describedby="helpId" />
                                    @error('price')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 col-xl-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">أختصار العمله</label>
                                    <input type="text" name="currency_symbol" id="currency_symbol"
                                        class="form-control @error('currency_symbol') is-invalid @enderror" required
                                        placeholder="أختصار العمله" aria-describedby="helpId" />
                                    @error('currency_symbol')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
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
