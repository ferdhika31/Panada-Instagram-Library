<?php $this->output('header');?>
<body>
<h1 class="logo"><img alt="Logo" src="<?php echo $this->uri->baseUri;?>assets/img/logo.png" /></h1>
<div id="konten">
    <h1><?php echo $title;?> has been installed successfully!</h1>
    <p>
    	<form action="<?php echo $this->location();?>instagram/submit_tag" method="post">
			<p>Type hashtag at below such as #travel #bandung #explorelembang #explorebandung</p>
			<p> <textarea rows="5" cols="50" name="tags" id="tags">#explorelembang</textarea></p>
			<input type="submit" value="Like!" name="bttn_like" id="bttn_like">
		</form>
    </p>
    <code><a href="<?php echo $this->location();?>instagram/logout">Sign out Instagram</a></code>
</div>

<div id="foot">Made in Bandung and powered by <a href="http://dika.web.id/">dika.web.id</a>, Created with <a href="http://panadaframework.com/">Panada</a> version 1.0.0-alfa
</div>
<a href="https://github.com/ferdhika31/Panada-Instagram-Library">
<img src="<?php echo $this->uri->baseUri; ?>assets/img/forkgithub.png" style="position: absolute; top: 0; right: 0; border: 0;" alt="Fork me on GitHub"></a>	
</body>
</html>