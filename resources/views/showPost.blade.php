<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1>
                {{$post->title}}
            </h1>
            <h2>{{$post->content}} </h2>
        @foreach($post->comments as $comment)
                <p>{{$comment->comment}}</p>
            @endforeach
        </div>
    </div>
</div>
