<?php
return[
    'menu' => [
        // Navbar items:


        [
            'text'        => '',
            'url'       => "en/cart",
            'icon'        => 'fas fa-fw fa-shopping-cart',
            'icon_color' => 'green',
            'label_color' => 'success',
            'topnav_right' => true,

        ],

        // Sidebar items:
        [
            'type'       => 'sidebar-custom-search',
            'text'       => 'Search',         // Placeholder for the underlying input.
            'url'        => 'en/buscar', // The url used to submit the data ('#' by default).
            'method'     => 'post',           // 'get' or 'post' ('get' by default).
            'input_name' => 'searchVal',      // Name for the underlying input ('adminlteSearch' by default).
            'id'         => 'sidebarSearch'   // ID attribute for the underlying input (optional).
        ],

        [
            'text'        => 'home',
            'url'         => 'en/inicio',
            'icon'        => 'fas fa-fw fa-home',
            'icon_color' => 'green',
            'label_color' => 'success',
        ],
        [
            'text'        => 'catalogue',
            'url'         => 'en/catalogo',
            'icon'        => 'fas fa-fw fa-boxes',
            'icon_color' => 'green',
            'label_color' => 'success',
        ],
        [
            'text'        => 'customer_inquieries',
            'url'         => 'en/consultas',
            'icon'        => 'fas fa-fw fa-users',
            'icon_color' => 'green',
            'label_color' => 'success',
        ],
        [
            'text'        => 'help',
            'url'         => 'manual/User_Manual.pdf',
            'icon'        => 'fas fa-fw fa-question',
            'icon_color' => 'green',
            'label_color' => 'success',
        ],
        [
            'text'        => 'Orders',
            'url'         => 'en/pedidos',
            'icon'        => 'fas fa-fw fa-box',
            'icon_color' => 'green',
            'label_color' => 'success',
        ],
        [
            'text'        => 'fav',
            'url'         => 'en/favoritos',
            'icon'        => 'fas fa-fw fa-star',
            'icon_color' => 'green',
            'label_color' => 'success',
        ],
        [
            'text'        => 'categories',
            'url'         => 'admin/pages',
            'submenu' => [
        [
            'text'        => 'EPP',
            'url'         => 'admin/pages',
            'icon_color' => 'green',
            'label_color' => 'success',
            'submenu' => [
                        [
                            'text'  => 'epo',
                            'url'  => 'en/categoria/SEA',
                        ],
                        [
                            'text'  => 'ept',
                            'url'  => 'en/categoria/SEF',
                        ],
                ],

        ],
        [
            'text'        => 'gloves',
            'url'         => 'admin/pages',
            'icon_color' => 'green',
            'label_color' => 'success',
            'submenu' => [
                        [
                            'text'  => 'mixgloves',
                            'url'  => 'en/categoria/SGF',
                        ],
                        [
                            'text'  => 'ggloves',
                            'url'  => 'en/categoria/SGH',
                        ],
                        [
                            'text'  => 'rgloves',
                            'url'  => 'en/categoria/SGG',
                        ],
                ],

        ],
        [
            'text'        => 'other',
            'url'         => 'admin/pages',
            'icon_color' => 'green',
            'label_color' => 'success',
            'submenu' => [
                        [
                            'text'  => 'auditive',
                            'url'  => 'en/categoria/SEB',
                        ],
                        [
                            'text'  => 'facial',
                            'url'  => 'en/categoria/SAF',
                        ],
                        [
                            'text'  => 'respiratory',
                            'url'  => 'en/categoria/SEC',
                        ],
                        [
                            'text'  => 'washed',
                            'url'  => 'en/categoria/PLV',
                        ],
                        [
                            'text'  => 'tohead',
                            'url'  => 'en/categoria/SEG',
                        ],
                        [
                            'text'  => 'tolowext',
                            'url'  => 'en/categoria/SED',
                        ],
                        [
                            'text'  => 'tohandarm',
                            'url'  => 'en/categoria/SEE',
                        ],
                        [
                            'text'  => 'totrunk',
                            'url'  => 'en/categoria/SAI',
                        ],
                        [
                            'text'  => 'otherpc',
                            'url'  => 'en/categoria/SPZ',
                        ],
                        [
                            'text'  => 'technical',
                            'url'  => 'en/categoria/SAT',
                        ],
                ],

        ], ],
        ],


    ],
]
?>
