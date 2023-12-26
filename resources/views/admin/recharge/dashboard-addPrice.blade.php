
@extends('admin.layout')
@section('active4')
active
@endsection
@section('main')

          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="main-content">
    <div class="container">
      <div class="web-home-content assets-card  m-0">

{{$companydata->country_name}}الدوله
    
        <form action="{{route('packageprice.store')}}" enctype="multipart/form-data" method="post"   class="dashboard-new">
            @csrf
         <div class="row">
       

           <h4 class="sub-title col-12 my-4">إضافة رصيد </h4>
           <div class="form-group col-md-6">
             <label class="col-form-label"> الأسم</label>
               <input type="text" required name="name" class="form-control">
           </div>
           <div class="form-group col-md-6">
             <label class="col-form-label">المزود</label>
             <select required name="charge"  class="form-control">
             <option selected disabled>اختار مزود من هنا </option>
                 @foreach($companydata->companyIncountry as $value)
               <option value={{$value->id}}>{{$value->name}}</option>

               @endforeach
             </select>
           </div>
           <div class="form-group col-md-6">
             <label class="col-form-label">التفعيل</label>
             <select name="status" class="form-control">
               <option value=1>مفعل</option>
               <option value=0>غير مفعل</option>

             </select>
           </div>
           <div class="form-group col-md-6">
             <label class="col-form-label">الصورة</label>
               <input type="file" name="image" class="form-control" required="" accept="image/*">
           </div>
           <div class="form-group col-md-6">
             <label class="col-form-label">صورة الخلفية</label>
               <input type="file"  class="form-control" required="" name="imagebackground" accept="image/*">
           </div>
           <div class="form-group col-md-6">
             <label class="col-form-label"> الوصف  </label>
               <input name="description" type="text" class="form-control">
           </div>
           <div class="form-group col-md-6">
             <label class="col-form-label"> السعر </label>
               <input name="price" type="text" class="form-control">
           </div>
           <div class="form-group col-md-6">
             <label class="col-form-label"> الصلاحية  </label>
               <input type="text"name="validate"  class="form-control">
           </div>
           <div class="form-group col-md-6">
             <label class="col-form-label"> رمز الرصيد </label>
               <input type="text" name="identified_code" class="form-control">
           </div>
           <div class="form-group col-md-6">
             <label class="col-form-label">  رمز الكود الموحد للربط</label>
               <input name="simble_reacherage" type="text" class="form-control">
           </div>
   
    



         <button  class="btn back-color col-8 my-5">موافق<button>
       </div>
        </form>
     </div>
    </div>
  </div>


  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="js/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/fileup.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
  <script>
    $('.country-item').on('click', function (e) {
      $(this).toggleClass('active').siblings().removeClass('active')
      var countryName = $(this).find('.select-name').text();
      var countryPound = $(this).find('.countryPound').text();
      $('#countryName').text(countryName);
      $('#countryPound').text(countryPound);

    });

    $(document).ready(() => {
      let template = `<div class='item d-flex'><input type="text" name="items[]" class="form-control" placeholder="اضافة مزود أخر" /><button id="remove-input" class="remove btn">X</button></div>`;

      $("#add").on("click", () => {
        $("#items").append(template);
      })
      $("body").on("click", "#remove-input", (e)=>{
        $(e.target).parent("div").remove();
    })
    });
  </script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
@endsection