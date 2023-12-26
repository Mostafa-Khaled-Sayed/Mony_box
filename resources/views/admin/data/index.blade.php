@extends('admin.layout')
@section('active2')
active
@endsection
@section('main')
<div class="container-fluid py-4">
      <!-- Button trigger modal Add Data -->
      @can('اضافة باقة أتوماتيك')
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add">
        {{trans('admin.addData')}}
                          </button>
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
                          <h3 style='color:#d63384;'>{{trans('admin.allPackage')}}</h3>
                           <!-- add Modal -->
                       <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> add </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('dashboard/data/store')}}" method="post" enctype="multipart/form-data">
                   @csrf
                            <div class="row">
     <div class="form-group col-md-6">
      <label for="inputTitle">{!!trans('admin.TITLE')!!}</label>
      <input type="text" class="form-control" required name='title' id="inputTitle" placeholder="{!!trans('admin.TITLE')!!}">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">{{trans('admin.PRICE')}}</label>
      <input type="number" step="any" class="form-control"  required name='price' id="inputPassword4" placeholder="Price">
    </div>
    <div class="form-group col-md-6">
      <label for="income">{{trans('admin.INCOME')}}</label>
      <input type="number" step="any" class="form-control"  required name='income' id="income" placeholder="{{trans('admin.INCOME')}}">
    </div>

    <div class="form-group col-md-6">
      <label for="gift">{{trans('admin.GIFT')}}</label>
      <input type="number" step="any" class="form-control"  required name='gift' id="gift" placeholder="{{trans('admin.GIFT')}}">
    </div>
       <div class="form-group col-md-6">
      <label for="inputPassword4">time_end</label>
      <input type="number"  step="any" class="form-control"  required name='time_end' id="inputPassword4" placeholder="time_end">
    </div>
    <div class="form-group col-md-6">
      <label >{{trans('admin.PHOTO')}}</label>
        <input type="file" class="form-control"  required  name="photo" accept="image/*" >
      </div>
    <div class="form-group col-md-6">
      <label for="inputDesc_ar">{{trans('admin.Desc_ar')}}</label>
      <textarea class="form-control"  required name="Desc_ar" id="inputDesc_ar" cols="3" rows="3"></textarea>
    </div>
    <div class="form-group col-md-6">
      <label for="inputDesc_en">{{trans('admin.Desc_en')}}</label>
      <textarea class="form-control" name="Desc_en"  required id="inputDesc_en" cols="3" rows="3"></textarea>
    </div>


  </div>



  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
                            </div>

                          </div>
                        </div>
                      </div>
                          <!-- Button trigger modal Add Data -->

<div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header pb-0">

            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                <table class="display nowrap " id="tableDashboard" data-page-length='50'>
                  <thead>
                    <tr>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{trans('admin.id')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{!!trans('admin.TITLE')!!}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{!!trans('admin.TYPE')!!}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{trans('admin.PHOTO')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">time end</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{trans('admin.PRICE')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{trans('admin.INCOME')}}</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{trans('admin.GIFT')}}</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{trans('admin.DESC')}}</th>
                      <th class="text-secondary opacity-7">{{trans('admin.Action')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($datas as $data )


                    <tr>
                      <td class="align-middle text-center">{{$loop->iteration}}</td>

                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$data->title}}</p>

                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">

                          @if(App::getLocale() == 'ar')

                           أتوماتيك
                         @else
                        Auto
                           @endif
                        </p>

                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{asset($data->photo)}}" class="avatar avatar-sm me-3" alt="user1">
                          </div>

                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold mb-0">{{$data->time_end}}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$data->price}}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$data->income}}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$data->gift}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$data->desc}}</span>
                      </td>
                      <td class="align-middle">

                         <!-- Button trigger modal Add Data -->
                       @can('تعديل الباقة الأتوماتيك')
                          <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#edit{{$data->id}}">
                         Edit
                        </button>
                       @endcan
                       @can('حذف الباقة الأتوماتيك')
                          <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#delete{{$data->id}}">
                          Delete
                          </button>
                       @endcan
                      </td>
                    </tr>
                     <!-- delete Modal -->
                     <div class="modal fade" id="delete{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Are you delete ? </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="{{url("/dashboard/data/delete")}}" method="post">
                            @csrf
                              <input id="id" type="hidden" name="id" class="form-control" value="{{$data->id }}">

                              <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></button>
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </div>
                          </form>
                          </div>

                        </div>
                      </div>
                    </div>
                        <!-- end  delete Modal -->
                         <!-- update Modal -->
                     <div class="modal fade" id="edit{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">


                          </div>
                          <div class="modal-body row">
                          <form action="{{url("/dashboard/data/edit")}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <input id="id" type="hidden" name="id" class="form-control" value="{{$data->id }}">
                              <input  type="hidden" name='old_image' value="{{$data->photo}}" >
                              <div class="form-group col-md-6">
                                <label for="inputTitle">{!!trans('admin.TITLE')!!}</label>
                                <input type="text"  required class="form-control" value="{{$data->title}}" name='title' id="inputTitle" placeholder="{!!trans('admin.TITLE')!!}">
                              </div>

                              <div class="form-group col-md-6">
                                <label for="inputPassword4">{!!trans('admin.PRICE')!!}</label>
                                <input type="number" step="any" required class="form-control" value="{{$data->price}}" name='price' id="inputPassword4" placeholder="{!!trans('admin.PRICE')!!}">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="income">  {{trans('admin.INCOME')}}</label>
                                <input type="number" step="any"  required class="form-control" value="{{$data->income}}" name='income' id="income" placeholder="  {{trans('admin.INCOME')}}">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="gift">{!!trans('admin.GIFT')!!}</label>
                                <input type="number" step="any" required class="form-control" value="{{$data->gift}}" name='gift' id="gift" placeholder="{!!trans('admin.GIFT')!!}">
                              </div>
                                     <div class="form-group col-md-6">
                               <label for="inputPassword4">time_end</label>
                             <input type="number"  step="any"  required class="form-control" value="{{$data->time_end}}" name='time_end' id="inputPassword4" placeholder="time_end">
                                     </div>
                              <div class="form-group col-md-6">
                                <label >{!!trans('admin.PHOTO')!!}</label>
                                  <input type="file" class="form-control"  name="photo" accept="image/*" >
                                </div>
                              <div class="form-group col-md-6">
                                <label for="inputDesc_ar">{{trans('admin.Desc_ar')}}</label>
                                <textarea class="form-control" name="Desc_ar"  required  id="inputDesc_ar" cols="3" rows="3">{{$data->getTranslation('desc', 'ar')}}</textarea>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputDesc_en">{{trans('admin.Desc_en')}}</label>
                                <textarea class="form-control" name="Desc_en"  required  id="inputDesc_en" cols="3" rows="3">{{$data->getTranslation('desc', 'ar')}}</textarea>
                              </div>

                            </div>

                              <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                          </form>
                          </div>

                        </div>
                      </div>
                    </div>
                        <!-- end  update Modal -->
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
    </div>
      </div>
      </div>

@endsection
