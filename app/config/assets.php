<?php

//return array(
    //'images2' => 'app/assets/images/'
    //'images2' => '../public/images/'
//);



return array(
    'images' => array(

        'paths' => array(
            //'input' => 'app/assets/images',
            'input' => '../public/images/',

            //'output' => 'app/storage/cache/images'
            'output' => '../public/images/'


        ),

        'sizes' => array(
            'small' => array(
                'width' => 150,
                'height' => 100
            ),
            'big' => array(
                'width' => 600,
                'height' => 400
            )
        )
    )

);