<?php
class Parser
{
	protected $filename, $path, $content, $loaded = FALSE;

	public function __construct($filename = NULL)
	{
		$path = realpath(NULL).DIRECTORY_SEPARATOR.'txt'.DIRECTORY_SEPARATOR;

		if($filename === NULL)
		{
			$this->filename = uniqid().".md";
			$this->path = $path.$filename;
			touch($this->path);
			$this->content = "";
		}
		else
		{
			$this->filename = $filename;
			$this->path = $path.$filename;

			if(!is_file($this->path))
			{
				header("HTTP/1.1 404 Not Found");
				echo "404 Page not found";
				exit;
			}
			$this->content = trim(file_get_contents($this->path));
			$this->loaded = TRUE;
		}

	}

	public function content()
	{
		return $this->content;
	}

	public function update_key()
	{
		return sha1(UNIQUE_PASTE_KEY.$this->filename);
	}

	public function save($content)
	{
		$this->content = trim($content);
		file_put_contents('txt/'.$this->filename, $this->content);
	}

	public function render_raw()
	{
		header("Content-type: text/plain; charset=utf-8");
		echo trim(file_get_contents($this->path));
		exit;
	}

	public function render_download()
	{
		header('Content-type: application/force-download');
		header('Content-Disposition: attachment; filename="'.addslashes($request).'"');
		echo trim(file_get_contents($this->path));
		exit;
	}

	public function render_html($template = 'paste')
	{
		if(isset($_GET['update']) && $_GET['update'] == $this->update_key())
		{
			$modify_paste = TRUE;

			if(isset($_POST['paste']))
			{
				$this->save($_POST['paste']);
			}
		}

		if(isset($_SESSION['new_paste']) && $_SESSION['new_paste'] === TRUE)
		{
			$share_link = $this->link();
			$modify_link = $this->modify_link();
			$new_paste = TRUE;
			$_SESSION['new_paste'] = false;
		}

		ob_start();
		try
		{
			$content = htmlspecialchars($this->content);
			$url = static::base_url();
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

	public function link()
	{
		return static::base_url(TRUE).$this->filename;
	}

	public function modify_link()
	{
		return static::base_url(TRUE).$this->filename.'?update='.$this->update_key();
	}

	public function redirect()
	{
		header("Location: ".$this->link());
		exit;
	}
	
	public function redirect_modify()
	{
		header("Location: ".$this->modify_link());
		exit;
	}

	protected static function base_url($host = FALSE)
	{
		$domain = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
		$url = (isset($_SERVER['SCRIPT_NAME']) ? substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/')) : '').'/';
		return ($host === TRUE) ? 'http://'.$domain.$url : $url;
	}
}
