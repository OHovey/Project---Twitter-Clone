<?php $__env->startSection('content'); ?>

    <div class="container-fluid login-page">

        <form action="/login" method="post">

        <?php echo e(csrf_field()); ?>


            <div class="form-group">

                <label for="email">Email</label>
                <input type="text" name="email" id="email">

            </div>

            <div class="form-group">

                <label for="password">Password: </label>
                <input type="text" name="password" id="password">

            </div>

            <div class="form-group">

                <button class="btn btn-primary">Login</button>

            </div>

            <?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </form>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>