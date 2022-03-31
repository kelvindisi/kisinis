<nav class="navbar navbar-dark bg-dark navbar-expand-sm" role="navigation">
    <div class="container">
        <a href="{{route('dashboard')}}" class="navbar-brand">Dashboard</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <i class="navbar-toggler-icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Admins</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('admins.create') }}" class="dropdown-item">Add</a>
                        <a href="{{ route('admins.index') }}" class="dropdown-item">Manage</a>
                    </div>                    
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Gallery</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('gallery.create') }}" class="dropdown-item">Upload Image</a>
                        <a href="{{ route('gallery.index') }}" class="dropdown-item">Manage Images</a>
                    </div>
                </li>

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{Auth::user()->name}}</a>
                    <div class="dropdown-menu">
                        <form method="POST" class="" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
