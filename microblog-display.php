<?php
/**
 * Plugin Name: Excluir Microblog Posts
 * Description: Oculta los posts con la etiqueta "microblog" del listado principal de WordPress.
 * Version: 1.0
 * Author: A. Cambronero (Blogpocket.com)
 */

// Evitar acceso directo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Excluir los posts con la etiqueta "microblog" del bucle principal del blog.
 */
function exclude_microblog_from_main_query( $query ) {

    // Verificamos que no sea el área de administración, que sea la query principal
    // y que estemos en la página principal del blog (o archivos de archive).
    if ( ! is_admin() && $query->is_main_query() && $query->is_home() ) {
        
        // Obtenemos el término "microblog"
        // Para otra etiqueta, cambiar microblog por el slug de la etiqueta
        $tag = get_term_by( 'slug', 'microblog', 'post_tag' );

        // Si existe, excluimos esa etiqueta del query
        if ( $tag && ! is_wp_error( $tag ) ) {
            $query->set( 'tag__not_in', array( $tag->term_id ) );
        }
    }
}

add_action( 'pre_get_posts', 'exclude_microblog_from_main_query' );
