<?php

function title () {

switch ($_REQUEST['route'] ?? 'main')
    {
        case 'main':
            echo 'golovna stronitca';
            break;
        case 'about':
            echo 'About stronitca';
            break;
        case 'contactus':
            echo 'Contact stronitca';
            break;
        case 'carscat':
            echo 'Cars';
            break;
        default:
            echo 'Unnamed page!';
    }
}