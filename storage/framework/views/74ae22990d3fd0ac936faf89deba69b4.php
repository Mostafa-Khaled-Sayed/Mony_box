


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset("web/login/vendor/bootstrap/css/bootstrap.min.css")); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset("web/login/vendor/animate/animate.css")); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset("web/login/vendor/css-hamburgers/hamburgers.min.css")); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset("web/login/vendor/select2/select2.min.css")); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset("web/login/css/util.css")); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset("web/login/css/main.css")); ?>">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo e(asset("web/login/images/img-01.png")); ?>" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="<?php echo e(route('admin.login')); ?>">
					 <?php echo csrf_field(); ?>
                    <span class="login100-form-title">
						Admin Login
					</span>
                        <?php if($errors->any()): ?>
                <ul class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="text-danger"><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                   <?php endif; ?>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" required name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" required name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="<?php echo e(asset("web/login/vendor/jquery/jquery-3.2.1.min.js")); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset("web/login/vendor/bootstrap/js/popper.js")); ?>"></script>
	<script src="<?php echo e(asset("web/login/vendor/bootstrap/js/bootstrap.min.js")); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset("web/login/vendor/select2/select2.min.js")); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset("web/login/vendor/tilt/tilt.jquery.min.js")); ?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php /**PATH /var/www/html/monyboxs.com/public_html/resources/views/auth/Admin/login.blade.php ENDPATH**/ ?>