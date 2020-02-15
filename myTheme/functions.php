<?php

//adding the CSS and JS files.

function mytheme_setup(){ 
    wp_enqueue_style( 'style', get_stylesheet_uri(), NULL, microtime(), 'all' );
    wp_enqueue_script( 'main', get_theme_file_uri( '/js/main.js' ), NULL, microtime(), true);
}

add_action('wp_enqueue_scripts', 'mytheme_setup');


//Adding Theme Support

function mytheme_init() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support( 'html5', 
        array('comment-list', 'comment-form', 'search-form') 
    );
}

add_action( 'after_setup_theme', 'mytheme_init');

//Project Post Type 

function mytheme_custom_post_type() {
    register_post_type('project',
        array(
            'rewrite' => array('slug' => 'projects'),
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Project',
                'add_new_item' => 'Add New Project',
                'edit_item' => 'Edit Project'
            ),
            'menu-icon' => 'dashicons-clipboard',
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title', 'thumbnail', 'editor', 'excerpt', 'comments'
            )
        )
    );
}

add_action( 'init', 'mytheme_custom_post_type');