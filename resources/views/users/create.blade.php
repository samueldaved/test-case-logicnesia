<x-layout>
    <div class="card w-50 mt-5 mx-auto">
        <div class="card-header text-center">
            <strong>Create User</strong>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="form-group mb-4">
                    <label>Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{ @old('username') }}" @error('username') is-invalid @enderror autofocus required>
                </div>

                <div class="form-group mb-4">
                    <label>Email</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ @old('email') }}" @error('email') is-invalid @enderror required>
                </div>

                <div class="form-group mb-4">
                    <label>Password</label>
                    <input type="password" id="password" name="password" class="form-control" value="{{ @old('password') }}" @error('password') is-invalid @enderror required>
                </div>

                <div class="form-group mb-4">
                    <label>Role</label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" value="Supervisor" @if(old('role') == 'Supervisor') checked="checked" @endif required>
                        <label class="form-check-label" for="role">
                          Supervisor
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" value="Admin" @if(old('role') == 'Admin') checked="checked" @endif required>
                        <label class="form-check-label" for="role">
                            Admin
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" value="Vendor" @if(old('role') == 'Vendor') checked="checked" @endif required>
                        <label class="form-check-label" for="role">
                          Vendor
                        </label>
                    </div>
                </div>

                <div class="form-group text-center mt-4">
                    <input type="submit" class="btn btn-success" value="Save">
                    <a href="/users" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>