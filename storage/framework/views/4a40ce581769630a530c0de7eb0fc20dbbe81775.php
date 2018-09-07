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

                <?php $__currentLoopData = $tweets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tweet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if(! $tweet->retweet): ?>

                        <div class="container tweet">

                            <div style="display: none;" class="container retweet-form<?php echo e($tweet->id); ?>" id="<?php echo e($tweet->id); ?>">
                                
                                <div class="form-group">
                                    
                                    <textarea class="form-control" id="retweet_text<?php echo e($tweet->id); ?>"></textarea>

                                    <button id="<?php echo e($tweet->id); ?>" type="submit" class="btn btn-primary confirm-retweet">retweet</button>

                                </div>

                            </div>

                            <h6><?php echo e($tweet->get_tweet_username()); ?> <small>- <?php echo e($tweet->created_at->toFormattedDateString()); ?></small></h6>

                            <p><?php echo e($tweet->body); ?></p>

                            <?php if($tweet->user_id != auth()->user()->id): ?>

                                <button class="select-retweet" id="<?php echo e($tweet->id); ?>">retweet</button>

                            <?php endif; ?>

                        </div>

                    <?php else: ?> 

                        <?php if($tweet->retweeted_by_id == auth()->user()->id): ?>

                            <div class="container-fluid">

                                <small><a href="/users/<?php echo e($tweet->retweeted_by_id); ?>"></a> You retweeted this <?php echo e($tweet->created_at->diffForHumans()); ?></small>

                                <div class="container tweet">

                                    <h6><?php echo e($tweet->get_tweet_username()); ?> <small>- <?php echo e($tweet->created_at->toFormattedDateString()); ?></small></h6>

                                    <p><?php echo e($tweet->body); ?></p>

                                    <!-- <a href="/tweets/retweet">retweet</a> -->
                                
                                </div>

                            </div>

                        <?php else: ?> 

                            <div class="container-fluid">

                                <small><a href="/users/<?php echo e($tweet->retweeted_by_id); ?>"><?php echo e($tweet->retweeted_by_name); ?></a> retweeted this <?php echo e($tweet->created_at->diffForHumans()); ?></small>

                                <div class="container tweet">

                                    <h6><?php echo e($tweet->get_tweet_username()); ?> <small>- <?php echo e($tweet->created_at->toFormattedDateString()); ?></small></h6>

                                    <p><?php echo e($tweet->body); ?></p>

                                    <!-- <a href="/tweets/retweet">retweet</a> -->
                                
                                </div>

                            </div>

                        <?php endif; ?>

                    <?php endif; ?>

                    <?php echo $__env->make('layouts.comment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php $__currentLoopData = $tweet->comments(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <div class="container-fluid comment-container-div">

                            <ul>
                            
                                <li>

                                    <h6><?php echo e($comment->username); ?></h6>
                                    
                                    <small><?php echo e($comment->body); ?></small>

                                </li>

                            </ul>

                        </div>

                        <?php unset($comment); ?>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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