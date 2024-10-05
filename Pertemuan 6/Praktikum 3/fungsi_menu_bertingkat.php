<?php
$menu = [
    [
        "nama" => "Beranda"
    ],
    [
        "nama" => "Berita",
        "SubMenu" => [
            [
                "nama" => "Wisata",
                "SubMenu" => [
                    [
                        "nama" => "Pantai"
                    ],
                    [
                        "nama" => "Gunung"
                    ]
                ]
            ],
            [
                "nama" => "Kuliner"
            ],
            [
                "nama" => "Hiburan"
            ]
        ]
    ],
    [
        "nama" => "Tentang"
    ],
    [
        "nama" => "Kontak"
    ],
];

function tampilkanMenuBertingkat(array $menu){
    echo "<ul>";
    foreach ($menu as $item) {
        echo "<li>{$item['nama']}</li>";
        if (isset($item['SubMenu'])) {
            tampilkanMenuBertingkat($item['SubMenu']);
        }
    }
    echo "</ul>";
}
tampilkanMenuBertingkat($menu);
?>