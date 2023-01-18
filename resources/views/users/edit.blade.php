<x-layout>
    <div class="card w-50 mt-5 mx-auto">
        <div class="card-header text-center">
            <strong>Edit User</strong>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{ $user->username }}" @error('username') is-invalid @enderror autofocus required>
                </div>
    
                <div class="form-group mb-4">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" @error('email') is-invalid @enderror required>
                </div>
    
                <div class="form-group mb-4">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group mb-4">
                    <label>Role</label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" value="Supervisor" {{ ($user->role == "Supervisor") ? "checked" : ""}} required>
                        <label class="form-check-label" for="role">
                          Supervisor
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" value="Admin" {{ ($user->role == "Admin") ? "checked" : ""}} required>
                        <label class="form-check-label" for="role">
                            Admin
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" value="Vendor" {{ ($user->role == "Vendor") ? "checked" : ""}} required>
                        <label class="form-check-label" for="role">
                          Vendor
                        </label>
                    </div>
                </div>
    
                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/users" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>