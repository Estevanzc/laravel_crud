@extends('layout/header')
<body>
    <h1>Home</h1>
    <div class="flex justify-center items-center gap-x-2">
        <a href="/keep/insert" class="text-blue-500 border-b-2 border-solid border-[#ffffff] hover:border-blue-500">Inserir</a>
    </div>
    <form action="{{route("keep.insert")}}" method="post">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="border-2 border-solid border-black">
        </div>
        <div>
            <label for="texto">Text</label>
            <textarea name="texto" id="texto" cols="30" rows="10" class="border-2 border-solid border-black"></textarea>
        </div>
        <button type="submit" class="border-2 border-solid border-black">Submit</button>
    </form>
    <p>Your Notes:</p>
    <div class="w-screen flex justify-center flex-col">
        @foreach ($notes as $note)
        <div class="w-1/5 flex justify-center items-center flex-col border-2 border-solid border-black">
            <h2>{{$note->title}}</h2>
            <p>{{$note->texto}}</p>
            <div class="py-2 flex justify-center items-center gap-x-2">
                <a href="/keep/edit" class="py-1 px-5 text-sm font-medium bg-[#f0f0f0] rounded transition-all hover:shadow-2xl">Edit</a>
                <a href="/keep/delete" class="py-1 px-5 text-sm font-medium bg-[#f0f0f0] rounded transition-all hover:shadow-2xl">Delete</a>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>