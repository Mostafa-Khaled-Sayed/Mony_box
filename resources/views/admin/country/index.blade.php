@extends('../admin.layout')
@section('active14')
    active
@endsection
@section('main')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="my-auto mb-0 content-title">المستخدمين</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/ قائمة
                    المستخدمين</span>
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
                        <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale" data-toggle="modal"
                            href="#create-country" title="حذف">اضافة الدوله</a>
                        {{-- @endcan --}}

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
                        <table class="display nowrap " id="tableDashboard" data-page-length='50'>
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">اسم الدوله</th>
                                    <th class="wd-15p border-bottom-0"> علم الدوله</th>
                                    <th class="wd-15p border-bottom-0">الحاله</th>
                                    <th class="wd-20p border-bottom-0">تاريخ الانشاء</th>
                                    <th class="wd-15p border-bottom-0">تاريخ التعديل</th>
                                    <th class="wd-10p border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $country)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $country->name }}</td>
                                        <td><img src="{{ asset("upload/country/$country->image") }}"
                                                alt="{{ $country->name }}" width="75" height="60"></td>
                                        <td><span
                                                class="{{ $country->status_color() }}">{{ $country->status_value() }}</span>
                                        </td>
                                        <td>{{ $country->created_at }}</td>
                                        <td>{{ $country->updated_at }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale"
                                                data-toggle="modal" href="#edit-{{ $country->id }}" title="التعديل">
                                                التعديل</a>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-toggle="modal" href="#modaldemo8-{{ $country->id }}" title="حذف">
                                                حذف</a>
                                        </td>
                                    </tr>
                                    <!--  start effects delete user -->
                                    <div class="modal" id="modaldemo8-{{ $country->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">حذف الدوله</h6><button aria-label="Close"
                                                        class="close" data-dismiss="modal" type="button"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="{{ route('country.destroy', $country->id) }}" method="post">
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

                                    <!--  start effects update country -->
                                    <div class="modal" id="edit-{{ $country->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">أضافة دوله</h6><button aria-label="Close"
                                                        class="close" data-dismiss="modal" type="button"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="{{ route('country.update', $country->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">اسم الدوله</label>
                                                            <input class="form-control" name="name" type="text"
                                                                required placeholder="اسم الدوله"
                                                                value="{{ $country->name }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">علم الدوله</label>
                                                            <input class="form-control" name="name" type="file"
                                                                required placeholder="علم الدوله" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">الحاله</label>
                                                            <select class="form-control" name="status" id="">
                                                                <option {{ $country->status == '0' ? 'selected' : '' }}
                                                                    value="0">غير مفعل</option>
                                                                <option {{ $country->status == '1' ? 'selected' : '' }}
                                                                    value="1">مفعل</option>
                                                            </select>
                                                        </div>
                                                        <hr />
                                                        <div class="wallet">
                                                            @foreach ($country->wallet as $wallet)
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">أسم
                                                                        المحفظة</label>
                                                                    <input type="text" name="wallet_name[]"
                                                                        class="form-control" placeholder="أسم المحفظة"
                                                                        value="{{ $wallet->wallet_name }}">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">الغاء</button>
                                                        <button type="submit" class="btn btn-primary">تاكيد</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Modal end update country-->
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
    <!-- main-content closed -->
    <!--  start effects delete user -->
    <div class="modal" id="create-country">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">أضافة دوله</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('country.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">اسم الدوله</label>
                            <input class="form-control" name="name" type="text" required placeholder="اسم الدوله">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">علم الدوله</label>
                            <input class="form-control" name="image" type="file" required placeholder="علم الدوله"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">الحاله</label>
                            <select class="form-control" name="status" id="">
                                <option selected value="0">غير مفعل</option>
                                <option value="1">مفعل</option>
                            </select>
                        </div>
                        <hr />
                        <div class="wallet">
                            <div class="mb-3">
                                <label for="" class="form-label">أسم المحفظة</label>
                                <input type="text" name="wallet_name[]" class="form-control"
                                    placeholder="أسم المحفظة">
                            </div>
                        </div>
                        <button type="button" id="more_wallet" class="btn btn-secondary btn-md">أضافه محفطة
                            اخري</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Modal end delete  user -->
@endsection
@section('script')
    <script>
        $("#more_wallet").on('click', function() {
            $('.wallet').append(`
            <div class="mb-3">
                <label for="" class="form-label">أسم المحفظة</label>
                <input type="text" name="wallet_name[]" class="form-control" placeholder="أسم المحفظة">
            </div>
            `)
        });
    </script>
@endsection
