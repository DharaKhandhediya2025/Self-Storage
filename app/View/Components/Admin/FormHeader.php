<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class FormHeader extends Component
{
    public $title;
    public $subtitle;

    public function __construct($title,$subtitle) {
        
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    public function render() {
        return view('components.admin.form-header');
    }
}