<div class="d-flex blog-nav pb-2 mb-3">
    <div class="blk-frm">
        <form method="POST" class="d-flex pr-2 bulk-update" action="{{route('blog.update_status')}}">
            @csrf
            <select name="status" class="form-control mr-2 bulk-action" required>
                <option value="" disabled selected>Blunk Action</option>
                @if (Route::currentRouteName() == 'blog.index' || Route::currentRouteName() == 'blog.draf') <option value="1">Published</option> @endif
                @if (Route::currentRouteName() == 'blog.index' || Route::currentRouteName() == 'blog.public' || Route::currentRouteName() == 'blog.trashed') <option value="2">Draft</option> @endif
                @if (Route::currentRouteName() == 'blog.index' || Route::currentRouteName() == 'blog.public' || Route::currentRouteName() == 'blog.draf') <option value="3">Trash</option> @endif
            </select>
            <input type="hidden" name="selecte_blog" class="selecte_blog" value="">
            <button type="submit" name="update" class="btn btn-primary bulk-update-btn-blog">Apply</button>
        </form>
    </div>
    <div class="float-right text-right nav-list">
        <div class="pr-2">
            <a href="{{ route('blog.index') }}" class="btn btn-primary mr-2">All </a><a href="{{ route('blog.public') }}"  class="btn btn-outline-primary mr-2">Published </a><a href="{{ route('blog.draf') }}"  class="btn btn-outline-primary mr-2">Draft</a><a href="{{ route('blog.trashed') }}"  class="btn btn-outline-primary mr-2">Trash</a>
        </div>
    </div>
    <div class="d-flex">
        <form action="{{route('blog.search')}}" method="post" class="d-flex">
            @csrf
            <input type="text" value="{{isset($search)?$search:''}}" class="form-control mr-2" placeholder="Search" name="search" >
            <button type="submit" class="btn btn-primary" >Search</button>
        </form>
    </div>
</div>
