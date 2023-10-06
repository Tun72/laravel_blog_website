<div class="row">
    @foreach ($blogs as $blog)
        <div class="col-md-4 mb-4 ">
            <div class="card blogs p-3">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top blog-img" alt="..." />
                <div class="card-body">
                    <h3 class="card-title fs-4 text-white">
                            {{ $blog->title }} </h3>
                    <p>
                        <a href="/users/{{ $blog->user->username }}" class="fs-6 text-white">{{ $blog->user->username }}</a>
                        <span class="fs-6 text-white">{{ "(" . $blog->created_at->format('d-m-y') . ")" }}</span>
                    </p>
                    <div class="tags my-3">
                        <span class="badge btn-success"><a
                                href="/categories/{{ $blog->category->slug }}" class="text-white">{{ $blog->category->name }} </a></span>

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
    @endforeach
</div>
