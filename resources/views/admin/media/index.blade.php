<x-admin-master>

    @section('content')

    <h1>Media</h1>

    @if(session('image-deleted'))

    <div class="alert alert-success">{{Session::get('image-deleted')}}</div>

    @endif

    @if($images)

    <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        <img src="{{ $image['public_path'] }}" alt="">
                    </td>
                    <td>{{ $image['created_at'] }}</td>
                    <td>
                        <form method="post" action="{{route('media.destroy')}}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="path" value="{{ $image['storage_path'] }}" />
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>

    </div>

    @endif


    @endsection

</x-admin-master>
