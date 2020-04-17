<?php

function current_user()
{
    return auth()->user();
}

// Kad izveido šādu helper.php failu, lai viņu redzētu visos failos, bez atsevišķas ievietošanas.
//Pēctam tev ir jādodas uz composer.json un pie autoload jāpieiveno 

//    "files": [
//        "app/helpers.php"
//       ]

// Un pēctam terminālī composer dump-autoload