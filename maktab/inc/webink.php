<?php
global $ott_googlefonts;
$twWebinkFonts=array();
if(function_exists('getProject')&&  function_exists('getProjectFonts')){
    $ott_webink_projects = getProject('','');
    foreach ($ott_webink_projects as $ott_webink_project){
        $ott_webink_projectfonts = getProjectFonts('',$ott_webink_project->GUID);
        if($ott_webink_projectfonts){
            foreach($ott_webink_projectfonts as $ott_webink_font){
                 $twWebinkFonts[$ott_webink_font->PSName]=$ott_webink_font->Name;
            }
        }
    }
}
$ott_googlefonts=array_merge($twWebinkFonts, $ott_googlefonts);