<?php

function title()
{
    switch ($_REQUEST['route'] ?? 'main') {
        case 'main':
            $title = 'golovna stronitca';
            break;
        case 'about':
            $title = 'About stronitca';
            break;
        case 'contactus':
            $title = 'Contact stronitca';
            break;
        case 'carscat':
            $title = 'Cars';
            break;
        default:
            $title = 'Unnamed page!';
    }

    return $title;
}