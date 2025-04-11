<?php

namespace App\Http\View\Composers;

use App\Services\CategoryService;
use Illuminate\View\View;
use App\Settings\GeneralSettings;
class SettingComposer
{
    public function __construct(private GeneralSettings $setting) {

    }

    public function compose(View $view)
    {
        $view->with('setting', $this->setting);
    }
}