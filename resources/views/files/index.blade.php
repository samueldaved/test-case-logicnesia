<x-layout>
    <div class="container align-item-center">
        <h1 class="mt-3 text-center">Files List</h1>
        @if(count($files) < 1)
          <div class="alert alert-danger d-flex justify-content-center mt-3 mb-3" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div>No file found.</div>
          </div>                                      
        @else

          @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert"></button>
                <strong>{{ $message }}</strong>
            </div>
          @endif

          <table class="table table-bordered table-hover text-center"><br>
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Path</th>
                <th>Quantity</th>
                <th>Date</th>
                @can('is-supervisor')
                  <th>Action</th>
                @endcan
              </tr>
            </thead>
            @foreach($files as $file)
              <tr>
                <td>{{ $file->id }}</td>
                <td>{{ $file->name }}</td>
                <td>{{ $file->path }}</td>
                <td>{{ $file->quantity }}</td>
                <td>{{ $file->created_at->toDateString() }}</td>    
                @cannot('is-admin')
                  <td>
                    <a href="files/{{ $file->id }}/download" class="btn btn-primary">Download</a>
                  </td>
                @endcannot
              </tr>
            @endforeach
          </table>
        @endif 

        @cannot('is-vendor')
          <div class="mt-4 text-center">
            <a href="/files/create" class="btn btn-primary">Upload File</a>
          </div>
        @endcannot
      </div>
</x-layout>