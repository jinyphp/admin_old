<?php

namespace Jiny\Admin\Http\Livewire;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

use Jiny\Action\Http\Livewire\LiveData;
use Jiny\Action\Http\Livewire\LiveTable;

class LiveTreeJson extends Component
{

    public function mount()
    {

    }

    public function render()
    {
        if (function_exists("theme")) {
            $themeList = theme()->getThemeList();
        } else {
            $themeList = [];
        }

        //dd($themeList);
        return view("jinyadmin::livewire.tree",['tree'=>$themeList]);
    }


}
