<?php
/*
Plugin Name: Хлебные крошки
Description: Создание хлебных крошек в статьях
Author: DOC_tr
Author Email: CrimSoN_AL@mail.ru
Author URL: http://phpbl.ru
*/
!defined('EMLOG_ROOT') && exit('access deined!');

function setBreadCrimbs($title, $category = false){
    if(!$title && !$category){
        return false;
    }
    // первой идет главная
    $breads = array(
        '<a href="' . BLOG_URL . '">Главная</a>'
    );

    // если есть категория то после главной
    if($category) {
        global $CACHE;
        $log_cache_sort = $CACHE->readCache('logsort');
        if (!empty($log_cache_sort[$category])) {
            $breads[] = '<a href="' . Url::sort($log_cache_sort[$category]['id']) . '">' . $log_cache_sort[$category]['name'] . '</a>';
        }
    }

    // последней идет само название статьи без ссылки
    $breads[] = $title;
    echo '<div class="breadcrumbs">' . join(' &rarr; ', $breads) . '</div>';
}

function breadCrumbsHead(){
    echo '<link rel="stylesheet" href="'.BLOG_URL.'content/plugins/breadcrumbs/breadcrumbs.css" type="text/css" />'."\n";
}

addAction('index_head', 'breadCrumbsHead');