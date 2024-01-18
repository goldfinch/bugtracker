<?php

namespace Goldfinch\BugTracker\Admin;

use SilverStripe\Admin\ModelAdmin;
use Goldfinch\BugTracker\Models\Bug;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldExportButton;
use SilverStripe\Forms\GridField\GridFieldImportButton;
use SilverStripe\Forms\GridField\GridFieldPrintButton;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;

class BugTrackerAdmin extends ModelAdmin
{
    private static $url_segment = 'bug';

    private static $menu_title = 'Bug Tracker';

    private static $managed_models = [
        Bug::class => [
            'title' => 'Logs',
        ],
    ];

    private static $menu_priority = 0;

    private static $menu_icon_class = 'font-icon-attention-1';

    public $showImportForm = true;

    public $showSearchForm = true;

    private static $page_length = 30;

    protected function getGridFieldConfig(): GridFieldConfig
    {
        $config = parent::getGridFieldConfig();

        $config->removeComponentsByType(GridFieldExportButton::class);
        $config->removeComponentsByType(GridFieldPrintButton::class);
        $config->removeComponentsByType(GridFieldImportButton::class);
        $config->removeComponentsByType(GridFieldAddNewButton::class);

        return $config;
    }
}
