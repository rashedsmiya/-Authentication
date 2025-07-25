<h1>Registeration Page</h1>

<form action="{{ route('register') }}" method="POST">
    @csrf
    <div>
        <label for="#">Name</label>
        <input name="name" type="text" placeholder="Name" value="{{ old('name') }}">
        @error('name')
            <p style="color: #fbff00;">{{ $message }}</p>
        @enderror
    </div>
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
    <div>
        <label for="#">Confirm Password</label>
        <input name="password_confirmation" type="password" placeholder="Confirm Password">
        @error('password_confirmation')
            <p style="color: #ff04ff;">{{ $message }}</p>        
        @enderror
    </div>
    <button style="submit">Register</button>
</form>