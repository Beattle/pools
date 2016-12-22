<?php
/**
 * User: Hipno
 * Date: 08.12.2016
 * Time: 10:48
 * Project: pools
 */




foreach ($arResult['SECTIONS'] as &$SECTION){

    $SECTION['RESIZED_PICTURE'] = CFile::ResizeImageGet(
        $SECTION['PICTURE']['ID'],
        Array("width" => 63, "height" => 63),
        BX_RESIZE_IMAGE_PROPORTIONAL,
        true,
        false,
        false,
        100);

    $SECTION['RESIZED_HOVER_PICTURE'] = CFile::ResizeImageGet(
        $SECTION['UF_HOVER_DIR'],
        Array("width" => 63, "height" => 63),
        BX_RESIZE_IMAGE_PROPORTIONAL,
        true,
        false,
        false,
        100);
}

