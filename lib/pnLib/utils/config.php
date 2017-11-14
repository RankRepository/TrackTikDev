<?php
    $CONFIG = array(
        'project_infos' => array(
            'slug' => 'accentassurance',
            'name' => 'Accent Assurance',
        ),
        'post_types' => array(
            'particulier' => array(
                'admin_name' => 'Particuliers',
                'taxonomy' => 'particuliers',
                'menu_class' => 'particular',
                'menu_id' => 'particularMobile',
                'color_class' => 'green'
            ),
            'entreprise' => array(
                'admin_name' => 'Entreprises',
                'taxonomy' => 'entreprises',
                'menu_class' => 'company',
                'menu_id' => 'companyMobile',
                'color_class' => 'blue'
            ),
            'assurance-vie' => array(
                'admin_name' => 'Personnes',
                'taxonomy' => 'assurances-vie',
                'menu_class' => 'life-assurance',
                'menu_id' => 'life-assuranceMobile',
                'color_class' => 'light-blue'
            )
        )
    );

?>