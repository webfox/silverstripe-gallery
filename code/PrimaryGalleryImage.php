<?php

/**
 * @method SiteTree Page()
 */
class PrimaryGalleryImage extends DataObject
{

    protected static $db = [
        'Title'     => 'Varchar(255)',
        'Displayed' => 'Boolean',
        'SortOrder' => 'Int'
    ];

    protected static $has_one = [
        'OwnerObject'  => 'DataObject',
        'Image' => 'Image'
    ];

    private static $defaults = [
        'Displayed' => true
    ];

    protected static $default_sort = 'SortOrder';

    public function getCMSFields()
    {
        $config = $this->OwnerObject()->config()->get("primary_gallery") ?: [];
        if (!is_array($config) || !isset($config['folder'])) {
            $config = ['folder' => 'Primary-Gallery-Images'];
        }

        $fields = new FieldList([
            TextField::create('Title', 'Title/Caption'),
            DropdownField::create('Displayed', 'Displayed', [1 => 'Displayed', 0 => 'Hidden']),
            UploadField::create('Image', 'Image')->setFolderName("Images/{$config['folder']}")
        ]);
        
        $this->extend('updateCMSFields', $fields);

        return $fields;
    }

    public function canView($member = null)
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canEdit($member = null)
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canDelete($member = null)
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canCreate($member = null)
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }
}
