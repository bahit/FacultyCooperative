<?php





return array(
    'images' => array(

        'paths' => array(
            //'input' => 'app/assets/images',
            'input' => 'images/',

            //'output' => 'app/storage/cache/images'
            'output' => 'images/generated'


        ),

        'sizes' => array(
            'thumb' => array(
                'width' => 70,
                'height' => 70
            ),
            'tiny' => array(
                'width' => 50,
                'height' => 50
            ),
            'medium' => array(
                'width' => 300,
                'height' => 200
            ),
            'big' => array(
                'width' => 500,
                'height' => 300
            ),
            'profile' => array(
                'width' => 300,
                'height' => 300
            )
        )
    )

);