@php
    $user = auth()->user();
@endphp
<x-layout>
    <div class="container mt-5 mb-5">
        <form class="col-5 bg-white p-3 offset-3 d-flex gap-3 flex-column" action="/user/edit" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <h3 class="text-center">Update</h3>
            <div class="form-group">
                <div class="">
                    <img src="{{ auth()->user()->photo }}"
                        alt="" width="100" height="100">
                </div>
                <label for="">Profile Photo</label>
                <input type="file" name="photo" id="" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" placeholder="Name" class="form-control" name="name"
                    value="{{ old('name', $user->name) }}">
                @error('name')
                    <p class="text-danger error-message">*{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Username</label>
                <input type="text" placeholder="Username" class="form-control" name="username"
                    value="{{ old('username', $user->username) }}">
                @error('username')
                    <p class="text-danger error-message">*{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" placeholder="Email" class="form-control" name="email"
                    value="{{ old('email', $user->email) }}">
                @error('email')
                    <p class="text-danger error-message">*{{ $message }}</p>
                @enderror
            </div>
            <a href="#">change password</a>
            <button type="submit" class="btn btn-success btn-block mb-4 my-btn">
                Update
            </button>
        </form>
    </div>
</x-layout>
