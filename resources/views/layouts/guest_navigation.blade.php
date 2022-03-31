<nav class="navbar navbar-dark bg-dark navbar-expand-sm fixed-top" role="navigation">
    <div class="container">
        <a href="{{route('dashboard')}}" class="navbar-brand">Kisini's</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <i class="navbar-toggler-icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gallery') }}" class="nav-link">Gallery</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route("login") }}" class="nav-link">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
