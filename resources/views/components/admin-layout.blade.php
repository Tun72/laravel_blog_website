<x-layout>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-3">
                <ul class="list-group text-white">
                    <li class="list-group-item"><a href="/admin">Dashboard</a></li>
                    <li class="list-group-item"><a href="/blog/blog-create">Blog Create</a></li>
                </ul>
            </div>
            <div class="col-9">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>
