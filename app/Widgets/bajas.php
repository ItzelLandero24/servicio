<?php

namespace App\Widgets;

use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\baja;
use Illuminate\Support\Facades\Auth;

class bajas extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = baja::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-frown',
            'title'  => "{$count} Bajas",
            'text'   => 'Bajas registradas en el sistema',
            'button' => [
                'text' => 'Bajas',
                'link' =>   route('voyager.bajas.index'),
            ],
            'image' => 'fotoutecan.jpg',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('add', (new baja));
    }
}
