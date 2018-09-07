<?php $__env->startSection('content'); ?>

<div class="container-fluid messages-index-page">

    <div class="container">
    
        <ul class="latest-messages-list">
        
        

            <?php $__currentLoopData = $latest_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if(App\User::find(auth()->user()->id)->hasMessage($message['id'])): ?>

            <a href="/messages/show/<?php echo e($message['reciever_id']); ?>">

                <li>
                
                    <div class="card">

                        <div class="row">

                            <div class="col-sm-2">
                            
                                <h5><?php echo e($message['reciever_username']); ?></h5>
                            
                            </div>

                            <div class="col-sm-10">
                            
                                <p><?php echo e($message['body']); ?></p>
                            
                            </div>
                        
                        </div>

                    </div>
                
                </li>
            
            </a>

            <?php elseif(App\User::find( $message['sender_id'] )->hasMessage($message['id']) ): ?>


            <a href="/messages/show/<?php echo e($message['sender_id']); ?>">

                <li>
                
                    <div class="card">

                        <div class="row">

                            <div class="col-sm-2">
                            
                                <h5><?php echo e($message['sender_username']); ?></h5>
                            
                            </div>

                            <div class="col-sm-10">
                            
                                <p><?php echo e($message['body']); ?></p>
                            
                            </div>
                        
                        </div>

                    </div>
                
                </li>

            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        

        </ul>
    
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>