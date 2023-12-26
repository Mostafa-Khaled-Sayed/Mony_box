@extends('admin.layout')
@section('active11')
active
@endsection
@section('main')

      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li><br>
            @endforeach
        </ul>
    </div>
   @endif
<div class="container">
      <div class="row">
    <div class=" col-lg-12" >
        <div class="card">


            <div class="card-header pb-0">
                <h5>taxs</h5>
            </div>
            <div class="card-body ">
             <div class="table-responsive hoverable-table">
                <table class="display nowrap " id="tableDashboard" data-page-length='50'>
                  <thead>
                  <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{trans('admin.tax')}}</th>


                      <th>العمليات</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($taxs as $tax)
                      <tr>
                        <td>{{$tax->tax}}</td>





                        <td>


                            <!-- Button trigger modal update -->
                         @can('تعديل ضريبة التحويل')
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$tax->id}}">
                            Edit
                          </button>
                         @endcan

                        </td>
                      </tr>


                       <!-- update Modal -->
                       <div class="modal fade" id="edit{{$tax->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> تغيير حالة المستحدم  </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url("dashboard/tax/update")}}" method="post" class='row'>
                              @csrf
                                <input id="id" type="hidden"required name="id" class="form-control" value="{{$tax->id }}">


                               <input type="number" step="any" required class="form-control" value="{{$tax->tax}}" name='tax' id="inputPassword4" placeholder="{!!trans('admin.tax')!!}">

                                <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                                      <button type="submit" class="btn btn-primary">تعديل</button>
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






@endsection
