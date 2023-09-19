<header>

        @if(isset($headerContent->PromoLine[0]) && !empty($headerContent->PromoLine[0]))
            <div class="promo-bar"><span class="promo-text">{{$headerContent->PromoLine[0]}}</span></div>
        @endif
        @if(isset($headerContent->Social) && !empty((array)$headerContent->Social))
            <ul class="navbar-nav">
                @foreach($headerContent->Social AS $name=>$scl)
                    @if(empty($scl)) @continue @endif
                        <li class="nav-item">
                            <a class="nav-link" title="{{$name}}" target="_blank" href="{{$name=='email'?'mailto:':($name=='phone'?'tel:':'')}}{{$scl}}"><i class="{{$name=='email'?'fa fa-envelope':($name=='phone'?'fa':'fab')}} fa-{{$name}}"></i></a>
                        </li>
                @endforeach
            </ul>
        @endif

    <div class="site-header">
        <div class="logo">
            <img src="{{asset('/images/'.get_setting('header_logo'))}}" alt="logo" height="125">
        </div>
        <div class="header-navigation">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @php
                            $menus= json_decode(get_primary_menu());
                        @endphp
                        @foreach($menus AS $mn => $ms)
                            <li class="nav-item">
                                <a class="nav-link" href="/{{$ms}}">{{$mn}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>
    </div>

</header>


