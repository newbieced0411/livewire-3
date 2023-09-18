<div class="p-4 mx-auto bg-white shadow-md rounded-sm border-t-2 border-green-500">
    <h1 class="mb-4 text-xl">
        Create New Account
    </h1>
    <form wire:submit.prevent='create'>
        <div class="flex flex-col gap-y-1 my-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="name..." wire:model.live.debounce.500ms='name'
                class="p-2 border border-gray-400 bg-gray-200 rounded-sm">
            @error('name')
                <span class="text-red-500 text-xs block">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col gap-y-1 my-2">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="email..."
                wire:model.live.debounce.500ms='email' class="p-2 border border-gray-400 bg-gray-200 rounded-sm">
            @error('email')
                <span class="text-red-500 text-xs block">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col gap-y-1 my-2">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" wire:model.live.debounce.500ms='password'
                class="p-2 border border-gray-400 bg-gray-200 rounded-sm">
            @error('password')
                <span class="text-red-500 text-xs block">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col gap-y-1 my-2">
            <label for="image">Profile picture</label>
            <input type="file" name="image" id="image" wire:model='image' accept="image/jpeg, image/png"
                class="p-2 border border-gray-400 bg-gray-200 rounded-sm">
            @error('image')
                <span class="text-red-500 text-xs block">{{ $message }}</span>
            @enderror

            <div wire:loading wire:target='image'>
                <span class="text-green-500">Uploading...</span>
            </div>

            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" class="rounded w-24 h-24 mt-5 block">
            @endif
        </div>

        <div class="w-full my-2">
            <button type="submit" class="w-full text-center p-2 text-white bg-blue-500"
            wire:loading.class.remove='p-2'>
                <span wire:loading.remove>Register</span>

                <span wire:loading.delay.longest wire:target='create'
                    wire:loading.class="w-full inline-flex justify-center items-center px-4 py-2 font-semibold leading-6 text-sm shadow text-white bg-blue-500 hover:bg-blue-400 transition ease-in-out duration-150 cursor-not-allowed">
                    <svg wire:loading.delay class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Processing...
                </span>
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('user-created', (event) => {
            toastr.success(event.message);
        });
    });
</script>
