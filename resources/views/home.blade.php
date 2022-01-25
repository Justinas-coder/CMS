<x-home-master>
    @section('content')


    <h1 class="my-4">CONTENT PAGE
    </h1>

    <!-- Blog Post -->

    @foreach($posts as $post)

    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">{{$post->title}}</h2>
        </div>
        <img class="card-img-top" src="{{$post->post_image}}" alt="">
        <div class="card-body">
            <p class="card-text">{{Str::limit($post->body, '50', '....')}}</p>
            <a href="{{route('home.post', $post->slug)}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Posted on {{$post->created_at->diffForHumans()}} by
            <a href="#">{{$post->user->name}}</a>
        </div>

        <!-- Blog Comments -->

        <!-- Comments Form -->
        <div class="well">
            <h6>Leave a Comment:</h6>

            @if(session('comment_message'))

            <div class="alert alert-success">{{Session::get('comment_message')}}</div>

            @endif


            <form method="post" action="{{ route('comment.store') }}">

                <input type="hidden" name="post_id" value="{{$post->id}}">

                <div class="form-group">
                    @csrf
                    <label class="label">Body: </label>
                    <input type="text" name="title" class="form-control" required />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Create post" />
                </div>
            </form>

        </div>

        <hr>

        <!-- Posted Comments -->

        @foreach ($post->comments as $comment)

        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img height="64" class="media-object" src="{{$comment->user->avatar_path}}" alt="">
            </a>
            <div class="media-body">
                <h6 class="media-heading">{{$comment->user->username}}
                    <small>{{$comment->created_at}}</small>
                </h6>
                {{$comment->body}}

                @foreach ($comment->comments as $comment_replay)

                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="54" class="media-object" src="{{$comment_replay->user->avatar_path}}" alt="">
                    </a>
                    <h6 class="media-heading">{{$comment_replay->user->username}}
                        <small>{{$comment_replay->created_at}}</small>
                    </h6>

                </div>

                {{$comment_replay->body}}

                @endforeach

                <!-- Nested Comment -->

                <form method="post" action="{{ route('comment.store') }}">

                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                    <input type="hidden" name="post_id" value="{{$post->id}}">

                    <div class="form-group">
                        @csrf
                        <label class="label">Body: </label>
                        <input type="text" name="title" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Reply" />
                    </div>
                </form>
                <!-- End Nested Comment -->

            </div>
        </div>
              
        @endforeach

    </div>

    @endforeach

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul>


    @endsection

</x-home-master>
