<?php

namespace App\Http\View\Composers;

use App\Models\Keyword;
use Illuminate\View\View;
class KeywordComposer
{
   

    public function compose(View $view)
    {
        $keywords = Keyword::all();
        $view->with('keywords', $keywords);
    }
}