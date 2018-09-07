<?php $__env->startSection('content'); ?>

<div class="container-fluid message-show-page">

    <div class="container messages-container">
    
        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($message->sender_id == auth()->user()->id): ?>

            <div class="container align-right">
                <small>You at <?php echo e($message->created_at->diffForHumans()); ?></small>
                <h6><?php echo e($message->body); ?></h6>
            </div>

            <?php elseif($message->reciever_id == auth()->user()->id): ?>

                <div class="container align-left">
                    <small><?php echo e($message->sender_username); ?> at: <?php echo e($message->created_at->diffForHumans()); ?></small>
                    <h6><?php echo e($message->body); ?></h6>
                </div>

            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    </div>

    <?php echo $__env->make('messages.create_include', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>