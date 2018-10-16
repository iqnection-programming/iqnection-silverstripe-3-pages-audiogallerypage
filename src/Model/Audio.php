<?php

namespace IQnection\AudioGalleryPage\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms;
use SilverStripe\Assets\File;
use SilverStripe\Core\Injector\Injector;

class Audio extends DataObject
{
	private static $table_name = 'AudioGalleryPageAudio';
	
	private static $db = [
		"Title" => "Varchar(255)",
		"Description" => "HTMLText"
	];
	
	private static $many_many = [
		"MP3Files" => File::class,
		"OGGFiles" => File::class,
	];
	
	private static $owns = [
		'MP3Files',
		'OGGFiles'
	];
	
	private static $belongs_many_many = [
		"AudioGalleryPage" => \IQnection\AudioGalleryPage\AudioGalleryPage::class
	];

	private static $summary_fields = [
		'Title' => 'Title'
	];
	
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeByName([
			'FileTracking',
			'LinkTracking',
			'AudioGalleryPage',
			'MP3Files',
			'OGGFiles'
		]);

		$fields->addFieldToTab('Root.Main',Injector::inst()->create(Forms\FileHandleField::class,"MP3Files", "MP3 File")
			->setAllowedExtensions(['mp3'])
			->setFolderName('Uploads/audio')
			->setIsMultiUpload(false) );
		$fields->addFieldToTab('Root.Main',Injector::inst()->create(Forms\FileHandleField::class,"OGGFiles", "OGG File")
			->setAllowedExtensions(array('ogg'))
			->setFolderName('Uploads/audio')
			->setIsMultiUpload(false) );
		
		$this->extend('updateCMSFields', $fields);
		return $fields;
	}
		
	public function canCreate($member = null,$context=[]) { return true; }
	public function canDelete($member = null,$context=[]) { return true; }
	public function canEdit($member = null,$context=[]) { return true; }
	public function canView($member = null,$context=[]) { return true; } 
	
	public function forTemplate()
	{
		return $this->renderWith('IQnection/AudioGalleryPage/Includes/AudioPlayer');
	}
	
}

