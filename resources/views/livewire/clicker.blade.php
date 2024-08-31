<div  style="margin: 10px" >
    @if (session('message'))
        <p class="p-3 text-white bg-green-500 rounded">{{session('message')}}</p>
    @endif
    <form wire:submit='createNewUser' class="m-auto border-green-600 boder-2">
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
            <img src="{{$image->temporaryUrl()}}" alt="image" class="block w-20 h-20 my-5 rounded">
        @endif
        <div wire:loading wire:target='image'>
            <span class="my-2 text-green-500">Uploading ...</span>
        </div>
        <button class="block px-3 py-1 mb-2 text-white bg-gray-400 rounded">Create</button>
    </form>
    <hr>

    @foreach($users as $user)
        <div>
            <p>{{$user->name}}</p>
            <p>{{$user->email}}</p>
        </div>
    @endforeach

    {{$users->links('vendor.livewire.test')}}
</div>
