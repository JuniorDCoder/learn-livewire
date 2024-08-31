<div class="flex justify-center gap-10 m-16" >

    <form wire:submit='createNewUser' class="p-4 bg-white border-t-4 border-green-700 shadow-md">
        @if (session('message'))
            <p class="p-3 text-white bg-green-500 rounded">{{session('message')}}</p>
        @endif
        <label for="" class="block mt-3 text-sm font-medium leading-6 text-gray-900">Name</label>
        <input class="block px-3 py-1 mb-2 border border-gray-100 rounded" wire:model='name' type="text" placeholder="name">
        @error('name')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <label for="" class="block mt-3 text-sm font-medium leading-6 text-gray-900">Email</label>
        <input class="block px-3 py-1 mb-2 border border-gray-100 rounded" wire:model='email' type="email" placeholder="email">
        @error('email')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <label for="" class="block mt-3 text-sm font-medium leading-6 text-gray-900">Password</label>
        <input class="block px-3 py-1 mb-2 border border-gray-100 rounded" wire:model='password' type="password" placeholder="password">
        @error('password')
            <p class="text-red-500">{{$message}}</p>
        @enderror

        <label for="" class="block mt-3 text-sm font-medium leading-6 text-gray-900">Profile Picture</label>
        <input accept="image/png, image/jpeg" class="block px-3 py-1 mb-2 border border-gray-100 rounded" wire:model='image' type="file">
        @error('image')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        @if ($image)
            <img src="{{$image->temporaryUrl()}}" alt="image" class="block w-40 h-40 my-5 rounded">
        @endif
        <div wire:loading wire:target='image'>
            <span class="my-2 text-green-500">Uploading ...</span>
        </div>
        <div wire:loading.delay wire:target='createNewUser'>
            <span class="my-2 text-green-500">Creating ...</span>
        </div>
        <button type="button" @click="$dispatch('user-created')" class="block px-3 py-1 mb-2 text-white bg-teal-700 rounded">Reload List</button>
        <button wire:loading.class='bg-gray-500' wire:loading.attr='disbaled' class="block px-3 py-1 mb-2 text-white bg-green-400 rounded">Create +</button>
    </form>
    <hr>

   @livewire('users-list', ['lazy' => true])
</div>
