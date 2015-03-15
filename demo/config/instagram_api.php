<?php 
	/**
		*--------------------------------------------------------------------------
		*	Instagram
		*--------------------------------------------------------------------------
		*
		* Instagram client details
		*
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
	**/
return array(
	'instagram_client_name' 	=> 'Instagram Auto Like',
	'instagram_description'		=> 'Autolike Instagram for boosts up user activities',
	'instagram_website'			=> 'http://{{url}}', //your website ex: http://dika.web.id/ig/
	'instagram_callback_url'	=> 'http://{{url}}/index.php/instagram/end', //your callback website ex: http://dika.web.id/ig/index.php/instagram/end

	//Instagram Application Scope
	'scope'						=> array('comments', 'relationships', 'likes', 'basic'),

	//Create your app at https://instagram.com/developer/clients/manage
	'instagram_client_id' 		=> 'your_client_id',
	'instagram_client_secret'	=> 'your_client_secret',

	// There was issues with some servers not being able to retrieve the data through https
	// If you have this problem set the following to FALSE 
	'instagram_ssl_verify'		=> FALSE
);