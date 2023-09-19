<div class="d-flex page-nav mb-3">
    <div class="blk-frm">
        <form method="POST" class="d-flex pr-2 bulk-update" action="{{route('pages.update_status')}}">
            @csrf
            <select name="status" class="form-control mr-2 bulk-action" required>
                <option value="" disabled selected>Blunk Action</option>
                @if (Route::currentRouteName() == 'pages.index' || Route::currentRouteName() == 'pages.draf') <option value="Public">Public</option> @endif
                @if (Route::currentRouteName() == 'pages.index' || Route::currentRouteName() == 'pages.public' || Route::currentRouteName() == 'pages.trashed') <option value="Draft">Draft</option> @endif
                @if (Route::currentRouteName() == 'pages.index' || Route::currentRouteName() == 'pages.public' || Route::currentRouteName() == 'pages.draf') <option value="Trash">Trash</option> @endif
            </select>
            <input type="hidden" name="selecte_page" class="selecte_page" value="">
            <button type="submit" name="update" class="btn btn-primary bulk-update-btn">Apply</button>
        </form>
    </div>
    <div class="float-right text-right nav-list">
        <div class="pr-2">
            <a href="{{ route('pages.index') }}" class="btn btn-primary mr-2">All </a>  <a href="{{ route('pages.public') }}" class="btn btn-outline-primary mr-2">Published </a>  <a href="{{ route('pages.draf') }}" class="btn btn-outline-primary mr-2">Draft</a><a href="{{ route('pages.trashed') }}" class="btn btn-outline-primary mr-2">Trash</a>
        </div>
    </div>
    <div class="d-flex">
        <form action="{{route('pages.search')}}" method="post" class="d-flex">
            @csrf
            <input type="text" value="{{isset($search)?$search:''}}" class="form-control mr-2" placeholder="Search" name="search" >
            <button type="submit" class="btn btn-primary" >Search</button>
        </form>
    </div>
</div>
