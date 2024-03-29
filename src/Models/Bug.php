<?php

namespace Goldfinch\BugTracker\Models;

use SilverStripe\ORM\DataObject;
use PhpTek\JSONText\ORM\FieldType\JSONText;

class Bug extends DataObject
{
    private static $singular_name = null;

    private static $plural_name = null;

    private static $table_name = 'Bug';

    private static $cascade_deletes = [];

    private static $cascade_duplicates = [];

    private static $db = [
        'Data' => JSONText::class,
    ];

    private static $casting = [];

    private static $indexes = null;

    private static $defaults = [];

    private static $has_one = [];
    private static $belongs_to = [];
    private static $has_many = [];
    private static $many_many = [];
    private static $many_many_extraFields = [];
    private static $belongs_many_many = [];

    private static $default_sort = null;

    private static $searchable_fields = [];

    private static $field_labels = [];

    private static $summary_fields = [];

    public function requestData()
    {
        return new ArrayData($this->dbObject('Data')->getStoreAsArray());
    }
}
