@props(['type', 'category' => null])

<form action="{{ $type == 'update' ? '/category/' . $category->id . '/update' : '/category/store' }}" method="POST" class="container col-4 d-flex flex-column gap-2">
    @csrf
    @if ($type == 'update')
        @method('PATCH')
    @endif
    <h4 class="text-white">Category {{ $type }}</h4>
    <div class="form-groups">
        <input type="text" name="name" placeholder="Name" class="form-control"
            value="{{ old('name', $category?->name) }}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-groups">
        <input type="text" name="slug" placeholder="Slug" class="form-control"
            value="{{ old('slug', $category?->slug) }}">
            @error('slug')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
</form>
