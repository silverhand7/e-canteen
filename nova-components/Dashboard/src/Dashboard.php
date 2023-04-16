<?php

namespace Silverhand7\Dashboard;

use Laravel\Nova\Card;

class Dashboard extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = 'full';

    public $height = '';

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'dashboard';
    }
}
