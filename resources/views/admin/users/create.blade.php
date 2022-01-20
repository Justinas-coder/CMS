<x-admin-master>

    @section('content')

    <h1>Create User</h1>

    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <input type="file" name="avatar">
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Enter Userame" class="form-control"
                value="{{old('username')}}">
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
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password-confirmation">Confirm Password</label>
            <input type="password" id="password-confirmation" name="password_confirmation"
                placeholder="Confirm Password" class="form-control">
        </div>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" id="status" name="status" value="1" class="form-check-input">
                <label for="status" class="form-check-label">Active</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
    @endsection

</x-admin-master>
