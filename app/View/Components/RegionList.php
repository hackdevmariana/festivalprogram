<?php
namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Region;

class RegionList extends Component
{
    public $regions;

    public function __construct()
    {
        $this->regions = Region::all();
    }

    public function render()
    {
        return view('components.region-list');
    }
}
