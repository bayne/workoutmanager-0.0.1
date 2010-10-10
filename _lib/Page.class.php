<?php
class Page
{
	public static function renderPage($styles,$scripts,$header,$content,$footer)
	{
		foreach( $scripts as $script)
		{
			echo sprintf('<script type="text/javascript" src="%s" ></script>', $script);
		}
		echo $content;
	}
}