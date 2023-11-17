@php
    $blogs = auth()->user()->blogs;
@endphp

<div class="col-9 mt-5 mb-5 mx-auto">
    <div class="d-flex gap-3 bg-light col-4 mb-2 p-4">
        <div class="">
            <img src="{{ auth()->user()->photo }}" alt="" width="100" height="100">
        </div>
        <div class="d-flex flex-column gap-3">
            <div>
                <h4>{{ auth()->user()->name }}</h4>
                <p>{{ auth()->user()->email }}</p>
                <span>{{ auth()->user()->username }}</span>

            </div>
            <div>
                <a href="/user/edit" class="btn btn-warning">edit profile</a>
                <a type="button" class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete
                </a>
            </div>
        </div>


    </div>

    <hr class="text-white">
    <h3 class="text-white">Your Blogs Post</h3>
    <div class="mb-5 mt-4 row text-center">
        <x-blogs-card :blogs="$blogs" />
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Are you sure ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="/user/delete" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
