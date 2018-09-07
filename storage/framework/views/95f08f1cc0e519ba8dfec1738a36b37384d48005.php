<?php $__env->startSection('content'); ?>


    <div class="container index-content">

    <div class="row">

        <div class="col-sm-3">

            <div class="profile-info">

                <img id="profile-info-img" src="" alt="">

                <div class="container">

                    <h6>Username: <?php echo e($user->name); ?></h6>

                    <p><strong>Tweets: </strong></p>

                </div>

            </div>

            <div class="trends">

            </div>

        </div>

        <!-- MAIN CONTAIER FOR TWEETS -->

        <div class="col-sm-6">

            <div class="container-fluid">

                <form style="border-radius: 5px; padding: 10px; background-color: lightblue;" action="/tweet/store" method="post">

                    <?php echo e(csrf_field()); ?>


                    <input placeholder="Whats Happening?" type="text" class="form-control" name="body">

                    <button style="float: right; margin: 20px;" type="submit" class="btn btn-primary">Tweet</button>
                </form>

            </div>

            <div class="container-fluid" style="margin-top: 50px;">

                <?php if(! empty($tweets_collection)): ?>

                    <?php $__currentLoopData = $tweets_collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tweet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="card">

                            <h4><?php echo e($tweet->get_tweet_username()); ?></h4>

                            <p><?php echo e($tweet->body); ?></p>

                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php else: ?> 

                    <p>You're all caught up!</p>

                <?php endif; ?>

            </div>

        </div>

        <div class="col-md-3">

            <div class="follow-suggestions">

                <h5>Who to follow:</h5>

                <a href=""><small>Refresh</small></a> <a href="/follow/suggestions"><small>View All</small></a>

            </div>

        </div>

    </div>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>