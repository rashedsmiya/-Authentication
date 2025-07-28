<h1>Dashboard</h1>

{{ auth()->user()->name }}

<div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>