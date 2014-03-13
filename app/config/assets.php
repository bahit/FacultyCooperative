<?php





return array(
    'images' => array(

        'paths' => array(

           // 'input' => '../FacultyCooperative/public/images',
            //http://localhost/FacultyCooperative/public/image2/profile/profile10.jpg

            'input' => 'images',

          // 'output' => '../FacultyCooperative/public/images/generated'
            'output' => 'images/generated',


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