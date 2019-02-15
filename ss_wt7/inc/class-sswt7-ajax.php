<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/14/2019
 * Time: 2:34 PM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'SSWT6_Ajax' ) ) {
	class SSWT6_Ajax {
		static function init() {
			static $instance = null;
			if ( $instance === null ) {
				$instance = new self();
			}

			return $instance;
		}

		private function __construct() {
			$this->register_ajax();
		}

		private function register_ajax() {
			add_action( 'wp_ajax_autocomplete_search', array( $this, 'autocomplete_search_callback' ) );
			add_action( 'wp_ajax_nopriv_autocomplete_search', array( $this, 'autocomplete_search_callback' ) );

			add_action( 'wp_ajax_search_posts', array( $this, 'search_posts_callback' ) );
			add_action( 'wp_ajax_nopriv_search_posts', array( $this, 'search_posts_callback' ) );
		}

		function autocomplete_search_callback() {
			$q = ! empty( $_GET['term'] ) ? $_GET['term'] : '';

			$results      = array();
			$qSearchPosts = new WP_Query( array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				's'              => $q,
				'posts_per_page' => 5
			) );
			if ( $qSearchPosts->have_posts() ):
				while ( $qSearchPosts->have_posts() ) : $qSearchPosts->the_post();
					$results[] = get_the_title();
				endwhile;
			endif;
			wp_reset_query();
			wp_send_json( $results );
		}

		function search_posts_callback() {
			$qsearch       = ! empty( $_GET['q'] ) ? $_GET['q'] : '';
			$paged         = ! empty( $_GET['p'] ) ? $_GET['p'] : 1;
			$post_per_page = 5;
			$results       = array();

			if ( $qsearch ) { //make sure query search is not empty
				$qSearchPosts = new WP_Query( array(
					'post_type'      => 'post',
					'post_status'    => 'publish',
					'posts_per_page' => $post_per_page,
					's'              => $qsearch,
					'paged'          => $paged,
				) );
				if ( $qSearchPosts->have_posts() ):
					global $ssWT6Temp;
					$results['max_pages']  = $qSearchPosts->max_num_pages;
					$results['total']      = $qSearchPosts->found_posts;
					$results['paged']      = $paged;
					$results['pagination'] = custom_pagination( $paged, $results['max_pages'], $post_per_page );
					while ( $qSearchPosts->have_posts() ) : $qSearchPosts->the_post();
						$results['items'][] = $ssWT6Temp->render( 'search-list', array(
							'link'    => get_permalink(),
							'title'   => get_the_title(),
							'info'    => '<i class="fa fa-info-circle"></i> posted on ' . get_the_date() . ' by ' . get_the_author(),
							'excerpt' => get_the_excerpt()
						) );
					endwhile;
				endif;
				wp_reset_query();
			}
			wp_send_json( $results );
		}
	}
}