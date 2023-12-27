<?php $__env->startSection('main'); ?>
    <div class="home-header py-3">
        <div class="container">
            <div class="ad-header d-flex">
                <a class="back-page  font-bold ml-2" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                </a>
                <div class="text-white font-bold">
                    <strong>
                        <span class="mr-1">معرض الألعاب</span></strong>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container">
            <?php $__currentLoopData = $get_games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get_game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="web-home-content assets-card py-2 m-0">
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="game-item" data-toggle="modal" data-target="#game-detalis-<?php echo e($get_game->id); ?>"
                            style="background-image:url(<?php echo e(asset($get_game->background_image)); ?>)">
                            <img src="<?php echo e(asset($get_game->image)); ?>" class="game-img">
                            <span class="game-title">غذى حسابك من هنا</span>
                        </div>

                    </div>
                </div>
                <div class="modal slide-bottom" id="game-detalis-<?php echo e($get_game->id); ?>" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="close" data-dismiss="modal" aria-label="Close">
                            <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="bn-svg"
                                width="20" height="20">
                                <path
                                    d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <div class="game-back d-flex text-center" data-toggle="modal"
                            data-target="#gameDetalis-<?php echo e($get_game->id); ?>">
                            <img src="<?php echo e($get_game->image); ?>" class="game-img">

                        </div>
                        <div class="modal-content">
                            <?php $__currentLoopData = $get_game->offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="sendcash-content ">
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <div class="game-package d-flex" data-toggle="modal"
                                            style="background-image: url(<?php echo e(asset($offer->background_image)); ?>)"
                                            data-target="#gameDetalis-<?php echo e($get_game->id); ?>">
                                            <img src="<?php echo e($offer->image); ?>" class="game-img">
                                            <div>
                                                <h6>شحن <?php echo e($offer->game->title); ?> [<?php echo e($offer->category_name); ?>] - مباشر
                                                </h6>
                                                <p><?php echo e($offer->description); ?></p>
                                                <div class="group-price">
                                                    <span><?php echo e($offer->price); ?> دولار</span>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                        </div>

                        <div class="modal slide-bottom" id="gameDetalis-<?php echo e($get_game->id); ?>" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog assets-card container">
                                <div class="d-flex align-items-center justify-content-between pb-2">
                                    <strong>شحن <?php echo e($offer->game->title); ?> [<?php echo e($offer->category_name); ?>] -- مباشر</strong>
                                    <div class="close" data-dismiss="modal" aria-label="Close">
                                        <svg fill="textThird" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            class="bn-svg" width="20" height="20">
                                            <path
                                                d="M6.697 4.575L4.575 6.697 9.88 12l-5.304 5.303 2.122 2.122L12 14.12l5.303 5.304 2.122-2.122L14.12 12l5.304-5.303-2.122-2.122L12 9.88 6.697 4.575z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="modal-content">
                                    <form class="sendcash-content choose-form">
                                        <input type="text" class="input-group" name="player_id" placeholder="رقم اللاعب">
                                        <div class="group-btn mt-3">
                                            <a class="btn back-color" data-toggle="modal" data-target="#confirmation"
                                                data-dismiss="modal" aria-label="Close"> شراء</a>
                                            <a href="#" class="btn"> الغاء</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
    <!--add new account form-->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>


    <!--confirmation form-->
    <div class="modal slide-bottom" id="confirmation" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog assets-card container">
            <div class="d-flex align-items-center justify-content-between pb-2">
                <strong class="text-center">تأكيد الطلب</strong>
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
                        <span class="color">اللعبة</span>
                        <span>شحن مشادات</span>
                    </li>
                    <li>
                        <span class="color">الفئة</span>
                        <span>شحن ببجى - مباشر</span>
                    </li>
                    <li>
                        <span class="color">السعر</span>
                        <span>1 دولار</span>
                    </li>
                    <li>
                        <span class="color">النسبة</span>
                        <span> 0 %</span>
                    </li>
                    <li>
                        <span class="color">التكلفة</span>
                        <span>560 ريال</span>
                    </li>
                    <li>
                        <span class="color">مبلغ مستلم</span>
                        <span> 22</span>
                    </li>
                </ul>
                <div class="group-btn">
                    <a href="#" class="buy back-color">شراء <i class="fa-solid fa-credit-card"></i></a>
                    <a href="#" class="message">عبر الرسائل <i class="fa-regular fa-message"></i></a>
                    <a href="#" class="cancel">الغاء <i class="fa-regular fa-circle-xmark"></i></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monyboxs.com/public_html/resources/views/web/game/index.blade.php ENDPATH**/ ?>