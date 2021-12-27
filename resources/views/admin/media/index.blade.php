<x-admin-master>

    @section('content')

    <h1>Media</h1>

    @if(session('message'))

    <div class="alert alert-success">{{Session::get('message')}}</div>

    @endif

    @if($images)

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Created</th>
                <th>Delete</th>
            </tr>
        </thead>

        @foreach ($images as $image )

        <tbody>
            <tr>

                <td>
                    <img src="{{ $image['path'] }}" alt="">
                </td>
                <td>{{ $image['created_at'] }}</td>
                <td>
                    <form method="post" action="{{route('media.destroy', $image['path'])}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>

    @endif


    @endsection

</x-admin-master>
