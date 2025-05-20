<?
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", "clearMainNews");
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "clearMainNews");

function clearMainNews(&$arFields) {
    $newsIblockId = 9;
    $mainNewsPropertyCode = 10;
    $mainNewsValue = '(да)';
    
    if ($arFields['IBLOCK_ID'] == $newsIblockId && 
        isset($arFields['PROPERTY_VALUES'][$mainNewsPropertyCode]) && 
        $arFields['PROPERTY_VALUES'][$mainNewsPropertyCode] == $mainNewsValue) {
        $elementFilter = [
            'IBLOCK_ID' => $newsIblockId,
            'ACTIVE' => 'Y',
            '!ID' => $arFields['ID']
        ];
        
        $elementList = CIBlockElement::GetList([], $elementFilter, false, false, ['ID', 'PROPERTY_' . $mainNewsPropertyCode]);
        while ($element = $elementList->Fetch()) {
            $elementUpdate = new CIBlockElement;
            $elementUpdate->Update($element['ID'], [
                'PROPERTY_VALUES' => [$mainNewsPropertyCode => [] ]
            ]
        );}
    }}
