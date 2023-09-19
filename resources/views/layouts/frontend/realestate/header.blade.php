<div class="top-header py-4">
    <section
        class="page_toplogo table_section ls mainpge_toplogo section_padding_25">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-sm-12 col-lg-2"> <a href="/" class="logo"> <img src="{{asset('/images/'.get_setting('header_logo'))}}" alt> </a>
                </div>
                <div
                    class="col-sm-12 col-lg-8 text-center text-sm-right teasers-line d-flex justify-content-between align-items-center">
                    <div
                        class="text-uppercase semibold small-teaser text-left ">
                        <div class="grey bold">Any question at
                        </div>
                        <div>{{$headerContent->Social->phone}}</div>
                    </div>
                    <div class=" semibold small-teaser text-uppercase icon d-flex align-items-center">
                        <img src="{{asset('realestate/images/home.png')}}" class="p-3">
                        <div style="text-align: start;">
                            {!! $footerContent->address !!}
                        </div>
                    </div>
                    <div
                        class=" semibold small-teaser text-uppercase icon d-flex align-items-center">
                        <img src="{{asset('realestate/images/mail.png')}}" class="p-3">
                        <div style="text-align: start;">
                            <div class="grey bold">Send your mail at
                            </div>
                            <div>{{$headerContent->Social->email}} </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-lg-2 text-center text-sm-right teasers-line d-flex justify-content-between">
                    @if(@isset($headerContent->Social->facebook) && !@empty($headerContent->Social->facebook))
                        <a href="{{$headerContent->Social->facebook}}">
                            <img src="{{asset('realestate/images/facebook.png')}}" class="border">
                        </a>
                    @endif
                    @if(@isset($headerContent->Social->twitter) && !@empty($headerContent->Social->twitter))
                        <a href="{{$headerContent->Social->twitter}}">
                            <img src="{{asset('realestate/images/twitter.png')}}" class="border">
                        </a>
                    @endif
                    <a href="#">
                        <img  src="{{asset('realestate/images/goggleplus.png')}}" class="border">
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
<nav class="navbar sticky-top navbar-expand-lg bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <img src="{{asset('realestate/images/hamburger-menu-icon.svg')}}">
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto w-100" style="align-items: center;">
                @php
                    $menus= json_decode(get_primary_menu());
                @endphp
                @foreach($menus AS $mn => $ms)
                    <li class="nav-item">
                        <a class="nav-link" href="{{$ms}}">{{$mn}} <span class="sr-only"></span></a>
                    </li>
                @endforeach
                <li>
                    <a href="#">
                        <div class="input-group rounded">
                           <span class="input-group-text border-0"
                                 id="search-addon">
                           <img class="fas fa-search" src="{{asset('realestate/images/magnifying-glass.svg')}}"></img>
                           </span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <a href="/" class="navbar-brand"> <img src="{{asset('/images/'.get_setting('footer_logo'))}}" alt> </a>
    </div>
</nav>
