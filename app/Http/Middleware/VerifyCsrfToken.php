<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/admin/update-user-status',
        '/admin/banner/update-banner-status',
        '/admin/cms/update-banner-status',
        '/admin/service/update-service-status',
        '/admin/packege/update-packege-status',
        '/admin/news/update-news-status',
        '/admin/blog/update-blog-status',
        '/admin/product/update-product-status',
    ];
}
