<?php 
namespace plance\helper;

class HelperFile
{
	/**
	 * Deletes file
	 * @param string $path_file path to the file
	 */
	public static function deleteFile($path_file = NULL)
	{
		if(is_file($path_file))
		{
			unlink($path_file);
		}
	}
	
	/**
	 * Creates directories with the specified prefixes
	 * @param array $path_ar Array of paths in which to create directories
	 * @param array $suf_ar Array of suffixes / names of new directories
	 * @return string
	 */
	public static function createPaths(array $path_ar = array(), array $suf_ar = array())
	{
		$path_suf 	= NULL;
		
		foreach ($suf_ar as $suf)
		{
			$path_suf .= $suf.'/';
			
			foreach ($path_ar as $path)
			{
				if(is_dir($path.$path_suf) == FALSE)
				{
					mkdir($path.$path_suf);
				}
			}
		}
		
		return substr($path_suf,0,-1);
	}
}