<footer class=" text-lg-start text-white bg-dark">
    <!-- Grid container -->
    <div class="container-lg pb-5 pt-5">
        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <div class="footer-logo">
                        <img class=" card-img" src="{{asset('/images/'.get_setting('footer_logo'))}}" loading="lazy"  height="50" alt="footer logo">
                    </div>
                    <p class="pt-4">@if($footerContent->address) {!! $footerContent->address !!} @endif </p>
                    <ul class="nav nav-pills pt-2">
                        @foreach($headerContent->Social AS $name=>$scl)
                            @if(empty($scl)) @continue @endif
                            <li class="nav-item me-3">
                                <a class="text-white" title="{{$name}}" target="_blank" href="{{$name=='email'?'mailto:':($name=='phone'?'tel:':'')}}{{$scl}}"><i class="{{$name=='email'?'fa fa-envelope':($name=='phone'?'fa':'fab')}} fa-{{$name}}"></i></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 fw-blod">
                    @php
                        if (isset($footerContent->menu) && !empty($footerContent->menu)) {
//                            foreach (array_slice($footerContent->menu, 0, 2) AS $k => $fcm) {
                                $getFooterMenu = get_menu($footerContent->menu[0]);
                                $footerMenu = json_decode($getFooterMenu->value);
                                echo '<h6 class="font-weight-bold fs-4">'.$getFooterMenu->title.'</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #B97C3B; height: 2px; opacity:1;"><ul class="list-unstyled">';
                                foreach ($footerMenu AS $fm=>$fslug) {
//                                    echo '<li><a href="/'.$fslug.'">'.$fm.'</a></li>';
                                    echo '<li class="pt-1 pb-1"> <a class="text-white text-decoration-none" href="/'.$fslug.'">'.$fm.' </a> </li>';
                                }
                                echo '</ul>';
//                            }
                        }
                    @endphp

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    @php
                        if (isset($footerContent->menu) && !empty($footerContent->menu)) {
//                            foreach (array_slice($footerContent->menu, 0, 2) AS $k => $fcm) {
                                $getFooterMenu = get_menu($footerContent->menu[1]);
                                $footerMenu = json_decode($getFooterMenu->value);
                                echo '<h6 class="font-weight-bold fs-4">'.$getFooterMenu->title.' </h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #B97C3B; height: 2px; opacity:1;"><ul class="list-unstyled">';
                                foreach ($footerMenu AS $fm=>$fslug) {
//                                    echo '<li><a href="/'.$fslug.'">'.$fm.'</a></li>';
                                    echo '<li class="pt-1 pb-1"> <a class="text-white text-decoration-none" href="/'.$fslug.'">'.$fm.' </a> </li>';
                                }
                                echo '</ul>';
//                            }
                        }
                    @endphp

                </div>

                <!-- Grid column -->
                <div class="col-lg-4 col-md-6 mx-5 ms-0  ms-md-5 mb-4">
                    <h6 class="font-weight-bold fs-4">
                        Recent posts
                    </h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #B97C3B; height: 2px; opacity:1;">
                    @get_recent_blog(2)
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                    </div>
                </div>
            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->

    </div>

    <div class=" text-center bg-secondary  ">
        <!-- Copyright -->
        <div class="p-3 text-dark fw-bold">
            {!! isset($footerContent->copyright)?$footerContent->copyright:'' !!}
        </div>
        <!-- Copyright -->
    </div>
</footer>


