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
                    <div class="col-sm-1 col-md-2">

                        {{-- @can('اضافة موظق') --}}
                        <a class=" btn btn-sm btn-primary" href="{{ route('games.create') }}" title="حذف">اضافة
                            لعبة</a>
                        {{-- @endcan --}}

                    </div>
                    <div class="col-sm-1 col-md-2">


                        <a class=" btn btn-sm btn-primary" data-toggle="modal" data-target="#addcountry">اضافة دولة </a>


                    </div>
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
                                    <th class="wd-15p border-bottom-0">الصورة </th>
                                    <th class="wd-10p border-bottom-0">الحاله</th>
                                    <th class="wd-15p border-bottom-0">تاريخ الأنشاء</th>
                                    <th class="wd-15p border-bottom-0">تاريخ التعديل</th>
                                    <th class="wd-15p border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $game)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $game->title }}</td>
                                        <td><img src="{{ asset($game->image) }}" alt="{{ $game->title }}" width="75"
                                                height="60"></td>
                                        <td><span class="{{ $game->status_color() }}">{{ $game->status_value() }}</span>
                                        </td>
                                        <td>{{ $game->created_at }}</td>
                                        <td>{{ $game->updated_at }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button id="my-dropdown" class="btn btn-primary dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">العمليات</button>
                                                <div class="dropdown-menu" aria-labelledby="my-dropdown">
                                                    <a href="{{ route('offer_game.index') }}" class="dropdown-item">عرض
                                                        الفئات</a>
                                                    <a href="{{ route('offer_game.create', $game->id) }}" class="dropdown-item">انشاء
                                                        فئه</a>
                                                    <a class="dropdown-item" href="{{ route('games.edit', $game->id) }}"
                                                        title="التعديل">
                                                        التعديل</a>
                                                    <a class="modal-effect dropdown-item" data-effect="effect-scale"
                                                        data-toggle="modal" href="#modaldemo8-{{ $game->id }}"
                                                        title="حذف">
                                                        حذف</a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    <!--  start effects delete user -->
                                    <div class="modal" id="modaldemo8-{{ $game->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">حذف الدوله</h6><button aria-label="Close"
                                                        class="close" data-dismiss="modal" type="button"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="{{ route('games.destroy', $game->id) }}" method="post">
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
