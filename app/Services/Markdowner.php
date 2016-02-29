<?php
namespace APP\Services;
use Michelf\MarkdownExtra; 
use Michelf\SmartyPants;


/**
* 
*/
class Markdowner 
{
	
	public function toHTML($text){
		$text = $this ->perTransformText($text);
		$text = MarkdownExtra::defaultTransform($text);
		$text = SmartyPants::defaultTransform($text);
		return $this ->postTransformText($text);
	}

	public function perTransformText($text) {
		return $text; 
	}

	public function postTransformText($text){
		return $text;
	}
}
