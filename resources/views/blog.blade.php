<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." width="400px" />
                <h3 class="my-3 text-dark">{{ $blog->title }}</h3>
                <p class="lh-md mb-4">
                    {{ $blog->body }}
                </p>
            </div>
        </div>
    </div>


</x-layout>
