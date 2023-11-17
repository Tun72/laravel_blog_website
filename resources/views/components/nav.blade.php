<nav class="navbar navbar-dark p-3">
    <div class="container">
        <h3><a class="navbar-brand text-success" href="/">Creative Coder</a></h3>
        <div class="d-flex">
            <a href="/" class="nav-link  text-white">Home</a>
            <a href="/" class="nav-link text-white">Blogs</a>
            <a href="/" class="nav-link text-white">Subscribe</a>
            <a href="/" class="nav-link text-white">About</a>

        </div>
        @if (!auth()->check())
            <div class="ml-auto d-flex gap-4">
                <a href="/login" class="btn btn-outline-success">Login</a>
                <a href="/register" class="btn btn-success">Sign up</a>
            </div>
        @else
            <div class="d-flex gap-4 align-items-center">

                {{-- 
                <div class="dropdown">
                    
    
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        
                    </ul>
                </div> --}}
                <div class="btn-group dropstart">
                    <img src="{{ auth()->user()->photo }}" alt="" width="50" height="50"
                        class="rounded-circle  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <ul class="dropdown-menu mt-5">
                        <li><a href="/user/profile"
                                class="text-success align-self-center dropdown-item">{{ auth()->user()->name }}</a></li>
                        <li>
                            @if (auth()->user()->admin)
                                <a href="/admin" class="text-success align-self-center dropdown-item">dashboard</a>
                            @endif

                        </li>
                        <li>
                            <form method="post" action="/logout" class="dropdown-item">
                                @csrf
                                <button type="submit" class="btn btn-outline-success">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>

                <button type="button" class="btn btn-success position-relative" data-bs-toggle="modal"
                    data-bs-target="#exampleModal1">
                    <i class="fas fa-bell"></i>
                    @if (auth()->user()->getCountNotifications())
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ auth()->user()->getCountNotifications() }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    @endif

                </button>
                <x-notification />

            </div>
        @endif
    </div>
</nav>
