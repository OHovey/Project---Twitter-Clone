@include('layouts.master')

@section('content')

<div class="container-fluid">

    <div class="container">
    
        <form action="/messages/store/{{ $user_id }}" method="post">
        
            <div class="form-group">
            
                <textarea name="message" id="message" placeholder="Message..." cols="30" rows="10"></textarea>
            
            </div>

        </form>

    </div>

</div>

@endsection