<div class="container-fluid"> 
    <button class="reply" id="<?php echo e($tweet->id); ?>">reply</button>

    <div style="display:none;" id="reply-form-container<?php echo e($tweet->id); ?>">

        <form action="#">
        
            <input id="reply-content" type="text" placeholder="whats up...">

            <button id="<?php echo e($tweet->id); ?>" class="btn btn-primary reply-btn">reply</button>

        </form>

    </div>
</div>

