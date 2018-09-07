

<div class="container-fluid">

    <div class="container">
        
            <div class="form-group">
            
                <textarea class="form-control" name="message" id="message" placeholder="Message..." cols="30" rows="10"></textarea>
            
            </div>

            <div class="form-group">
            
                <button id="send-message" class="btn btn-primary">Send Message</button>

            </div>

    </div>

</div>

<script type="text/javascript">

    $('#send-message').on('click', function () {

        var message = $('#message').val();

        if (message.length < 1)
        {

        }
        else 
        {

            $.ajax({

                type : 'post',

                url : '/messages/store',

                data : {'message' : message, 'user_id': <?php echo e($user_id); ?>, _token : '<?php echo e(csrf_token()); ?>' },

                success : function(data) {

                    location.reload();

                }

            })

        }   

    })

</script>

<script type="text/javascript">

    $.ajaxSetup({ headers : { 'csrftoken' : '<?php echo e(csrf_token()); ?>' } })

    

</script>

