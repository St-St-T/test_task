<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
    <section class="article-section" data-controller="article-content">
        <header class="article__header">


            <?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
            <h1 class="article__title">
                <?=$arResult["NAME"]?>
            </h1>
            <?endif;?>
            <div class="article__header-info">
                <div class="article__publication-info content-block">
                    <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
                    <time class="article__publication-date" datetime="2021-06-31">
                        <?=$arResult["DISPLAY_ACTIVE_FROM"]?>
                    </time>
                    <?endif;?>
					<?if($arResult["DISPLAY_PROPERTIES"]["PLACE"]["DISPLAY_VALUE"]!="N"):?>
                    <div class="article__publication-place"><?=$arResult["DISPLAY_PROPERTIES"]["PLACE"]["DISPLAY_VALUE"];?></div>
				<?endif;?>
					</div>
            </div>
        </header>
        <div class="article__content-wrapper">
            <div class="article__content content-block">
                <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif?>
                <p>
                    <?if($arResult["DETAIL_TEXT"] <> ''):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
                </p>
            </div>
        </div>
    </section>
    <section class="article-section">
        <div class="article__content-wrapper article__controllers-wrapper">
            <div class="article__publication-info">
                <div class="article__publication-views">
                    <svg class="icon" role="img">
						<use xlink:href="/icons.svg#eye"/>
                    </svg>
					<?echo $arResult["DISPLAY_PROPERTIES"]["VIEWS"]["DISPLAY_VALUE"];?>
                </div>
            </div>
            <div class="article__buttons-wrapper">
                <div class="article__button-wrapper">
                    <button class="article__controller-button" data-controller="wave">
                        <svg class="icon" role="img">
							<use xlink:href="/icons.svg#share"/>
                        </svg>
                        <span class="article__controller-button-text"
                        >Поделиться материалом</span
                        >
                        <span class="article__controller-button-text--mobile"
                        >Поделиться</span
                        >
                    </button>
                </div>
                <div class="article__button-wrapper">
                    <button
                            class="article__controller-button"
                            type="button"
                            data-controller="wave"
                            data-modal-window-target="opener"
                            data-modal-id="comment-form-modal"
                            data-action="modal-window#onToggle"
                    >
                        <svg class="icon" role="img">
							<use xlink:href="/icons.svg#comment"/>
                        </svg>
                        <span class="article__controller-button-text"
                        >Оставить комментарий</span
                        >
                        <span class="article__controller-button-text--mobile"
                        >Комментарий</span
                        >
                    </button>
                </div>
            </div>
        </div>
        <div class="article__content-wrapper article__topics-wrapper">
            <h3 class="article__topics-title">Темы</h3>
            <ul class="article__topics">
				<?if(is_array($arResult["DISPLAY_PROPERTIES"]["THEMES"]["DISPLAY_VALUE"])):?>

			<?foreach($arResult["DISPLAY_PROPERTIES"]["THEMES"]["DISPLAY_VALUE"] as $pid=>$arProperty):?>
<li class="article__topic-item">
                    <a
                            href="/"
                            data-controller="wave"
                            class="article__topic-link button button--secondary button--tiny"
                    ><?echo $arProperty;?></a
                    >
                </li>
<?endforeach;?>
<?else:?>
<li class="article__topic-item">
                    <a
                            href="/"
                            data-controller="wave"
                            class="article__topic-link button button--secondary button--tiny"
                    ><?echo $arResult["DISPLAY_PROPERTIES"]["THEMES"]["DISPLAY_VALUE"];?></a
                    >
                </li>
<?endif;?>
            </ul>
        </div>
    </section>
