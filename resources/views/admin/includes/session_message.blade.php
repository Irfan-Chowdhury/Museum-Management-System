{{-- --------- Check in Seesion Message -------- --}}
@if (session()->has('message'))  
    <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        <strong>{{ session('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- This is for testing purpose where use in Category-->
@if (session()->has('message_ERROR'))  
    <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
         <p><strong>{{ session('message_ERROR')}}</strong>   {{ session('message_text')}}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif 
{{-- ---------------- X -------------------- --}}