<?php

namespace Core\Classes;

use Core\Classes\Debug;

class Template extends \Smarty
{
	public	$templatePath,
			$languagePath,
			$language,
			$compilePath,
			$cachePath;
	
	/**
	 * Initiates 
	*/

	public function __construct($language = ''){

		parent::__construct();

		$this->templatePath		=		Config::Get('tempPath');
		$this->languagePath		=		Config::Get('langPath');
		$this->compilePath		=		Config::Get('tempComp');
		$this->cachePath		=		Config::Get('tempCach');

		if(!$language)
			$this->language		=		'Bosnian';

		if(Config::Get('tempCachTime')){
			$this->caching			= 	true;
			$this->cache_lifetime	= 	Config::Get('tempCachTime');
		}

		$this->	setCompileDir($this->compilePath)->
				setCacheDir($this->cachePath)->
				setTemplateDir($this->templatePath);
	}
	
	public function language($file){

		if(Config::Get('underdev'))
			Debug::addLanguage(str_replace('../', '~/', $this->languagePath) .'/'. $this->language .'/'. $file .'.language.php');

		return require ($this->languagePath .'/'. $this->language .'/'. $file .'.language.php');
	}
	
	public function view($file, $vars = ""){

		$this->assign('imeStranice', Config::Get('site_name'));
		$this->assign('language_layout', $this->language('layout'));
		
		if(is_array($vars)){
			foreach($vars as $key => $val){
				$this->assign($key, $val);
			}
		}
		
		$this->display(str_replace('.', '/', $file) . '.tpl');
		if(Config::Get('underdev'))
			Debug::addTemplate($this->templatePath .'/'. str_replace('.', '/', $file) . '.tpl', $vars);
	}
}
?>