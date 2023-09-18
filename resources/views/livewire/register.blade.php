@section('page-title')
    {{ $title }}
@endsection

<div class="flex w-2/3 gap-x-6">
    <div class="basis-1/3">
        @include('livewire.user.create')
    </div>
    <div class="basis-2/3">
        {{-- @livewire('user.view', ['lazy' => true]) --}}

        <livewire:user.view lazy />
    </div>

</div>
