<?php

namespace Goldfinch\BugTracker\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\ORM\ValidationResult;
use SilverStripe\Core\Environment;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'BugTrackerEnabled' => 'Boolean',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        if (Environment::getEnv('SS_BUG_TRACKER'))
        {
            $fields->addFieldsToTab('Root.Main', [

                CheckboxField::create('BugTrackerEnabled', 'Enable bug tracker')

            ]);
        }
    }

    public function validate(ValidationResult $validationResult)
    {
        // $validationResult->addError('Error message');
    }
}
