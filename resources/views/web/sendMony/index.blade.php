@extends('web.layout')

@section('main')
  <div class="home-header py-3">
    <div class="container">
      <div class="ad-header d-flex">
        <a class="back-page  font-bold " onclick="javascript:history.go(-1)">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-arrow-right"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
          </svg>
        </a>
        <div class="text-white font-bold mx-2">
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
      <div class="web-home-content assets-card py-5 m-0">
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
            <div class="d-flex btn align-items-center item-transfer" data-toggle="modal" data-target="#transferTo">
              <div class="d-flex">
                <div class="country-flag" id="countryFlag"
                  style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/eg.svg);">
                </div>
                <div class="transfer__country_name" id="countryName">اختر البلد</div>
                <div class="country-pound" id="countryPound">العملة</div>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#929aa5" class="bi bi-chevron-left"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
              </svg>
            </div>


            <div class="mb-2">الطريقة</div>
            <a class="method item-transfer d-flex" href=""  data-toggle="modal" data-target="#method-transfer">
              <div class="d-flex" style="align-items: center;">
                <div class=" method-icon"  style="background-image: url(https://bin.bnbstatic.com/static/images/mp-remittance-ui/ewallet.svg);">
                </div>
                <div class="mr-2">
                    <h6 class="font-bold">Vodafonecash</h6>
                  <span>إلى حسابك الخاص فقط</span>
                </div>
              </div>
              <div class="method-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#a6abb2" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                </svg>
              </div>
            </a>
              <a class="method item-transfer d-flex"  href=""  data-toggle="modal" data-target="#method-transfer">
                <div class="d-flex" style="align-items: center;">
                  <div class=" method-icon"  style="background-image: url(https://bin.bnbstatic.com/static/images/mp-remittance-ui/bank-light.svg);">
                  </div>
                  <div class="mr-2">
                      <h6 class="font-bold">BANK</h6>
                    <span>إلى حسابك الخاص فقط</span>
                  </div>
                </div>
                <div class="method-arrow">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#a6abb2" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                  </svg>
                </div>
              </a>
            </div>

            <div class="tutorial">
                <img src="money-transfer.png" class="money-img m-auto d-block" width="100px">
                <p class="text-center title">البرنامج التعليمي لإرسال النقود</p>
                  <div class="tutorial-text"><span class="number">1</span> <p>حدد طريقة التحويل وحدد حسابك </p></div>
                  <div class="tutorial-text"><span class="number">2</span> <p>حدد العملة الرقمية التي ترغب في إرسالها وأدخِل المبلغ</p></div>
                  <div class="tutorial-text"><span class="number">3</span><p>انتظر وصول النقود </p></div>
           
            </div>
          </div>
   
        </div>

      </div>
    </div>


    <div class="modal slide-bottom" id="transferTo" tabindex="-1" aria-labelledby="staticBackdropLabel"
      aria-hidden="true">
      <div class="modal-dialog assets-card container"> <div class="d-flex align-items-center justify-content-between pb-2">
          <strong>تحويل إلى</strong>
          <div class="close" data-dismiss="modal" aria-label="Close">
            <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg" width="20"
              height="20">
              <path
                d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z"
                fill="currentColor"></path>
            </svg>
          </div>
        </div>


        <div class="modal-content  ">
          <div class="select-country">
            <div class="search-country form-group d-flex">
              <input type="text" class="">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#b7bdc6" class="bi bi-search"
                viewBox="0 0 16 16">
                <path
                  d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
              </svg>
            </div>

            <div class="country-list web-country-list">
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/eg.svg);">
                  </div>
                  <div class="select-name">مصر</div>
                  <div class="countryPound">EGP</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ua.svg)">
                  </div>
                  <div class="select-name">أوكرانيا</div>
                  <div class="countryPound">UAH</div>
                </div>
                <div class="undefined icon-checkmark-f"
                  style="color: var(--color-primaryHover); font-size: 20px; display: inline;"></div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/th.svg)">
                  </div>
                  <div class="select-name">تايلند</div>
                  <div class="countryPound">THB</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/id.svg)">
                  </div>
                  <div class="select-name">إندونيسيا</div>
                  <div class="countryPound">IDR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ng.svg)">
                  </div>
                  <div class="select-name">نيجيريا</div>
                  <div class="countryPound">NGN</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/sa.svg)">
                  </div>
                  <div class="select-name">المملكة العربية السعودية</div>
                  <div class="countryPound">SAR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ae.svg)">
                  </div>
                  <div class="select-name">الإمارات العربية المتحدة</div>
                  <div class="countryPound">AED</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/lk.svg)">
                  </div>
                  <div class="select-name">سريلانكا</div>
                  <div class="countryPound">LKR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/tw.svg)">
                  </div>
                  <div class="select-name">تايوان</div>
                  <div class="countryPound">TWD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ve.svg)">
                  </div>
                  <div class="select-name">فنزويلا</div>
                  <div class="countryPound">VES</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/kz.svg)">
                  </div>
                  <div class="select-name">كازاخستان</div>
                  <div class="countryPound">KZT</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/tr.svg)">
                  </div>
                  <div class="select-name">تركيا</div>
                  <div class="countryPound">TRY</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/in.svg)">
                  </div>
                  <div class="select-name">الهند</div>
                  <div class="countryPound">INR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/vn.svg)">
                  </div>
                  <div class="select-name">فيتنام</div>
                  <div class="countryPound">VND</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/pk.svg)">
                  </div>
                  <div class="select-name">باكستان</div>
                  <div class="countryPound">PKR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/bd.svg)">
                  </div>
                  <div class="select-name">بنغلاديش</div>
                  <div class="countryPound">BDT</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/hk.svg)">
                  </div>
                  <div class="select-name">هونغ كونغ</div>
                  <div class="countryPound">HKD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/uz.svg)">
                  </div>
                  <div class="select-name">أوزبكستان</div>
                  <div class="countryPound">UZS</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/pl.svg)">
                  </div>
                  <div class="select-name">بولندا</div>
                  <div class="countryPound">PLN</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/gh.svg)">
                  </div>
                  <div class="select-name">غانا</div>
                  <div class="countryPound">GHS</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ma.svg)">
                  </div>
                  <div class="select-name">المغرب</div>
                  <div class="countryPound">MAD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ge.svg)">
                  </div>
                  <div class="select-name">جورجيا</div>
                  <div class="countryPound">GEL</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ke.svg)">
                  </div>
                  <div class="select-name">كينيا</div>
                  <div class="countryPound">KES</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/es.svg)">
                  </div>
                  <div class="select-name">إسبانيا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ad.svg)">
                  </div>
                  <div class="select-name">أندورا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ro.svg)">
                  </div>
                  <div class="select-name">رومانيا</div>
                  <div class="countryPound">RON</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/dz.svg)">
                  </div>
                  <div class="select-name">الجزائر</div>
                  <div class="countryPound">DZD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/am.svg)">
                  </div>
                  <div class="select-name">أرمينيا</div>
                  <div class="countryPound">AMD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/jp.svg)">
                  </div>
                  <div class="select-name">اليابان</div>
                  <div class="countryPound">JPY</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/mm.svg)">
                  </div>
                  <div class="select-name">ميانمار</div>
                  <div class="countryPound">MMK</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/np.svg)">
                  </div>
                  <div class="select-name">نيبال</div>
                  <div class="countryPound">NPR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ca.svg)">
                  </div>
                  <div class="select-name">كندا</div>
                  <div class="countryPound">CAD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/de.svg)">
                  </div>
                  <div class="select-name">ألمانيا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/tz.svg)">
                  </div>
                  <div class="select-name">تنزانيا</div>
                  <div class="countryPound">TZS</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/kg.svg)">
                  </div>
                  <div class="select-name">قيرغيزستان</div>
                  <div class="countryPound">KGS</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/co.svg)">
                  </div>
                  <div class="select-name">كولومبيا</div>
                  <div class="countryPound">COP</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ar.svg)">
                  </div>
                  <div class="select-name">الأرجنتين</div>
                  <div class="countryPound">ARS</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/pe.svg)">
                  </div>
                  <div class="select-name">البيرو</div>
                  <div class="countryPound">PEN</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/cl.svg)">
                  </div>
                  <div class="select-name">شيلي</div>
                  <div class="countryPound">CLP</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/mx.svg)">
                  </div>
                  <div class="select-name">المكسيك</div>
                  <div class="countryPound">MXN</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ec.svg)">
                  </div>
                  <div class="select-name">الإكوادور</div>
                  <div class="countryPound">USD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/pa.svg)">
                  </div>
                  <div class="select-name">بنما</div>
                  <div class="countryPound">PAB</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/do.svg)">
                  </div>
                  <div class="select-name">جمهورية الدومينيكان</div>
                  <div class="countryPound">DOP</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/gt.svg)">
                  </div>
                  <div class="select-name">غواتيمالا</div>
                  <div class="countryPound">GTQ</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/kw.svg)">
                  </div>
                  <div class="select-name">الكويت</div>
                  <div class="countryPound">KWD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/bo.svg)">
                  </div>
                  <div class="select-name">بوليفيا</div>
                  <div class="countryPound">BOB</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/om.svg)">
                  </div>
                  <div class="select-name">عمان</div>
                  <div class="countryPound">OMR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/kh.svg)">
                  </div>
                  <div class="select-name">كمبوديا</div>
                  <div class="countryPound">KHR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ug.svg)">
                  </div>
                  <div class="select-name">أوغندا</div>
                  <div class="countryPound">UGX</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/cz.svg)">
                  </div>
                  <div class="select-name">جمهورية التشيك</div>
                  <div class="countryPound">CZK</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/bf.svg)">
                  </div>
                  <div class="select-name">بوركينا فاسو</div>
                  <div class="countryPound">XOF</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/it.svg)">
                  </div>
                  <div class="select-name">إيطاليا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/cm.svg)">
                  </div>
                  <div class="select-name">الكاميرون</div>
                  <div class="countryPound">XAF</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/za.svg)">
                  </div>
                  <div class="select-name">جنوب أفريقيا</div>
                  <div class="countryPound">ZAR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/py.svg)">
                  </div>
                  <div class="select-name">باراغواي</div>
                  <div class="countryPound">PYG</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/tm.svg)">
                  </div>
                  <div class="select-name">تركمانستان</div>
                  <div class="countryPound">TMT</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/jo.svg)">
                  </div>
                  <div class="select-name">الأردن</div>
                  <div class="countryPound">JOD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/la.svg)">
                  </div>
                  <div class="select-name">لاوس</div>
                  <div class="countryPound">LAK</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/bj.svg)">
                  </div>
                  <div class="select-name">بنين</div>
                  <div class="countryPound">XOF</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/pt.svg)">
                  </div>
                  <div class="select-name">البرتغال</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/mn.svg)">
                  </div>
                  <div class="select-name">منغوليا</div>
                  <div class="countryPound">MNT</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ee.svg)">
                  </div>
                  <div class="select-name">إستونيا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ci.svg)">
                  </div>
                  <div class="select-name">ساحل العاج</div>
                  <div class="countryPound">XOF</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/et.svg)">
                  </div>
                  <div class="select-name">إثيوبيا</div>
                  <div class="countryPound">ETB</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/md.svg)">
                  </div>
                  <div class="select-name">مولدوفا</div>
                  <div class="countryPound">MDL</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/bh.svg)">
                  </div>
                  <div class="select-name">البحرين</div>
                  <div class="countryPound">BHD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/fi.svg)">
                  </div>
                  <div class="select-name">فنلندا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/qa.svg)">
                  </div>
                  <div class="select-name">قطر</div>
                  <div class="countryPound">QAR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/uy.svg)">
                  </div>
                  <div class="select-name">أوروغواي</div>
                  <div class="countryPound">UYU</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/tn.svg)">
                  </div>
                  <div class="select-name">تونس</div>
                  <div class="countryPound">TND</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/az.svg)">
                  </div>
                  <div class="select-name">أذربيجان</div>
                  <div class="countryPound">AZN</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/sn.svg)">
                  </div>
                  <div class="select-name">السنغال</div>
                  <div class="countryPound">XOF</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/lt.svg)">
                  </div>
                  <div class="select-name">ليتوانيا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/at.svg)">
                  </div>
                  <div class="select-name">النمسا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/sk.svg)">
                  </div>
                  <div class="select-name">سلوفاكيا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/mo.svg)">
                  </div>
                  <div class="select-name">ماكاو</div>
                  <div class="countryPound">MOP</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/hu.svg)">
                  </div>
                  <div class="select-name">المجر</div>
                  <div class="countryPound">HUF</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/lv.svg)">
                  </div>
                  <div class="select-name">لاتفيا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/be.svg)">
                  </div>
                  <div class="select-name">بلجيكا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/hn.svg)">
                  </div>
                  <div class="select-name">هندوراس</div>
                  <div class="countryPound">HNL</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/lb.svg)">
                  </div>
                  <div class="select-name">لبنان</div>
                  <div class="countryPound">LBP</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/tt.svg)">
                  </div>
                  <div class="select-name">ترينيداد وتوباغو</div>
                  <div class="countryPound">TTD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/af.svg)">
                  </div>
                  <div class="select-name">أفغانستان</div>
                  <div class="countryPound">AFN</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/nz.svg)">
                  </div>
                  <div class="select-name">نيوزيلندا</div>
                  <div class="countryPound">NZD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/no.svg)">
                  </div>
                  <div class="select-name">النرويج</div>
                  <div class="countryPound">NOK</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ml.svg)">
                  </div>
                  <div class="select-name">مالي</div>
                  <div class="countryPound">XOF</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ie.svg)">
                  </div>
                  <div class="select-name">أيرلندا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ni.svg)">
                  </div>
                  <div class="select-name">نيكاراغوا</div>
                  <div class="countryPound">NIO</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/rs.svg)">
                  </div>
                  <div class="select-name">صربيا</div>
                  <div class="countryPound">RSD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/tg.svg)">
                  </div>
                  <div class="select-name">توغو</div>
                  <div class="countryPound">XOF</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/me.svg)">
                  </div>
                  <div class="select-name">مونتينيغرو</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/iq.svg)">
                  </div>
                  <div class="select-name">العراق</div>
                  <div class="countryPound">IQD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/gr.svg)">
                  </div>
                  <div class="select-name">اليونان</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/sd.svg)">
                  </div>
                  <div class="select-name">السودان</div>
                  <div class="countryPound">SDG</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/dk.svg)">
                  </div>
                  <div class="select-name">الدنمارك</div>
                  <div class="countryPound">DKK</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/lr.svg)">
                  </div>
                  <div class="select-name">ليبريا</div>
                  <div class="countryPound">LRD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/si.svg)">
                  </div>
                  <div class="select-name">سلوفينيا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ly.svg)">
                  </div>
                  <div class="select-name">ليبيا</div>
                  <div class="countryPound">LYD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ye.svg)">
                  </div>
                  <div class="select-name">اليمن</div>
                  <div class="countryPound">YER</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/lu.svg)">
                  </div>
                  <div class="select-name">لوكسمبورغ</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/mt.svg)">
                  </div>
                  <div class="select-name">مالطا</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/mc.svg)">
                  </div>
                  <div class="select-name">موناكو</div>
                  <div class="countryPound">EUR</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ga.svg)">
                  </div>
                  <div class="select-name">الغابون</div>
                  <div class="countryPound">XAF</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/mw.svg)">
                  </div>
                  <div class="select-name">ملاوي</div>
                  <div class="countryPound">MWK</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/zm.svg)">
                  </div>
                  <div class="select-name">زامبيا</div>
                  <div class="countryPound">ZMW</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/ao.svg)">
                  </div>
                  <div class="select-name">أنغولا</div>
                  <div class="countryPound">AOA</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/io.svg)">
                  </div>
                  <div class="select-name">إقليم المحيط الهندي البريطاني</div>
                  <div class="countryPound">GBP</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/zw.svg)">
                  </div>
                  <div class="select-name">زيمبابوي</div>
                  <div class="countryPound">ZWD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/cg.svg)">
                  </div>
                  <div class="select-name">الكونغو</div>
                  <div class="countryPound">CDF</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/td.svg)">
                  </div>
                  <div class="select-name">تشاد</div>
                  <div class="countryPound">XAF</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/bz.svg)">
                  </div>
                  <div class="select-name">بليز</div>
                  <div class="countryPound">BZD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/is.svg)">
                  </div>
                  <div class="select-name">أيسلندا</div>
                  <div class="countryPound">ISK</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/mz.svg)">
                  </div>
                  <div class="select-name">موزمبيق</div>
                  <div class="countryPound">MZN</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/na.svg)">
                  </div>
                  <div class="select-name">ناميبيا</div>
                  <div class="countryPound">NAD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/bw.svg)">
                  </div>
                  <div class="select-name">بوتسوانا</div>
                  <div class="countryPound">BWP</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/cr.svg)">
                  </div>
                  <div class="select-name">كوستاريكا</div>
                  <div class="countryPound">CRC</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/illustrations/flags-svg/sv.svg)">
                  </div>
                  <div class="select-name">السلفادور</div>
                  <div class="countryPound">USD</div>
                </div>
              </div>
              <div class="d-flex country-item">
                <div class="d-flex" style="align-items: center; flex: 1 1 0%;">
                  <div class="country-flag"
                    style="background-image: url(https://bin.bnbstatic.com/static/images/mp-remittance-ui/global.png)">
                  </div>
                  <div class="select-name">Global</div>
                  <div class="countryPound">USD</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!--method-transfer -->
<div class="modal slide-bottom" id="method-transfer" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog assets-card container">
        <div class="d-flex align-items-center justify-content-between pb-2">
            <strong class="text-center">أختر حسابا</strong>
            <div class="close" data-dismiss="modal" aria-label="Close">
                <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg" width="20" height="20">
                    <path d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <div class="modal-content confirmation-game">
            <form>
                <label>المبلغ المراد ارساله</label>
                <input type="text" class="input-group" />
                <label>أسم المستلم كامل</label>
                <input type="text" class="input-group" />
                <label>رقم هاتفه</label>
                <input type="text" class="input-group" />

                <label> أسم البنك او الصرافة (اختيارى)</label>
                <input type="text" class="input-group" />

                <label> رقم الحساب (اختيارى)</label>
                <input type="text" class="input-group" />

                <label> QR Code(اختيارى)</label>
                <input type="file" class="input-group" />

                <label> رقم المرجع</label>
                <input type="text" class="input-group" />

                <label> ملاحظه</label>
                <input type="text" class="input-group" />

              <label> ابيان</label>
                <input type="text" class="input-group" />
                <a class="btn follow-btn mt-5" href=""  data-toggle="modal" data-target="#sendCash">موافق</a>
            </form>
        </div>
    </div>
</div>

<!--confirmation-transfer -->
<div class="modal slide-bottom" id="sendCash" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog assets-card container">
        <div class="d-flex align-items-center justify-content-between pb-2">
            <strong class="text-center">تأكيد ارسال الحواله</strong>
            <div class="close" data-dismiss="modal" aria-label="Close">
                <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg" width="20" height="20">
                    <path d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <div class="modal-content confirmation-game">
            <form>
               <label class="mb-2">الصراف</label>
                <input type="text" class="input-group" readonly value="استلام من التوكيل  "/>
             <label class="mb-2">المبلغ</label>
                <input type="text" class="input-group" readonly value="ا10 ريال  "/>
             <label class="mb-2">أسم المستلم</label>
                <input type="text" class="input-group" readonly value="اسم المستلم  "/>
             <label class="mb-2">رقم المستلم</label>
                <input type="text" class="input-group" readonly value="123456789  "/>
             <label class="mb-2">ملاحظة</label>
                <input type="text" class="input-group" readonly value="مصاريف شخصية  "/>
           
                
                   <div class="group-btn mt-3">
                <a class="btn follow-btn mt-5" href=""  data-toggle="modal" data-target="#confirm-operation">تأكيد العملية</a>
                   <a class="btn follow-btn mt-5"  data-dismiss="modal" aria-label="Close">رجوع </a>
                   </div>
            </form>
        </div>
    </div>
</div>

    <!--confirmation operation operationform-->
    <div class="modal slide-bottom" id="confirm-operation" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog assets-card container"> <div class="d-flex align-items-center justify-content-between pb-2">
        <strong class="text-center">ايصال ارسال حوالة</strong>
        <div class="close" data-dismiss="modal" aria-label="Close">
          <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg" width="20"
            height="20">
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
              <span>12345678</span>
            </li>
            <li>
              <span class="color">المبلغ</span>
              <span>100</span>
            </li>
            <li>
              <span class="color">رسوم التحويل</span>
              <span>1 دولار</span>
            </li>
            <li>
              <span class="color">رقم المستلم</span>
              <span> 12345678</span>
            </li>
            <li>
              <span class="color">أسم المستلم</span>
              <span> الأسم</span>
            </li>
            <li>
              <span class="color">تاريخ الحوالة</span>
              <span>12/23/2023</span>
            </li>
            <li>
              <span class="color">الغرض</span>
              <span> شخصى</span>
            </li>
          </ul>
          <div class="group-btn">
            <a href="#" class="buy btn back-color">تأكيد</a>
          </div>
      </div>
    </div>
  </div>
         
@endsection
