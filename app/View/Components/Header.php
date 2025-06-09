<?php
namespace App\View\Components;

use Illuminate\View\Component;
use App\Helpers\ConfigHelper;

class Header extends Component
{
    public $name;
    public $logo;
    public $slogan;

    public function __construct()
    {
        $this->name = ConfigHelper::get('name');
        $this->logo = ConfigHelper::get('logo');
        $this->slogan = ConfigHelper::get('slogan');
    }

    public function render()
    {
        return view('components.header');
    }
}
