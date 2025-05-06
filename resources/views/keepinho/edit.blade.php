@extends('layout/header')
<body>
    <h1>Edit Note</h1>
    <form action="{{ route("keep.update") }}" method="note">
        @csrf
        @method("PUT")
        <input type="hidden" name="id" value="{{ $note->id }}">
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $note->title }}" class="border-2 border-solid border-black">
        </div>
        <div>
            <label for="texto">Text</label>
            <textarea name="texto" id="texto" cols="30" rows="10" class="border-2 border-solid border-black">{{ $note->texto }}</textarea>
        </div>
        <button type="submit" class="border-2 border-solid border-black">Submit</button>
    </form>
</body>
</html>