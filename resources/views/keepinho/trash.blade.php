@extends('layout/header')
<body>
    <h1>Trash</h1>
    <div><a href="{{ route("keep.index") }}">home</a></div>
    <p>Your Notes:</p>
    @if (session("success"))
    <div><p>
        {{session("success")}}
    </p></div>
    @endif
    <div class="w-screen flex justify-center flex-col">
        @foreach ($notes as $note)
        <div class="w-1/5 flex justify-center items-center flex-col border-2 border-solid border-black">
            <h2>{{$note->title}}</h2>
            <p>{{$note->texto}}</p>
            <p>{{$note->alert}}</p>
            <div class="py-2 flex justify-center items-center gap-x-2">
                <a href="{{ route("keep.restore", $note->id) }}" class="py-1 px-5 text-sm font-medium bg-[#f0f0f0] rounded transition-all hover:shadow-2xl">Recover</a>
                <a href="{{ route("keep.delete", $note->id) }}" class="py-1 px-5 text-sm font-medium bg-[#f0f0f0] rounded transition-all hover:shadow-2xl">Delete</a>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>