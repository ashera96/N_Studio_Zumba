{{--@if(count($errors) > 0)
    @foreach($errors ->all() as $error)
        <div class ="alert alert-danger" align="center">
            {{$error}}
        </div>
    @endforeach
@endif--}}


@if(session('success'))
    <div class="alert alert-success" align="center">
        {{session('success')}}
    </div>
@endif
