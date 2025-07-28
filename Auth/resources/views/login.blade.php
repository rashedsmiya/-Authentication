<h1>Login Page</h1>
<div>
    @session('status')
        {{ session('status') }}
    @endsession
</div>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div>
        <label for="#">Email</label>
        <input type="text" name="email" value="{{ old('email') }}">
        @error('email')
            <p style="color: #ff0000;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="#">Password</label>
        <input type="password" name="password">
        @error('password')
            <p style="color: #00e1ff;">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit">Login</button>
    </div>

</form>
