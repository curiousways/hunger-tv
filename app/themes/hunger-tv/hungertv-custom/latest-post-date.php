<?php
/*  
    Taken from latest post date plugin
  
    Copyright 2008 Simon Wheatley

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
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

function lpd_post_date( $date_format, $echo, $modified_date = false )
{
	// Let's get that date
	global $wpdb;
	$date_col = 'post_date';
	if ( $modified_date ) $date_col = 'post_modified';
	$sql = " SELECT $date_col FROM {$wpdb->posts} WHERE post_status = 'publish' AND post_type = 'post' ORDER BY $date_col DESC LIMIT 1 ";
	$mysql_date = $wpdb->get_var( $sql );
	// Format the date appropriately
	if ( ! $date_format ) $date_format = get_option('date_format');
	$formatted_date = mysql2date( $date_format, $mysql_date );
	// Echo or return
	echo $formatted_date;
}

// The template tags, here they are.

function latest_post_date( $date_format = null, $echo = true )
{
	return lpd_post_date( $date_format, $echo );
}

function latest_post_modified_date( $date_format = null, $echo = true )
{
	return lpd_post_date( $date_format, $echo, true );
}
?>