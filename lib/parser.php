<?php
class Parser
{
	protected $filename, $path, $content;

	public function __construct($filename)
	{
		$this->filename = $filename;
		$this->path = realpath(NULL).DIRECTORY_SEPARATOR.'txt'.DIRECTORY_SEPARATOR.$filename;
		if(!is_file($this->path))
		{
			header("HTTP 1.1/404 Not Found");
			echo "404 Page not found";
			exit;
		}
		$this->content = trim(file_get_contents($this->path));
	}

	public function content()
	{
		return $this->content;
	}

	public function render_raw()
	{
		header("Content-type: text/plain; charset=utf-8");
		echo $this->file;
		exit;
	}

	public function render_download()
	{
		header('Content-type: application/force-download');
		header('Content-Disposition: attachment; filename="'.addslashes($request).'"');
		echo $this->file;
		exit;
	}

	public function render_html($template = 'paste')
	{
		ob_start();
		try
		{
			$content = $this->content;
			$url = (isset($_SERVER['SCRIPT_NAME']) ? substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/')) : '').'/';
			include 'views/'.$template.'.php';
		}
		catch(Exception $e)
		{
			ob_end_clean();
			throw $e;
		}

		header("Content-type: text/html; charset=utf-8");
		ob_end_flush();
		exit;
	}
}
