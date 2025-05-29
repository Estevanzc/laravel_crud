<div>
    <ul>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
    </ul>
</div>
<div>
    @if (Auth::check())
    <p>Olá, {{Auth::user()->name}}</p>
    <a href="{{route("logout")}}">logout</a>
    @else
    <p>Você não está autenticado</p>
    <a href="{{route("login")}}">login</a>
    @endif
</div>
<form action="{{route("auth.create")}}" method="post">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old("name") }}" class="border-2 border-solid border-black">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old("email") }}" class="border-2 border-solid border-black">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="border-2 border-solid border-black">
    </div>
    <div>
        <label for="password_confirm">Password</label>
        <input type="password" id="password_confirm" name="password_confirmation" class="border-2 border-solid border-black">
    </div>
    <button type="submit">Submit</button>
    <br>
    <br>
    <div>
        Usuários atuais
        <ul>
            @foreach ($users as $user)
            <li>{{$user->name}}</li>
            @endforeach
        </ul>
    </div>
</form>