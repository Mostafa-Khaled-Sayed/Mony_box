
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
اسم الدوله {{$data->country_name}}

<div> {{$data->status}}</div>
<div id="accordion">
    
    <a href="{{route('createPackage',$data->id)}}" class="btn btn-gray">اضافه باقه</a>
    <a href="{{route('createPrice',$data->id)}}" clss="btn btn-yello">اضافه رصيد</a>
    <a data-toggle="modal" data-target="#the-goal" class="btn"> اتعديل اسم او حاله التعفعيل دولة</a>


<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
   حذف الدوله 
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">delete </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                  لا يمكنك حذف الدوله الا عند حذف اي مزود ينتمي لهذه الباقه
      </div>
      <div class="modal-footer">
                 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
        <a type="submit" href="{{route('recharge.destroy',$data->id)}}" class="btn btn-danger">حذف </a>

      </div>
    </div>
  </div>
</div>

    <div class="container">
      <div class="web-home-content assets-card  m-0">
        
        <div class="modal slide-bottom" id="the-goal" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
           <form action="{{route('recharge.update',$data->id)}}" method="post" class="dashboard-new">
              @csrf
              <input type="hidden" value={{$data->id}} name=id >
            <div class="row">
              <h4 class="sub-title col-12 mb-4">تعديل اسم  دولة</h4>
            <div class="form-group col-md-6">
              <label class="col-form-label">اسم الدولة</label>
                  <input type="text" value="{{$data->country_name}}" name="name" class="form-control" required >
              </select>
            </div>
              
              <div class="form-group col-md-6">
                <label class="col-form-label">التفعيل</label>
                <select name="status" class="form-control">
                  <option value=1>مفعل</option>
                  <option value=0>غير مفعل</option>

                </select>
              </div>
              <h4 class="sub-title col-12 my-4">اضافة مزود</h4>
              <div  class="form-group col-md-6">
                <label class="col-form-label">الاسم</label>
                <div class="d-flex">
                  <input type="text" name="items[]" class="form-control"> <button id="add" class="btn"> +</button>
                </div>
                <div id="items"></div>
              </div>
          
   
     

            <button type="submit" class="btn back-color col-8 my-5">موافق<button>
          </div>
           </form>
           </div>
           </div>
           </div>
           
        </div>
      </div>

    
  @foreach($data->companyIncountry as $val)
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$val->id}}" aria-expanded="true" aria-controls="collapseOne">
        {{$val->name}}
        </button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModaldelete{{$val->id}}">
   حذف المزود 
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModaldelete{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">delete </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                  لا يمكنك حذف المزود الا عند حزف جميع  الباقات التابعه لهذا المزود و الرصيد
      </div>
      <div class="modal-footer">
                 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
        <a type="submit" href="{{route('recharge.destroycompany',$val->id)}}" class="btn btn-danger">حذف </a>

      </div>
    </div>
  </div>
</div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$val->id}}">
  تعديل المزود
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">update </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
                <input type="text" name="name" value="{{$val->name}}">
                <input type="hidden" name=id value="{{$val->id}}">
      </div>
      <div class="modal-footer">
                 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
        <button type="submit" class="btn btn-primary">تعديل </button>

      </div>
      </form>
    </div>
  </div>
</div>

      </h5>
    </div>

    <div id="collapseOne{{$val->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <table class="display nowrap " id="tableDashboard" data-page-length='50'>
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">النوع</th>
      <th scope="col">الاسم </th>
      <th scope="col">النوع</th>
      <th scope="col">الوصف</th>
      <th scope="col">السعر</th>
      <th scope="col">الحاله</th>
      <th scope="col">رمز الرصيد</th>
      <th scope="col">الصلاحية</th>
      <th scope="col">رمز الكود الموحد للربط</th>
      <th scope="col">الصوره</th>
      <th scope="col">صوره الخلفيه</th>
      <th scope="col">العمليه</th>
    </tr>
  </thead>
   {{$index=1}}
  <tbody>
     
      @foreach($val->package as $value)
    <tr>
      <th scope="row">{{$index++}}</th>
      <td>باقه</td>
      <td>{{$value->name}}</td>
      <td>{{$value->type}}</td>
      <td>{{$value->description}}</td>
      <td>{{$value->price}}</td>
      <td>{{$value->status}}</td>
      <td>{{$value->samplercharge}}</td>
      <td>{{$value->valite}}</td>
      <td>{{$value->identifiedcharge}}</td>
      <td><img src="{{asset('Country/image/photo/'.$value->photo)}}"></td>
            <td><a class="btn btn-read" href="{{route('package.destroy',$value->id)}}">حذف </a> 
            <a class="btn btn-read" href="{{route('package.edit',$value->id)}}">تعديل </a> 
            </td>
    </tr>
    @endforeach
    @foreach($val->PackagePrice as $values)
    <tr>
      <th scope="row">{{$index++}}</th>
      <td>رصيد</td>
      <td>{{$value->name}}</td>
      <td>...</td>
      <td>{{$value->description}}</td>
      <td>{{$value->price}}</td>
      <td>{{$value->status}}</td>
      <td>{{$value->samplercharge}}</td>
      <td>{{$value->valite}}</td>
      <td>{{$value->identifiedcharge}}</td>
            <td><img src="{{asset('/Country/image/image/'.$value->image)}}"></td>
            <td><img src="{{asset('Country/image/imagebackground/'.$value->imagebackground)}}"></td>
            <td><a class="btn btn-read" href="{{route('packageprice.destroy',$value->id)}}">حذف </a> 
            <a class="btn btn-read" href="{{route('packageprice.edit',$value->id)}}">تعديل </a> 
            </td>
      
    </tr>
    @endforeach
  </tbody>
</table>
      </div>
    </div>
  </div>
  @endforeach

</div>
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
          
      let template = `<div class='item d-flex'><input type="text" name="items[]"  class="form-control" placeholder="اضافة مزود أخر" /><button id="remove-input" class="remove btn">X</button></div>`;

      $("#add").on("click", (e) => {
           e.preventDefault()
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