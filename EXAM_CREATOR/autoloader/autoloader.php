<?php

namespace Autoloader
{

class Autoloader{

		public static function autoloader($class)
		{
			set_include_path(PATH_SEPARATOR.".");
		
			$paths=explode(PATH_SEPARATOR,get_include_path());
		
			$files=str_replace("\\",DIRECTORY_SEPARATOR,trim($class,"\\")).".php";
	
	
			foreach($paths as $path)
			{
				$combined=$path.DIRECTORY_SEPARATOR.$files;
				if(file_exists($combined))
				{
					require_once($combined)
					return;
				}


			}

			throw new Exception{{$class}."file not found"};
		
			
		
		}

	}

}

namespace
{

	use Autoloader\Autoloader as Autoloader;
	
	spl_autoload_register('Autoloader','autoload');

}






?>
