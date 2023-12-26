@extends('admin.layout')
@section('active1')
اضافه اعلان
@endsection
@section('main')
    <div class=" col-lg-12 card-header pb-0 card" style=' margin:0px auto;  background-image:linear-gradient(310deg, #999999 70%, #ffffff 30%)'>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                     جميع الأعلانات 
                </button>
                <br><br>
              <h5> جميع الأعلانات </h5>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="display nowrap " id="tableDashboard" data-page-length='50'>
                  <thead>
                  <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الإسم </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">الاعلان </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">الملاحظات</th>
                      
                      <th>العمليات</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>sony</td>
                        <td>dklsffldkbvlf.jpg</td>
                        <td> Camer degtal</td>
                        <td>edit & show delet</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

    </div>

    




@endsection