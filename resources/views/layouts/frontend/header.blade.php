<header>
    <div class="border-bottom">
        <div class="container-lg">
            <div class="d-flex flex-wrap justify-content-between py-3">
                <a href="javascript:;" class="d-flex align-items-center mb-md-0  text-dark text-decoration-none">
                    @if(isset($headerContent->PromoLine[0]) && !empty($headerContent->PromoLine[0]))
                        <span class="fs-6  link-secondary">{{$headerContent->PromoLine[0]}}</span>
                    @endif
                </a>
                <ul class="nav nav-pills">
                    @foreach($headerContent->Social AS $name=>$scl)
                        @if(empty($scl)) @continue @endif
                        <li class="nav-item me-3">
                            <a class="link-secondary" title="{{$name}}" target="_blank" href="{{$name=='email'?'mailto:':($name=='phone'?'tel:':'')}}{{$scl}}"><i class="{{$name=='email'?'fa fa-envelope':($name=='phone'?'fa':'fab')}} fa-{{$name}}"></i></a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>

    <!-- <div class=" container-lg">
        <div class="d-flex flex-wrap justify-content-between py-3">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0  text-dark text-decoration-none">
                <img src="{{asset('/images/'.get_setting('header_logo'))}}" alt="header-logo" title="header logo" width="190" height="50">
            </a>
            <ul class="navbar nav nav-pills ">
                @php
                    $menus= json_decode(get_primary_menu());
                @endphp
                @foreach($menus AS $mn => $ms)
                    <li>
                        <a class="nav-link text-dark fw-bold" href="/{{$ms}}">{{$mn}}</a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div> -->

    <div class=" container-lg">
    <nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
  <a href="/" class="d-flex align-items-center mb-md-0  text-dark text-decoration-none">
                <img src="{{asset('/images/'.get_setting('header_logo'))}}" alt="header-logo" title="header logo" width="190" height="50">
            </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
 
      <form class="d-flex">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @php
              $menus= json_decode(get_primary_menu());
          @endphp
          @foreach($menus AS $mn => $ms)
              <li class="nav-item">
                  <a class="nav-link {{ last(request()->segments()) == $ms ? 'active' : '' }} text-dark fw-bold" aria-current="page" href="/{{$ms}}">{{$mn}}</a>
              </li>
          @endforeach
        {{--<li class="nav-item">
          <a class="nav-link active text-dark fw-bold" aria-current="page" href="#">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark fw-bold" href="#"> ABOUT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark fw-bold" href="#">BLOG</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-dark fw-bold" href="#"> CONTACT US</a>
        </li>--}}
      </ul>
      </form>
    </div>
  </div>
</nav>
</div>
</header>
