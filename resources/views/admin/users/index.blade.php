@extends('admin.layout')
@section('active4')
active
@endsection
@section('main')
<!--Start Search-->

<form  action="{{url('/users/search')}}" method="get" class="container">
   @csrf
   <div class="ms-md-auto pe-md-3 d-flex align-items-center  row">
            <div class="form-group col-md-6">

              <input type="text" required name="word" class="form-control" placeholder="أكتب هنا...">

            </div>
            <div class="form-group col-md-3">
             <button type="submit" class="btn btn-primary mt-2" >
                            ابحث
                          </button>
            </div>
          </div>
</form>
<!--End Search-->
  <!-- Button trigger modal Add Data -->
  @can('اضافة مستخدم')
    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#add">
    Add User
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
     <!-- add Modal -->
 <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> add </h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{url('dashboard/user/store')}}" method="post">
@csrf
      <div class="row">
<div class="form-group col-md-6">
<label for="inputTitle">Name</label>
<input type="text"  required class="form-control" name='name' id="inputTitle" placeholder="name">
</div>
<div class="form-group col-md-6">
<label for="inputPassword4">Email</label>
<input type="email"  required class="form-control" name='email' id="inputPassword4" placeholder="Price">
</div>

<div class="form-group col-md-6">
<label for="password">password</label>
<input type="password"  required class="form-control" name='password' id="password" placeholder="password">
</div>
<div class="form-group col-md-6">
<label for="phone">Number Phone</label>
<input class="form-control"   required type="tel" id='phone'  name="phone"    placeholder="Number Phone">
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
           <div class="col-12">
                <div class="card ">
            <div class="card-header pb-0">
              <h5> جميع المستخدمين </h5>
            </div>
            <div class="card-body">
                 <div class="table-responsive hoverable-table">
                <table class="display nowrap " id="tableDashboard" data-page-length='50'>
                  <thead>
                  <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الإسم </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">الإيميل </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">كود الدعوة</th>
                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">الهاتف</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">الحالة</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">النقاط</th>
                      <th>العمليات</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                         <td>{{$user->code_invention}}</td>
                          <td>{{$user->phone}}</td>
                        <td>
                          @if ($user->status =='مفعل')
                              <p class="text-success"> {{$user->status}}</p>
                          @else
                             <p class="text-danger"> {{$user->status}}</p>
                             @endif
                        </td>

                        <td> {{ $user->scores->score}}</td>


                        <td>
                          <!-- Button trigger modal update -->
                          @can('تعديل مستخدم')
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$user->id}}">
                            Edit
                          </button>

                          @endcan

                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        الأموال
                        </button>

                         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                         <a class="dropdown-item" data-toggle="modal" data-target="#deposit{{$user->id}}">ايداع </a>
                         <a class="dropdown-item" data-toggle="modal" data-target="#withdrawal{{$user->id}}">سحب</a>

                     </div>




                          <!-- Button trigger modal delete -->
                           @can('حذف مستخدم')
                             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$user->id}}">
                            Delete
                          </button>
                           @endcan



                        </td>
                      </tr>

                      <!-- delete Modal -->
                       <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من الحذف</h5>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('dashboard/user/delete')}}" method="post">

                              @csrf

                                <input id="id" type="hidden" name="id" class="form-control"
                                  value="{{$user->id }}">
                                  <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                      <button type="submit" class="btn btn-danger">حذف</button>
                                  </div>
                            </form>
                            </div>

                          </div>
                        </div>
                      </div>

                       <!-- update Modal -->
                       <div class="modal fade" id="edit{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> تغيير حالة المستحدم  </h5>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url("dashboard/user/update")}}" method="post" class='row'>
                              @csrf
                                <input id="id" type="hidden" name="id" class="form-control" value="{{$user->id }}">
                                <input id="id" name="id_scor" type="hidden" class="form-control" value="{{$user->scores->id}}">
                                <div class="form-group col-md-6">
                                  <label for="statuss" class="mr-sm-2">القسم</label>
                                    <select class="fancyselect" name="status">
                                    <option value="{{$user->status}}" selected >{{$user->status}}</option>
                                          <option value="مفعل">مفعل</option>
                                          <option value="غير مفعل">غير مفعل</option>

                                    </select>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                    <button type="submit" class="btn btn-primary">تعديل</button>
                                </div>
                            </form>
                            </div>

                          </div>
                        </div>
                      </div>
                          <!-- end  update Modal -->
                          <!-- start deposit-->

                       <div class="modal fade" id="deposit{{$user->id}}" data-backdrop="static" tabindex="-1"  aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> تغيير حالة المستحدم  </h5>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{route("dashboard.user.deposit")}}" method="post" class='row'>
                              @csrf
                                <input id="id" type="hidden" name="id" class="form-control" value="{{$user->id }}">
                                <input id="id" name="id_scor" type="hidden" class="form-control" value="{{$user->scores->id}}">

                                <div class="form-group col-md-6">
                                  <label for="statuss" class="mr-sm-2">أضف المبلغ المراد ايداعه</label>
                                   <input type="number"  step="any"  required class="form-control" name='score' id="inputTitle" placeholder="money">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="reason" class="mr-sm-2">البيان</label>
                                     <input id="reason" required name="reason" type="type" class="form-control" >
                                </div>
                                <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                      <button type="submit" class="btn btn-primary">إيداع</button>
                                  </div>
                            </form>
                            </div>

                          </div>
                        </div>
                      </div>

                           <!--end deposit-->
                           <!-- start withdrawal-->

                       <div class="modal fade" id="withdrawal{{$user->id}}" data-backdrop="static" tabindex="-1"  aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> تغيير حالة المستحدم  </h5>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url("dashboard/user/withdrawal")}}" method="post" class='row'>
                              @csrf
                                <input id="id" type="hidden" name="id" class="form-control" value="{{$user->id }}">
                                <input id="id" name="id_scor" type="hidden" class="form-control" value="{{$user->scores->id}}">

                                <div class="form-group col-6">
                                  <label for="statuss" class="mr-sm-2">اكتب المبلغ المراد سحبه</label>
                                   <input type="number"  step="any"  required class="form-control" name='score' id="inputTitle" placeholder="money">
                                </div>
                                <div class="form-group col-6">
                                  <label for="reason" class="mr-sm-2">البيان</label>
                                     <input id="reason" required name="reason" type="type" class="form-control" >
                                </div>
                                <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                      <button type="submit" class="btn btn-primary">سحب</button>
                                  </div>
                            </form>
                            </div>

                          </div>
                        </div>
                      </div>

                           <!--end deposit-->

                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
            </div>
        </div>
    </div>



   {{$users->links('admin.pagination.paginator')}}


@endsection
