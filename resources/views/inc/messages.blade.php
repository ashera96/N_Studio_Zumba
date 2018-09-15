{{-- @if(count($errors) > 0)
    @foreach($errors ->all() as $error)
        <div class ="alert alert-danger" align="center">
            {{$error}}
        </div>
    @endforeach
@endif --}}

@if(Session::has('flash_message'))
    <div class='alert alert-success' align="center">
        {{Session::get('flash-message')}}
    </div>
@endif
