<x-admin-layout>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Blog title</th>
                <th scope="col">Blog category</th>
                <th scope="col">Blog published date</th>
                <th scope="col" colspan="2">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->category ? $blog->category->name : "null"}}</td>
                    <td>{{ $blog->created_at->format('D M Y') }}</td>
                    <td>
                        {{-- @if (auth()->user()->can('blog-action', $blog)) --}}
                        <div class="d-flex gap-3">
                            @can('edit', $blog)
                                <a href="/blog/{{ $blog->id }}/blog-update" class="btn btn-warning">edit</a>
                            @endcan
                            @can('delete', $blog)
                                <form action="/blogs/{{ $blog->slug }}/delete" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            @endcan
                        </div>
                        {{-- @endif --}}
                    </td>
                </tr>
            @endforeach

        </tbody> 
    </table>
    {{ $blogs->links() }}
</x-admin-layout>



{{-- 
        --}}
