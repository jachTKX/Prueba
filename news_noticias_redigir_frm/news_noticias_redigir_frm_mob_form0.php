<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: SAMEORIGIN");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_header_news_noticias_redigir_frm'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_header_news_noticias_redigir_frm'] . ""); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_noticia_data_noticia button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_noticia_data_pub button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>news_noticias_redigir_frm/news_noticias_redigir_frm_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_tiny_mce; ?>"></SCRIPT>
 <STYLE>
  .mce-toolbar-grp .mce-container-body {text-align: left !important}
 </STYLE>

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("news_noticias_redigir_frm_mob_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
<?php

include_once('news_noticias_redigir_frm_mob_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
     $(".scBtnGrpClick").mouseup(function(){
          event.preventDefault();
          if(event.target !== event.currentTarget) return;
          if($(this).find("a").prop('href') != '')
          {
              $(this).find("a").click();
          }
          else
          {
              eval($(this).find("a").prop('onclick'));
          }
  });
  scJQElementsAdd('');

  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
   });
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['news_noticias_redigir_frm']['error_buffer']) && '' != $_SESSION['scriptcase']['news_noticias_redigir_frm']['error_buffer'])
{
    echo $_SESSION['scriptcase']['news_noticias_redigir_frm']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("news_noticias_redigir_frm_mob_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" enctype="multipart/form-data" 
               action="news_noticias_redigir_frm_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="noticia_id" value="<?php  echo $this->form_encode_input($this->noticia_id) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['news_noticias_redigir_frm_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['news_noticias_redigir_frm_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?>ERRO</td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="600">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_header_news_noticias_redigir_frm'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_header_news_noticias_redigir_frm'] . ""; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"></div>
    
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
        $sCondStyle = ($this->nmgp_botoes['new'] != 'off' || $this->nmgp_botoes['insert'] != 'off' || $this->nmgp_botoes['exit'] != 'off' || $this->nmgp_botoes['update'] != 'off' || $this->nmgp_botoes['delete'] != 'off' || $this->nmgp_botoes['copy'] != 'off') ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_t')", "scBtnGrpShow('group_2_t')", "sc_btgp_btn_group_2_t", "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "", "", "__sc_grp__");?>
 
<?php
        $NM_btn = true;
echo nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 't', '', 'ini');
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_new_t">
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_upd_t">
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-11", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_del_t">
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-12", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sys_separator">
 </td></tr><tr><td class="scBtnGrpBackground">
  </div>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_clone_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "scBtnFn_sys_format_copy()", "scBtnFn_sys_format_copy()", "sc_b_clone_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-14", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
echo nmButtonGroupTableOutput($this->arr_buttons, "", '', '', '', 'fim');
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-15", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-16", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-17", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['empty_filter'] = true;
       }
  }
?>
<script type="text/javascript">
var pag_ativa = "news_noticias_redigir_frm_mob_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'news_noticias_redigir_frm_mob_form0' => array(
            'title' => "{lang_tab_news_redigir_frm_1}",
            'class' => $nmgp_num_form == "news_noticias_redigir_frm_mob_form0" ? "scTabActive" : "scTabInactive",
        ),
        'news_noticias_redigir_frm_mob_form1' => array(
            'title' => "{lang_tab_news_redigir_frm_2}",
            'class' => $nmgp_num_form == "news_noticias_redigir_frm_mob_form1" ? "scTabActive" : "scTabInactive",
        ),
    );
        if (!empty($this->Ini->nm_hidden_pages)) {
                foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                        if ('{lang_tab_news_redigir_frm_1}' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['news_noticias_redigir_frm_mob_form0']['class'] = 'scTabInactive';
                        }
                        if ('{lang_tab_news_redigir_frm_2}' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['news_noticias_redigir_frm_mob_form1']['class'] = 'scTabInactive';
                        }
                }
                $displayingPage = false;
                foreach ($this->tabCssClass as $pageInfo) {
                        if ('scTabActive' == $pageInfo['class']) {
                                $displayingPage = true;
                                break;
                        }
                }
                if (!$displayingPage) {
                        foreach ($this->tabCssClass as $pageForm => $pageInfo) {
                                if (!isset($this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) || 'off' != $this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) {
                                        $this->tabCssClass[$pageForm]['class'] = 'scTabActive';
                                        break;
                                }
                        }
                }
        }
?>
<?php
    $css_celula = $this->tabCssClass["news_noticias_redigir_frm_mob_form0"]['class'];
?>
   <li id="id_news_noticias_redigir_frm_mob_form0" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('news_noticias_redigir_frm_mob_form0')">
     <?php echo $this->Ini->Nm_lang['lang_tab_news_redigir_frm_1']; ?>
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["news_noticias_redigir_frm_mob_form1"]['class'];
?>
   <li id="id_news_noticias_redigir_frm_mob_form1" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('news_noticias_redigir_frm_mob_form1')">
     <?php echo $this->Ini->Nm_lang['lang_tab_news_redigir_frm_2']; ?>
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="news_noticias_redigir_frm_mob_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><input type="hidden" name="noticia_img_ul_name" id="id_sc_field_noticia_img_ul_name" value="<?php echo $this->form_encode_input($this->noticia_img_ul_name);?>">
<input type="hidden" name="noticia_img_ul_type" id="id_sc_field_noticia_img_ul_type" value="<?php echo $this->form_encode_input($this->noticia_img_ul_type);?>">
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['categoria_id']))
   {
       $this->nm_new_label['categoria_id'] = "" . $this->Ini->Nm_lang['lang_news_noticias_fild_categoria_id'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $categoria_id = $this->categoria_id;
   $sStyleHidden_categoria_id = '';
   if (isset($this->nmgp_cmp_hidden['categoria_id']) && $this->nmgp_cmp_hidden['categoria_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['categoria_id']);
       $sStyleHidden_categoria_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_categoria_id = 'display: none;';
   $sStyleReadInp_categoria_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['categoria_id']) && $this->nmgp_cmp_readonly['categoria_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['categoria_id']);
       $sStyleReadLab_categoria_id = '';
       $sStyleReadInp_categoria_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['categoria_id']) && $this->nmgp_cmp_hidden['categoria_id'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="categoria_id" value="<?php echo $this->form_encode_input($this->categoria_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_categoria_id_line" id="hidden_field_data_categoria_id" style="<?php echo $sStyleHidden_categoria_id; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_categoria_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_categoria_id_label" style=""><span id="id_label_categoria_id"><?php echo $this->nm_new_label['categoria_id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['php_cmp_required']['categoria_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['php_cmp_required']['categoria_id'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["categoria_id"]) &&  $this->nmgp_cmp_readonly["categoria_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['Lookup_categoria_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['Lookup_categoria_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['Lookup_categoria_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['Lookup_categoria_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['Lookup_categoria_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['Lookup_categoria_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['Lookup_categoria_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['Lookup_categoria_id'] = array(); 
    }

   $old_value_noticia_data_noticia = $this->noticia_data_noticia;
   $old_value_noticia_hora_noticia = $this->noticia_hora_noticia;
   $old_value_noticia_data_pub = $this->noticia_data_pub;
   $old_value_noticia_hora_pub = $this->noticia_hora_pub;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_noticia_data_noticia = $this->noticia_data_noticia;
   $unformatted_value_noticia_hora_noticia = $this->noticia_hora_noticia;
   $unformatted_value_noticia_data_pub = $this->noticia_data_pub;
   $unformatted_value_noticia_hora_pub = $this->noticia_hora_pub;

   $nm_comando = "SELECT news_categorias.categoria_id,              news_categorias.categoria_nome FROM              news_categorias,              news_usuarios_categorias WHERE news_categorias.categoria_id = news_usuarios_categorias.categoria_id AND news_usuarios_categorias.usuario_login = '" . $_SESSION['glo_login'] . "' order by categoria_nome";

   $this->noticia_data_noticia = $old_value_noticia_data_noticia;
   $this->noticia_hora_noticia = $old_value_noticia_hora_noticia;
   $this->noticia_data_pub = $old_value_noticia_data_pub;
   $this->noticia_hora_pub = $old_value_noticia_hora_pub;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['Lookup_categoria_id'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $categoria_id_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->categoria_id_1))
          {
              foreach ($this->categoria_id_1 as $tmp_categoria_id)
              {
                  if (trim($tmp_categoria_id) === trim($cadaselect[1])) { $categoria_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->categoria_id) === trim($cadaselect[1])) { $categoria_id_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="categoria_id" value="<?php echo $this->form_encode_input($categoria_id) . "\">" . $categoria_id_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_categoria_id();
   $x = 0 ; 
   $categoria_id_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->categoria_id_1))
          {
              foreach ($this->categoria_id_1 as $tmp_categoria_id)
              {
                  if (trim($tmp_categoria_id) === trim($cadaselect[1])) { $categoria_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->categoria_id) === trim($cadaselect[1])) { $categoria_id_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($categoria_id_look))
          {
              $categoria_id_look = $this->categoria_id;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_categoria_id\" class=\"css_categoria_id_line\" style=\"" .  $sStyleReadLab_categoria_id . "\">" . $this->form_format_readonly("categoria_id", $this->form_encode_input($categoria_id_look)) . "</span><span id=\"id_read_off_categoria_id\" class=\"css_read_off_categoria_id\" style=\"white-space: nowrap; " . $sStyleReadInp_categoria_id . "\">";
   echo " <span id=\"idAjaxSelect_categoria_id\"><select class=\"sc-js-input scFormObjectOdd css_categoria_id_obj\" style=\"\" id=\"id_sc_field_categoria_id\" name=\"categoria_id\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['Lookup_categoria_id'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","  - - - - - - - - - - - - - - - - - - - - - - - ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->categoria_id) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->categoria_id)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_categoria_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_categoria_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['noticia_data_noticia']))
    {
        $this->nm_new_label['noticia_data_noticia'] = "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_data_noticia'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $noticia_data_noticia = $this->noticia_data_noticia;
   $sStyleHidden_noticia_data_noticia = '';
   if (isset($this->nmgp_cmp_hidden['noticia_data_noticia']) && $this->nmgp_cmp_hidden['noticia_data_noticia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['noticia_data_noticia']);
       $sStyleHidden_noticia_data_noticia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_noticia_data_noticia = 'display: none;';
   $sStyleReadInp_noticia_data_noticia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['noticia_data_noticia']) && $this->nmgp_cmp_readonly['noticia_data_noticia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['noticia_data_noticia']);
       $sStyleReadLab_noticia_data_noticia = '';
       $sStyleReadInp_noticia_data_noticia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['noticia_data_noticia']) && $this->nmgp_cmp_hidden['noticia_data_noticia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="noticia_data_noticia" value="<?php echo $this->form_encode_input($noticia_data_noticia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_noticia_data_noticia_line" id="hidden_field_data_noticia_data_noticia" style="<?php echo $sStyleHidden_noticia_data_noticia; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_noticia_data_noticia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_noticia_data_noticia_label" style=""><span id="id_label_noticia_data_noticia"><?php echo $this->nm_new_label['noticia_data_noticia']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['php_cmp_required']['noticia_data_noticia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['php_cmp_required']['noticia_data_noticia'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["noticia_data_noticia"]) &&  $this->nmgp_cmp_readonly["noticia_data_noticia"] == "on") { 

 ?>
<input type="hidden" name="noticia_data_noticia" value="<?php echo $this->form_encode_input($noticia_data_noticia) . "\">" . $noticia_data_noticia . ""; ?>
<?php } else { ?>
<span id="id_read_on_noticia_data_noticia" class="sc-ui-readonly-noticia_data_noticia css_noticia_data_noticia_line" style="<?php echo $sStyleReadLab_noticia_data_noticia; ?>"><?php echo $this->form_format_readonly("noticia_data_noticia", $this->form_encode_input($noticia_data_noticia)); ?></span><span id="id_read_off_noticia_data_noticia" class="css_read_off_noticia_data_noticia" style="white-space: nowrap;<?php echo $sStyleReadInp_noticia_data_noticia; ?>"><?php
$tmp_form_data = $this->field_config['noticia_data_noticia']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_noticia_data_noticia_obj" style="" id="id_sc_field_noticia_data_noticia" type=text name="noticia_data_noticia" value="<?php echo $this->form_encode_input($noticia_data_noticia) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['noticia_data_noticia']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['noticia_data_noticia']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_noticia_data_noticia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_noticia_data_noticia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['noticia_hora_noticia']))
    {
        $this->nm_new_label['noticia_hora_noticia'] = "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_hora_noticia'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $noticia_hora_noticia = $this->noticia_hora_noticia;
   $sStyleHidden_noticia_hora_noticia = '';
   if (isset($this->nmgp_cmp_hidden['noticia_hora_noticia']) && $this->nmgp_cmp_hidden['noticia_hora_noticia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['noticia_hora_noticia']);
       $sStyleHidden_noticia_hora_noticia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_noticia_hora_noticia = 'display: none;';
   $sStyleReadInp_noticia_hora_noticia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['noticia_hora_noticia']) && $this->nmgp_cmp_readonly['noticia_hora_noticia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['noticia_hora_noticia']);
       $sStyleReadLab_noticia_hora_noticia = '';
       $sStyleReadInp_noticia_hora_noticia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['noticia_hora_noticia']) && $this->nmgp_cmp_hidden['noticia_hora_noticia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="noticia_hora_noticia" value="<?php echo $this->form_encode_input($noticia_hora_noticia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_noticia_hora_noticia_line" id="hidden_field_data_noticia_hora_noticia" style="<?php echo $sStyleHidden_noticia_hora_noticia; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_noticia_hora_noticia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_noticia_hora_noticia_label" style=""><span id="id_label_noticia_hora_noticia"><?php echo $this->nm_new_label['noticia_hora_noticia']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['php_cmp_required']['noticia_hora_noticia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['php_cmp_required']['noticia_hora_noticia'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["noticia_hora_noticia"]) &&  $this->nmgp_cmp_readonly["noticia_hora_noticia"] == "on") { 

 ?>
<input type="hidden" name="noticia_hora_noticia" value="<?php echo $this->form_encode_input($noticia_hora_noticia) . "\">" . $noticia_hora_noticia . ""; ?>
<?php } else { ?>
<span id="id_read_on_noticia_hora_noticia" class="sc-ui-readonly-noticia_hora_noticia css_noticia_hora_noticia_line" style="<?php echo $sStyleReadLab_noticia_hora_noticia; ?>"><?php echo $this->form_format_readonly("noticia_hora_noticia", $this->form_encode_input($noticia_hora_noticia)); ?></span><span id="id_read_off_noticia_hora_noticia" class="css_read_off_noticia_hora_noticia" style="white-space: nowrap;<?php echo $sStyleReadInp_noticia_hora_noticia; ?>"><?php
$tmp_form_data = $this->field_config['noticia_hora_noticia']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_noticia_hora_noticia_obj" style="" id="id_sc_field_noticia_hora_noticia" type=text name="noticia_hora_noticia" value="<?php echo $this->form_encode_input($noticia_hora_noticia) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['noticia_hora_noticia']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['noticia_hora_noticia']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_noticia_hora_noticia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_noticia_hora_noticia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_noticia_hora_noticia_dumb = ('' == $sStyleHidden_noticia_hora_noticia) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_noticia_hora_noticia_dumb" style="<?php echo $sStyleHidden_noticia_hora_noticia_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['noticia_titulo']))
    {
        $this->nm_new_label['noticia_titulo'] = "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_titulo'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $noticia_titulo = $this->noticia_titulo;
   $sStyleHidden_noticia_titulo = '';
   if (isset($this->nmgp_cmp_hidden['noticia_titulo']) && $this->nmgp_cmp_hidden['noticia_titulo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['noticia_titulo']);
       $sStyleHidden_noticia_titulo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_noticia_titulo = 'display: none;';
   $sStyleReadInp_noticia_titulo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['noticia_titulo']) && $this->nmgp_cmp_readonly['noticia_titulo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['noticia_titulo']);
       $sStyleReadLab_noticia_titulo = '';
       $sStyleReadInp_noticia_titulo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['noticia_titulo']) && $this->nmgp_cmp_hidden['noticia_titulo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="noticia_titulo" value="<?php echo $this->form_encode_input($noticia_titulo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_noticia_titulo_line" id="hidden_field_data_noticia_titulo" style="<?php echo $sStyleHidden_noticia_titulo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_noticia_titulo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_noticia_titulo_label" style=""><span id="id_label_noticia_titulo"><?php echo $this->nm_new_label['noticia_titulo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['php_cmp_required']['noticia_titulo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['php_cmp_required']['noticia_titulo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["noticia_titulo"]) &&  $this->nmgp_cmp_readonly["noticia_titulo"] == "on") { 

 ?>
<input type="hidden" name="noticia_titulo" value="<?php echo $this->form_encode_input($noticia_titulo) . "\">" . $noticia_titulo . ""; ?>
<?php } else { ?>
<span id="id_read_on_noticia_titulo" class="sc-ui-readonly-noticia_titulo css_noticia_titulo_line" style="<?php echo $sStyleReadLab_noticia_titulo; ?>"><?php echo $this->form_format_readonly("noticia_titulo", $this->form_encode_input($this->noticia_titulo)); ?></span><span id="id_read_off_noticia_titulo" class="css_read_off_noticia_titulo" style="white-space: nowrap;<?php echo $sStyleReadInp_noticia_titulo; ?>">
 <input class="sc-js-input scFormObjectOdd css_noticia_titulo_obj" style="" id="id_sc_field_noticia_titulo" type=text name="noticia_titulo" value="<?php echo $this->form_encode_input($noticia_titulo) ?>"
 size=50 maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_noticia_titulo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_noticia_titulo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['noticia_corpo']))
    {
        $this->nm_new_label['noticia_corpo'] = "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_corpo'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $noticia_corpo = $this->noticia_corpo;
   $sStyleHidden_noticia_corpo = '';
   if (isset($this->nmgp_cmp_hidden['noticia_corpo']) && $this->nmgp_cmp_hidden['noticia_corpo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['noticia_corpo']);
       $sStyleHidden_noticia_corpo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_noticia_corpo = 'display: none;';
   $sStyleReadInp_noticia_corpo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['noticia_corpo']) && $this->nmgp_cmp_readonly['noticia_corpo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['noticia_corpo']);
       $sStyleReadLab_noticia_corpo = '';
       $sStyleReadInp_noticia_corpo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['noticia_corpo']) && $this->nmgp_cmp_hidden['noticia_corpo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="noticia_corpo" value="<?php echo $this->form_encode_input($noticia_corpo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_noticia_corpo_line" id="hidden_field_data_noticia_corpo" style="<?php echo $sStyleHidden_noticia_corpo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_noticia_corpo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_noticia_corpo_label" style=""><span id="id_label_noticia_corpo"><?php echo $this->nm_new_label['noticia_corpo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['php_cmp_required']['noticia_corpo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_redigir_frm_mob']['php_cmp_required']['noticia_corpo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br><span id="id_read_on_noticia_corpo" style="<?php echo $sStyleReadLab_noticia_corpo; ?>"><?php echo $this->form_format_readonly("noticia_corpo", sc_strip_script($this->noticia_corpo)); ?></span><span id="id_read_off_noticia_corpo" class="css_read_off_noticia_corpo" style="<?php echo $sStyleReadInp_noticia_corpo; ?>"><textarea id="noticia_corpo" name="noticia_corpo" cols="80" rows="30" class="mceEditor_noticia_corpo" style="width: 100%; height:200px;"><?php echo $this->form_encode_input($this->noticia_corpo); ?></textarea>
</span></td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_noticia_corpo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_noticia_corpo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_noticia_corpo_dumb = ('' == $sStyleHidden_noticia_corpo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_noticia_corpo_dumb" style="<?php echo $sStyleHidden_noticia_corpo_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['noticia_data_pub']))
    {
        $this->nm_new_label['noticia_data_pub'] = "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_data_pub'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $noticia_data_pub = $this->noticia_data_pub;
   $sStyleHidden_noticia_data_pub = '';
   if (isset($this->nmgp_cmp_hidden['noticia_data_pub']) && $this->nmgp_cmp_hidden['noticia_data_pub'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['noticia_data_pub']);
       $sStyleHidden_noticia_data_pub = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_noticia_data_pub = 'display: none;';
   $sStyleReadInp_noticia_data_pub = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['noticia_data_pub']) && $this->nmgp_cmp_readonly['noticia_data_pub'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['noticia_data_pub']);
       $sStyleReadLab_noticia_data_pub = '';
       $sStyleReadInp_noticia_data_pub = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['noticia_data_pub']) && $this->nmgp_cmp_hidden['noticia_data_pub'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="noticia_data_pub" value="<?php echo $this->form_encode_input($noticia_data_pub) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_noticia_data_pub_line" id="hidden_field_data_noticia_data_pub" style="<?php echo $sStyleHidden_noticia_data_pub; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_noticia_data_pub_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_noticia_data_pub_label" style=""><span id="id_label_noticia_data_pub"><?php echo $this->nm_new_label['noticia_data_pub']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["noticia_data_pub"]) &&  $this->nmgp_cmp_readonly["noticia_data_pub"] == "on") { 

 ?>
<input type="hidden" name="noticia_data_pub" value="<?php echo $this->form_encode_input($noticia_data_pub) . "\">" . $noticia_data_pub . ""; ?>
<?php } else { ?>
<span id="id_read_on_noticia_data_pub" class="sc-ui-readonly-noticia_data_pub css_noticia_data_pub_line" style="<?php echo $sStyleReadLab_noticia_data_pub; ?>"><?php echo $this->form_format_readonly("noticia_data_pub", $this->form_encode_input($noticia_data_pub)); ?></span><span id="id_read_off_noticia_data_pub" class="css_read_off_noticia_data_pub" style="white-space: nowrap;<?php echo $sStyleReadInp_noticia_data_pub; ?>"><?php
$tmp_form_data = $this->field_config['noticia_data_pub']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_noticia_data_pub_obj" style="" id="id_sc_field_noticia_data_pub" type=text name="noticia_data_pub" value="<?php echo $this->form_encode_input($noticia_data_pub) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['noticia_data_pub']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['noticia_data_pub']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_noticia_data_pub_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_noticia_data_pub_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['noticia_hora_pub']))
    {
        $this->nm_new_label['noticia_hora_pub'] = "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_hora_pub'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $noticia_hora_pub = $this->noticia_hora_pub;
   $sStyleHidden_noticia_hora_pub = '';
   if (isset($this->nmgp_cmp_hidden['noticia_hora_pub']) && $this->nmgp_cmp_hidden['noticia_hora_pub'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['noticia_hora_pub']);
       $sStyleHidden_noticia_hora_pub = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_noticia_hora_pub = 'display: none;';
   $sStyleReadInp_noticia_hora_pub = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['noticia_hora_pub']) && $this->nmgp_cmp_readonly['noticia_hora_pub'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['noticia_hora_pub']);
       $sStyleReadLab_noticia_hora_pub = '';
       $sStyleReadInp_noticia_hora_pub = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['noticia_hora_pub']) && $this->nmgp_cmp_hidden['noticia_hora_pub'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="noticia_hora_pub" value="<?php echo $this->form_encode_input($noticia_hora_pub) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_noticia_hora_pub_line" id="hidden_field_data_noticia_hora_pub" style="<?php echo $sStyleHidden_noticia_hora_pub; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_noticia_hora_pub_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_noticia_hora_pub_label" style=""><span id="id_label_noticia_hora_pub"><?php echo $this->nm_new_label['noticia_hora_pub']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["noticia_hora_pub"]) &&  $this->nmgp_cmp_readonly["noticia_hora_pub"] == "on") { 

 ?>
<input type="hidden" name="noticia_hora_pub" value="<?php echo $this->form_encode_input($noticia_hora_pub) . "\">" . $noticia_hora_pub . ""; ?>
<?php } else { ?>
<span id="id_read_on_noticia_hora_pub" class="sc-ui-readonly-noticia_hora_pub css_noticia_hora_pub_line" style="<?php echo $sStyleReadLab_noticia_hora_pub; ?>"><?php echo $this->form_format_readonly("noticia_hora_pub", $this->form_encode_input($noticia_hora_pub)); ?></span><span id="id_read_off_noticia_hora_pub" class="css_read_off_noticia_hora_pub" style="white-space: nowrap;<?php echo $sStyleReadInp_noticia_hora_pub; ?>"><?php
$tmp_form_data = $this->field_config['noticia_hora_pub']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_noticia_hora_pub_obj" style="" id="id_sc_field_noticia_hora_pub" type=text name="noticia_hora_pub" value="<?php echo $this->form_encode_input($noticia_hora_pub) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['noticia_hora_pub']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['noticia_hora_pub']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_noticia_hora_pub_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_noticia_hora_pub_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
