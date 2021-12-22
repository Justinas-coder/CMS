<x-admin-master>

    @section('content')

        <h1>Media</h1>

        @if($images)

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
            </thead>

            @foreach ($images as $image )
                
            <tbody>
                <tr>
                   
                    <td>
                    <img src="{{ $image['path'] }}" alt="">
                    </td>
                    <td>{{ $image['created_at'] }}</td>
                </tr>

            @endforeach

            </tbody>
        </table>

        @endif


    @endsection

</x-admin-master>