
<?php
return[
    'menu' => [
        // Navbar items:

        [
            'text'        => '',
            'url'       => "es/cart",
            'icon'        => 'fas fa-fw fa-shopping-cart',
            'icon_color' => 'green',
            'label_color' => 'success',
            'topnav_right' => true,

        ],

        // Sidebar items:
        [
            'type'       => 'sidebar-custom-search',
            'text'       => 'Buscar',         // Placeholder for the underlying input.
            'url'        => 'es/buscar', // The url used to submit the data ('#' by default).
            'method'     => 'post',           // 'get' or 'post' ('get' by default).
            'input_name' => 'searchVal',      // Name for the underlying input ('adminlteSearch' by default).
            'id'         => 'sidebarSearch'   // ID attribute for the underlying input (optional).
        ],
        [
            'text'        => 'home',
            'url'         => 'es/inicio',
            'icon'        => 'fas fa-fw fa-home',
            'icon_color' => 'green',
            'label_color' => 'success',
        ],
        [
            'text'        => 'catalogue',
            'url'         => 'es/catalogo',
            'icon'        => 'fas fa-fw fa-boxes',
            'icon_color' => 'green',
            'label_color' => 'success',
        ],
        [
            'text'        => 'customer_inquieries',
            'url'         => 'es/consultas',
            'icon'        => 'fas fa-fw fa-users',
            'icon_color' => 'green',
            'label_color' => 'success',
        ],
        [
            'text'        => 'help',
            'url'         => 'manual/Manual_de_Usuario.pdf',
            'icon'        => 'fas fa-fw fa-question',
            'icon_color' => 'green',
            'label_color' => 'success',
        ],
        [
            'text'        => 'Pedidos',
            'url'         => 'es/pedidos',
            'icon'        => 'fas fa-fw fa-box',
            'icon_color' => 'green',
            'label_color' => 'success',
        ],
        [
            'text'        => 'fav',
            'url'         => 'es/favoritos',
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
                            'url'  => 'es/categoria/SEA',
                        ],
                        [
                            'text'  => 'ept',
                            'url'  => 'es/categoria/SEF',
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
                            'url'  => 'es/categoria/SGF',
                        ],
                        [
                            'text'  => 'ggloves',
                            'url'  => 'es/categoria/SGH',
                        ],
                        [
                            'text'  => 'rgloves',
                            'url'  => 'es/categoria/SGG',
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
                            'url'  => 'es/categoria/SEB',
                        ],
                        [
                            'text'  => 'facial',
                            'url'  => 'es/categoria/SAF',
                        ],
                        [
                            'text'  => 'respiratory',
                            'url'  => 'es/categoria/SEC',
                        ],
                        [
                            'text'  => 'washed',
                            'url'  => 'es/categoria/PLV',
                        ],
                        [
                            'text'  => 'tohead',
                            'url'  => 'es/categoria/SEG',
                        ],
                        [
                            'text'  => 'tolowext',
                            'url'  => 'es/categoria/SED',
                        ],
                        [
                            'text'  => 'tohandarm',
                            'url'  => 'es/categoria/SEE',
                        ],
                        [
                            'text'  => 'totrunk',
                            'url'  => 'es/categoria/SAI',
                        ],
                        [
                            'text'  => 'otherpc',
                            'url'  => 'es/categoria/SPZ',
                        ],
                        [
                            'text'  => 'technical',
                            'url'  => 'es/categoria/SAT',
                        ],
                ],

        ], ],
        ],


    ],
]
?>

