<!-- Section: Design Block -->
<x-layout>
    <section class="login mx-auto">

        <form class="my-form" method="POST" action="/login">
            @csrf
            @error("error")
                <p class="alert alert-danger" role="alert">*{{ $message }}</p>
            @enderror
            <h4 class="text-center text-white">Welcome Back 😍</h4>
            <div class="form-group">
                <input type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="text-danger error-message">*{{ $message }}</p>
                @enderror

                
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" class="form-control" name="password">\
                @error('password')
                    <p class="text-danger error-message">*{{ $message }}</p>
                @enderror
            </div>
            <div class="form-check d-flex justify-content-center">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                <label class="form-check-label text-white" for="form2Example33">
                    I understand the rule
                </label>
            </div>

            <button type="submit" class="btn btn-success btn-block mb-4">
                Sign In
            </button>

            <div class="text-center">
                <p class="text-white">or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1 text-white">
                    <i class="fa-brands fa-facebook"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1 text-white">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1 text-white">
                    <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1 text-white">
                    <i class="fab fa-github"></i>
                </button>
            </div>
            <div class="text-center">

                <span class="text-white other-login">New user ? <a href="/register">Sign up</a></span><br>
                <span class="text-white other-login">forgot password ? <a href="#">Reset password</a></span>
            </div>

        </form>
        <div class="background-image">
            <div>
                <h3>Login </h3>
                <p>“Try not to become a man of success, but rather become a man of value.” <span>-Albert Einstein</span>
                </p>
            </div>
        </div>


    </section>
</x-layout>
<!-- Section: Design Block -->
