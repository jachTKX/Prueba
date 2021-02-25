<?php

if(isset($this->Ini->Nm_lang))
{
    $Nm_lang = $this->Ini->Nm_lang;
}
else
{
    $Nm_lang = $this->Nm_lang;
}


$this->nmgp_botoes['btn_1']  = 'on';
$this->arr_buttons['btn_1']['hint']             = "";
$this->arr_buttons['btn_1']['type']             = "button";
$this->arr_buttons['btn_1']['value']            = "" . $Nm_lang['lang_menu_write_new'] . "";
$this->arr_buttons['btn_1']['display']          = "only_text";
$this->arr_buttons['btn_1']['display_position'] = "img_right";
$this->arr_buttons['btn_1']['style']            = "default";
$this->arr_buttons['btn_1']['image']            = "scriptcase__NM__new.gif";

$this->arr_buttons['btn_1']['has_fa']           = "true";

$this->arr_buttons['btn_1']['fontawesomeicon']  = "";

$this->nmgp_botoes['btn_3']  = 'on';
$this->arr_buttons['btn_3']['hint']             = "----------------";
$this->arr_buttons['btn_3']['type']             = "";
$this->arr_buttons['btn_3']['value']            = "----------------";
$this->arr_buttons['btn_3']['display']          = "";
$this->arr_buttons['btn_3']['display_position'] = "";
$this->arr_buttons['btn_3']['style']            = "default";
$this->arr_buttons['btn_3']['image']            = "----------------";

$this->arr_buttons['btn_3']['has_fa']           = "true";

$this->arr_buttons['btn_3']['fontawesomeicon']  = "";

$this->nmgp_botoes['btn_2']  = 'on';
$this->arr_buttons['btn_2']['hint']             = "";
$this->arr_buttons['btn_2']['type']             = "button";
$this->arr_buttons['btn_2']['value']            = "" . $Nm_lang['lang_menu_see_posts'] . "";
$this->arr_buttons['btn_2']['display']          = "only_text";
$this->arr_buttons['btn_2']['display_position'] = "img_right";
$this->arr_buttons['btn_2']['style']            = "default";
$this->arr_buttons['btn_2']['image']            = "scriptcase__NM__lens.gif";

$this->arr_buttons['btn_2']['has_fa']           = "true";

$this->arr_buttons['btn_2']['fontawesomeicon']  = "";


?>