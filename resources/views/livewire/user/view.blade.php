<div class="w-full p-4 mx-auto bg-white shadow-md rounded-sm border-t-2 border-green-500">
    <table class="w-full">
        <h1 class="mb-2 text-3xl">Users <span
                class="text-white rounded-full bg-green-400 p-1 text-sm">{{ $userCount }}</span></h1>
        <thead>
            <th class="border">No</th>
            <th class="border">Name</th>
            <th class="border">Email</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="p-1 border">
                    <td class="p-1 border">{{ $user->id }}</td>
                    <td class="p-1 border">{{ $user->name }}</td>
                    <td class="p-1 border">{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-2">
        {{ $users->links() }}
    </div>
</div>
