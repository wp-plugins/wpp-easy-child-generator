<?php
/*
Plugin Name: Wpp Easy Child Generator
Author: Piyush Kapoor
Description: A plugin that allows to create Child Theme of your installed wordpress theme
Version: 1.0
Author URI: http://www.webplusplus.in/child-generator.php
*/


/*  Copyright 2015  Piyush Kapoor  (email : Piyushkapoor786@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

http://www.gnu.org/licenses/gpl.txt

*/
include "create_theme.php";

//===========================Page Create Begin==================
function wpp_ctg_show_page()
{
add_menu_page('Child Theme Genrator','Child Theme Genrator','manage_options','child-theme-genrator','wpp_ctg_child_theme_genrator');

	function wpp_ctg_child_theme_genrator()
	{
		
		echo "<div class='wrap'>";
		echo "<div style='max-width:600px'>";
		echo "<h1>Child Theme Genrator</h1>";
		echo "<hr>";
		
		if(isset($_GET['success']) && $_GET['success']==true)
		{
		?>
		<br>
		<div class='updated'><p><?php _e('You have Created Child Theme !!') ;?></p></div>
		<?	
		}
		
		if(isset($_GET['error']) && $_GET['error']==1)
		{
		?>
		<br>
		<div class='error'><p><?php _e('Come Problem Occured!! Try Again') ;?></p></div>
		<?	
		}

		
		echo "<form action='admin-post.php' method='post'>";
		echo '<input type="hidden" name="action" value="wpp_child_theme_create_process">';
		$dir=get_theme_root();
		$path=$dir;
		$scanned_directory = array_diff(scandir($path), array('..', '.'));
		
		echo "<div>";
		echo "<label style='font-size:16px;font-weight:600;padding-right:20px' >Select Theme</label>";
		echo "<select name='theme' style='float:right;width:300px'>";		
		foreach($scanned_directory as $file)
		{
			if(is_dir($path."/".$file))
			{
				echo "<option>$file</option>";	
			}
		}
		echo "</select>";
		echo "</div>";
		echo "<br>";	 
		echo "<br>"; 
		echo "<div>";
		echo "<input style='margin-left:100px;text-align:center' type='submit' name='submit' value='Genrate' class='button button-primary'>";		
		echo "</div>";	 
		echo "</form>";
		echo"</div>";
		echo"</div>";
		echo "<hr>";
		echo "Note: You must have write permission on wordpress directory to use this plugin";

	}

}
add_action('admin_menu','wpp_ctg_show_page');

//===========================Page Create end==================


?>
