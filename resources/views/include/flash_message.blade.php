@if(Session::has('comment_message'))

    <div class="alert text-success alert-success">{{session('comment_message')}}</div>
@endif