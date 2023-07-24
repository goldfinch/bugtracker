<?php

namespace Goldfinch\BugTracker\Views;

use SilverStripe\View\ViewableData;
use Goldfinch\BugTracker\Services\BugService;

class BugTracker extends ViewableData
{
    public function forTemplate()
    {
        if (!$this->authorized())
        {
            return;
        }

        // $data = BugService::...();

        return $this->customise(['jsonData' => $data ? json_encode($data) : null])->renderWith('Goldfinch/BugTracker/Views/BugTracker');
    }

    private function authorized()
    {
        $cfg = SiteConfig::current_site_config();

        return $cfg->BugTrackerEnabled;
    }
}
