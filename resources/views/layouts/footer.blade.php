
<div class="container-fluid">
    @if(Auth::check())
    <small><a href="/logout">Logout</a></small>
    @endif
</div>

    <script type="text/javascript">

$('.reply').on('click', function() {

    var id = this.id;

    $('#reply-form-container' + id).css('display', 'block');

})

$('.reply-btn').on('click', function() {

    var id = this.id;

    $content = $('#reply-content').val();
    comment_div = $('.comment-container-div');

    // alert(comment_div)

    $.ajax({

        type : 'get',

        url : '{{URL::to('comment/store')}}',

        data : {'comment':$content, 'tweet_id': id},

        success : function(data) {

            // alert(data)
            $('.comment-container-div').html(data);

        }

    })

})

</script>

<!--  retweet script -->
<script type="text/javascript">

    $('.select-retweet').on('click', function () {

        var tweet_id = this.id;

        $('.retweet-form' + tweet_id).css('display', 'block');

    });

    $('.confirm-retweet').on('click', function () {

        var tweet_id = this.id;
        var retweet_text = $('#retweet_text' + tweet_id).val();

        $.ajax({

            type : 'get',

            url : '/tweet/retweet',

            data : {'tweet_id' : tweet_id, 'body' : retweet_text},

            success : function(data) {

                location.reload();

            }

        })

    })

</script>

<script type="text/javascript">

    $.ajaxSetup({ headers : { 'csrftoken' : '{{ csrf_token() }}' } })

</script>

</body>
</html>