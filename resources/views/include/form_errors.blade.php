{{--@if(count($errors) > 0)--}}
{{--    <div class="alert alert-danger">--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{$error}}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}
@if(count($errors) > 0)
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>

</div>
@endif

@section('footer')
    <script>
        $('div.alert').delay(3000).slideUp(300);
    </script>
@stop




