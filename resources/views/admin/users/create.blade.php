<x-admin-master>

    @section('content')

    <h1>Create User</h1>

    @if(session('message'))

    <div class="alert alert-success">{{Session::get('message')}}</div>

    @endif

    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">

        @csrf


        <div class="form-group">
            <input type="file" name="avatar">
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Enter Userame" class="form-control">
            <div class="alert-danger">{{ $errors->first('username') }}</div>

        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter Name" class="form-control ">
            <div class="alert-danger">{{ $errors->first('name') }}</div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter Email" class="form-control">
            <div class="alert-danger">{{ $errors->first('email') }}</div>

        </div>

        <div class="form-group">
            <label for="status">Status</label>
            {{-- <input type="text"  id="status" name="status" placeholder="Select Status" class="form-control "> --}}
            <select type="text" class="form-control" name="status" id="status">
                <option value="not_active">Not Active</option>
                <option value="active">Active</option>
            </select>
            <div class="alert-danger">{{ $errors->first('status') }}</div>


        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password-confirmation">Confirm Password</label>
            <input type="password" id="password-confirmation" name="password_confirmation"
                placeholder="Confirm Password" class="form-control">
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>




    @endsection

</x-admin-master>
