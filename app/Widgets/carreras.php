<?php

namespace App\Widgets;

use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\carrera;
use Illuminate\Support\Facades\Auth;

class carreras extends BaseDimmer
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
        $count = carrera::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-people',
            'title'  => "{$count} Carreras",
            'text'   => 'Carreras registradas en el sistema',
            'button' => [
                'text' => 'Carreras',
                'link' =>   route('voyager.carreras.index'),
            ],
            'image' => 'fotoutecan3.jpg',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('add', (new carrera));
    }
}
