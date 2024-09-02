<div wire:poll.visible class="w-1/2">

    <h2 class="text-3xl font-semibold">Users List <span class="px-2 py-1 text-white bg-green-300 rounded-md">{{$count}}</span></h2>
    <div class="flex flex-col gap-3 m-2">
        <input type="text" wire:model.live.throttle.400ms='search' placeholder="Search..." class="w-full p-3 border-2 border-gray-300 rounded">
    </div>
    <div class="flex justify-between p-3 mx-2 font-semibold border">
        <p>Name</p>
        <p>Email</p>
        <p>Joined</p>
    </div>
    @foreach($this->users as $user)
        <div class="flex justify-between p-3 m-2 border">
            <p>{{$user->name}}</p>
            <p>{{$user->email}}</p>
            <p>{{$user->created_at->diffForHumans()}}</p>
        </div>
    @endforeach

    {{$this->users->links()}}
</div>
