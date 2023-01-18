<x-layout>
    <div class="card w-50 mt-5 mx-auto">
        <div class="card-header text-center">
            <strong>Upload File</strong>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label>Quantity</label>
                    <input type="text" id="quantity" name="quantity" class="form-control" value="{{ @old('quantity') }}" @error('quantity') is-invalid @enderror required>
                </div>

                <div class="form-group mb-4">
                    <label>File</label>
                    <input type="file" class="form-control" name="file" id="file" value="{{ @old('file') }}" @error('file') is-invalid @enderror required>
                </div>


                <div class="form-group text-center mt-4">
                    <input type="submit" class="btn btn-success" value="Save">
                    <a href="/users" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>       
    </div>
</x-layout>