<footer class="footer-08" style="margin-top: 100px;">
    <div class="container-fluid px-lg-5 bg-dark">
        <div class="container">
            <div class="col-md-12 py-5">
                <div class="row flex-nowrap justify-content-between">
                    <div class="col-md-12 mb-md-0 mb-4 col-lg-3">
                        <img src="{{asset('/images/'.get_setting('footer_logo'))}}" loading="lazy" alt="footer logo">
                        <p style="color: #9F9993;" class="mt-5">{{get_setting('tagline')}}</p>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div class="col d-flex">
                            <h5 class="text-uppercase"> address: </h5>
                            <p>@if($footerContent->address) {!! $footerContent->address !!} @endif </p>
                        </div>
                        <div class="col d-flex">
                            <h5 class="text-uppercase"> phone: </h5>
                            <div>
                                <p>{{$headerContent->Social->phone}} </p>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <h5 class="text-uppercase"> E-MAIL: </h5>
                            <p>{{$headerContent->Social->email}}</p>
                        </div>
                    </div>
                    <form action="{{route('frontend.contact')}}" class="contact-form col-md-12 col-lg-4" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                              <textarea name="message" id cols="30" rows="3" class="form-control" placeholder="Message" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control submit px-3">send</button>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-info btn-sm" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center p-2" style="background-color: #F69323;">
        <div class="col-md-12">
            {!! isset($footerContent->copyright)?$footerContent->copyright:'' !!}

        </div>
    </div>
</footer>


