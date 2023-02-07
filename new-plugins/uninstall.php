<?php 

    /*
        * This is fo uninstall 
    */   

    if( ! defined('WP_UNINSTALL_PLUGIN') ){
        die;
    }


    // Clear Database post

    $books = get_posts( ['post_type'=> 'book', 'numberposts'=> -1] );
    foreach($books as  $book){
        wp_delete_post( $book->ID, true );
    }
?>