@forelse ($blogs as $blog)
{{-- {{ dd($blog->category->slug)}} --}}
<div class="col-md-4 mb-4 ">
    <div class="card blogs p-3">
        <img src="{{ $blog->photo}}"
            class="card-img-top blog-img" alt="..." />
        <div class="card-body">
            <h3 class="card-title fs-4 text-white">
                    {{ $blog->title }} </h3>
            <p>
                <a href="/?author={{ $blog->user->username }} {{ request('search') ? "&search=" . request("search") : "" }} {{ request('category') ? "&category=" . request("category") : "" }}" class="fs-6 text-white">{{ $blog->user->username }}</a>
                <span class="fs-6 text-white">{{ "(" . $blog->created_at->diffForHumans(). ")" }}</span>
            </p>
            <div class="tags my-3">
                <span class="badge btn-success"><a
                        href="/?category={{ $blog->category?->slug }} {{ request('search') ? "&search=" . request("search") : "" }} {{ request('author') ? "&author=" . request("author") : "" }}" class="text-white">{{ $blog->category?->name }} </a></span>

            </div>
            <p class="card-text text-white">
                {{ $blog->intro }}
            </p>
            <a href="/blogs/{{ $blog->slug }}" class="btn btn-success">
                Read More
            </a>
        </div>
    </div>
</div>
@empty
<h3 class="text-danger">No Blogs Found 💥💥</h3>
@endforelse
