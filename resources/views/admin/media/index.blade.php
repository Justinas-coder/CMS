<x-admin-master>

    @section('content')

    <h1>Media</h1>

    @if(session('image-deleted'))



    <div class="alert alert-success">{{Session::get('image-deleted')}}</div>

    @endif

    @if($images)

    <form action="{{route('delete.media')}}" method="post" class="form-inline">
        @method('DELETE')
        @csrf
        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control">
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="options"></th>
                        <th>Name</th>
                        <th>Created</th>                        
                    </tr>
                </thead>

                @foreach ($images as $image )

                <tbody>
                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]"
                                value={{$image['storage_path']}}></td>
                        <td>
                            <img height="50" src="{{ $image['public_path'] }}" alt="">
                        </td>
                        <td>{{ $image['created_at'] }}</td>
                        <td>
                            <input type="hidden" name="image" value={{$image['storage_path']}}>
                            {{-- <div class="form-group">
                                <input type="submit" name="delete_single" value="delete" class="btm btn-danger">
                            </div> --}}
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>

        </div>

    </form>

    @endif




    @endsection

    @section ('scripts')

    <script>
        $(document).ready(function () {

            $('#options').click(function () {

                if (this.checked) {
                    $('.checkBoxes').each(function () {

                        this.checked = true;
                    });
                } else {

                    $('.checkBoxes').each(function () {

                        this.checked = false;
                    });

                }


            });

        });

    </script>

    @endsection

</x-admin-master>
