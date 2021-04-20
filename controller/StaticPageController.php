<?php

!$action ?: $action();

function main()
{
    include 'view/main.view.php';
}

function contactus()
{
    include 'view/contactus.view.php';
}

function about()
{
    include 'view/about.view.php';
}