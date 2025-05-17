<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<ul class="site-menu__links" data-site-menu-target="menu">

<li class="site-menu__link-item"><a class="site-menu__logotype" href="/">
                <svg class="site-menu__logotype-symbol-mobile" role="img">
					<use xlink:href="/icons.svg#logotype-symbol-mobile"/>
                </svg>
                <svg class="site-menu__logotype-symbol-desktop" role="img">
					<use xlink:href="/icons.svg#logotype-symbol-desktop"/>
                </svg>
	<span class="site-menu__logotype-text site-menu__link" data-site-menu-target="link"> Правительство ЯНАО </span>
		</a></li>

<?foreach($arResult as $arItem):?>
	<?if($arItem["SELECTED"]):?>
		<li class="site-menu__link-item"><a data-site-menu-target="link" class="site-menu__link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li class="site-menu__link-item"><a data-site-menu-target="link" class="site-menu__link" href="<?=$arItem["LINK"]?>""><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	
<?endforeach?>
	</ul>
<?endif?>