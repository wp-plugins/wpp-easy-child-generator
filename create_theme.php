<?php
function wpp_ctg_child_theme_create_process()
{	

if(isset($_POST['submit']))
{
	if(isset($_POST['theme']))
	{

	if(isset($_POST['theme']) && $_POST['theme']!='')
	{
		$_POST['theme']=sanitize_text_field($_POST['theme']);
		$_POST['theme']=esc_html($_POST['theme']);
		$_POST['theme']=stripcslashes($_POST['theme']);
		$_POST['theme']=trim($_POST['theme']);
		$theme=$_POST['theme'];
	
	}
	else
	{
	$old_url=admin_url().'/admin.php?page=child-theme-genrator';
	wp_redirect( $old_url."&&error=1" );
	exit;		
	}

	chmod(get_theme_root(),0777);

	if(!is_dir( get_theme_root()."/".$theme."-child"))
	{
		mkdir( get_theme_root()."/".$theme."-child",0777,true);
	}

	chmod(get_theme_root()."/".$theme."-child",0777);

$string="	
/*
Theme Name: $theme-Child
Author: Webplusplus
Description: This is a Child Theme generator By <a href='http://webplusplus.in/wpp-easy-child-theme-creater.php' style='text-decoration:none'>Wpp Easy Child Theme Generator</a>
Version: 1.0
Template: $theme
*/

@import url('../$theme/style.css');

";
	
	
	
	fopen( get_theme_root()."/".$theme."-child/style.css",'w');
	file_put_contents( get_theme_root()."/".$theme."-child/style.css",$string);
	copy( get_theme_root()."/".$theme."/screenshot.png", get_theme_root()."/".$theme."-child/screenshot.png");
	$old_url=admin_url().'/admin.php?page=child-theme-genrator';
	wp_redirect( $old_url."&&success=true" );
	
	}
	else
	{
	$old_url=admin_url().'/admin.php?page=child-theme-genrator';
	wp_redirect( $old_url."&&error=1" );
	exit;
	}

	
}
else
{
$old_url=admin_url().'/admin.php?page=child-theme-genrator';
wp_redirect( $old_url."&&error=1" );
exit;
}

}
add_action('admin_post_wpp_child_theme_create_process','wpp_ctg_child_theme_create_process');
