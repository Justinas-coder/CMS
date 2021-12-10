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
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control">
                    
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="select"  id="status" name="status" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password-confirmation">Confirm Password</label>
                    <input type="password" id="password-confirmation" name="password_confirmation" class="form-control">
                </div>

               

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>



    @endsection

</x-admin-master>
