@php
    $comments = $blog
        ->comments()
        ->latest()
        ->paginate(4);
    $src = 'https://qph.cf2.quoracdn.net/main-qimg-e43af1ea0978af7da031068531f8967b-lq';
    $i = 0;
@endphp
<x-layout>

    <div class="container mt-5 mb-5">



        <div class="col-md-7 mx-auto">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif

            <div class="col-12">



                <p class="mb-4 text-white">Author : {{ $blog->user->username }} </br> {{ $blog->created_at }}</p>
                <h3 class="text-white">{{ $blog->title }}</h3>
                <img src="https://ik.imagekit.io/serenity/ByteofDev/Blog_Heading_Images/State_of_the_Web_Deno"
                    class="card-img-top my-blog-img" alt="..." />


                <form class="mb-3" action="\blogs\{{ $blog->slug }}\subscribe" method="POST">

                    @csrf
                    @if (auth()->user()->isSubscribed($blog))
                        <button class="btn btn-danger">unsubscribe</button>
                    @else
                        <button class="btn btn-success">Subscribe</button>
                    @endif

                </form>
                <p class="lh-md mb-4 fs-5 text-white">
                    {!! $blog->body !!}
                </p>
            </div>
        </div>

        <div class="col-7 mx-auto p-4 comment-section mt-5">
            <div class="title">
                <h3>Comments</h3>
            </div>

            <div class="comment-forms mb-4">
                <x-image :src="$src" />
                <form action="/blogs/{{ $blog->slug }}/comments" method="POST" class="comment">
                    @csrf
                    <textarea class="form-control" name="body" placeholder="Write a comment..." id="floatingTextarea2"></textarea>
                    @error('body')
                        <p class="text-danger error-message">*{{ $message }}</p>
                    @enderror
                    <button class="btn btn-success mt-3">Comment</button>
                </form>
            </div>

            <ul class="user-comments">
                @forelse ($comments as $comment)
                    <li class="user-comment">
                        <x-image :src="$src" />


                        <div class="comment-detail">

                            <div>
                                <h5>{{ $comment->user->name }}</h5>
                                <span>{{ $comment->created_at->format('D M Y') }}</span>
                            </div>

                            <div class="comment-body">
                                <div>
                                    <p class="comment-content">{{ $comment->body }}</p>
                                </div>

                                <div class="comment-custom">
                                    <span><i class="far fa-heart"></i>
                                        <p>{{ 0 }}</p>
                                    </span>
                                    @if ($comment->user->id === auth()->user()->id)
                                        <div class="config-comment">
                                            <a href="#" class="text-info edit-blog" key="{{ $i++ }}"
                                                id="{{ $comment->id }}">Edit</a>
                                            <form action="/comments/{{ $comment->id }}/delete" method="POST">
                                                @csrf
                                                <button type="submit" class="text-danger">delete</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </li>
                @empty
                    <p class="col-3 mx-auto">No Comments yets...</p>
                @endforelse
                {{ $comments->links() }}
            </ul>
        </div>



    </div>


    <div class="container mt-5 mb-5">
        <h3 class="text-white mb-4" style="text-align :center">Blogs You May Like</h3>
        <div class="row">
            <x-blogs-card :blogs="$randomBlogs" />
        </div>
    </div>


    <x-subscribe />

</x-layout>
