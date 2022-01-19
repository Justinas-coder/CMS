<x-home-master>
    @section('content')


    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">{{$post->title}}</h2>
        </div>
        <img class="card-img-top" src="{{$post->post_image}}" alt="">
        <div class="card-body">
            <p class="card-text">{{Str::limit($post->body, '50', '....')}}</p>
            <a href="{{route('post', $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Posted on {{$post->created_at->diffForHumans()}} by
            <a href="#">{{$post->user->name}}</a>
        </div>

        @if(session('comment_message'))

        <div class="alert alert-success">{{Session::get('comment_message')}}</div>

        @endif

        <!-- Blog Comments -->

        @if (Auth::check())

        <!-- Comments Form -->
        <div class="well">

            <h4>Leave a Comment:</h4>

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

        @endif
        <hr>

        <!-- Posted Comments -->

        @if(count($comments) > 0)

        @foreach ($comments as $comment)


        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img height="64" class="media-object" src="{{Auth::user()->gravatar}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->user->username}}
                    <small>{{$comment->created_at}}</small>
                </h4>
                {{$comment->body}}

                @foreach ($comment->comments as $comment_replay)

                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="54" class="media-object" src="{{$comment_replay->user->avatar_path}}" alt="">
                    </a>
                    <h4 class="media-heading">{{$comment_replay->user->username}}
                        <small>{{$comment_replay->created_at}}</small>
                    </h4>

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

        @endif


    </div>


    @endsection

</x-home-master>
