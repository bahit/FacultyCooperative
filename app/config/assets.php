<?php





return array(
    'images' => array(

        'paths' => array(
            //'input' => 'app/assets/images',
            'input' => '../public/images/',

            //'output' => 'app/storage/cache/images'
            'output' => '../public/images/generated'


        ),

        'sizes' => array(
            'thumb' => array(
                'width' => 70,
                'height' => 70
            ),
            'medium' => array(
                'width' => 300,
                'height' => 200
            ),
            'big' => array(
                'width' => 600,
                'height' => 400
            )
        )
    )

);