<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'testimony' => ['TestimonyController', 'testimony'],
    'recep' => ['RecepController', 'recep'],
    'content' => ['ContentController', 'add'],
    'showContent' => ['ContentController', 'showContent'],
    'admin' => ['AdminController', 'login' ],
    'galleryM' => ['GalleryMController', 'galleryM'],
    'galleryA' => ['GalleryAController', 'galleryA'],
    'galleryE' => ['GalleryEController', 'galleryE'],
    'items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/contact' => ['ItemController', 'contact', ['id']],
    'items/livreDor' => ['ItemController', 'livreDor', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
    'contact' => ['HomeController', 'contact',],
];
