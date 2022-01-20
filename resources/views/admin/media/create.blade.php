<x-admin-master>

    @section('content')

        <h1>Upload Media</h1>

        @if(session('message'))

    <div class="alert alert-success">{{Session::get('message')}}</div>    

    @endif

        <form action="{{route('media.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    @endsection


    
</x-admin-master>
