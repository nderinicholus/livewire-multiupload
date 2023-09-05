<div>
    @if (session('success'))
        <span class="px-3 py-3 bg-violet-500 text-white">
            {{ session('success') }}
        </span>
    @endif
    <form wire:submit="uploadImages" action="">
        <div class="block flex text-sm text-gray-500">
            <input multiple wire:model="images" accept="image/png, image/jpeg" type="file"
                class="block file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-400">

            <button class="bg-red-500 hover:bg-red-700 py-2 px-4 rounded-full text-white text-sm font-semibold">Upload
                +</button>

                
        </div>

        @error('images')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
    </form>

    <div class="flex flex-row gap-3">
    @if ($images)
        @foreach ($images as $image)
            <img src="{{ $image->temporaryUrl() }}" class="w-40 h-40 py-4">
        @endforeach
    @endif
    </div>
</div>
