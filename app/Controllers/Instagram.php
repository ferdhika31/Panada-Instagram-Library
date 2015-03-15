<?php
namespace Controllers;
use Resources, Models;

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
	**/
class Instagram extends Resources\Controller{

	function __construct(){
		parent::__construct();
		//Load library Panada
		$this->session = new Resources\Session();
		$this->request = new Resources\Request;

		//Load the Instagram API Config file
		$this->instagram_api_config = Resources\Config::instagram_api(); 

		//Set access token with session
		$this->library->instagram_api()->access_token = $this->session->getValue('instagram_token');
	}

	public function get_tags($text, $strip_sharp=true) {
		$return = null;	
		preg_match_all("/(#\w+)/", $text, $matches);
		if($strip_sharp){
			$i=0;
			foreach($matches[1] as $tag) {
				$return[$i] = str_replace("#", "", $tag);
				$i++;
			}
		} else {
			$return = $matches[1];
		}
		return $return;
	}

	public function submit_tag() {
		$tags_input = $this->request->post('tags');
		$tags_array = $this->get_tags($tags_input);

		if($tags_input){
			$piew = array(
				'title' 		=> $this->instagram_api_config['instagram_client_name'],
				'tag'			=> '#adaw',
				'tags_array' 	=> $tags_array
			);
			$this->output('instagram_results',$piew);
		}else{
			$this->redirect('instagram');
		}
		
	}

	public function index(){
		//check login instagram
		$stat = $this->library->instagram_api()->is_login();
		$piew = array(
			'title' => $this->instagram_api_config['instagram_client_name'],
			'url' => $this->library->instagram_api()->instagramLogin(),
			'fullname' => $this->session->getValue('instagram_full_name')
		);
		if($stat!=TRUE){
			$this->output('instagram_welcome',$piew);
		}else{
			$this->output('instagram_home',$piew);
		}
	}

	public function likeTags(){
		//check login instagram
		$stat = $this->library->instagram_api()->is_login();
		if($stat!=true){
			$this->redirect('instagram');
		}
		$piew = array(
			'title' => $this->instagram_api_config['instagram_client_name'],
			'url' => $this->library->instagram_api()->instagramLogin()
		);
		$this->output('instagram_hastag',$piew);
	}

	public function likeFeed(){
		//check login instagram
		$stat = $this->library->instagram_api()->is_login();
		if($stat!=true){
			$this->redirect('instagram');
		}
		//load library api instagram
		$adaw = $this->library->instagram_api()->getUserFeed();

		$piew = array(
			'title' 	=> $this->instagram_api_config['instagram_client_name'],
			'url' 		=> $this->library->instagram_api()->instagramLogin(),
			'adaw' 		=> $adaw
		);

		if($this->request->post('bttn_like')){
			$this->output('instagram_feed_result',$piew);
			exit();
		}
		$this->output('instagram_feed',$piew);
	}

    public function end(){
    	//check login instagram
    	$stat = $this->library->instagram_api()->is_login();
    	if($stat!=TRUE){
    		if(isset($_GET['code']) && $_GET['code'] != ''){
    			$auth_response = $this->library->instagram_api()->authorize($_GET['code']);
    			if(isset($auth_response->access_token) &&  $auth_response->access_token != ''){
    				$adaw = array(
    					'instagram_token' 			=> $auth_response->access_token,
    					'instagram_username'		=> $auth_response->user->username,
    					'instagram_profile_picture'	=> $auth_response->user->profile_picture,
    					'instagram_user_id'			=> $auth_response->user->id,
    					'instagram_full_name'		=> $auth_response->user->full_name,
    					'instagram_url'				=> 'http://instagram.com/'.$auth_response->user->username
    				);
    				$this->session->setValue($adaw);
    				$this->redirect('instagram');
    			}else{
    				$this->redirect('instagram');
    			}
    		}else{
    			$this->redirect('instagram');
    		}
    	}
	}

	public function username($user="ferdhika31"){
		$adaw = $this->library->instagram_api()->userSearch($user);
		foreach ($adaw->data as $key => $adaw) {
			echo "
			<a href='http://instagram.com/".$adaw->username."' target='_blank'><img src='".$adaw->profile_picture."'></a>
			<br>
			Nama : ".$adaw->full_name."
			";
		}
		
	}

    public function login(){
    	$this->session->setValue('instagram_token','adaw');
    }

    public function logout(){
    	$this->session->destroy();
		$this->redirect('instagram');
    }

}