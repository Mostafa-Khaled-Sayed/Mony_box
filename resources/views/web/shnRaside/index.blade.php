@extends('web.layout')

@section('main')
    <div class="home-header py-3">
        <div class="container">
            <div class="ad-header d-flex">

                <div class="text-white font-bold">
                    <strong>
                        <span class="mr-1">تعبئة الهاتف الجوال</span></strong>
                </div>
            </div>
        </div>
    </div>
    <!--Recharge page-->
    <div class="main-content">
        <div class="container">
            <div class="web-home-content assets-card py-5 m-0">

                <div class="sendcash-content">

                    <div class="country-key">
                        <div class="mb-2">رقم الهاتف</div>
                        <div class="d-flex item-transfer">
                            <input type="tel" id="phone">
                            <select name="country">
                                <option disabled selected>اختار الدوله</option>
                                @foreach ($contrydata as $val)
                                    <option value={{ $val->id }}>
                                        <img src="{{ asset('Country/image/BackgroundImage/' . $val->country_image) }}"
                                            class="mr-3 country_image" alt="...">
                                        <h5 class="mt-0">{{ $val->country_name }}</h5>
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputState" class="mb-2">مزود الخدمة</label>
                            <select id="inputState" name="companyincome" class="form-control">


                            </select>
                        </div>


                        <div class="my-2">
                            <span>مبلغ التعبئة</span>
                            <span class="show-more">المزيد</span>
                        </div>
                        <div class="pricesdata d-flex flex-wrap justify-content-between">


                        </div>
                        <div class="my-2 d-flex     justify-content-between">
                            <span>خطة الباقة</span>
                            <span class="show-more" data-toggle="modal" data-target="#morePlan">المزيد</span>
                        </div>

                        <!--الباقات العشوائية-->
                        <div class="packagesPersonal d-flex flex-wrap justify-content-between">


                        </div>


                        <!--الباقات المرتبة-->
                        {{-- <div class="accordion accordion-recharge" id="accordionExample">
            <div class="">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block " type="button" data-toggle="collapse"
                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <img class="btn-icon" src="icon.jpg">
                    باقات مزايا
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-chevron-down" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                    </svg>
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="d-flex flex-wrap justify-content-between">
                  <div class="package-plan" data-toggle="modal" data-target="#serviceDetalies">
                    <span>0.14 USDT</span>
                    <span class="detalies">Etisalat Egypt Internet -90 MB + 20MB for Whatsapp - 2.50 EGP</span>

                  </div>

                </div>
              </div>
            </div>
            <div class="">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block  collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <img class="btn-icon" src="icon.jpg">
                    باقات فورجى
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-chevron-down" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                    </svg>
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="d-flex flex-wrap justify-content-between">
                  <div class="package-plan" data-toggle="modal" data-target="#serviceDetalies">
                    <span>0.14 USDT</span>
                    <span class="detalies">Etisalat Egypt Internet -90 MB + 20MB for Whatsapp - 2.50 EGP</span>

                  </div>1

                </div>
              </div>
            </div>
            <div class="">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block  collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <img class="btn-icon" src="icon.jpg">

                    باقات الأنترنت الشهرية
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-chevron-down" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                    </svg>
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="d-flex flex-wrap justify-content-between">
                  <div class="package-plan" data-toggle="modal" data-target="#serviceDetalies">
                    <span>0.14 USDT</span>
                    <span class="detalies">Etisalat Egypt Internet -90 MB + 20MB for Whatsapp - 2.50 EGP</span>

                  </div>

                </div>
              </div>
            </div>
          </div> --}}


                    </div>

                </div>

            </div>
        </div>

        <!--show more plan modal-->
        {{-- <div class="modal slide-bottom" id="morePlan" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog assets-card container">
      <div class="d-flex align-items-center justify-content-between pb-2">
        <div class="close" data-dismiss="modal" aria-label="Close">
          <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg" width="20"
            height="20">
            <path
              d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z"
              fill="currentColor"></path>
          </svg>
        </div>
      </div>


      <div class="modal-content">
        <div class="service-list ">


           {{-- <div class="package-plan" data-toggle="modal" data-target="#serviceDetalies">
            <span>0.14 $</span>
            <span class="detalies">Etisalat Egypt Internet -90 MB + 20MB for Whatsapp - 2.50 EGP</span>

          </div>
          <div class="package-plan" data-toggle="modal" data-target="#serviceDetalies">
            <span>0.14 $</span>
            <span class="detalies">Etisalat Egypt Internet -90 MB + 20MB for Whatsapp - 2.50 EGP</span>

          </div>
          <div class="package-plan" data-toggle="modal" data-target="#serviceDetalies">
            <span>0.14 $</span>
            <span class="detalies">Etisalat Egypt Internet -90 MB + 20MB for Whatsapp - 2.50 EGP</span>

          </div>
          <div class="package-plan" data-toggle="modal" data-target="#serviceDetalies">
            <span>0.14 $</span>
            <span class="detalies">Etisalat Egypt Internet -90 MB + 20MB for Whatsapp - 2.50 EGP</span>

          </div>
          <div class="package-plan" data-toggle="modal" data-target="#serviceDetalies">
            <span>0.14 $</span>
            <span class="detalies">Etisalat Egypt Internet -90 MB + 20MB for Whatsapp - 2.50 EGP</span>

          </div>

        </div>
      </div>
    </div>
  </div> --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                //select
                $('select[name="country"]').on('change', function() {
                    console.log(12);
                    var company_id = $(this).val();
                    if (company_id) {

                        $.ajax({
                            url: "{{ URL::to('companycharge') }}/" + company_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="companyincome"]').empty();
                                $('select[name="companyincome"]').append(
                                    '<option selected disabled>مزود الخدمة</option>');
                                $.each(data, function(key, value) {

                                    $('select[name="companyincome"]').append(
                                        '<option value="' + key + '">' + value +
                                        '</option>');
                                });
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
                $('select[name="companyincome"]').on('change', function() {
                    console.log(12);
                    var company_id = $(this).val();
                    if (company_id) {
                        console.log(12);
                        $.ajax({
                            url: "{{ URL::to('contycharge') }}/" + company_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                console.log(data.package);
                                $('div.pricesdata').empty();

                                $.each(data.package_price, function() {

                                    $('div.pricesdata').append(`
                <div class="Filling-amount">
              <a href="#" data-toggle="modal" data-target="#serviceDetalies${this.id}">
                <span> EGP</span>
                <span>${this.price} $</span>
              </a>
            </div>

             <!--show serviceDetalies  modal-->
  <div class="modal slide-bottom" id="serviceDetalies${this.id}" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog assets-card container">
      <div class="d-flex align-items-center justify-content-between pb-2">
        <strong>تأكيد تعبئة</strong>
        <div class="close" data-dismiss="modal" aria-label="Close">
          <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg" width="20"
            height="20">
            <path
              d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z"
              fill="currentColor"></path>
          </svg>
        </div>
      </div>
      <div class="modal-content ">
        <form action="/rchargeUser" method="post">
            @csrf
<div class="form-control">
    <label for="phone" >ادخل رقم التلفون </label>
   <input type="tel" name="phone" id="phone" require>
    </div>
            <input type="hidden" name="packagePriceId" value=${this.id}>
            <input type="hidden" name="type" value='1'>
        <h5 class="mt-4 text-center">Vodafone Egypt 10 EGP</h5>
        <ul class="assets-card confirm-detalies list-unstyled">
          <li class="d-flex">
            <span>الوصف </span>
            <span>10 EGY</span>
          </li>
          <li class="d-flex">
            <span>السعر </span>
            <span>${this.price} $</span>
          </li>
          <li class="d-flex">
            <span>الوصف </span>
            <span>${this.description}</span>
          </li>
          <li class="d-flex">
            <span>وقت الصلاحية </span>
            <span>${this.validate}</span>
          </li>
        </ul>
        <button type="submit" class="follow-btn text-center">متابعة</button>
        </form>
      </div>
    </div>
  </div>
                               `);
                                });
 $('div.packagesPersonal').empty();
                        console.log(data.package)
                        $.each(data.package, function() {
                            $('div.packagesPersonal').append(`


                                         <div class="package-plan" data-toggle="modal" data-target="#serviceDetaliespackages${this.id}">
            <span>${this.price} $</span>
            <span class="detalies">${this.description}</span>

          </div>

                       <!--show serviceDetalies  modal-->
  <div class="modal slide-bottom" id="serviceDetaliespackages${this.id}" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog assets-card container">
      <div class="d-flex align-items-center justify-content-between pb-2">
        <strong>تأكيد تعبئة</strong>
        <div class="close" data-dismiss="modal" aria-label="Close">
          <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg" width="20"
            height="20">
            <path
              d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z"
              fill="currentColor"></path>
          </svg>
        </div>
      </div>
      <div class="modal-content ">
        <form action='/rchargeUser' method="post">
            @csrf
<div class="form-control">
    <label for="phone" >ادخل رقم التلفون </label>
   <input type="tel" name="phone" id="phone" require>
    </div>
                <input type="hidden" name="packagePriceId" value=${this.id}>
                <input type="hidden"  name="type" vlaue='0'>
        <h5 class="mt-4 text-center">Vodafone Egypt 10 EGP</h5>
        <ul class="assets-card confirm-detalies list-unstyled">
          <li class="d-flex">
            <span>الوصف </span>
            <span>10 EGY</span>
          </li>
          <li class="d-flex">
            <span>السعر </span>
            <span>${this.price} $</span>
          </li>
          <li class="d-flex">
            <span>الوصف </span>
            <span>${this.description}</span>
          </li>
          <li class="d-flex">
            <span>وقت الصلاحية </span>
            <span>${this.validate}</span>
          </li>
        </ul>
        <button type="submit" class="follow-btn text-center">متابعة</button>
        </form>
      </div>
    </div>
  </div>
                               `)
                        })
                            },
                        });


                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>
    @endsection
