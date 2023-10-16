<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
