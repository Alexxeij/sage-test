<?php

namespace App\Controllers;

use Sober\Controller\Controller;

use MathPHP\Algebra;

use MathPHP\Arithmetic;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function getNumber(){

        // Greatest common divisor (GCD)
        $gcd = Algebra::gcd(8, 12);

        return $gcd;
    }

    public static function getNumberArithmetic(){

        // Copy sign
        $magnitude = 5;
        $sign      = -3;
        $signed_magnitude = Arithmetic::copySign($magnitude, $sign); // -5

        return $signed_magnitude;
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }
}
