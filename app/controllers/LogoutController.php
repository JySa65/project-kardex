<?php 
if (!is_authenticated()) {
	return redirect('login');
}
class LogoutController
{
	function __construct()
	{
		
	}

	public function index()
	{
		sessionLocal();
		session_destroy();
		return redirect('login');
	}
}


?>