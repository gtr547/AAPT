<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavigationBar extends Component
{
    public $navigationItems;

    public function __construct()
    {
        $this->navigationItems = [
            ['label' => 'Home', 'url' => '#'],
            ['label' => 'About Us', 'url' => '#'],
            ['label' => 'Act & Regulations', 'url' => '#'],
            ['label' => 'Member', 'url' => '#'],
            ['label' => 'Notices', 'url' => '#'],
            ['label' => 'Case Management Services', 'url' => '#'],
            ['label' => 'FAQ', 'url' => '#'],
            ['label' => 'Contact Us', 'url' => '#'],
        ];
    }

    public function render()
    {
        return view('components.navigation-bar');
    }
}