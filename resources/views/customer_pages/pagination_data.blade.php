@foreach($posts as $post)
    <div>
        <div class="card mt15 shadow-lg">
            <h4 class="card-header mt20" style="color: #fc328a">{{$post->title}}</h4>
            <div class="card-body">
                <div class="card-text ml-4 mr-4" style="color: #343a40">
                    <div class="row mb-4">
                        {{$post->post_body}}
                    </div>
                    @if($post->image)
                        <img src="{{asset('images/posts/' . $post->image)}}" style="max-height: 100%;max-width: 100%;" />
                        <br><br>
                    @endif
                </div>
            </div>
            <div class="card-footer text-muted">
                Posted at : {{$post->updated_at}}
            </div>
        </div>
        <br>
    </div>
    <br>
@endforeach
<h3 style="margin-left: 100px">{!! $posts->links(); !!}</h3>
