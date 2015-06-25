<?php
/**
 * Plugin Name: Engage Admin
 * Plugin URI: https://github.com/trinitymirror/engage/
 * Description: Clean-up the admin center options
 * Version: 1.0
 * Text Domain: engage_admin
 * Author: Michael Bragg
 * Author URI: http://www.michaelbragg.net
 * License: MIT
 *
 * Copyright (c) 2015 Michael Bragg <http://www.michaelbragg.net>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 * @category    WordPress
 * @author      Michael Bragg <http://www.michaelbragg.net>
 * @copyright   2015 Michael Bragg
 * @license     http://opensource.org/licenses/MIT MIT
 */

/**
 * Change Posts Labels
 */

function change_post_label() {

    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    if( isset( $submenu['edit.php'][16] ) ){
	    $submenu['edit.php'][16][0] = 'News Tags';
	  }
    echo '';

}

add_action( 'admin_menu', 'change_post_label' );

function change_post_object() {

    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';

}

add_action( 'init', 'change_post_object' );

/**
 * Editor
 */

function change_editor_capabilities() {

    $role = get_role( 'editor' );
    //$role->add_cap( 'list_users' );
    //$role->add_cap( 'promote_users' );
    $role->remove_cap( 'edit_users' );

  	$role->add_cap( 'edit_published_posts' );
    $role->add_cap( 'publish_posts' );
    $role->add_cap( 'delete_published_posts' );
    $role->add_cap( 'edit_posts' );
    $role->add_cap( 'delete_posts' );
    //$role->add_cap( 'upload_files' );
    //$role->add_cap( 'edit_pages' );
    //$role->add_cap( 'edit_others_pages' );
    //$role->add_cap( 'edit_published_pages' );

}

add_action( 'admin_init', 'change_editor_capabilities' );

/**
 * Author
 */

function change_author_capabilities() {

    $role = get_role( 'author' );
  	$role->add_cap( 'edit_published_posts' );
    $role->add_cap( 'publish_posts' );
    $role->add_cap( 'delete_published_posts' );
    $role->add_cap( 'edit_posts' );
    $role->add_cap( 'delete_posts' );

    $role->remove_cap( 'manage_categories' );

}

add_action( 'admin_init', 'change_author_capabilities' );

/**
 * Global
 */

function remove_menu_items() {

function appthemes_check_user_role( $role, $user_id = null ) {

	if ( is_numeric( $user_id ) )
		$user = get_userdata( $user_id );
	else
		$user = wp_get_current_user();

	if ( empty( $user ) )
		return false;

	return in_array( $role, (array) $user->roles );
}

if ( appthemes_check_user_role( 'editor' ) || appthemes_check_user_role( 'author' ) ){
	remove_menu_page( 'tools.php' );
}


}

add_action( 'admin_menu', 'remove_menu_items' );
