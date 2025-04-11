<?php

use App\Models\Category;

if (!function_exists('showNestedSetName')) {
    function showNestedSetName($name, $level)
    {
        $xhtml = str_repeat('|------ ', $level - 1);
        $xhtml .= sprintf('<span class="badge bg-danger">%s</span> <strong>%s</strong>', $level, $name);
        return $xhtml;
    }
}
if(!function_exists('getAssets')){
	function getAssets($domain = '')
	{
		return '../'.$domain;
	}
}

if (!function_exists('showNestedSetUpDown')) {
    function showNestedSetUpDown($id)
    {
        $upButton = sprintf('<button class="btn btn-primary mb-0"><i class="fas fa-long-arrow-alt-up"></i></button> ');

        $downButton = sprintf('<button class="btn btn-primary mb-0"><i class="fas fa-long-arrow-alt-down"></i></button>');

        $node = Category::find($id);
        
        if (empty($node->getPrevSibling()) || empty($node->getPrevSibling()->parent_id)) $upButton = '';
        if (empty($node->getNextSibling())) $downButton = '';

        $xhtml = '
        <span data-id="'.$id.'" data-type="up" class="float-left btn-move" style="width: 60px; display: inline-block ">' . $upButton . '</span>
        <span data-id="'.$id.'" data-type="down" class="float-end btn-move" style="width: 60px; display: inline-block ">' . $downButton . '</span>
        ';

        return $xhtml;
    }
}
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}




