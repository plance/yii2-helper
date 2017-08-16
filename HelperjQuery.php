<?php
namespace plance\helper;

use Yii;
use yii\web\JqueryAsset;

class HelperjQuery
{
	/**
	 * Path to assets folder
	 * @var string
	 */
	public $assets;
	
	/**
	 * Path to plugin folder
	 * @var string
	 */
	public $path;
	
	/**
	 * Include fancybox
	 * @param string $element
	 */
	public function fancybox($element)
	{
		Yii::$app -> view -> registerCssFile($this -> getAssets().$this -> path.'/jquery.fancybox.css');
		Yii::$app -> view -> registerJsFile($this -> getAssets().$this -> path.'/jquery.fancybox.js', [
			'depends' => [JqueryAsset::className()]
		]);
		
		Yii::$app -> view -> registerJs("jQuery(\"".$element."\").fancybox();\n");
	}
	
	//===========================================================
	// PRIVATE
	//===========================================================
	
	/**
	 * Return path to assets
	 * @return string
	 */
	private function getAssets()
	{
		return Yii::$app -> assetManager -> getPublishedUrl($this -> assets);
	}
}