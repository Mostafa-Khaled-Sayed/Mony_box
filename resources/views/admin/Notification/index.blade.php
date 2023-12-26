@extends('admin.layout')
@section('notification')
active
@endsection
@section('main')
<div class="container-fluid">
    <h3 style='color:#d63384;'>الاشعارات</h3>
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
                       
</div>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-body">
           <div class="table-responsive hoverable-table">
            <table class="display nowrap " id="tableDashboard" data-page-length='50'>
              <thead>
               <tr>
              
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{trans('admin.id')}}</th>
                    
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> الموظف أو المالك </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المستخدم</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الرسالة</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الحالة</th>
                   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الرسالة</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">التاريخ</th>
                    <th class="text-center text-secondary opacity-7">{{trans('admin.Action')}}</th>
      
       
                </tr>
              </thead>
              <tbody>
           @forelse ( $datas as $data  )
                    @if ($data->reader_status == 0)
                       <tr style="background: rgba(216, 243, 217, 0.3)">
                    @else
                      <tr>
                    @endif
                     
                  <td class="align-middle text-center">{{$loop->iteration}}</td>
                
                   <td class=" text-center">
                   @if($data->admin_id !== null)
                     {{$data->admin->name}}
                     @endif
                   
                  </td>
                    <td class=" text-center">
                            @if($data->user_id !== null)
                             {{$data->user->name}}
                           @endif  
                    </td>
                  <td class="align-middle text-center ">
                    {{$data->type}}
                  </td>
                 <td class="align-middle text-center ">
                       @if($data->status == 'جاهزه' )
<p class="badge badge-sm bg-gradient-success">  {{$data->status}}</p>
@elseif ($data->status == 'غير جاهزه')
   <p class="badge badge-sm bg-gradient-info">  {{$data->status}}</p>
 @elseif($data->status == 'ملغية')
    <p class="badge badge-sm bg-gradient-danger">  {{$data->status}}</p>
     @elseif($data->status == 'قيد الانتظار')
    <p class="badge badge-sm bg-gradient-warning"> 
         {{$data->status}}</p>
 @endif
                    
                 
                  </td>
                    <td class="align-middle text-center ">
                    <p class="text-xs font-weight-bold mb-0">{{$data->message}}</p>
                  </td>
                  <td class="align-middle text-center ">
                    <p class="text-xs font-weight-bold mb-0">{{$data->created_at}}</p>
                  </td>
                   <td class="align-middle text-center text-sm">

                                    <button class="btn btn-dark dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        المزيد
                                    </button>
<div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                        @if($data->user_id !== null)
                                        <a href="{{route('reports.show' ,$data->user_id)}}"
                                            class="text-center badge badge-sm bg-gradient-success"> مشاهدة</a> <br>
                                        @endif
                                        <a href="{{url('notivication/delete' ,$data->id)}}"
                                            class="text-center badge badge-sm bg-gradient-danger">حذف</a> <br>
                                    
                                     
                                    </div>

                                  </td>
                </tr>
               <!--model-->
                



                @empty
                    Not notifcation
                @endforelse
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  
@endsection