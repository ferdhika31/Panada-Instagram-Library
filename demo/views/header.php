<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo $this->uri->baseUri;?>assets/css/main.css" type="text/css" media="screen" />
</head>
<a href="<?php echo $this->location();?>">Home</a> | 
<a href="<?php echo $this->location();?>instagram/likeTags">Like by Tags</a> | 
<a href="<?php echo $this->location();?>instagram/likeFeed">Like Feeds</a>