<div wire:poll.visible class="w-1/2">
    <h2 class="m-3 text-3xl font-semibold">Users List <span class="px-2 py-1 text-white bg-green-300 rounded-md">{{$count}}</span></h2>
    <div class="flex justify-between p-3 mx-2 font-semibold border">
        <p>Name</p>
        <p>Email</p>
        <p>Joined</p>
    </div>
    @foreach($users as $user)
        <div class="flex justify-between p-3 m-2 border">
            <p>{{$user->name}}</p>
            <p>{{$user->email}}</p>
            <p>{{$user->created_at->diffForHumans()}}</p>
        </div>
    @endforeach

    {{$users->links()}}
</div>
