@extends('../admin.layout')
@section('active14')
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


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="pb-0 card-header">

                </div>
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
                    <div class="table-responsive hoverable-table">
                        <table class="display nowrap " id="tableDashboard" data-page-length='50'
                            style=" text-align: center;">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">الرقم</th>
                                    <th class="wd-15p border-bottom-0">اسم العبه</th>
                                    <th class="wd-15p border-bottom-0">الوصف</th>
                                    <th class="wd-15p border-bottom-0">السعر</th>
                                    <th class="wd-20p border-bottom-0">رمز اللعبة</th>
                                    <th class="wd-15p border-bottom-0">رمز الكود الموحد</th>
                                    <th class="wd-15p border-bottom-0">الصورة </th>
                                    <th class="wd-15p border-bottom-0">الخلفية</th>
                                    <th class="wd-15p border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($offer_games)
                                    @foreach ($offer_games as $offer_game)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $offer_game->game->title }}</td>
                                            <td>{{ $offer_game->description }}</td>
                                            <td>{{ $offer_game->price }}</td>
                                            <td>{{ $offer_game->game_code }}</td>
                                            <td>{{ $offer_game->unified_code }}</td>
                                            <td><img src="{{ asset($offer_game->image) }}" alt="" width="50"></td>
                                            <td><img src="{{ asset($offer_game->background_image) }}" width="100"
                                                    alt=""></td>
                                            <td>
                                                <a href="{{ route('offer_game.edit', $offer_game->id) }}"
                                                    class="btn btn-primary btn-md">تعديل</a>
                                                <a class="modal-effect btn  btn-secondary btn-md" data-effect="effect-scale"
                                                    data-toggle="modal" href="#modaldemo8-{{ $offer_game->id }}"
                                                    title="حذف">
                                                    حذف</a>
                                            </td>
                                        </tr>
                                        <!--  start effects delete user -->
                                        <div class="modal" id="modaldemo8-{{ $offer_game->id }}">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content modal-content-demo">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">حذف الدوله</h6><button aria-label="Close"
                                                            class="close" data-dismiss="modal" type="button"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form action="{{ route('offer_game.destroy', $offer_game->id) }}"
                                                        method="post">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <p class="text-center fs-4 text-danger">هل انت متاكد من عملية الحذف
                                                                ؟</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">الغاء</button>
                                                            <button type="submit" class="btn btn-danger">تاكيد</button>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Modal end delete  user -->
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

    </div>

    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>

    </div>

@endsection
@section('script')
@endsection
