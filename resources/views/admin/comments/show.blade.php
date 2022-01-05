<x-admin-master>

    @section('content')

    @if($comments)

    <h1>Comment</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($comments as $comment )

            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->body}}</td>
                <td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
                <td>

                    @if($comment->is_active == 1)

                    <form action="{{route('comment.update', $comment->id)}}" method="post">
                        @method ('PUT')
                        @csrf
                        <input type="hidden" name="is_active" value="0">
                        <button type="submit" class="btn btn-success">Un-approved</button>
                    </form>

                    @else

                    <form action="{{route('comment.update', $comment->id)}}" method="post">
                        @method ('PUT')
                        @csrf
                        <input type="hidden" name="is_active" value="1">
                        <button type="submit" class="btn btn-primary">Approved</button>
                    </form>

                    @endif

                </td>
                <td>

                    <form method="post" action="{{route('comment.destroy', $comment->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>

            @endforeach

        </tbody>
    </table>

    @else

    <h1 class="text-center">No Comments</h1>

    @endif


    @endsection

</x-admin-master>
