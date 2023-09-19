<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Realestate;
use App\Models\Slider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class RealEstateServiceProvider extends ServiceProvider
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
        //
        Blade::directive('realestate_slider', function ($expression) {
            $slider = Slider::where('value', $expression)->first();
            if ($slider) {
                $slides = json_decode($slider->slides);
//                $html = '<div class="row '.$slider->value.' slider owl-carousel owl-theme">';
//                foreach ($slides AS $sld) {
//                    if($sld->img) { $img = '<img width="auto" height="auto" src="'.asset('/images/sliders/'.$sld->img).'" loading="lazy" alt="'.$slider->title.'">'; } else { $img = ''; }
//                    $html .= '<div class="col item">'.$img.'<div class="item-content"><p class="text">'.$sld->text.'</p><p class="text font-italic">-'.$sld->text.'</p></div></div>';
//                }
//                $html .= '</div>';
                $html = '<section class="hero-slider"> <div id="carouselControlsSlider" class="carousel slide" data-bs-ride="carousel"> <div class="carousel-inner">';
                foreach ($slides AS $key => $sld) {
                    if ($key==0) {$cl = 'active';} else {$cl = '';}
                    $html .= '<div class="carousel-item carousel-image bg-img-1 '.$cl.'" style="background-image:url('.asset('/images/sliders/'.$sld->img).')"> <div class="container d-flex align-items-center justify-content-center text-center h-100"> <div class="text-dark"> '.$sld->text.'</div> </div> </div>';
                }
                $html .= '<button class="carousel-control-prev" type="button" data-bs-target="#carouselControlsSlider" data-bs-slide="prev"> <i class="fa fa-regular fa-angle-left bg-white text-muted  fs-3 rounded-circle" style="width:40px;  height:40px; line-height: 40px;"></i> <span class="visually-hidden">Previous</span> </button> <button class="carousel-control-next" type="button" data-bs-target="#carouselControlsSlider" data-bs-slide="next"> <i class="fa fa-regular fa-angle-right bg-white text-muted  fs-3 rounded-circle " style="width:40px;  height:40px; line-height: 40px;"></i> <span class="visually-hidden">Next</span> </button> </div> </section>';
                return $html;
            } else {
                return '<?php echo "<p><code>@realestate_slider('.$expression.')</code> not found!</p>"; ?>';
            }
        });

        /**
         * Commercial Project List For Home Page
         */
        Blade::directive('home_commercial_project', function ($expression) {
            $projects = Realestate::where('project_type', 'Commercial Projects')->orderBy('id', 'desc')->take(3)->get();
            if ($projects) {
                $html = '';
                foreach ($projects AS $prj) {
                    $html .= '<div class="col-lg-4 col-md-4">
                     <div class="card bg-dark text-white card-overlay">
                        <img class="card-img lazy" src="'. asset('storage/uploads/' . $prj->feature_image).'" alt="Commercial Project" loading="lazy">
                        <div class="card-img-overlay">
                           <a href="#">
                              <div class="card-title text-white">
                                '.$prj->title.'
                              </div>
                           </a>
                        </div>
                     </div>
                  </div>';
                }
                return $html;
            } else {
                return '<?php echo "<p><code>@home_commercial_project('.$expression.')</code> not found!</p>"; ?>';
            }
        });


        /**
         * Residential Project List For Home Page
         */
        Blade::directive('home_residential_project', function ($expression) {
            $projects = Realestate::where('project_type', 'Residential Projects')->orderBy('id', 'desc')->take(3)->get();
            if ($projects) {
                $html = '';
                foreach ($projects AS $prj) {
                    $html .= '<div class="col-lg-4 col-md-4">
                     <div class=" bg-dark text-white card-overlay">
                        <img class="card-img lazy" src="'. asset('storage/uploads/' . $prj->feature_image).'" alt="Residential Project" loading="lazy">
                        <div class="text-center bg-white">
                           '.$prj->title.'
                        </div>
                     </div>
                  </div>';
                }
                return $html;
            } else {
                return '<?php echo "<p><code>@home_commercial_project('.$expression.')</code> not found!</p>"; ?>';
            }
        });

        /**
         * Get Blog Shortcode
         */
        Blade::directive('get_blog_realested_theme', function ($expression) {
            $integer = (int)$expression;
            if (is_numeric($integer)) { $num = $integer; } else { $integer = 3; }
            $blogs = Blog::where('blogs.status', '1')->latest()->take($integer)->get();
            $html = '<div class="row row-cols-1 row-cols-md-3  container">';
            foreach ($blogs AS $blog) {
                $html .='<div class="col">
                  <div class="card" style="border: none;">
                     <img src="'.asset("images/".$blog->feature_image).'" loading="lazy" alt="'.$blog->slug.'" class="card-img-top">
                     <div class="card-body">
                        <h5 class="card-title heading-before">'.date('M d, Y', strtotime($blog->created_at)).'</h5>
                        <p class="card-text">'.Str::limit(strip_tags(htmlspecialchars_decode($blog->description)), 100, '...') .'
                        <a href="'.route('blog.detail', $blog->slug).'" class="fw-bold text-dark text-decoration-none d-flex align-items-center">- Read More</a></p>

                     </div>
                  </div>
               </div>';
            }
            $html .= '</div>';
            return $html;
        });

    }
}
