<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LangSwitcher extends Component
{

    public $currentLocale;
    public $otherLocale;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->currentLocale = app()->getLocale();
        $this->otherLocale = $this->currentLocale === 'pt' ? 'en' : 'pt';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.lang-switcher');
    }
}
