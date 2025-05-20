<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$iblockId = 9;

$menuLinks = [];

if (CModule::IncludeModule('iblock')) {
    $sections = CIBlockSection::GetList(
        ['LEFT_MARGIN' => 'ASC'],
        ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
        false, // Не группируем
        ['ID', 'NAME', 'SECTION_PAGE_URL']
    );

    while ($section = $sections->GetNext()) {
        $menuLinks[] = [
            $section['NAME'],                 
            $section['SECTION_PAGE_URL'],     
            [],                               
            ['FROM_IBLOCK' => true, 'IS_PARENT' => true], 
            ''                                
        ];
    }

}

$aMenuLinks = $menuLinks;