<x-layout>
    <div class="text-center">
        <h1 class="fw-bold mt-4 mb-4">Profile</h1>
        <p class="mb-4">Username        :       {{ $user->username }}</p>
        <p class="mb-4">Email           :       {{ $user->email }}</p>
        <p class="mb-4">Role            :       {{ $user->role }}</p>
    </div>
</x-layout>