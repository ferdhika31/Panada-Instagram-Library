<?php $this->output('header');?>
<body>
<h1 class="logo"><img alt="Logo" src="<?php echo $this->uri->baseUri;?>assets/img/logo.png" /></h1>
<div id="konten">
    <h1><?php echo $title;?> has been installed successfully!</h1>
    <?php
    	if(!empty($adaw)){
    		foreach ($adaw->data as $key => $adaw) {
    			echo "<code>
    				<a href='".$adaw->images->standard_resolution->url."' target=\"_blank\">
    					<img src='".$adaw->images->standard_resolution->url."' height=\"150\" />
    				</a><br>
    				ID : ".$adaw->id."<br>
    				Caption : ".$adaw->caption->text."<br>";
    			$liked = $this->library->instagram_api()->postLike($adaw->id);
    			if($liked->meta->code == '200'){
    				echo "Status : <strong>Liked!</strong>";
    			}else{
    				echo "Status : <strong>Fail! -> ".$liked->meta->error_message."</strong>";
    			}
    			echo "
    			</code>";
    		}
    	}
    ?>
    <code><a href="<?php echo $this->location();?>instagram/logout">Sign out Instagram</a></code>
</div>

<div id="foot">Made in Bandung and powered by <a href="http://dika.web.id/">dika.web.id</a>, Created with <a href="http://panadaframework.com/">Panada</a> version 1.0.0-alfa
</div>
<a href="https://github.com/ferdhika31/Panada-Instagram-Library">
<img src="<?php echo $this->uri->baseUri; ?>assets/img/forkgithub.png" style="position: absolute; top: 0; right: 0; border: 0;" alt="Fork me on GitHub"></a>	
</body>
</html>