<?php

if (!class_exists('Shop')) {
    class Shop
    {
        var $page_title;
        var $menu_title;
        var $access_level;
        var $add_page_to;
        var $short_description;
        var $path_to_php_file_plugin;
        
        public function __construct()
        {
            $this->page_title = 'Shop';
            $this->menu_title = 'Shop';
            $this->access_level;
            $this->add_page_to;
            $this->short_description;
            $this->path_to_php_file_plugin = __FILE__;

            add_action('init', array(&$this, 'shopProducts'));
            add_action('init', array(&$this, 'shopOrders'));
            add_action('init', array(&$this, 'createTaxonomy'), 0);
        }

        public function shopInstall()
        {
            global $wp_version;
            if (version_compare($wp_version, '3.4', '<')) {
                wp_die('This plugin requires WordPress version 3.5 or higher.');
            }
        }

        function shopProducts()
        {
            register_post_type('ShopProducts',
                array(
                    'labels' => array(
                        'name' => 'Shop Products',
                        'singular_name' => 'ShopProducts',
                        'add_new' => 'Add New',
                        'add_new_item' => 'Add New Product',
                        'edit' => 'Edit',
                        'edit_item' => 'Edit Product',
                        'new_item' => 'New Product',
                        'view' => 'View',
                        'view_item' => 'View Product',
                        'search_items' => 'Search Product',
                        'not_found' => 'Product not found',
                        'parent' => 'Parent Product'
                    ),
                    'public' => true,
                    'menu_position' => 77,
                    'supports' => array('title', 'editor', 'thumbnail'),
                    'taxonomies' => array('post_tag', 'category'),
                    'has_archive' => true
                )
            );
        }

        function shopOrders()
        {
            register_post_type('ShopOrders',
                array(
                    'labels' => array(
                        'name' => 'Shop Orders',
                        'singular_name' => 'ShopOrders',
                        'add_new' => 'Add New',
                        'add_new_item' => 'Add New Order',
                        'edit' => 'Edit',
                        'edit_item' => 'Edit Order',
                        'new_item' => 'New Order',
                        'view' => 'View',
                        'view_item' => 'View Order',
                        'search_items' => 'Search Order',
                        'not_found' => 'Order not found',
                    ),
                    'public' => true,
                    'menu_position' => 77,
                    'supports' => array('title', 'editor', 'thumbnail'),
                    'taxonomies' => array('OrderDeliveryMethod', 'OrderStatus'),
                    'has_archive' => true
                )
            );
        }

        function createTaxonomy()
        {
            $labels = array(
                'name' => _x('Delivery types', 'taxonomy general name'),
                'singular_name' => _x('Delivery type', 'taxonomy singular name'),
                'search_items' => __('Search for delivery'),
                'popular_items' => __('Popular delivery'),
                'all_items' => __('Delivery type'),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __('Edit Delivery'),
                'update_item' => __('Update Delivery'),
                'new_item_name' => __('New Delivery Name'),
                'separate_items_with_commas' => __('Separate Delivery with commas'),
                'add_or_remove_items' => __('Add or remove Delivery'),
                'choose_from_most_used' => __('Choose from the most used Delivery'),
                'menu_name' => __('Способ доставки'),
            );
            register_taxonomy('OrderDeliveryMethod', 'ShopOrders', array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'OrderDeliveryMethod'),
            ));

            $labels = array(
                'name' => _x('Orders status', 'taxonomy general name'),
                'singular_name' => _x('Order status', 'taxonomy singular name'),
                'search_items' => __('Search for orders'),
                'popular_items' => __('Popular orders'),
                'all_items' => __('All Order'),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __('Edit Order'),
                'update_item' => __('Update Order'),
                'add_new_item' => __('Add New Order'),
                'new_item_name' => __('New Order Name'),
                'separate_items_with_commas' => __('Separate Order with commas'),
                'add_or_remove_items' => __('Add or remove Order'),
                'choose_from_most_used' => __('Choose from the most used Order'),
                'menu_name' => __('Статус товара'),
            );
            register_taxonomy('OrderStatus', 'ShopOrders', array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'OrderStatus'),
            ));

            $parentTerm = term_exists('OrderDeliveryMethod');
            $parentTermId = $parentTerm['term_id'];

            wp_insert_term(
                'Самовывоз',
                'OrderDeliveryMethod',
                array(
                    'description' => 'Cамовывоз',
                    'slug' => 'Pickup',
                    'parent' => $parentTermId
                )
            );
            wp_insert_term(
                'Доставка почтой', 
                'OrderDeliveryMethod', 
                array(
                    'description' => 'Доставка почтой',
                    'slug' => 'DeliveryByMail',
                    'parent' => $parentTermId
                )
            );
            wp_insert_term(
                'Курьерская доставка', 
                'OrderDeliveryMethod', 
                array(
                    'description' => 'Курьерская доставка',
                    'slug' => 'ExpressDelivery',
                    'parent' => $parentTermId
                )
            );

            $parentTerm = term_exists('OrderStatus'); 
            $parentTermId = $parentTerm['term_id']; 

            wp_insert_term(
                'Обрабатывается', 
                'OrderStatus', 
                array(
                    'description' => 'Обрабатывается',
                    'slug' => 'Processed',
                    'parent' => $parentTermId
                )
            );
            wp_insert_term(
                'Отправлен', 
                'OrderStatus', 
                array(
                    'description' => 'Отправлен',
                    'slug' => 'Sent',
                    'parent' => $parentTermId
                )
            );
            wp_insert_term(
                'Отклонен', 
                'OrderStatus', 
                array(
                    'description' => 'Отклонен',
                    'slug' => 'Rejected',
                    'parent' => $parentTermId
                )
            );
        }

    }
}