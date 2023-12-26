@extends('admin.layout')
@section('active8')
active
@endsection
@section('main')
  <!-- Button trigger modal Add Data -->
  <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add">
    Add photo
    </button>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li><br>
            @endforeach
        </ul>
    </div>
   @endif
     <!-- add Modal -->
 <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> add </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{url('dashboard/photo/store')}}" method="post" enctype="multipart/form-data">
@csrf
      <div class="row">
  <div class="form-group col-md-6">
      <label >{{trans('admin.PHOTO')}}</label>
        <input type="file" required class="form-control" accept="image/*"  name="photo"  >
      </div>
</div>



<button type="submit" class="btn btn-primary">Add </button>
</form>
      </div>

    </div>
  </div>
</div>
    <!-- Button trigger modal Add Data -->
<div class="container">
      <div class="row">
    <div class=" col-lg-12 " >
        <div class="card mb-4">
            <div class="card-header pb-0">
              <h5> photos</h5>
            </div>
            <div class="card-body">
           <div class="table-responsive hoverable-table">
                <table class="display nowrap " id="tableDashboard" data-page-length='50'>
                  <thead>
                  <tr>

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">{{trans('admin.PHOTO')}}</th>

                      <th>العمليات</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($photos as $photo)
                      <tr>
                        <td><img src="{{asset($photo->photo)}}" width="70" height="70" alt="slider" class="rounded-circle"></td>
                        <td>

                          <!-- Button trigger modal delete -->
                          @can('حذف الصور')
                               <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$photo->id}}">
                            Delete
                          </button>
                          @endcan

                        </td>
                      </tr>

                      <!-- delete Modal -->
                       <div class="modal fade" id="delete{{$photo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من الحذف</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('dashboard/photo/delete')}}" method="post">

                              @csrf

                                <input id="id" type="hidden" name="id" class="form-control"
                                  value="{{$photo->id }}">
                                  <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                                      <button type="submit" class="btn btn-danger">حذف</button>
                                  </div>
                            </form>
                            </div>

                          </div>
                        </div>
                      </div>


                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

    </div>
 </div>






@endsection
