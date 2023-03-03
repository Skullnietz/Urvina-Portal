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
        [
            'text'        => 'logout',
            'url'       => 'en/salir',
            'icon'        => 'fas fa-fw fa-sign-out-alt',
            'icon_color' => 'danger',
            'label_color' => 'danger',
            'topnav_right' => true,

        ],

        // Sidebar items:

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
            'url'         => 'admin/pages',
            'icon'        => 'fas fa-fw fa-question',
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
                            'url'  => 'menu/child1',
                        ],
                        [
                            'text'  => 'ept',
                            'url'  => 'menu/child1',
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
                            'url'  => 'menu/child1',
                        ],
                        [
                            'text'  => 'ggloves',
                            'url'  => 'menu/child1',
                        ],
                        [
                            'text'  => 'rgloves',
                            'url'  => 'menu/child1',
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
                            'url'  => 'menu/child1',
                        ],
                        [
                            'text'  => 'facial',
                            'url'  => 'menu/child1',
                        ],
                        [
                            'text'  => 'respiratory',
                            'url'  => 'menu/child1',
                        ],
                        [
                            'text'  => 'washed',
                            'url'  => 'menu/child1',
                        ],
                        [
                            'text'  => 'tohead',
                            'url'  => 'menu/child1',
                        ],
                        [
                            'text'  => 'tolowext',
                            'url'  => 'menu/child1',
                        ],
                        [
                            'text'  => 'tohandarm',
                            'url'  => 'menu/child1',
                        ],
                        [
                            'text'  => 'totrunk',
                            'url'  => 'menu/child1',
                        ],
                        [
                            'text'  => 'otherpc',
                            'url'  => 'menu/child1',
                        ],
                        [
                            'text'  => 'technical',
                            'url'  => 'menu/child1',
                        ],
                ],

        ], ],
        ],
    ],
]
?>
