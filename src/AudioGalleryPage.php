<?php
	
namespace IQnection\AudioGalleryPage;

use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use SilverStripe\Forms;

class AudioGalleryPage extends \Page
{
	private static $icon = "iqnection-pages/audiogallerypage:images/icons/icon-audiogallerypage-file.gif";
	private static $table_name = 'AudioGalleryPage';
	
	private static $many_many = [
		"Audios" => Model\Audio::class
	];
	
	private static $many_many_extraFields = [
		'Audios' => [
			'SortOrder' => 'Int'
		]
	];
	
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Audio Files', Forms\GridField\GridField::create(
			'Audios', 
			'Audio Files', 
			$this->Audios(), 
			Forms\GridField\GridFieldConfig_RelationEditor::create(50)
				->addComponents(new GridFieldSortableRows('SortOrder'))
		));
		$this->extend('updateCMSFields', $fields);
		return $fields;
	}
	
	public function Audios()
	{
		return $this->getManyManyComponents('Audios')->sort('SortOrder');
	}
}

