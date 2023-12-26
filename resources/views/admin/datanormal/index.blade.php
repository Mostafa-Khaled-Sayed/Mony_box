@extends('admin.layout')
@section('active12')
active
@endsection
@section('main')
<div class="container">
      <!-- Button trigger modal Add Data -->
    @can('اضافة باقة طبيعية')
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add">
        {{trans('admin.addData')}}
                          </button>
    @endcan
                                                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                          <h3 style='color:#d63384;'>{{trans('admin.dataNormal')}}</h3>
                           <!-- add Modal -->
                       <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> add </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('dashboard/dataNormal/store')}}" method="post" enctype="multipart/form-data">
                   @csrf
                            <div class="row">
     <div class="form-group col-md-6">
      <label for="inputTitle">{!!trans('admin.TITLE')!!}</label>
      <input type="text"  required class="form-control" name='title' id="inputTitle" placeholder="{!!trans('admin.TITLE')!!}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">{{trans('admin.starting_price')}}</label>
      <input type="number"  step="any"  required class="form-control" name='starting_price' id="inputPassword4" placeholder="starting_price">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">{{trans('admin.final_price')}}</label>
      <input type="number"  step="any"  required  class="form-control" name='final_price' id="inputPassword4" placeholder="final_price">
    </div>
    <div class="form-group col-md-6">
      <label for="income">العمولة</label>
      <input type="number"  step="any"  required  class="form-control" name='income' id="income" placeholder="العمولة">
    </div>
  <div class="form-group col-md-6">
      <label >{{trans('admin.PHOTO')}}</label>
        <input type="file" class="form-control"  required  name="photo" accept="image/*" >
      </div>
    <div class="form-group col-md-6">
      <label for="inputDesc_en">{{trans('admin.Desc_en')}}</label>
      <textarea class="form-control"  required  name="desc" id="inputDesc_en" cols="3" rows="3"></textarea>
    </div>


  </div>



  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
                            </div>

                          </div>
                        </div>
                      </div>
                          <!-- Button trigger modal Add Data -->


      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">

            </div>
            <div class="card-body" >
             <div class="table-responsive hoverable-table">
                <table class="display nowrap " id="tableDashboard" data-page-length='50'>
                  <thead>
                    <tr>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{trans('admin.id')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{!!trans('admin.TITLE')!!}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{!!trans('admin.TYPE')!!}</th>
                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{trans('admin.PHOTO')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{trans('admin.starting_price')}}</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{trans('admin.final_price')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{trans('admin.income')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{trans('admin.starting_income')}}</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{trans('admin.final_income')}}</th>
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

                          @if(App::getLocale() == 'ar' )

                          طبيعي

                          @else
                           Normal
                           @endif
                        </p>

                      </td>
                      <td>
                        <div class="align-middle text-center text-sm">

                            <img src="{{asset($data->photo)}}" class="avatar avatar-sm me-3" alt="user1">


                        </div>
                      </td>

                      <td class="align-middle text-center text-sm">

                        <p class="text-xs font-weight-bold mb-0">{{$data->starting_price}}</p>


                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">{{$data->final_price}}</p>
                      </td>
                       <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$data->income}}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$data->starting_income}}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$data->final_income}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$data->desc}}</span>
                      </td>
                      <td class="align-middle">

                         <!-- Button trigger modal Add Data -->
                       @can('تعديل الباقة الطبيعية')
                         <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#edit{{$data->id}}">
                         Edit
                        </button>
                       @endcan
                        @can( 'حذف الباقة الطبيعية')
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
                          <form action="{{url("/dashboard/dataNormal/delete")}}" method="post">
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
                          <form action="{{url("/dashboard/dataNormal/edit")}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <input id="id" type="hidden" name="id" class="form-control" value="{{$data->id }}">
                             <input  type="hidden" name='old_image' value="{{$data->photo}}" >
                              <div class="form-group col-md-6">
                                <label for="inputTitle">{!!trans('admin.TITLE')!!}</label>
                                <input type="text" required  class="form-control" value="{{$data->title}}" name='title' id="inputTitle" placeholder="{!!trans('admin.TITLE')!!}">
                              </div>

                              <div class="form-group col-md-6">
                                <label for="inputPassword4">{!!trans('admin.starting_price')!!}</label>
                                <input type="number"  step="any"  required class="form-control" value="{{$data->starting_price}}" name='starting_price' id="inputPassword4" placeholder="{!!trans('admin.starting_price')!!}">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputPassword4">{!!trans('admin.final_price')!!}</label>
                                <input type="number"  step="any"  required  class="form-control" value="{{$data->final_price}}" name='final_price' id="inputPassword4" placeholder="{!!trans('admin.final_price')!!}">
                              </div>
                             <div class="form-group col-md-6">
      <label for="income">العمولة</label>
      <input type="number"  step="any" class="form-control" name='income'  required value="{{$data->income}}" id="income" placeholder="العمولة">
    </div>


                              <div class="form-group col-md-6">
                                <label for="inputDesc_en">{{trans('admin.Desc_en')}}</label>
                                <textarea class="form-control" name="desc"  required  id="inputDesc_en" cols="3" rows="3">{{$data->desc}}</textarea>
                              </div>
                         <div class="form-group col-md-6">
                                <label >{!!trans('admin.PHOTO')!!}</label>
                                  <input type="file" class="form-control" name="photo" accept="image/*" >
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

   {{$datas->links('admin.pagination.paginator')}}
@endsection
