<div class="card" style="width: 18rem;">
    <img src="{{ asset('backend/img/AdminLTELogo.png') }}" class="img-circle" alt="User Image" style="border-radius: 50%; width: 50%; height: 50%; margin: auto">
    <ul class="list-group list-group-flush">
        <a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('user.password') }}" class="btn btn-primary btn-sm btn-block">Update password</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger btn-sm btn-block">
            Sign Out
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</div>
