<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <meta name="turbo-cache-control" content="no-cache"/>
	
	<link href="<?=SITE_TEMPLATE_PATH?>/common.css" type="text/css" rel="stylesheet" />
	<link href="<?=SITE_TEMPLATE_PATH?>/colors.css" type="text/css" rel="stylesheet" />
	<?$APPLICATION->ShowHead();?>
    <title>
        Мероприятия — Правительство Ямало-Ненецкого автономного округа
    </title>
    <script src="vendor.js" async></script>
    <script src="app.js" async></script>
    <script src="/webpack-dev-server.js" async></script>
</head>
<body data-controller="modal-window page-modal scrollbar visually-impaired-version report-error popup-link button-to-top" data-action="keyup@document->modal-window#onKeypress">

<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<?$APPLICATION->IncludeComponent("bitrix:menu", "top", array(
	"ROOT_MENU_TYPE" => "top",
	"MENU_CACHE_TYPE" => "Y",
	"MENU_CACHE_TIME" => "36000000",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "left",
	"USE_EXT" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>

<div class="page">
    <div data-controller="gos-header-modal" class="gos-header">
    </div>
    <div data-controller="sticky-bar site-menu mobile-menu site-menu-modal" class="site-menu site-menu--sticky">
        <div data-site-menu-target="overlay" class="site-menu__overlay"></div>
        <div class="site-menu__wrapper">
            <a class="site-menu__logotype" href="/">
                <svg class="site-menu__logotype-symbol-mobile" role="img">
                    <use xlink:href="icons.svg#logotype-symbol-mobile"/>
                </svg>
                <svg class="site-menu__logotype-symbol-desktop" role="img">
                    <use xlink:href="icons.svg#logotype-symbol-desktop"/>
                </svg>
                <span class="site-menu__logotype-text"> Правительство ЯНАО </span>
            </a>
            <nav class="site-menu__links-wrapper">
                <ul class="site-menu__links" data-site-menu-target="menu">
                    <li class="site-menu__link-item">
                        <a data-site-menu-target="link" class="site-menu__link" href="/">
                            Пресс-центр
                        </a>
                        <div id="submenu-0" class="site-submenu" data-site-menu-target="submenu" data-turbo-permanent>
                            <div class="site-submenu__wrapper">
                                <div class="site-submenu__column">
                                    <ul class="links-list links-list--menu">
                                        <li class="links-list__item">
                                            <a class="links-list__link" href="/news">Новости</a>
                                        </li>
                                        <li class="links-list__item">
                                            <a class="links-list__link" href="/events"
                                            >Мероприятия</a
                                            >
                                        </li>
                                        <li class="links-list__item">
                                            <a class="links-list__link" href="/media"
                                            >Фото и&nbsp;видео</a
                                            >
                                        </li>
                                        <li class="links-list__item">
                                            <a class="links-list__link" href="/report">Доклады</a>
                                        </li>
                                        <li class="links-list__item">
                                            <a class="links-list__link" href="/press-service"
                                            >Пресс-служба</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <section class="page-section events-page">
