<x-layout>
    <div class="vh-100 container align-items-center justify-content-center">
        <h1 class="text-center mt-12 mb-4">Welcome to management application</h1>

        @cannot('is-vendor')
            <p class="text-center mt-4 mb-4">Click here to view users</p>

            <div class="mt-4 text-center">
                <a href="/users" class="btn btn-primary">View Users</a>
            </div>
        @endcannot

        <p class="text-center mt-4 mb-4">Click here to view files</p>

        <div class="mt-4 text-center">
            <a href="/files" class="btn btn-primary">View Files</a>
        </div>

    </div>
    

</x-layout>