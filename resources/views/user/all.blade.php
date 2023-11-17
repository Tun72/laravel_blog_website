<x-admin-layout>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col" colspan="2">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->admin ? 'Admin' : 'User' }}</td>
                    <td>
                        {{-- @if (auth()->user()->can('blog-action', $blog)) --}}
                        <div class="d-flex gap-3">

                            @if (!$user->admin)
                                <form action="/users/{{ $user->id }}/set-to-admin" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-warning" type="submit">Admin</button>
                                </form>

                                <form action="/users/{{ $user->id }}/delete-user" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            @endif

                        </div>
                        {{-- @endif --}}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $users->links() }}
</x-admin-layout>
