@extends('web.layout')

@section('main')
    <div class="py-3 home-header">
        <div class="container">
            <div class="ad-header d-flex">
                <a class="font-bold back-page " onclick="javascript:history.go(-1)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                </a>
                <div class="mx-2 font-bold text-white">
                    <strong>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-currency-dollar" viewBox="0 0 16 16">
                            <path
                                d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                        </svg><span class="mr-1">ارسال النقود</span></strong>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container">
            <div class="py-5 m-0 web-home-content assets-card">
                <div class="d-flex custom-steps">
                    <div class="bar"></div>
                    <div class="d-flex step-item">
                        <div class=" step-no" style="background-color: var(--main-color);color: #fff;">1</div>
                        <div class="text">اختر طريقة</div>
                    </div>
                    <div class="d-flex">
                        <div class=" step-no">2</div>
                        <div class="text">إضافة حساب</div>
                    </div>
                    <div class="d-flex">
                        <div class=" step-no"> 3</div>
                        <div class="text">إرسال النقود</div>
                    </div>
                </div>

                <div class="sendcash-content">
                    <div class="text-center">اختر طريقة</div>

                    <div class="transfer">
                        <div class="mb-2">تحويل إلى</div>
                        <div class="mb-3">
                            <label for="" class="form-label">البلد</label>
                            <select class="form-control" name="lc_country_id" id="lc_country_id">
                                <option selected disabled>أختيار الدوله</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ json_decode($country->emoji)->img }}
                                        {{ $country->official_name }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="mb-2">الطريقة</div>
                        <div class="wallet">

                        </div>
                    </div>

                    <div class="tutorial">
                        <img src="money-transfer.png" class="m-auto money-img d-block" width="100px">
                        <p class="text-center title">البرنامج التعليمي لإرسال النقود</p>
                        <div class="tutorial-text"><span class="number">1</span>
                            <p>حدد طريقة التحويل وحدد حسابك </p>
                        </div>
                        <div class="tutorial-text"><span class="number">2</span>
                            <p>حدد العملة الرقمية التي ترغب في إرسالها وأدخِل المبلغ</p>
                        </div>
                        <div class="tutorial-text"><span class="number">3</span>
                            <p>انتظر وصول النقود </p>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>


    <div class="modal slide-bottom" id="transferTo" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="container modal-dialog assets-card">
            <div class="pb-2 d-flex align-items-center justify-content-between">
                <strong>تحويل إلى</strong>
                <div class="close" data-dismiss="modal" aria-label="Close">
                    <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg"
                        width="20" height="20">
                        <path
                            d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z"
                            fill="currentColor"></path>
                    </svg>
                </div>
            </div>

        </div>
    </div>
    <!--method-transfer -->
    <div class="modal slide-bottom" id="method-transfer" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="container modal-dialog assets-card">
            <div class="pb-2 d-flex align-items-center justify-content-between">
                <strong class="text-center">أختر حسابا</strong>
                <div class="close" data-dismiss="modal" aria-label="Close">
                    <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg"
                        width="20" height="20">
                        <path
                            d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z"
                            fill="currentColor"></path>
                    </svg>
                </div>
            </div>
            <div class="modal-content confirmation-game">
                <form>
                    <label>المبلغ المراد ارساله</label>
                    <input type="text" id="price" name="price" class="input-group" />
                    <label>أسم المستلم كامل</label>
                    <input type="text" class="input-group" name="username" id="username" />
                    <label>رقم هاتفه</label>
                    <input type="text" class="input-group" name="phone" id="phone" />

                    <label> أسم البنك او الصرافة (اختيارى)</label>
                    <input type="text" class="input-group" name="bank_name" id="bank_name" />

                    <label> رقم الحساب (اختيارى)</label>
                    <input type="text" class="input-group" name="account_number" id="account_number" />

                    <label> QR Code(اختيارى)</label>
                    <input type="file" class="input-group" name="qr_code" id="qr_code" />

                    <label> رقم المرجع</label>
                    <input type="text" class="input-group" name="reference_number" id="reference_number" />

                    <label> ملاحظه</label>
                    <input type="text" class="input-group" name="note" id="note" />

                    <label> ابيان</label>
                    <input type="text" class="input-group" name="appian" id="appian" />
                    <a class="mt-5 btn follow-btn" href="" id="sendCash-1" data-toggle="modal"
                        data-target="#sendCash">موافق</a>
                </form>
            </div>
        </div>
    </div>

    <!--confirmation-transfer -->
    <div class="modal slide-bottom" id="sendCash" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="container modal-dialog assets-card">
            <div class="pb-2 d-flex align-items-center justify-content-between">
                <strong class="text-center">تأكيد ارسال الحواله</strong>
                <div class="close" data-dismiss="modal" aria-label="Close">
                    <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg"
                        width="20" height="20">
                        <path
                            d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z"
                            fill="currentColor"></path>
                    </svg>
                </div>
            </div>
            <div class="modal-content confirmation-game">
                <form>
                    <label class="mb-2">الصراف</label>
                    <input type="text" class="input-group" id="bank_name2" readonly />
                    <label class="mb-2">المبلغ</label>
                    <input type="text" class="input-group" id="price2" readonly />
                    <label class="mb-2">أسم المستلم</label>
                    <input type="text" class="input-group" id="username2" readonly />
                    <label class="mb-2">رقم المستلم</label>
                    <input type="text" class="input-group" id="phone2" readonly />
                    <label class="mb-2">ملاحظة</label>
                    <input type="text" class="input-group" id="note2" readonly />


                    <div class="mt-3 group-btn">
                        <a class="mt-5 btn follow-btn" href="" data-toggle="modal"
                            data-target="#confirm-operation">تأكيد العملية</a>
                        <a class="mt-5 btn follow-btn" data-dismiss="modal" aria-label="Close">رجوع </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--confirmation operation operationform-->
    <div class="modal slide-bottom" id="confirm-operation" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="container modal-dialog assets-card">
            <div class="pb-2 d-flex align-items-center justify-content-between">
                <strong class="text-center">ايصال ارسال حوالة</strong>
                <div class="close" data-dismiss="modal" aria-label="Close">
                    <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg"
                        width="20" height="20">
                        <path
                            d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z"
                            fill="currentColor"></path>
                    </svg>
                </div>
            </div>
            <div class="modal-content confirmation-game">
                <ul class="ist-unstyled ">
                    <li>
                        <span class="color">رقم الحوالة</span>
                        <span id="number_send_mony3"></span>
                    </li>
                    <li>
                        <span class="color">المبلغ</span>
                        <span id="price3"></span>
                    </li>
                    <li>
                        <span class="color">رسوم التحويل</span>
                        <span id="tax3">{{ $tax->tax_rule }}%</span>
                    </li>
                    <li>
                        <span class="color">رقم المستلم</span>
                        <span id="phone3"></span>
                    </li>
                    <li>
                        <span class="color">أسم المستلم</span>
                        <span id="username3"></span>
                    </li>
                    <li>
                        <span class="color">تاريخ الحوالة</span>
                        <span id="date3"></span>
                    </li>
                    <li>
                        <span class="color">الغرض</span>
                        <span id="note3"></span>
                    </li>
                </ul>
                <div class="group-btn">
                    <a href="#" class="buy btn back-color buy-5">تأكيد</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $("#lc_country_id").on("change", function() {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "sendMony/get_wallet",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                },
                success: function(response) {
                    $('.wallet').children().remove();
                    $.each(response.wallet, function(i, ele) {
                        $('.wallet').append(`
                        <a class="method item-transfer d-flex" href="" data-toggle="modal"
                            data-target="#method-transfer">
                            <div class="d-flex" style="align-items: center;">
                                <div class=" method-icon"
                                    style="background-image: url(https://bin.bnbstatic.com/static/images/mp-remittance-ui/ewallet.svg);">
                                </div>
                                <div class="mr-2">
                                  <input type="hidden" id="wallet_id" name="wallet_id" value="${ele.id}" /> 
                                    <h6 class="font-bold">${ele.wallet_name}</h6>
                                    <span>إلى حسابك الخاص فقط</span>
                                </div>
                            </div>
                            <div class="wallet">

                                <div class="method-arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#a6abb2"
                                        class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                                    </svg>
                                </div>
                            </div>

                        </a>
                  `);
                    });

                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var isRequestInProgress = false;
            $('#sendCash-1').on('click', function() {

                // Set the flag to indicate that a request is in progress
                var price = $('#price').val();
                var username = $('#username').val();
                var bank_name = $('#bank_name').val();
                var account_number = $('#account_number').val();
                var qr_code = $('#qr_code')[0].files[0];
                // Get the filename from the file input
                var qrCodeFileName = qr_code ? qr_code.name : '';
                console.log(qrCodeFileName);
                var reference_number = $('#reference_number').val();
                var note = $('#note').val();
                var appian = $('#appian').val();
                var phone = $('#phone').val();

                $('#price2').val(price);
                $('#username2').val(username);
                $('#bank_name2').val(bank_name);
                $('#phone2').val(phone);
                $('#note2').val(note);

                var date = new Date();
                var day = date.getDay();
                var month = date.getMonth();
                var year = date.getFullYear();
                var only_date = `${day}/${month}/${year}`;


                $('#price3').html(`${price}$`);
                $('#username3').html(username);
                $('#bank_name3').html(bank_name);
                $('#phone3').html(phone);
                $('#note3').html(note);
                $('#date3').html(only_date);
                var country = $('#wallet_id').val();

                $('.buy-5').on('click', function() {
                    if (isRequestInProgress) {
                        console.log('A request is already in progress. Please wait.');
                        return;
                    }
                    // Set the flag to indicate that a request is in progress
                    isRequestInProgress = true;
                    $.ajax({
                        type: "POST",
                        url: "sendMony/posts",
                        data: {
                            _token: "{{ csrf_token() }}",
                            wallet_id: country,
                            price: price,
                            username: username,
                            bank_name: bank_name,
                            account_number: account_number,
                            phone: phone,
                            qr_code: qrCodeFileName,
                            reference_number: reference_number,
                            note: note,
                            appian: appian,
                        },
                        contentType: 'application/x-www-form-urlencoded',
                        processData: true,
                        success: function(response) {
                            window.location.reload();
                        },
                        complete: function() {
                            // Reset the flag when the request is complete, regardless of success or failure
                            isRequestInProgress = false;
                        },
                        error: function(xhr, status, error) {
                            console.log('Error:', error);
                            // Handle error response
                            console.log('Error Status:', xhr.status);
                            // Reset the flag in case of an error
                            isRequestInProgress = false;
                        }
                    });
                });
            });

        });
    </script>
@endsection
