<div  style="margin: 10px" >
    @if (session('message'))
        <p class="bg-green-500 rounded text-white p-3">{{session('message')}}</p>
    @endif
    <form wire:submit='createNewUser'>
        <input class="block rounded border border-gray-100 px-3 py-1 mb-2" wire:model='name' type="text" placeholder="name">
        @error('name')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <input class="block rounded border border-gray-100 px-3 py-1 mb-2" wire:model='email' type="email" placeholder="email">
        @error('email')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <input class="block rounded border border-gray-100 px-3 py-1 mb-2" wire:model='password' type="password" placeholder="password">
        @error('password')
            <p class="text-red-500">{{$message}}</p>
        @enderror

        <button class="block rounded text-white bg-gray-400 px-3 py-1 mb-2">Create</button>
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
