@props(['type', 'categories', 'blog' => null])

<form class="col-10 mx-auto text-white" action="{{ $type== "create" ? "/blog/blog-create" : "/blog/".$blog->id ."/blog-update"}}" method="POST" enctype="multipart/form-data">
    <h2 class="text-white">Blog {{ $type }}</h2>
    @csrf


    @if ($type=="update")
        @method("PATCH")
    @endif
    <div class="form-group">
        <label for="inputAddress">Title</label>
        <input type="text" class="form-control" valid="inputAddress" placeholder="Enter title" name="title"
            value="{{ old('title', $blog?->title) }}">
        <x-error name="title" />
    </div>
    <div class="form-group mb-3">
        <label for="inputAddress2">Photo</label>
        <input type="file" class="form-control" id="inputAddress2" name="photo">
        <x-error name="photo" />
    </div>
    @if ($type === 'update')
        <img src="{{ old('photo', $blog?->photo) }}" alt="" width="400" height="200">
    @endif
    <div class="form-group">
        <label for="inputAddress2">Slug</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Enter Slug" name="slug" value="{{ old("slug", $blog?->slug )}}">
        <x-error name="slug" />
    </div>
    <div class="form-group">
        <label for="inputAddress2">Intro</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Enter Intro" name="intro" value="{{ old("intro", $blog?->intro )}}">
        <x-error name="intro" />
    </div>

    <div class="form-group">
        <label for="inputAddress2">Reading time</label>
        <input type="number" class="form-control" id="inputAddress2" placeholder="Enter reading time"
            name="reading_time" value="{{ old("reading_time", $blog?->reading_time )}}" />
        <x-error name="reading_time" />
    </div>

    <div class="form-group">
        <label for="inputAddress2">Body</label>
        <textarea name="body" id="mytextarea" cols="30" rows="10" class="form-control" aria-label="With textarea">{{ old("body", $blog?->body )}}"</textarea>
        <x-error name="body" />
    </div>

    <div class="form-group">
        <label for="inputAddress2">Category</label>
        <div class="input-group mb-3">
            <select class="form-control" id="inputGroupSelect02" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old("category_id", $blog?->category) ? "selected" : ""}}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <x-error name="category_id" />
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
