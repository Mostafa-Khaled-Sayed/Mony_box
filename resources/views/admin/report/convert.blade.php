@extends('admin.layout')
@section('activeturn')
active
@endsection
@section('main')
<div class="row row-sm">
	<div class="col-xl-12">
        <div class="d-flex justify-content-between">
			<h4 class="card-title mg-b-0">قسم تحويل الاموال</h4>
			<i class="mdi mdi-dots-horizontal text-gray"></i>
		</div>

	</div>
</div>
<div class="container">
      <div class="row">
        <div class="col-12">
			<div class="card">
				<div class="card-body">
                	<div class="table-responsive hoverable-table">
                        <table class="display nowrap " id="tableDashboard" data-page-length='50'>
                            <thead class="table-dark">
                            <th>#</th>
                            <th>الاسم</th>
                            <th>كود الدعوة</th>
                            <th>رقم الهاتف</th>
                            <th>المبلغ المرسل</th>
                            <th>قيمة الخصم</th>
                            <th>المبلغ بعد الخصم</th>                            
                            <th>المرسل اليه</th>
                            <th>التاريخ</th>
                                                    
                            </thead>
                            <tbody>
                            
                            
                            @forelse ($TransferMony as $index=>$Transfer )
                            <tr>
                            <td >{{$index}}</td>
                            <td><a href='{{route('reports.show' ,$Transfer->user_id)}}'>{{$Transfer->usersend->name}}</a></td>
                            <td><a href='{{route('reports.show' ,$Transfer->user_id)}}'>{{$Transfer->usersend->code_invention}}</a></td>
                            <td>{{$Transfer->usersend->phone}}</td>
                            <td>{{$Transfer->mony_send}}</td>
                            <td>{{$Transfer->mony_send - $Transfer->mony_after_discount}}</td>
                            <td>{{$Transfer->mony_after_discount}}</td>
                            <td>{{$Transfer->resiveUser->name}}</td>
                            
                            <td>{{$Transfer->creat_at}}</td>
                            </tr>
                            @empty
                            <tr>
                            <td><h1>No transfer Mony</h1></td></tr>
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
