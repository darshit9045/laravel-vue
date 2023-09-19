<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Form;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Shortcode;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class ShortcodeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        /**
         * Get Blog Shortcode
         */
        Blade::directive('get_blog', function ($expression) {
            $integer = (int)$expression;
            if (is_numeric($integer)) { $num = $integer; } else { $integer = 3; }
            $blogs = Blog::where('blogs.status', '1')->latest()->take($integer)->get();
            $html = '<div class="row ">';
            foreach ($blogs AS $blog) {
                $html .= '<div class="col-sm-12 col-lg-4 col-md-4 pb-3">
                  <div class="card">
                    <img class="card-img" src="'.asset("images/".$blog->feature_image).'" loading="lazy" alt="'.$blog->slug.'" width="414" height="auto">
                    <div class="card-body">
                      <div class=" text-dark">
                        <div class="views text-dark fw-blod pb-4">
                          <i class="fa fa-sharp fa-regular fa-calendar-week pe-2"></i>
                          '.date('M d, Y', strtotime($blog->created_at)).'
                        </div>
                      </div>
                      <h4 class="card-title pb-3 lh-base">'. $blog->title .'</h4>
                      <p class="card-text fw-blod">'.Str::limit(strip_tags(htmlspecialchars_decode($blog->description)), 200, '...') .'</p>
                      <a href="'.route('blog.detail', $blog->slug).'" class="fw-bold text-dark text-decoration-none d-flex align-items-center">
                        Read More
                        <i class="fa fa-long-arrow-alt-right ps-2"></i></a>
                    </div>
                  </div></div>';
            }
            $html .= '</div>';

            return $html;
        });

        /**
         * Get Recent Blog Shortcode
         */
        Blade::directive('get_recent_blog', function ($expression) {
            $integer = (int)$expression;
            if (is_numeric($integer)) { $num = $integer; } else { $integer = 3; }
            $blogs = Blog::where('blogs.status', '1')->latest()->take($integer)->get();
            $html = '<div class="row">';
            foreach ($blogs AS $blog) {
                $html .= "<div class='col-4 pb-3'><img width='86' height='auto' class='card-img' src='".asset("images/".$blog->feature_image)."' alt='".$blog->slug."' loading='lazy' > </div> <div class='col-lg-8 col-md-8'>  <a href='".route('blog.detail', $blog->slug)."' class='text-white text-decoration-none' > <p class='get_recent_blomt-2 mb-2'>". $blog->title ."</p></a> <div class='mb-4'>".date('M d, Y', strtotime($blog->created_at))."</div> </div>";
            }
            $html .= '</div>';

            return $html;
        });

        /**
         * Testimonial Shortcode
         */
        Blade::directive('testimonial', function ($expression) {

            if ($expression == 'slider') {
                $testimonials = Testimonial::all()->toArray();
                $html = '<div class="row mx-auto my-auto justify-content-center"><div id="recipeCarousel" class="testimonial-carousel carousel slide ps-5 pe-5" data-bs-ride="carousel"><div class="carousel-inner" role="listbox">';

                foreach ($testimonials AS $k => $testimonial) {
                    if ($k == 0) {$cl ='active';} else {$cl ='';}
                    $html .= '<div class="carousel-item '.$cl.'">
                        <div class="col-md-4 p-sm-2">
                            <div class="bg-white p-4">
                                <div class="card-img p-4">
                                    <img src="'.asset('/images/testimonials/'.$testimonial['image']).'" loading="lazy" width="76" height="auto" class="img-fluid rounded-circle">
                                </div>
                                <h3 class="fs-5 fw-bold">'.$testimonial['name'].'</h3>
                                <p class="text-secondary fa-sm">'.$testimonial['description'].'</p>
                            </div>
                        </div>
                    </div>';
                }
                $html .= '</div><a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                <span class="fa fa-solid fa-chevron-up fa-rotate-270 text-muted " aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
               <span class="fa fa-solid fa-chevron-up fa-rotate-90 text-muted" aria-hidden="true"></span>
            </a>
        </div>
    </div>
    <script>let items = document.querySelectorAll(".testimonial-carousel .carousel-item"); items.forEach((el) => { const minPerSlide = 3; let next = el.nextElementSibling; for (var i=1; i<minPerSlide; i++) { if (!next) { next = items[0]; } let cloneChild = next.cloneNode(true); el.appendChild(cloneChild.children[0]); next = next.nextElementSibling; } })</script>';

                /*$html = '<div id="demo" class="carousel slide" data-bs-ride="carousel"><div class="carousel-inner ps-5 pe-5"> ';

                foreach (array_chunk($testimonials, 3) as $k => $set) {
                    if ($k == 0) {$cl ='active';} else {$cl ='';}
                    $html .= '<div class="carousel-item '.$cl.'"> <div class="row "> ';
                    foreach ($set as $testimonial) {
                        $html .= '<div class=" col-sm-12 col-lg-4 text-center p-sm-2">
                            <div class="bg-white p-4">
                              <div class="icon-demo p-3 py-6 " role="img" aria-label="Card text - large preview">
                                <img width="76" height="auto" src="'.asset('/images/testimonials/'.$testimonial['image']).'" loading="lazy" class="mx-auto d-block w-25 rounded-circle" alt="clinte-pic">
                              </div>
                              <h3 class="fs-5 fw-bold">'.$testimonial['name'].'</h3>
                              <p class="text-secondary fa-sm">'.$testimonial['description'].'</p>
                            </div>
                          </div>';
                    }
                    $html .= '</div></div>';
                }
                $html .= '</div><button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
          <i class="fa fa-solid fa-chevron-up fa-rotate-270 text-muted"></i>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
          <i class="fa fa-solid fa-chevron-up fa-rotate-90 text-muted"></i>
        </button></div>';*/
                return $html;
            } else {
                return '<?php echo "<p><code>@testimonial('.$expression.')</code> not found!</p>"; ?>';
            }
        });

        /**
         * Slider Shortcode
         */
        Blade::directive('slider', function ($expression) {
            $slider = Slider::where('value', $expression)->first();
            if ($slider) {
                $slides = json_decode($slider->slides);
                $html = '<div class="row '.$slider->value.' slider owl-carousel owl-theme">';
                foreach ($slides AS $sld) {
                    if($sld->img) { $img = '<img width="auto" height="auto" src="'.asset('/images/sliders/'.$sld->img).'" loading="lazy" alt="'.$slider->title.'">'; } else { $img = ''; }
                    $html .= '<div class="col item">'.$img.'<div class="item-content"><p class="text">'.$sld->text.'</p><p class="text font-italic">-'.$sld->text.'</p></div></div>';
                }
                $html .= '</div>';

                switch ($slider->type) {
                    case 'Animate':
                        $html = '<section class="hero-slider"> <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"> <div class="carousel-inner">';
                        foreach ($slides AS $key => $sld) {
                            if ($key==0) {$cl = 'active';} else {$cl = '';}
                            $html .= '<div class="carousel-item carousel-image bg-img-1 '.$cl.'" style="background-image:url('.asset('/images/sliders/'.$sld->img).')"> <div class="container d-flex align-items-center justify-content-center text-center h-100"> <div class="text-dark"> '.$sld->text.'</div> </div> </div>';
                        }
                        $html .= '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev"> <i class="fa fa-regular fa-angle-left bg-white text-muted  fs-3 rounded-circle" style="width:40px;  height:40px; line-height: 40px;"></i> <span class="visually-hidden">Previous</span> </button> <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next"> <i class="fa fa-regular fa-angle-right bg-white text-muted  fs-3 rounded-circle " style="width:40px;  height:40px; line-height: 40px;"></i> <span class="visually-hidden">Next</span> </button> </div> </section>';
                        break;

                    case 'Autoplay':
                        $html .= "<script>var owl = $('.".$slider->value.".owl-carousel');owl.owlCarousel({ items:4,loop:true,margin:10,autoplay:true,autoplayTimeout:2000,autoplayHoverPause:true });</script>";
                        break;

                    case 'Basic':
                        $html = '<div id="demo'.$expression.'" class="carousel slide" data-bs-ride="carousel"><div class="carousel-inner ps-5 pe-5"> ';
                        foreach (array_chunk($slides, 3) as $k => $set) {
                            if ($k == 0) {$cl ='active';} else {$cl ='';}
                            $html .= '<div class="carousel-item '.$cl.'"> <div class="row "> ';
                            foreach ($set as $slide) {
                                $html .= '<div class="col-md-4 col-sm-12 text-center">
                            <div class="bg-white p-4">
                              <div class="icon-demo p-3 py-6 " role="img" aria-label="Card text - large preview">
                                <img width="auto" height="auto" src="'.asset('/images/sliders/'.$slide->img).'" loading="lazy" class="mx-auto d-block w-100" alt="clinte-pic">
                              </div>
                              <p class="text-secondary fa-sm">'.$slide->text.'</p>
                            </div>
                          </div>';
                            }
                            $html .= '</div></div>';
                        }
                        $html .= '</div><button class="carousel-control-prev" type="button" data-bs-target="#demo'.$expression.'" data-bs-slide="prev">
                                  <i class="fa fa-solid fa-chevron-up fa-rotate-270 text-muted"></i>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#demo'.$expression.'" data-bs-slide="next">
                                  <i class="fa fa-solid fa-chevron-up fa-rotate-90 text-muted"></i>
                                </button></div>';
//                        $html .= "<script>var owl = $('.".$slider->value.".owl-carousel');owl.owlCarousel({ loop:true,margin:10,responsiveClass:true,responsive:{0:{items:1,nav:true},600:{items:3,nav:false},1000:{items:5,nav:true,loop:false}} });</script>";
                        break;

                    case 'Center':
                        $html .= "<script>var owl = $('.".$slider->value.".owl-carousel');owl.owlCarousel({ center: true, items:2, loop:true, margin:10, responsive:{ 600:{ items:4 } } });</script>";
                        break;

                    case 'Mousewheel':
                        $html .= "<script>var owl = $('.".$slider->value.".owl-carousel');owl.owlCarousel({ loop:true,nav:true,margin:10,responsive:{0:{items:1},600:{items:3},960:{items:5},1200:{items:6}} });owl.on('mousewheel', '.owl-stage', function (e) { if (e.deltaY>0) { owl.trigger('next.owl'); } else { owl.trigger('prev.owl'); } e.preventDefault(); });</script>";
                        break;

                    default:
                        $html .= "<script>var owl = $('.".$slider->value.".owl-carousel');owl.owlCarousel({ center: true, items:2, loop:true, margin:10, responsive:{ 600:{ items:4 } } });</script>";
                        break;
                }
                return $html;
            } else {
                return '<?php echo "<p><code>@slider('.$expression.')</code> not found!</p>"; ?>';
            }
        });

        /**
         * Contact Form Shortcode
         */
        Blade::directive('contact_form', function ($expression) {
            $fields = Form::all();
            $html = '';
            if ($message = Session::get('error')) {
                $html .= '<div class="alert alert-danger"><strong>Whoops!</strong>'.$message.'</div>';
            }
            if ($message = Session::get('success')) {
                $html .= '<div class="alert alert-info btn-sm"><strong>Success: </strong>'.$message.'</div>';
            }
            if ($fields) {

                $html .= '<form action="'.route('frontend.contact').'" method="POST" class="form col" enctype="multipart/form-data"><input type="hidden" name="_token" value="'.csrf_token().'"><div class="row">';
                // $ext1 = '<div class="col-xs-12 col-sm-12 col-md-12"> <div class="form-group">';
                $ext2 = '</div></div>';
                foreach ($fields AS $fld) {
//                    $html .= '<strong>'.$fld->label.':</strong>';
                    $req = $fld->required == 1?'required':'';
                    $custom_attr = $fld->custom_attr;
                    $inputName = str_replace(' ', '_', strtolower($fld->label));
                    switch ($fld->type) {
                        case 'Checkbox':
                            $options = explode(',', $fld->options);
                            $html .= '<div class="form-group "><label class="pt-3  mb-4 ">'.$fld->label.': </label> ';
                            foreach ($options AS $opt) {
                                $html .= '<input type="checkbox" name="'.$inputName.'[]" value="'.$opt.'" class="p-3 mb-4 ms-2" '.$custom_attr  .  $req.'> '.$opt;
                            }
                            $html .= '<div>';
                            break;

                        case 'Email':
                            $html .= '<div class="form-group position-relative"><input type="email" name="'.$inputName.'" placeholder="'.$fld->label.'" value="" class="form-control position-relative p-3 mb-4" '.$custom_attr  .  $req.'> <span class="position-absolute" style="right: 25px; top: 15px;" ><img width="auto" height="auto" src="'.asset('/images/contact/email.svg').'" loading="lazy"></span> </div>';
                            break;

                        case 'File':
                            $html .= '<div class="form-group"><input type="file" name="'.$inputName.'" class="form-control p-3 mb-4" '.$custom_attr  .  $req.'> </div>';
                            break;

                        case 'Number':
                            $html .= '<div class="form-group"><input type="number" placeholder="'.$fld->label.'" name="'.$inputName.'" class="form-control p-3 mb-4" '.$custom_attr  .  $req.'> </div>';
                            break;

                        case 'Radio':
                            $options = explode(',', $fld->options);
                            $html .= '<div class="form-group "><label class="pt-3  mb-4 ">'.$fld->label.': </label> ';
                            foreach ($options AS $opt) {
                                $html .= '<input type="radio" name="'.$inputName.'" value="'.$opt.'" class="p-3 mb-4 ms-2" '.$custom_attr  .  $req.'> '.$opt;
                            }
                            break;

                        case 'Select':
                            $html .= '<div class="form-group"><select name="'.$inputName.'" class="form-control p-3 mb-4" '.$custom_attr  .  $req.'>';
                            $options = explode(',', $fld->options);
                            foreach ($options AS $opt) {
                                $html .= '<option value="'.$opt.'">'.$opt.'</option>';
                            }
                            $html .= '</select></div>';
                            break;

                        case 'Tel':
                            $html .= '<div class="form-group position-relative"><input type="tel" name="'.$inputName.'" placeholder="'.$fld->label.'" value="" class="form-control position-relative p-3 mb-4" '.$custom_attr  .  $req.'> <span class="position-absolute" style="right: 25px; top: 15px;" ><img width="auto" height="auto" src="'.asset('/images/contact/telephone.svg').'" loading="lazy"></span></div>';
                            break;

                        case 'text':
                            $html .= '<div class="form-group"><input type="text" name="'.$inputName.'" placeholder="'.$fld->label.'" value="" class="form-control p-3 mb-4" '.$custom_attr  .  $req.'>  </div>';
                            break;

                        case 'textarea':
                            $html .= '<div class="form-group position-relative"><textarea name="'.$inputName.'" rows="3" class="form-control pt-3" placeholder="'.$fld->label.'"></textarea><span class="position-absolute" style="right: 25px; top: 15px;" ><img width="auto" height="auto" src="'.asset('/images/contact/message.svg').'" loading="lazy"></span></div>';
                            break;

                        default:
                            $html .= '<div class="form-group"><input type="text" name="'.$inputName.'" value="" placeholder="'.$fld->label.'" class="form-control p-3 mb-4" '.$custom_attr  .  $req.'></div>';
                            break;
                    }
                }
                $html .= '<div class="text-start text-md-left"><input type="submit" value="Submit" class="btn btn-dark mt-4 p-3 ps-5 px-5" name="Submit">'.$ext2.'</div></div></form>';
                $html .= $ext2;
                return $html;
            } else {
                return '<?php echo "<p><code>@contact_form('.$expression.')</code> not found!</p>"; ?>';
            }
        });

        /**
         * Custom Shortcode
         */
        Blade::directive('custom_shortcode', function ($expression) {
            $shortcode = Shortcode::where('value', $expression)->first();
            if ($shortcode) {
                return $shortcode->body;
            } else {
                return '<?php echo "<p><code>@custom_shortcode('.$expression.')</code> not found!</p>"; ?>';
            }
        });

        /**
         * Image Shortcode
         */
        Blade::directive('image', function ($expression){
           $image = Gallery::find($expression);
           if ($image) {
                return '<img width="auto" height="auto" src="'.asset('images/gallery/'.$image->image).'" loading="lazy" alt="'.$image->alt.'" title="'.$image->title.'">';
           } else {
               return '<?php echo "<p>Image Not Found!</p>"; ?>';
           }
        });

        /**
         * Gallery Shortcode
         */
        Blade::directive('gallery', function ($expression){
            $categories = GalleryCategory::all();

            $html = '<ul class="nav nav-pills tab-main pt-5 pb-5 justify-content-center" id="pills-tab" role="tablist"><li data-slug="all" data-id="0" class="gallery-type nav-item active" role="presentation"><button class="nav-link active" id="pills-All-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                type="button" role="tab" aria-controls="pills-home" aria-selected="true">All</button></li>';
            foreach ($categories AS $cat) {
                $html .= '<li data-slug="'.$cat->slug.'" data-id="'.$cat->id.'" class="gallery-type nav-item" role="presentation"><button class="nav-link" id="pills-All-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                type="button" role="tab" aria-controls="pills-home" aria-selected="true">'.$cat->name.'</button></li>';
            }
            $html .= '</ul>';
            $html .= '<div class="container-fluid gallery-main "><div class="row row-cols-sm-6  g-4 row-cols-md-4 gallery-itm"></div></div><div class="pagination pagination-custom justify-content-center mt-5 mb-4">
        <nav class="d-flex justify-items-center justify-content-between">
            <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                <div>
                    <ul class="pagination gallery-pages"></ul>
                </div>
            </div>
        </nav>
    </div>';

            $html .='<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script><script>
                $(function() {
                    loadGalleries();
                    gallery_set()
                });
                function gallery_set() {
                    var msnry = new Masonry(".row", {
                itemSelector: ".col",
                percentPosition: true
            });
            setTimeout(function () {
                msnry.layout();
            }, 100);

            setTimeout(function () {
                msnry.layout();
            }, 300);

            setTimeout(function () {
                msnry.layout();
                $(".loader").hide();
                $("body").removeClass("loader-bg");
            }, 1000);

            setTimeout(function () {
                msnry.layout();
                $(".loader").hide();
            }, 5000);
            setTimeout(function () {
                msnry.layout();
                $("body").removeClass("loader-bg");
            }, 7000);
            setTimeout(function () {
                msnry.layout();
            }, 10000);
                }
                ';

            $html .=' function loadGalleries(page = 1) {
                    $(".loader").show();
                    $("body").addClass("loader-bg");
                    var id = $(".gallery-type.active").attr("data-id");
                    $.ajax({
                        url: "/frontend/gallery/"+id+"/view",
                        method: "GET",
                        data: { page: page },
                        dataType: "json",
                        success: function(response) {
                            if (response.status === "success") {
                                let html = ``;
                                response.galleries.data.forEach(function(gallery) {
                                    html += `
                                <div class="col">
                                    <img width="auto" height="auto"  class="" src="'.asset('images/gallery/${gallery.image}').'" loading="lazy" class="" alt="${gallery.alt}" tilte="${gallery.title}">
                                </div>`;
                                var isImg = "";
                                });
                                if(html == ""){html += `<div class="text-center w-100"><h2>Images not available!</h2></div>`; var isImg = "d-none"; $(".loader").hide();$("body").removeClass("loader-bg");}
                                $(".gallery-itm").html(html);
                                var html1 = ``;
                                response.galleries.links.forEach(function(links) {
                                if(links.active){ var cls = "active";} else { var cls = "";}
                                    html1 += `
                                <li class="mr-4 page-item ${cls} ${isImg}">
                                    <a href="${links.url}"><span class="page-link ${cls}">${links.label}</span></a>
                                </li>`;
                                });
                                html1 += ``;

                                $(".gallery-pages").html(html1);
                                gallery_set()
                            } else {
                                $(".loader").hide();
                                $("body").removeClass("loader-bg");
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            console.log(xhr.responseText);
                            $(".loader").hide();
                            $("body").removeClass("loader-bg");
                        }
                    });
                }';

            $html .= "$(document).on('click', '.pagination a', function(event) {
                    event.preventDefault();
                    let page = $(this).attr('href').split('page=')[1];
                    loadGalleries(page);
                });
                $(document).on('click', '.gallery-type', function(event) {
                    event.preventDefault();
                    $('.gallery-type').removeClass('active');
                    $(this).addClass('active');
                    loadGalleries(1)
                });
            </script>";

            return $html;
        });

        /**
         * Gallery Slider BY Category Shortcode
         */
        Blade::directive('gallery_slider', function ($expression){
            $par = explode(',', $expression);
            if (!isset($par[1]) || $par[1] <= 0) {$no = 15; } else {$no = $par[1];}
            if (empty($par) || empty($expression) || strtolower($par[0]) == 'all') {
                $slides = Gallery::orderBy('id', 'desc')->take($no)->get();
            } else {
                $slides = Gallery::where('category_id', $par[0])->orderBy('id', 'desc')->take($no)->get();
            }
            $html = '';
            if ($slides) {
                $html = '<div id="carouselExampleControls'.$par[0].'" class="carousel slide" data-bs-ride="carousel"> <div class="carousel-inner">';
                foreach ($slides AS $key => $sld) {
                    if ($key==0) {$cl = 'active';} else {$cl = '';}
                    $html .= '<div class="carousel-item  bg-img-1 '.$cl.'">
                                <img width="auto" height="auto" src="'.asset('/images/gallery/'.$sld->image).'" loading="lazy" class="mx-auto d-block w-100" alt="clinte-pic">
                            </div>';
                }
                $html .= '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls'.$par[0].'" data-bs-slide="prev"> <i class="fa fa-regular fa-angle-left bg-white text-muted  fs-3 rounded-circle" style="width:70px;  height:70px; line-height: 70px;"></i> <span class="visually-hidden">Previous</span> </button> <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls'.$par[0].'" data-bs-slide="next"> <i class="fa fa-regular fa-angle-right bg-white text-muted  fs-3 rounded-circle " style="width:70px;  height:70px; line-height: 70px;"></i> <span class="visually-hidden">Next</span> </button> </div>';

            }
            return $html;
        });

        /**
         * Get APP URL
         */
        Blade::directive('app_url', function ($expression){
            return env('APP_URL');
        });

        /**
         * Get APP URL
         */
        Blade::directive('asset_url', function ($expression){
            return config('app.asset_url');
        });


    }
}
