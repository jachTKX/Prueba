
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($oField.length > 0) {
    switch ($oField[0].name) {
      case 'categoria_id':
      case 'noticia_data_noticia':
      case 'noticia_hora_noticia':
      case 'noticia_flag_man_editorial':
      case 'noticia_titulo':
      case 'noticia_corpo':
        sc_exib_ocult_pag('news_noticias_publicar_frm_form0');
        break;
      case 'noticia_img':
        sc_exib_ocult_pag('news_noticias_publicar_frm_form1');
        break;
    }
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["categoria_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["noticia_data_noticia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["noticia_hora_noticia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["noticia_flag_man_editorial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["noticia_titulo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["noticia_corpo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["noticia_img" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["categoria_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["categoria_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["noticia_data_noticia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["noticia_data_noticia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["noticia_hora_noticia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["noticia_hora_noticia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["noticia_flag_man_editorial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["noticia_flag_man_editorial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["noticia_titulo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["noticia_titulo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["noticia_corpo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["noticia_corpo" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("categoria_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_noticia_id' + iSeqRow).bind('change', function() { sc_news_noticias_publicar_frm_noticia_id_onchange(this, iSeqRow) });
  $('#id_sc_field_categoria_id' + iSeqRow).bind('blur', function() { sc_news_noticias_publicar_frm_categoria_id_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_news_noticias_publicar_frm_categoria_id_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_news_noticias_publicar_frm_categoria_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_reporter_id' + iSeqRow).bind('change', function() { sc_news_noticias_publicar_frm_reporter_id_onchange(this, iSeqRow) });
  $('#id_sc_field_noticia_data_noticia' + iSeqRow).bind('blur', function() { sc_news_noticias_publicar_frm_noticia_data_noticia_onblur(this, iSeqRow) })
                                                  .bind('change', function() { sc_news_noticias_publicar_frm_noticia_data_noticia_onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_news_noticias_publicar_frm_noticia_data_noticia_onfocus(this, iSeqRow) });
  $('#id_sc_field_noticia_hora_noticia' + iSeqRow).bind('blur', function() { sc_news_noticias_publicar_frm_noticia_hora_noticia_onblur(this, iSeqRow) })
                                                  .bind('change', function() { sc_news_noticias_publicar_frm_noticia_hora_noticia_onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_news_noticias_publicar_frm_noticia_hora_noticia_onfocus(this, iSeqRow) });
  $('#id_sc_field_noticia_data_pub' + iSeqRow).bind('change', function() { sc_news_noticias_publicar_frm_noticia_data_pub_onchange(this, iSeqRow) });
  $('#id_sc_field_noticia_hora_pub' + iSeqRow).bind('change', function() { sc_news_noticias_publicar_frm_noticia_hora_pub_onchange(this, iSeqRow) });
  $('#id_sc_field_noticia_titulo' + iSeqRow).bind('blur', function() { sc_news_noticias_publicar_frm_noticia_titulo_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_news_noticias_publicar_frm_noticia_titulo_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_news_noticias_publicar_frm_noticia_titulo_onfocus(this, iSeqRow) });
  $('#id_sc_field_noticia_corpo' + iSeqRow).bind('blur', function() { sc_news_noticias_publicar_frm_noticia_corpo_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_news_noticias_publicar_frm_noticia_corpo_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_news_noticias_publicar_frm_noticia_corpo_onfocus(this, iSeqRow) });
  $('#id_sc_field_noticia_img' + iSeqRow).bind('blur', function() { sc_news_noticias_publicar_frm_noticia_img_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_news_noticias_publicar_frm_noticia_img_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_news_noticias_publicar_frm_noticia_img_onfocus(this, iSeqRow) });
  $('#id_sc_field_noticia_flag_man_editorial' + iSeqRow).bind('blur', function() { sc_news_noticias_publicar_frm_noticia_flag_man_editorial_onblur(this, iSeqRow) })
                                                        .bind('change', function() { sc_news_noticias_publicar_frm_noticia_flag_man_editorial_onchange(this, iSeqRow) })
                                                        .bind('focus', function() { sc_news_noticias_publicar_frm_noticia_flag_man_editorial_onfocus(this, iSeqRow) });
  $('#id_sc_field_deflag_manchete_concorrente' + iSeqRow).bind('change', function() { sc_news_noticias_publicar_frm_deflag_manchete_concorrente_onchange(this, iSeqRow) });
} // scJQEventsAdd

function sc_news_noticias_publicar_frm_noticia_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_news_noticias_publicar_frm_categoria_id_onblur(oThis, iSeqRow) {
  do_ajax_news_noticias_publicar_frm_validate_categoria_id();
  scCssBlur(oThis);
}

function sc_news_noticias_publicar_frm_categoria_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_news_noticias_publicar_frm_categoria_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_news_noticias_publicar_frm_reporter_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_news_noticias_publicar_frm_noticia_data_noticia_onblur(oThis, iSeqRow) {
  do_ajax_news_noticias_publicar_frm_validate_noticia_data_noticia();
  scCssBlur(oThis);
}

function sc_news_noticias_publicar_frm_noticia_data_noticia_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_news_noticias_publicar_frm_noticia_data_noticia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_news_noticias_publicar_frm_noticia_hora_noticia_onblur(oThis, iSeqRow) {
  do_ajax_news_noticias_publicar_frm_validate_noticia_hora_noticia();
  scCssBlur(oThis);
}

function sc_news_noticias_publicar_frm_noticia_hora_noticia_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_news_noticias_publicar_frm_noticia_hora_noticia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_news_noticias_publicar_frm_noticia_data_pub_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_news_noticias_publicar_frm_noticia_hora_pub_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_news_noticias_publicar_frm_noticia_titulo_onblur(oThis, iSeqRow) {
  do_ajax_news_noticias_publicar_frm_validate_noticia_titulo();
  scCssBlur(oThis);
}

function sc_news_noticias_publicar_frm_noticia_titulo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_news_noticias_publicar_frm_noticia_titulo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_news_noticias_publicar_frm_noticia_corpo_onblur(oThis, iSeqRow) {
  do_ajax_news_noticias_publicar_frm_validate_noticia_corpo();
  scCssBlur(oThis);
}

function sc_news_noticias_publicar_frm_noticia_corpo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_news_noticias_publicar_frm_noticia_corpo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_news_noticias_publicar_frm_noticia_img_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_news_noticias_publicar_frm_noticia_img_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_news_noticias_publicar_frm_noticia_img_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_news_noticias_publicar_frm_noticia_flag_man_editorial_onblur(oThis, iSeqRow) {
  do_ajax_news_noticias_publicar_frm_validate_noticia_flag_man_editorial();
  scCssBlur(oThis);
}

function sc_news_noticias_publicar_frm_noticia_flag_man_editorial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_news_noticias_publicar_frm_noticia_flag_man_editorial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_news_noticias_publicar_frm_deflag_manchete_concorrente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function displayChange_page(page, status) {
	if ("0" == page) {
		displayChange_page_0(status);
	}
	if ("1" == page) {
		displayChange_page_1(status);
	}
}

function displayChange_page_0(status) {
	displayChange_block("0", status);
	displayChange_block("1", status);
}

function displayChange_page_1(status) {
	displayChange_block("2", status);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
	if ("2" == block) {
		displayChange_block_2(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("categoria_id", "", status);
	displayChange_field("noticia_data_noticia", "", status);
	displayChange_field("noticia_hora_noticia", "", status);
	displayChange_field("noticia_flag_man_editorial", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("noticia_titulo", "", status);
	displayChange_field("noticia_corpo", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("noticia_img", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_categoria_id(row, status);
	displayChange_field_noticia_data_noticia(row, status);
	displayChange_field_noticia_hora_noticia(row, status);
	displayChange_field_noticia_flag_man_editorial(row, status);
	displayChange_field_noticia_titulo(row, status);
	displayChange_field_noticia_corpo(row, status);
	displayChange_field_noticia_img(row, status);
}

function displayChange_field(field, row, status) {
	if ("categoria_id" == field) {
		displayChange_field_categoria_id(row, status);
	}
	if ("noticia_data_noticia" == field) {
		displayChange_field_noticia_data_noticia(row, status);
	}
	if ("noticia_hora_noticia" == field) {
		displayChange_field_noticia_hora_noticia(row, status);
	}
	if ("noticia_flag_man_editorial" == field) {
		displayChange_field_noticia_flag_man_editorial(row, status);
	}
	if ("noticia_titulo" == field) {
		displayChange_field_noticia_titulo(row, status);
	}
	if ("noticia_corpo" == field) {
		displayChange_field_noticia_corpo(row, status);
	}
	if ("noticia_img" == field) {
		displayChange_field_noticia_img(row, status);
	}
}

function displayChange_field_categoria_id(row, status) {
}

function displayChange_field_noticia_data_noticia(row, status) {
}

function displayChange_field_noticia_hora_noticia(row, status) {
}

function displayChange_field_noticia_flag_man_editorial(row, status) {
}

function displayChange_field_noticia_titulo(row, status) {
}

function displayChange_field_noticia_corpo(row, status) {
}

function displayChange_field_noticia_img(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_news_noticias_publicar_frm_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(34);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_noticia_data_noticia" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_noticia_data_noticia" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_news_noticias_publicar_frm_validate_noticia_data_noticia(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['noticia_data_noticia']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

                var scJQHtmlEditorData = (function() {
                    var data = {};
                    function scJQHtmlEditorData(a, b) {
                        if (a) {
                            if (typeof(a) === typeof({})) {
                                for (var d in a) {
                                    if (a.hasOwnProperty(d)) {
                                        data[d] = a[d];
                                    }
                                }
                            } else if ((typeof(a) === typeof('')) || (typeof(a) === typeof(1))) {
                                if (b) {
                                    data[a] = b;
                                } else {
                                    if (typeof(a) === typeof('')) {
                                        var v = data;
                                        a = a.split('.');
                                        a.forEach(function (r) {
                                            v = v[r];
                                        });
                                        return v;
                                    }
                                    return data[a];
                                }
                            }
                        }
                        return data;
                    }
                    return scJQHtmlEditorData;
                }());
 function scJQHtmlEditorAdd(iSeqRow) {
<?php
$sLangTest = '';
if(is_file('../_lib/lang/arr_langs_tinymce.php'))
{
    include('../_lib/lang/arr_langs_tinymce.php');
    if(isset($Nm_arr_lang_tinymce[ $this->Ini->str_lang ]))
    {
        $sLangTest = $Nm_arr_lang_tinymce[ $this->Ini->str_lang ];
    }
}
if(empty($sLangTest))
{
    $sLangTest = 'en_GB';
}
?>
 var baseData = {
  mode: "textareas",
  theme: "modern",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['noticia_corpo']) && $this->nmgp_cmp_readonly['noticia_corpo'] == 'on')
{
    unset($this->nmgp_cmp_readonly['noticia_corpo']);
?>
   readonly: "true",
<?php
}
else 
{
?>
   readonly: "",
<?php
}
?>
<?php
if ('yyyymmdd' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%Y{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d";
}
elseif ('mmddyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
elseif ('ddmmyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
else {
    $tinymceDateFormat = "%D";
}
?>
  insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "<?php echo $tinymceDateFormat ?>"],
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  language : '<?php echo $sLangTest; ?>',
  plugins : 'advlist,autolink,link,image,lists,charmap,print,preview,hr,anchor,pagebreak,searchreplace,wordcount,visualblocks,visualchars,code,fullscreen,insertdatetime,media,nonbreaking,table,directionality,emoticons,template,textcolor,paste,textcolor,colorpicker,textpattern,contextmenu',
  toolbar1: "undo,redo,separator,formatselect,separator,bold,italic,separator,alignleft,aligncenter,alignright,alignjustify,separator,bullist,numlist,outdent,indent,separator,link,image",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  editor_selector: "mceEditor_noticia_corpo" + iSeqRow,
  setup: function(ed) {
    ed.on("init", function (e) {
      if ($('textarea[name="noticia_corpo' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
} // scJQHtmlEditorAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_noticia_img" + iSeqRow).fileupload({
    datatype: "json",
    url: "news_noticias_publicar_frm_ul_save.php",
    dropZone: $("#hidden_field_data_noticia_img" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'noticia_img'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_noticia_img" + iSeqRow);
        loaderContent = $("#id_img_loader_noticia_img" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_noticia_img" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_noticia_img" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_noticia_img" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_noticia_img" + iSeqRow).val("");
      $("#id_sc_field_noticia_img_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_noticia_img_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_noticia_img = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_noticia_img) ? "none" : "";
      $("#id_ajax_img_noticia_img" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_noticia_img" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_noticia_img) {
        document.F1.temp_out_noticia_img.value = var_ajax_img_thumb;
        document.F1.temp_out1_noticia_img.value = var_ajax_img_noticia_img;
      }
      else if (document.F1.temp_out_noticia_img) {
        document.F1.temp_out_noticia_img.value = var_ajax_img_noticia_img;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_noticia_img" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_noticia_img" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_noticia_img" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_noticia_img" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + img_name +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'news_noticias_publicar_frm')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});
function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQHtmlEditorAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

