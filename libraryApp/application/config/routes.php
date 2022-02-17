<?php

return array(
    'admin\?offset=([0-9]+)' => array('controller' => 'Admin', 'action' => 'HomePage'),   //actionOffsetPage in AdminPagesController
    'admin/delete' => array('controller' => 'Admin', 'action' => 'DeleteBook'),
    'admin' => array('controller' => 'Admin', 'action' => 'HomePage'),                      //actionHomePage in AdminPagesController
    'admin/addBook' => array('controller' => 'Admin', 'action' => 'AddBook'),                      //actionHomePage in AdminPagesController
    'books/([0-9]+)' => array('controller' => 'UserPages', 'action' => 'OneBook/$1'),          //actionOneBook in UserPagesController
    '\?offset=([0-9]+)' => array('controller' => 'UserPages', 'action' => 'HomePage'),         //actionOffsetPage in UserPagesController
    '\?search=(.+)' => array('controller' => 'UserPages', 'action' => 'SearchBooks'),            //actionSearchBooks in UserPagesController
    'increaseClickCount' => array('controller' => 'DataCollection', 'action' => 'IncreaseClickCount'),
    'increasePageViewsCount' => array('controller' => 'DataCollection', 'action' => 'increasePageViewsCount'),
    '' => array('controller' => 'UserPages', 'action' => 'HomePage'),                          //actionHomePage in UserPagesController
);