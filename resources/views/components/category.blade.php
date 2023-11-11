<div class="mb-4 text-center">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Filter By Category
        </button>
  
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            @foreach($categories as $cat)
              <li><a class="dropdown-item" href="/?category={{$cat->slug}} {{ request('author') ? "&author=" . request("author") : ""}} {{ request('search') ? "&search=" . request("search") : "" }}">{{ $cat->name }}</a></li>
            @endforeach
          
        </ul>
      </div>
</div>