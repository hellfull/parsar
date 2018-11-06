<?php


class App
{
	public $parsable_path;
	private $parsable_filename;

	public $app_path;
	public $app_path_step;
	public $data_root;

	public function __construct()
	{
		global $argv;
		$this->app_path = constant('APP_PATH');

		$this->data_root = $this->app_path.'/app/data/';
		$this->parsable_filename = 'parsable.json';
		$this->check_user_registered();

		$this->parsable_path = $this->get_registered_parsable();

		if (count($argv)>0)
		{
			for ($i = 1; $i < count($argv); $i++)
			{
				if ($argv[$i] == 'update')
				{
					echo "You are going to update the parsable folder. Are you sure? (Yes/no): ";
					$handle = fopen ("php://stdin","r");
					$line = fgets($handle);
					$line = trim($line);
					if ($line == 'no')
					{
						echo "Update cancelled by user.\n";
					} else if ($line == 'yes' || $line == 'Yes' || $line == 'y' || $line == 'Y' || $line == ''){
						$this->parsable_path = '';
					}
				}
			}
		}
		if ($this->parsable_path == '')
		{
			$this->register_parsable();
		}
		$phpparsar = new PhpParsar($this->parsable_path);
		$phpparsar->start();
	}

	protected function getParsablePath()
	{
		return $this->parsable_path;
	}

	protected function get_registered_parsable()
	{
		if ($str = @file_get_contents($this->data_root.$this->parsable_filename))
		{
			$json = json_decode($str, true);
			return $json['data']['path'];
		}

		return '';
	}

	private function check_user_registered()
	{
		// check if user.json exists if not prompt user to give his detials in command line
	}

	private function register_parsable()
	{
			echo "Type the path of the folder to be parsed: ";
			$handle = fopen ("php://stdin","r");
			$line = fgets($handle);
			if ($line == '')
			{
			    echo "Default this directory\n";
					$this->parsable_path = getcwd();
			}
			$lineJson = new Json();
			$lineJson = $lineJson->stringToJson('path',trim($line));
			$f = fopen($this->data_root.$this->parsable_filename, 'w');
			fwrite($f,$lineJson);
			fclose($f);
			$this->parsable_path = $this->get_registered_parsable();
			fclose($handle);
			echo "\n";
			echo "Good luck, continuing...\n";
	}
}
