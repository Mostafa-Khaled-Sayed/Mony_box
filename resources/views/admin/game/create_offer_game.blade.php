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
    <div class="pb-5">

        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="post" class="card-body" action="{{ route('offer_game.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="game_id" value="{{ $id }}" />
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">الحاله</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1">تفعيل</option>
                                            <option value="0">أيقاف التفعيل</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label">اسم الفئة</label>
                                    <input type="text" value="" name="category_name" class="form-control"
                                        placeholder="اسم الفئة" required />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label">السعر</label>
                                    <input type="number" value="" name="price" class="form-control"
                                        placeholder="السعر" required min="0" />
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-form-label">الصوره</label>
                                    <input type="file" value="" name="image" class="form-control"
                                        placeholder="اسم الفئة" required />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label">الخلفية</label>
                                    <input type="file" value="" name="background_image" class="form-control"
                                        placeholder="السعر" required />
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">الوصف</label>
                                    <textarea class="form-control" name="description" id="" rows="5" placeholder="الوصف"></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-form-label">رمز اللعبه</label>
                                    <input type="text" value="" name="game_code" class="form-control"
                                        placeholder="رمز اللعبه" required />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label">الكود الموحد للربط</label>
                                    <input type="text" value="" name="unified_code" class="form-control"
                                        placeholder="الكود الموحد للربط" required />
                                </div>
                                <h4 class="card-title col-12 mb-4"> حدد الحقول المتاحة للفئة</h4>
                                <div class="col-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">أسم اللاعب</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">رقم اللاعب</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="option3">
                                        <label class="form-check-label" for="inlineCheckbox3">رقم الأيدى</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox4"
                                            value="option4">
                                        <label class="form-check-label" for="inlineCheckbox4">رقم الهاتف</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox5"
                                            value="option5">
                                        <label class="form-check-label" for="inlineCheckbox5">زون ايدى</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox6"
                                            value="option6">
                                        <label class="form-check-label" for="inlineCheckbox6">البريد الاكترونى</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox7"
                                            value="option7">
                                        <label class="form-check-label" for="inlineCheckbox7">أسم السيرفر / موقع
                                            السيرفر</label>
                                    </div>

                                </div>

                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn back-color px-5 my-5">موافق</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
