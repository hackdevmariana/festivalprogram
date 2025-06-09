<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Helpers\ConfigHelper;

class Footer extends Component
{
    public $copy;
    public $currentYear;
    public $company;
    public $developedBy;
    public $developedUrl;

    public function __construct()
    {
        $this->copy = ConfigHelper::get('copy_type');
        $this->currentYear = date('Y');
        $this->company = ConfigHelper::get('company');
        $this->developedBy = ConfigHelper::get('developed_by');
        $this->developedUrl = ConfigHelper::get('developed_url');
    }

    public function render()
    {
        return view('components.footer');
    }
}
