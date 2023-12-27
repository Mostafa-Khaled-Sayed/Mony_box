<?php $__env->startSection('active4'); ?>
active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
          <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
  <div class="main-content">
    <div class="container">
        
      <div class="web-home-content assets-card  m-0">

        <a data-toggle="modal" data-target="#the-goal" class="btn">اضافة دولة</a>
    <div class="modal slide-bottom" id="the-goal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card">
                <form action="<?php echo e(route('recharge.store')); ?>" enctype="multipart/form-data" method="post" class="dashboard-new card-body">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <h4 class="sub-title col-12 mb-4">اضافة دولة</h4>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">اسم الدولة</label>
                            <input type="text" name="name" class="form-control" required />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">الصورة</label>
                            <input type="file" class="form-control" required name="countryImage" accept="image/*" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">صورة الخلفية</label>
                            <input type="file" class="form-control" required name="countryBackground" accept="image/*" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">التفعيل</label>
                            <select name="status" class="form-control">
                                <option value="1">مفعل</option>
                                <option value="0">غير مفعل</option>
                            </select>
                        </div>
                        <h4 class="sub-title col-12 my-4">اضافة مزود</h4>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">الاسم</label>
                            <div class="d-flex"><input type="text" name="items[]" class="form-control" /> <button id="add" class="btn">+</button></div>
                            <div id="items"></div>
                        </div>

                        <button type="submit" class="btn back-color col-8 my-5">موافق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

           
        </div>
      </div>
    </div>
    <?php $__currentLoopData = $allCountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('packageprice.show',$val->id)); ?>">
<div class="media">
  <img src="<?php echo e(asset('Country/image/BackgroundImage/'.$val->country_image)); ?>" class="mr-3 country_image" alt="...">
  <div class="media-body">
    <h5 class="mt-0"><?php echo e($val->country_name); ?></h5>
</div>
</div>
</a>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monyboxs.com/public_html/resources/views/admin/recharge/dashboard-recharge.blade.php ENDPATH**/ ?>