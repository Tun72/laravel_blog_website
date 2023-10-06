<x-layout>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                
                <p class="mb-4 text-white">Author : {{ $blog->user->username }} </br> {{ $blog->created_at}}</p>
                <h3 class="text-white">{{ $blog->title }}</h3>
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top my-blog-img" alt="..."  />
                
                <p class="lh-md mb-4 fs-5 text-white">
                    {{ $blog->body }}
                </p>
            </div>
        </div>
    </div>
 
   <div class="container mt-5 mb-5">
    <h3 class="text-success mb-2">Blogs You May Like</h3>
    <x-blogs :blogs="$randomBlogs" />
   </div>

</x-layout>
