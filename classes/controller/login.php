<?php
class login
{
	public function index()
	{
		$view = View::instance()->render("login/index.php"); 
		echo $view;
	}
}
?>