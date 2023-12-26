@extends('../admin.layout')
@section('active14')
active
@endsection
@section('main')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
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
<div class="container">
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="col-sm-1 col-md-2">
                 
                      @can('اضافة موظق')
                         <a class="btn btn-primary btn-sm" href="{{ route('userspromission.create') }}">اضافة موظف أو مالك</a>   
                      @endcan
                   
                </div>
            </div>
            <div class="card-body">
                 <div class="table-responsive hoverable-table">
                <table class="display nowrap " id="tableDashboard" data-page-length='50'>
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">اسم المستخدم</th>
                                <th class="wd-20p border-bottom-0">البريد الالكتروني</th>
                                 <th class="wd-15p border-bottom-0">حالة المستخدم</th>
                                 <th class="wd-15p border-bottom-0">نوع المستخدم</th>
                               
                               
                                <th class="wd-10p border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    

                                    <td class="text-success">
                                       
                                         @if ($user->status =='مفعل')
                              <p class="text-success"> {{$user->status}}</p>  
                          @else
                             <p class="text-danger"> {{$user->status}}</p>
                             @endif
                                       
                                    </td>
                                        
                                        <td>
                                            @forelse ( $user->roles_name as $roleName )
                                                   {{ $roleName }}<br> 
                                            @empty
                                                no permission
                                            @endforelse
                                          
                                    <td>
                                         @can('تعديل الصلاحيات')
                                             <a href="{{ route('userspromission.edit', $user->id) }}" class="btn btn-sm btn-info"
                                                title="تعديل">تعديل</a>   
                                         @endcan
                                         
                                        

                                        @can('حذف الصلاحيات')
                                         <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-user_id="{{ $user->id }}" data-username="{{ $user->name }}"
                                                data-toggle="modal" href="#modaldemo8" title="حذف"> حذف</a>     
                                        @endcan
                                           
                                      
                                       
                                    </td>
                                </tr>
                                 <!--  start effects delete user -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف المستخدم</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('userspromission.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                        <input class="form-control" name="username" id="username" type="text" readonly>
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

<!-- main-content closed -->
<script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var user_id = button.data('user_id')
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #username').val(username);
    })

</script>
@endsection
