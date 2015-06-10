<?
	class Audio extends DataObject
	{
		private static $db = array(
			"SortOrder" => "Int",
			"Title" => "Varchar(255)",
			"Description" => "HTMLText"
		);
		
		private static $has_one = array(
			"AudioGalleryPage" => "AudioGalleryPage",
			"MP3File" => "File",
			"OGGFile" => "File",
		);

		private static $summary_fields = array(
			'Title' => 'Title'
		);
		
		public function getCMSFields()
		{	
			$fields = new FieldList(
				new TextField("Title", "Title"),
				new HTMLEditorField("Description", "Description"),
				$mp3file = new UploadField("MP3File", "MP3 File"),
				$oggfile = new UploadField("OGGFile", "OGG File")
			);
			
			$mp3file->setAllowedExtensions(array('mp3'));
			$oggfile->setAllowedExtensions(array('ogg'));
			return $fields;
		}
		
		public function MP3FileURL()
		{
			if ($this->MP3FileID)
			{
				return $this->MP3File()->getAbsoluteURL();
			}
			else
			{
				return false;
			}
		}
		
		public function OGGFileURL()
		{
			if ($this->OGGFileID)
			{
				return $this->OGGFile()->getAbsoluteURL();
			}
			else
			{
				return false;
			}
		}
		
		public function AudioPlayer()
		{
			$mp3_url = $this->MP3FileURL();
			$ogg_url = $this->OGGFileURL();
			$html = "";
			
			if ($mp3_url || $ogg_url)
			{
				$html .= "<audio controls='controls' preload='metadata'>";
				if ($mp3_url) $html .= "<source src='{$mp3_url}' type='audio/mpeg'>";
				if ($ogg_url) $html .= "<source src='{$ogg_url}' type='audio/ogg'>";
//				$html .= "Your browser does not support the audio tag.";
				$html .= "</audio>";
			}
			
			return $html;
		}
		
		public function canCreate($member = null) { return true; }
		public function canDelete($member = null) { return true; }
		public function canEdit($member = null) { return true; }
		public function canView($member = null) { return true; }
	}
	
	class AudioGalleryPage extends Page
	{
		static $icon = "iq-audiogallerypage/images/icon-audiogallerypage";
		
		private static $has_many = array(
			"Audios" => "Audio"
		);
		
		public function getCMSFields()
		{
			$fields = parent::getCMSFields();
			
			$audios_config = GridFieldConfig::create()->addComponents(				
				new GridFieldSortableRows('SortOrder'),
				new GridFieldToolbarHeader(),
				new GridFieldAddNewButton('toolbar-header-right'),
				new GridFieldSortableHeader(),
				new GridFieldDataColumns(),
				new GridFieldPaginator(10),
				new GridFieldEditButton(),
				new GridFieldDeleteAction(),
				new GridFieldDetailForm()				
			);
			$fields->addFieldToTab('Root.Content.AudioFiles', new GridField('Audios','Audios',$this->Audios(),$audios_config));
			return $fields;
		}			
	}

	class AudioGalleryPage_Controller extends Page_Controller
	{
		public function init()
		{
			parent::init();
		}	
	}
?>