<?php $__env->startSection('active1'); ?>
active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

<div width="400px">
    <img src="<?php echo e(asset("IMG/mony.jpg")); ?>" width="100" height"100" class="rounded-circle" alt="mony">
</div>
                                  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monyboxs.com/public_html/resources/views/admin/home.blade.php ENDPATH**/ ?>