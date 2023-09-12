@section('page-title')
    Counter
@endsection

<div class="p-4">
    <div>
        <h1>{{ $title }}: <span class="font-bold">{{ count($users) }}</span></h1>
    </div>
    <form wire:submit.prevent='createNewUser' class="my-2">
        <div class="w-full mb-3">
            <input type="text" wire:model='name' name="name" placeholder="name" class="border rounded p-1">
            @error('name')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full mb-3">
            <input type="email" wire:model='email' name="email" placeholder="email" class="border rounded p-1">
            @error('email')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full mb-3">
            <input type="password" wire:model='password' name="password" placeholder="password" class="border rounded p-1">
            @error('password')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
    
        </div>

        <div>
            <button class="p-2 w-full rounded border border-black" type="submit">Click Me</button>
        </div>
    </form>
    <div>
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    </div>
    <div class="">
        {{ $users->links() }}
    </div>
</div>
