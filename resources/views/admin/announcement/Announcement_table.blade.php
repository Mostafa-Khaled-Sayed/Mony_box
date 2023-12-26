@extends('admin.layout')
@section('active7')
    active
@endsection

@section('main')
   <div class="container">
    <!-- START Modal -->

    <!-- Trigger the modal with a button -->
   @can( 'اضافة اعلان')
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span style="color:#ffc504e0">
            img </span>اضافه اعلان</button>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_V"><span
            style="color:#ffc504e0"> Viduo </span> اضافه اعلان</button>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_L"><span
            style="color:#ffc504e0"> Link </span> اضافه اعلان</button>
   @endcan

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li><br>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
    <div class=" col-lg-12">
        <div class="card ">
            <div class="card-header pb-0">
                <h5> جميع الأعلانات </h5>

            </div>
            <div class="card-body">
               <div class="table-responsive hoverable-table">

                    {{-- START table --}}

                    <table class="display nowrap " id="tableDashboard" data-page-length='50'>
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الإسم </th>

                                <td>{{ trans('admin.Action') }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Announcements as $Announcement)
                                <tr>



                                    <td>{{ $Announcement->name }}</td>



                                    <td>
                                        {{-- start Bouton Edite --}}
                                        @can( 'تعديل الاعلان')
                                           <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                            data-target="#edit{{ $Announcement->id }}" data-toggle="modal"
                                            href="#exampleModal2" title="تعديل"> تعديل <i class="las la-pen"></i></a> 
                                        @endcan
                                        {{-- start Bouton Edite --}}

                                       @can( 'حذف الاعلان')
                                           <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-target="#delete{{ $Announcement->id }}" data-toggle="modal"
                                            href="#modaldemo9" title="حذف"> حذف <i class="las la-trash"></i></a> 
                                       @endcan
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            href="{{ route('announcements.show', $Announcement->id) }}" title="تفاصيل">
                                            تفاصيل <i class="las la-trash"></i></a>

                                    </td>


                                </tr>
                                {{-- START edite  --}}

                                <div class="modal fade" id="edit{{ $Announcement->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">تعديل الاعلان</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ route('update_data') }}" method="post" autocomplete="off">

                                                    {{ method_field('POST') }}
                                                    {{ csrf_field() }}
                                                    <div class="form-group">

                                                        <label for="recipient-name" class="col-form-label">اسم الاعلان
                                                            :</label>

                                                        <input id="id" type="hidden" name="id"
                                                            class="form-control" value="{{ $Announcement->id }}">

                                                        <input class="form-control" name="name" id="name"
                                                            type="text" value="{{ $Announcement->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">ملاحظات:</label>
                                                        <textarea class="form-control" name="description" value="{{ $Announcement->description }}">{{ $Announcement->description }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <h6> اختر الباقة</h6>


                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">تاكيد</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">اغلاق</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- END edite  --}}

                                <!-- START Delete Announcement -->
                                <div class="modal fade" id="delete{{ $Announcement->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    حذف الاعلان
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('delete_data') }}" method="post">

                                                    @csrf
                                                    هل انت متاكد من عملية الحذف ؟
                                                    {{--  start input Grades disabled --}}
                                                    <input id="Name" disabled name="Name" class="form-control"
                                                        value="{{ $Announcement->name }}">
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $Announcement->id }}">
                                                    <br><br>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">غلق</button>
                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END Delete Announcement -->
                            @endforeach
                        </tbody>
                    </table>
                    {{-- END table --}}
                </div>
            </div>
        </div>




    </div>
    </div>
</div>
    <!--START add img -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        <h4>اضافه اعلان</h4>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('insert_file') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input id="Name" type="text" required name="name" class="form-control"
                                    placeholder="اسم الشركه المعلنة">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <textarea class="form-control" required name="description" id="exampleFormControlTextarea1" rows="3"
                                placeholder="  الملاحظات + الكلمات المفتاحيه"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="formFileLg" class="form-label">اختار محتوى الاعلان</label>
                            <input type="file" class="form-control form-control-lg" required accept="image/*"
                                name="img" accept="images/*" data-height="70" />
                        </div>

                        <br>
                        <div class="col">
                            <input id="Name" required type="number"step="any" name="orderTotal"
                                class="form-control" placeholder="االسعر الكلي للمنتج">
                        </div>
                        <div class="form-group">
                            <h6> اختر الباقة</h6>
                            @foreach ($datas as $data)
                                <input type="checkbox" id="vehicle1" name="datanormale_id[]"
                                    value="{{ $data->id }}">
                                <label for="vehicle1">{{ $data->title }} </label>
                            @endforeach
                        </div>

                        {{-- START input phto & viduo --}}





                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                            <button type="submit" class="btn btn-success">تأكيد</button>
                        </div>
                    </form>
                </div><br>
            </div>
        </div>
    </div>

    <!--END add img -->


    <!--START add viduo -->
    <div class="modal fade" id="myModal_V" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        <h4>viduo اضافه اعلان</h4>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('insert_file') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input id="Name" type="text" required name="name" class="form-control"
                                    placeholder="اسم الشركه المعلنة">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <textarea class="form-control" required name="description" id="exampleFormControlTextarea1" rows="3"
                                placeholder="  الملاحظات + الكلمات المفتاحيه"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="formFileLg" required class="form-label">اختار محتوى الاعلان</label>
                            <input type="file" class="form-control form-control-lg" accept="video/*"
                                name="veduo_file" data-height="70" />
                        </div>
                        <div class="col">
                            <input id="Name" type="text" required name="orderTotal" class="form-control"
                                placeholder="االسعر الكلي للمنتج">
                        </div>

                        <div class="form-group">
                            <h6> اختر الباقة</h6>
                            @foreach ($datas as $data)
                                <input type="checkbox" id="vehicle1" name="datanormale_id[]"
                                    value="{{ $data->id }}">
                                <label for="vehicle1">{{ $data->title }} </label>
                            @endforeach
                        </div>
                        {{-- START input phto & viduo --}}


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                            <button type="submit" class="btn btn-success">تأكيد</button>
                        </div>
                    </form>
                </div><br>
            </div>
        </div>
    </div>
    <!--END add viduo -->

    <!--START add link -->
    <div class="modal fade" id="myModal_L" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        <h4>link اضافه اعلان</h4>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('announcements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input id="Name" type="text" required name="name" class="form-control"
                                    placeholder="اسم الشركه المعلنة">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <textarea class="form-control" required name="description" id="exampleFormControlTextarea1" rows="3"
                                placeholder="  الملاحظات + الكلمات المفتاحيه"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="formFileLg" class="form-label">اختار محتوى الاعلان</label>
                            URL: <input type="text" required name="url" value="<?php echo isset($url) ? $url : ''; ?>"
                                pattern="https?://.+">
                            {{-- <input type="url" name="url" id="url" class="form-control form-control-lg"  placeholder="https://example.com" pattern="https://.*" size="30" required /> --}}
                        </div>

                        <div class="col">
                            <br>
                            <input id="Name" required type="number"step="any" name="orderTotal"
                                class="form-control" placeholder="االسعر الكلي للمنتج">
                        </div>


                        <div class="form-group">
                            <h6> اختر الباقة</h6>
                            @foreach ($datas as $data)
                                <input type="checkbox" id="vehicle1" name="datanormale_id[]"
                                    value="{{ $data->id }}">
                                <label for="vehicle1">{{ $data->title }} </label>
                            @endforeach
                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                            <button type="submit" class="btn btn-success">تأكيد</button>
                        </div>
                    </form>
                </div><br>
            </div>
        </div>
    </div>
    <!--END add viduo -->


    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    {{-- END edit --}}


    </div>
    {{-- END FUOLL DIV --}}
     {{$Announcements->links('admin.pagination.paginator')}}
@endsection
