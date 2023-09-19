<footer>
    <div class="powered-by">
        <div class="container">
            <div class="footer-cnt">
                <div class="footer-menu">
                    <ul class="footer-nav">
                        @php
                            if (isset($footerContent->menu) && !empty($footerContent->menu)) {
                                foreach (array_slice($footerContent->menu, 0, 4) AS $fcm) {
                                    $getFooterMenu = get_menu($fcm);
                                    $footerMenu = json_decode($getFooterMenu->value);
                                    echo '<div class="col footer-link"><h5>'.$getFooterMenu->title.'</h5><ul>';
                                    foreach ($footerMenu AS $fm=>$fslug) {
                                        echo '<li><a href="/'.$fslug.'">'.$fm.'</a></li>';
                                    }
                                    echo '</ul></div>';
                                }
                            }
                        @endphp
                    </ul>
                </div>
                @if(isset($headerContent->Social) && !empty((array)$headerContent->Social))
                    <div class="footer-social">
                        <ul class="navbar-nav">
                            @foreach($headerContent->Social AS $name=>$scl)
                                @if(empty($scl)) @continue @endif
                                    <li class="nav-item">
                                        <a class="nav-link" title="{{$name}}" target="_blank" href="{{$name=='email'?'mailto:':($name=='phone'?'tel:':'')}}{{$scl}}"><i class="{{$name=='email'?'fa fa-envelope':($name=='phone'?'fa':'fab')}} fa-{{$name}}"></i></a>
                                    </li>
                            @endforeach
                        </ul>
                        <div class="footer-address">
                            {!! isset($footerContent->address)?$footerContent->address:'' !!}
                        </div>
                    </div>
                @endif
            </div>
            <div class="footer-copyright">
                <small> {!! isset($footerContent->copyright)?$footerContent->copyright:'' !!} </small>
            </div>
        </div>
    </div>
</footer>
