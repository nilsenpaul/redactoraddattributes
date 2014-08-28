<?php
namespace Craft;

/**
 * Redactor Styles plugin
 * 
 * 
 * @author André Elvan
 */
class RedactorAddAttributesPlugin extends BasePlugin
{
	public function getName()
	{
		return 'Redactor Add Attributes';
	}

	public function getVersion()
	{
		return '0.1';
	}

	public function getDeveloper()
	{
		return 'Paul Verheul';
	}

	public function getDeveloperUrl()
	{
		return 'http://www.nilsenpaul.nl';
	}

	public function init()
	{
		if (craft()->request->isCpRequest())
		{
			$settings = $this->getSettings();
				
			$addAttributesJson = $settings['redactorAddAttributes'];
			
			$js = 'var RedactorAddAttributes = {};';
			if($addAttributesJson != '') {
				$js .= 'RedactorAddAttributes.addAttributesJson = ' . $addAttributesJson . ';';
			} else {
				$js .= 'RedactorAddAttributes.addAttributesJson = "";';
			}
			craft()->templates->includeJs($js);
			craft()->templates->includeJsResource('redactoraddattributes/addattributes.js');
			
		}
	}

	protected function defineSettings()
	{
		return array(
		 	'redactorAddAttributes' => array(AttributeType::String, 'default' => ''),
		);
	}
	
	public function getSettingsHtml()
	{
		$config_settings = array();
		$config_settings['redactorAddAttributes'] = craft()->config->get('redactorAddAttributes');
	
		return craft()->templates->render('redactoraddattributes/settings', array(
			'settings' => $this->getSettings()
		));
	}
	
}
