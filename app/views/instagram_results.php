<?php $this->output('header');?>
<body>
<h1 class="logo"><img alt="Logo" src="<?php echo $this->uri->baseUri;?>assets/img/logo.png" /></h1>
<div id="konten">
    <h1><?php echo $title;?> has been installed successfully!</h1>
    <?php
    		$result_success=$result_fail=0;
			foreach($tags_array as $tag) {
				echo '<p>Results : '.$tag.'</p><hr>';
				$media = $this->library->instagram_api()->tagsRecent($tag);
				foreach($media->data as $key=>$media) {
					echo '<code>ID: '.$media->id.'';
					$return = $this->library->instagram_api()->postLike($media->id);
					//var_dump($return);
					if($return->meta->code == '200') {
						echo '(SUCCESS)</code>';
						$result_success++;
					} else {
						echo 'FAIL -> '. $return->meta->error_message.'</code>';
						$result_fail++;
					}
					echo '</p>';
				}
			}
			echo '<code>TOTAL SUCCESS: '.$result_success.'<br />';
			echo 'TOTAL FAIL: '.$result_fail.'</code>';
    ?>
    <code><a href="<?php echo $this->location();?>instagram/logout">Sign out Instagram</a></code>
</div>

<div id="foot">Made in Bandung and powered by <a href="http://dika.web.id/">dika.web.id</a>, Created with <a href="http://panadaframework.com/">Panada</a> version 1.0.0-alfa
</div>
<a href="https://github.com/ferdhika31/Panada-Instagram-Library">
<img src="<?php echo $this->uri->baseUri; ?>assets/img/forkgithub.png" style="position: absolute; top: 0; right: 0; border: 0;" alt="Fork me on GitHub"></a>	
</body>
</html>