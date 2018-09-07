<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/tweet/retweet?tweet_id=1&body=wellthen">Moments</a>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <a class="nav-link dropdown-toggle"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications</a>
        
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        
          <a class="dropdown-link" href="/notifications/index">All </a>

        </div>

      </div>
      </li>
      <li class="nav-item">
      @if (App\Message::new_message())

        <a class="nav-link" href="/messages">Messages <b>!</b> </a>

      @else 

       <a class="nav-link" href="/messages">Messages</a>
      
      @endif
      </li>
    </ul>
  </div>
  <div class="navbar-collapse float-right">

    <form class="form-inline nav-item" action="/search" method="get" id="search-form">
        <div class="search-box">
        <input name="search" type="text" id="nav-search" class="form-control nav-item">
        <table>
        
            <tbody>
                
            </tbody>

        </table>
        </div>
    </form>

    <a href="/account">
        <img src="" alt="">
    </a>

    <hr>

    <a href="/tweet/create"><button class="btn btn-primary">Tweet</button></a>

  </div>
</nav>

<script type="text/javascript">
 
 $('#nav-search').on('keyup',function(){
  
 $value=$(this).val();
  
 $.ajax({
  
 type : 'get',
  
 url : '{{URL::to('search')}}',
  
 data:{'search':$value},
  
 success:function(data){
  
 $('tbody').html(data);
  
 }
  
 });
  
  
  
 })

 $('#dropdownMenuLink').on('click', function(){
   
   $.ajax({

    type:'get',

    url:'{{URL::to('notification')}}',

    data: '',

    success:function(data) {
      $('.dropdown-menu').html(data);
      // alert('hello there' + data);
    }

   })

 })
  
 </script>

<script type="text/javascript">

  $.ajaxSetup({ headers: {'csrftoken' : '{{ csrf_token() }}'} });

</script>