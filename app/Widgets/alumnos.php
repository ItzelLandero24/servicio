<?php

namespace App\Widgets;

use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\alumno;
use Illuminate\Support\Facades\Auth;

class alumnos extends BaseDimmer
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
        $count = alumno::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-person',
            'title'  => "{$count} Alumnos",
            'text'   => 'Alumnos registrados en el sistema',
            'button' => [
                'text' => 'Alumnos',
                'link' => route('voyager.alumnos.index'),
            ],
            'image' => 'fotoutecan1.jpg',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('add', (new alumno));
    }
}
