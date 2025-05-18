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
	<title>
        Пресс центр
    </title>
	<link href="<?=SITE_TEMPLATE_PATH?>/common.css" type="text/css" rel="stylesheet" />
	<link href="<?=SITE_TEMPLATE_PATH?>/colors.css" type="text/css" rel="stylesheet" />
	<?$APPLICATION->ShowHead();?>
    <script src="vendor.js" async></script>
    <script src="app.js" async></script>
    <script src="/webpack-dev-server.js" async></script>
</head>
<body data-controller="modal-window page-modal scrollbar visually-impaired-version report-error popup-link button-to-top" data-action="keyup@document->modal-window#onKeypress">
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="page">
    <div data-controller="gos-header-modal" class="gos-header">
    </div>
    <div data-controller="sticky-bar site-menu mobile-menu site-menu-modal" class="site-menu site-menu--sticky">
        <div data-site-menu-target="overlay" class="site-menu__overlay"></div>
        <div class="site-menu__wrapper">

            <nav class="site-menu__links-wrapper">
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
</nav>
        </div>
    </div>
    <section class="page-section events-page">
