<?php

namespace App\Providers;

use App\Models\Products;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ProductProvider extends ServiceProvider
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
         * Get Product List
         */
        Blade::directive('product_slider', function ($expression) {
            $products = Products::all()->toArray();
            $html = '<div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="testimonial-carousel carousel slide ps-5 pe-5" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">';

            foreach ($products AS $k => $prd) {
                if ($k == 0) {
                    $cl ='active';
                } else {
                    $cl = '';
                }
                $html .= '<div class="carousel-item ' . $cl . '">
                <div class="col-md-4 p-sm-2">
                    <div class="bg-white p-4">
                        <div class="card-img p-4">
                            <img src="' . asset('/images/products/' . $prd['product_image']) . '" loading="lazy" width="150" height="auto" class="img-fluid">
                        </div>
                        <h3 class="fs-5 fw-bold">' . (empty($prd['short_title']) ? $prd['title'] : $prd['short_title']) . '</h3>
                        <p class="text-secondary fa-sm">' . $prd['price'] . '</p>' .
                        (!empty($prd['purchase_url']) ? 'test' : '') .
                        '
                    </div>
                </div>
            </div>';
            }
            $html .= '</div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                        <span class="fa fa-solid fa-chevron-up fa-rotate-270 text-muted" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                        <span class="fa fa-solid fa-chevron-up fa-rotate-90 text-muted" aria-hidden="true"></span>
                    </a>
                </div>
            </div><script>
            let items = document.querySelectorAll(".testimonial-carousel .carousel-item");
            items.forEach((el) => {
                const minPerSlide = 3;
                let next = el.nextElementSibling;
                for (var i=1; i<minPerSlide; i++) {
                    if (!next) {
                        next = items[0];
                    }
                    let cloneChild = next.cloneNode(true);
                    el.appendChild(cloneChild.children[0]);
                    next = next.nextElementSibling;
                }
            })
        </script>';

            return $html;
        });

    }
}
