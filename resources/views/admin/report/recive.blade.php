@extends('admin.layout')
@section('activereporwith')
    active
@endsection
@section('main')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="d-flex justify-content-between">
				<h4 class="card-title mg-b-0">قسم السحب</h4>
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
                            <thead class="">
                               <th>#</th>
                                <th>الاسم</th>
                                <th>كود الدعوة</th>
                                <th>رقم الهاتف</th>
                                <th>قيمة السحب</th>
                                
                                
                                <th>التاريخ</th>

                            </thead>
                            <tbody>


                                @forelse ($data as $index=>$Transfer)
                                    <tr>
                                        <td>{{ $index }}</td>
                                         <td><a href='{{route('reports.show' ,$Transfer->user->id)}}'>{{$Transfer->user->name}}</a></td>
                                       
                                        <td>{{ $Transfer->user->code_invention }}</td>
                                        <td>{{ $Transfer->user->phone }}</td>
                                        <td>{{ $Transfer->withdraw_money }}</td>

                                       
                                        <td>{{ $Transfer->Notification->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>
                                            <h1>No transfer Mony</h1>
                                        </td>
                                    </tr>
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
