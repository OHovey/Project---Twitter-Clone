<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="container">
    
        <form action="/messages/store/<?php echo e($user_id); ?>" method="post">
        
            <div class="form-group">
            
                <textarea name="message" id="message" placeholder="Message..." cols="30" rows="10"></textarea>
            
            </div>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>