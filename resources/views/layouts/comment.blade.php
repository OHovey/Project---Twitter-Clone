<div class="container-fluid"> 
    <button class="reply" id="{{ $tweet->id }}">reply</button>

    <div style="display:none;" id="reply-form-container{{ $tweet->id }}">

        <form action="#">
        
            <input id="reply-content" type="text" placeholder="whats up...">

            <button id="{{ $tweet->id }}" class="btn btn-primary reply-btn">reply</button>

        </form>

    </div>
</div>

