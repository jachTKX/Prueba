<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="../_lib/libraries/grp/news/main.css">		
		<META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
		<title><?php echo $this->Ini->Nm_lang['lang_login_message_17']; ?></title>
		<meta name="description" content="<?php echo $this->Ini->Nm_lang['lang_login_message_15']; ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("login_sajax_js.php");
?>
<script type="text/javascript">
var Nm_Proc_Atualiz = false;
</script>
<script type="text/javascript">
<?php

include_once('login_jquery.php');

?>
</script>
<script type="text/javascript">
 $(function() {
  scJQElementsAdd('');
  scJQGeneralAdd();
 });

</script>
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
 include_once("login_js0.php");
?>
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
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
$sIconTitle = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
$sErrorIcon = (isset($_SESSION['scriptcase']['error_icon']['app_Login']) && '' != $_SESSION['scriptcase']['error_icon']['app_Login']) ? $_SESSION['scriptcase']['error_icon']['app_Login']  : "";
$sCloseIcon = (isset($_SESSION['scriptcase']['error_close']['app_Login']) && '' != trim($_SESSION['scriptcase']['error_close']['app_Login'])) ? $_SESSION['scriptcase']['error_close']['app_Login'] : "<td><input class=\"scButton_default\" type=\"button\" onClick=\"document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false\" value=\"X\" /></td>";
if ('' != $sIconTitle && '' != $sErrorIcon) {
    $sErrorIcon = '';
}
?>
<script type="text/javascript">
$(function() {
    $(document.F1).on("submit", function (e) {
        e.preventDefault();
    });
});

if (typeof scDisplayUserError === "undefined") {
    function scDisplayUserError(errorMessage) {
        scJs_alert("ERROR:\r\n" + errorMessage.replace(/<br \/>/gi, "\n"), function() {}, {type: "error"});
    }
}
if (typeof scDisplayUserDebug === "undefined") {
    function scDisplayUserDebug(debugMessage) {
        scJs_alert("DEBUG:\r\n" + debugMessage.replace(/<br \/>/gi, "\n"), function() {}, {type: "warning"});
    }
}
if (typeof scDisplayUserMessage === "undefined") {
    function scDisplayUserMessage(userMessage) {
        scJs_alert("MESSAGE:\r\n" + userMessage.replace(/<br \/>/gi, "\n"), function() {}, {type: "info"});
    }
}
</script>


	</head>

	<body class="page-background" style="background-image:url('../_lib/libraries/grp/news/news-bg.jpg');');">
		<div class="page">
			<div class="container-small container-color" style="background: rgba(0, 0, 0, 0.6);">
				<div class="background">
					<div class="content">
						<h1>
							<?php echo $this->Ini->Nm_lang['lang_login_message_7']; ?>
						</h1>

						<p>
							<?php echo $this->Ini->Nm_lang['lang_login_message_15']; ?>
						</p>
						<p>
							<?php echo $this->Ini->Nm_lang['lang_page_button_download']; ?>
						</p>
					</div>
				</div>
				<div class="col-4 box-form">
					<form class="form" action=""  name="F1" method="post" 
               action="login.php" 
               target="_self">
						<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />

						<h2>
							<?php echo $this->Ini->Nm_lang['lang_login_message_16']; ?>
						</h2>

						<div class="control">
							<label class="label" for="name"><?php echo $this->Ini->Nm_lang['lang_login_message_8']; ?></label>
							<input class="input  sc-js-input " type="text" placeholder="<?php echo $this->Ini->Nm_lang['lang_login_message_11']; ?>"  name="login" id="id_sc_field_login" value="<?php echo $this->form_encode_input($login) ?>"  alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
						</div>

						<div class="control">
							<label class="label" for="pass"><?php echo $this->Ini->Nm_lang['lang_login_message_9']; ?></label>
							<input class="input  sc-js-input " type="password" placeholder="<?php echo $this->Ini->Nm_lang['lang_login_message_12']; ?>"  name="senha" id="id_sc_field_senha" value="<?php echo $this->form_encode_input($senha) ?>"  alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
						</div>

						<div class="submit">
							<input class="button" type="submit" value="<?php echo $this->Ini->Nm_lang['lang_login_message_10']; ?>"  onclick="nm_atualiza('alterar');"  />
						</div>
						<!-- Idiomas -->
						<div class="flag-lang">
							<a class="flags" href="../login/login.php?lang=en"><img src="../_lib/libraries/grp/news/en_us.png"></a>
							<a class="flags" href="../login/login.php?lang=pt"><img src="../_lib/libraries/grp/news/pt_br.png"></a>
							<a class="flags" href="../login/login.php?lang=es"><img src="../_lib/libraries/grp/news/es_es.png"></a>
						</div>
						<hr style="margin: 25px 0 20px;">
						<div id='message'>
							<span style='color:#333; font-size:12px; font-weight:bold;'><?php echo $this->Ini->Nm_lang['lang_login_message_1']; ?></span>
							<p style="margin: 0px;font-size: 12px;"><?php echo $this->Ini->Nm_lang['lang_login_message_2']; ?></p>
							<p style="margin: 0px;font-size: 12px;"><?php echo $this->Ini->Nm_lang['lang_login_message_3']; ?></p>	
							<span style='color:#333; font-size:12px; font-weight:bold;'><?php echo $this->Ini->Nm_lang['lang_login_message_4']; ?></span>
							<p style="margin: 0px;font-size: 12px;"><?php echo $this->Ini->Nm_lang['lang_login_message_5']; ?></p>
							<p style="margin: 0px;font-size: 12px;"><?php echo $this->Ini->Nm_lang['lang_login_message_6']; ?></p>	
						</div>
					</form>					
				</div>
			</div>
		</div>		
		<div class="copyright">
			<p><?php echo $this->Ini->Nm_lang['lang_page_copyright']; ?></p>
		</div>
	</body>
</html>