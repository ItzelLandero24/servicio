<?php

namespace App\Widgets;

use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\encuesta;
use Illuminate\Support\Facades\Auth;

class encuestas extends BaseDimmer
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
        $count = encuesta::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-bar-chart',
            'title'  => "Encuestas",
            'text'   => 'Encuestas realizadas',
            'button' => [
                'text' => 'Encuestas',
                'link' =>   route('voyager.encuestas.index'),
            ],
            'image' => 'fotoutecan2.jpg',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('add', (new encuesta));
    }
}
