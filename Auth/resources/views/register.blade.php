<h1>Registeration Page</h1>

<form action="{{ route('register') }}" method="POST">
    @csrf
    <div>
        <label for="#">Name</label>
        <input name="name" type="text" placeholder="Name">
    </div>
    <div>
        <label for="#">Email</label>
        <input name="email" type="text" placeholder="Email">
    </div>
    <div>
        <label for="#">Password</label>
        <input name="password" type="password" placeholder="Password">
    </div>
    <div>
        <label for="#">Confirm Password</label>
        <input name="password_confirmation" type="password" placeholder="Confirm Password">
    </div>
    <button style="submit">Register</button>
</form>