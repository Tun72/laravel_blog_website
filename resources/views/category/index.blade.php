<x-admin-layout>
    <div class="text-end mb-2">
        <a href="/category/store" class="btn btn-info">New Category</a>
    </div>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">3</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td class="d-flex gap-3">
                        <a href="/category/{{ $category->id }}/update" class="btn btn-warning">Edit</a>
                        <form action="/category/{{ $category->id }}/delete" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</x-admin-layout>
