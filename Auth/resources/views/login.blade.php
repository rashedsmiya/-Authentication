<h1>Login Page</h1>

<form action="{{ route('login') }}" method="POST">
    <div>
        <label for="#">Email</label>
        <input name="email" type="text" placeholder="Email" value="{{ old('email') }}">
        @error('email')
            <p style="color: #ff0000;">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="#">Password</label>
        <input name="password" type="password" placeholder="Password">
        @error('password')
            <p style="color: #00e1ff;">{{ $message }}</p>
        @enderror
    </div>
    <button style="background-color: #ff0000;">Login</button>
</form>