<?php

namespace Talanoff\ImpressionAdmin\Services;

use Talanoff\ImpressionAdmin\Helpers\Breadcrumb;

/**
 * Class Breadcrumbs
 * @package App\Services
 */
class Breadcrumbs
{
    private $breadcrumbs = [];

    /**
     * Breadcrumbs constructor.
     */
    public function __construct()
    {
        $this->breadcrumbs = [
            (new Breadcrumb(
                config('ib-admin.breadcrumbs.home_name', 'Home'),
                config('ib-admin.breadcrumbs.home_link', url('/')
                )
            ))->create()
        ];
    }

    public function collect($name, $link = null)
    {
        $this->breadcrumbs[] = (new Breadcrumb($name, $link))->create();

        return $this;
    }

    public function get()
    {
        return $this->breadcrumbs;
    }
}
