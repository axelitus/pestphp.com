<?php

namespace App\Http\Controllers;

use App\Support\Documentation;
use Illuminate\View\View;
use App\Services\JetBrainsMarketplace;
use Illuminate\Contracts\View\Factory;
use App\Services\VisualStudioMarketplace;
use Illuminate\Contracts\Foundation\Application;

class IDEPluginsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param JetBrainsMarketplace $jetbrains
     * @param VisualStudioMarketplace $visualStudio
     * @param Documentation $docs
     * @return Application|Factory|View
     */
    public function __invoke(JetBrainsMarketplace $jetbrains, VisualStudioMarketplace $visualStudio, Documentation $docs)
    {
        return view('ide', [
            'index' => $docs->getIndex(config('site.defaultVersion')),
            'jetbrains' => $jetbrains->downloadNumber(),
            'visualStudio' => $visualStudio->downloadNumber(),
        ]);
    }
}
