
@extends('web.layout')
@section('main')
<div class="row row-sm">
  <div class="col-lg-12 col-md-12">

    <table class="table table-hover text-md-nowrap text-center">
      <thead>
      <tr>
          <th>name </th>
          <th>Status </th>
      </tr>
      </thead>
      <tbody>
        @foreach ($reports->announcements as $announ)
          <tr>

              <td><a href="{{url('/announ') }}/{{$announ->id }}">{{$announ->name }}</a></td>
            @if ($announ->value_Status == 1)

            <td class="text-success">مكتمله</td>

            @endif
            @if ($announ->value_Status == 0)

            <td class="text-danger">غير مكتمل</td>

            @endif

              {{-- <td class="d-flex align-items-center justify-content-center">
                @if($announ->Status == 'veduo')
                <video width="100" height="100" controls>
                      <source src="{{asset('/Announcement/viduo/'.$announ->file_name)}}" >
                    </video>
                    @endif

                  @if($announ->Status == 'img')
                        <img src="{{asset('/Announcement/img/'.$announ->file_name)}}" width="100" height="100">
                    @endif

                  @if($announ->Status == 'link')

                  <iframe width="420" height="315"
                    src="{{$announ->file_name}}">
                  </iframe>



                    @endif

            </td>   --}}



          </tr>


          @endforeach

      </tbody>
  </table>
<div class="container">
    <div class="assets-card my-3">
        <h6 class="mb-3"><span class="mr-2">حساب : </span>123456789</h6>
        <div class="report-num">
            <div class="item">
                <div class="text">خصم المهمة</div>
                <div class="number">0</div>
            </div>
            <div class="item">
                <div class="text">اعادة شحن الخصم</div>
                <div class="number">$0.00</div>
            </div>
            <div class="item">
                <div class="text">مبلغ اعادة الشحن</div>
                <div class="number">$0.00</div>
            </div>
        </div>
        <div class="joining-time">
            <span class="mr-2"> : وقت الأنضمام</span>
            10/12/2023 03:58AM
        </div>
    </div>
</div>

</div>

</div>
</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>

@endsection


