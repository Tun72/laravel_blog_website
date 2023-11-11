<nav class="navbar navbar-dark p-3">
    <div class="container">
<<<<<<< HEAD
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
            <div class="ml-auto d-flex gap-4 ">
                <a href="/" class="text-success align-self-center">{{ auth()->user()->name }}</a>
                @if(auth()->user()->admin)
                <a href="/admin" class="text-success align-self-center">dashboard</a>
                @endif
                <form method="post" action="/logout">
                    @csrf
                    <button type="submit" class="btn btn-outline-success">Logout</button>
                </form>
            </div>
        @endif
=======
      <h3><a class="navbar-brand text-success" href="/">Creative Coder</a></h3>
      <div class="d-flex">
        <a href="/" class="nav-link  text-white">Home</a>
        <a href="/" class="nav-link text-white">Blogs</a>
        <a href="/" class="nav-link text-white">Subscribe</a>
        
      </div>
      @if(!auth()->check())
        <div class="ml-auto d-flex gap-4">
          <a href="/login" class="btn btn-outline-success">Login</a>
          <a href="/register" class="btn btn-success">Sign up</a>
        </div>
      @else 

      <div class="ml-auto d-flex gap-4 ">
        <a href="/" class="text-success align-self-center">{{ auth()->user()->name }}</a>
        <form method="post" action="/logout">
          @csrf
          <button type="submit" class="btn btn-outline-success">Logout</button>
        </form>
      </div>
      @endif

>>>>>>> 803ec328b54f94f64d8a37324f419e6b7f51516c
    </div>
</nav>
