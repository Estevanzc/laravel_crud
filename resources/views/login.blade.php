@extends('layout.page')
@section('head')
<title>Login</title>
@endsection
@section('content')
<div>
    <ul>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
    </ul>
</div>
<form action="{{route("auth.athenticate")}}" method="post">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old("email") }}" class="border-2 border-solid border-black">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="border-2 border-solid border-black">
    </div>
    <button type="submit">Submit</button>
</form>
@endsection
