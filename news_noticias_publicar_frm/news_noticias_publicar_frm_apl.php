<?php
//
class news_noticias_publicar_frm_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $noticia_id;
   var $categoria_id;
   var $categoria_id_1;
   var $reporter_id;
   var $noticia_data_noticia;
   var $noticia_hora_noticia;
   var $noticia_data_pub;
   var $noticia_hora_pub;
   var $noticia_titulo;
   var $noticia_corpo;
   var $noticia_img;
   var $noticia_img_scfile_name;
   var $noticia_img_ul_name;
   var $noticia_img_scfile_type;
   var $noticia_img_ul_type;
   var $noticia_img_limpa;
   var $noticia_img_salva;
   var $out_noticia_img;
   var $noticia_flag_man_editorial;
   var $deflag_manchete_concorrente;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['categoria_id']))
          {
              $this->categoria_id = $this->NM_ajax_info['param']['categoria_id'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['noticia_corpo']))
          {
              $this->noticia_corpo = $this->NM_ajax_info['param']['noticia_corpo'];
          }
          if (isset($this->NM_ajax_info['param']['noticia_data_noticia']))
          {
              $this->noticia_data_noticia = $this->NM_ajax_info['param']['noticia_data_noticia'];
          }
          if (isset($this->NM_ajax_info['param']['noticia_flag_man_editorial']))
          {
              $this->noticia_flag_man_editorial = $this->NM_ajax_info['param']['noticia_flag_man_editorial'];
          }
          if (isset($this->NM_ajax_info['param']['noticia_hora_noticia']))
          {
              $this->noticia_hora_noticia = $this->NM_ajax_info['param']['noticia_hora_noticia'];
          }
          if (isset($this->NM_ajax_info['param']['noticia_id']))
          {
              $this->noticia_id = $this->NM_ajax_info['param']['noticia_id'];
          }
          if (isset($this->NM_ajax_info['param']['noticia_img']))
          {
              $this->noticia_img = $this->NM_ajax_info['param']['noticia_img'];
          }
          if (isset($this->NM_ajax_info['param']['noticia_img_limpa']))
          {
              $this->noticia_img_limpa = $this->NM_ajax_info['param']['noticia_img_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['noticia_img_ul_name']))
          {
              $this->noticia_img_ul_name = $this->NM_ajax_info['param']['noticia_img_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['noticia_img_ul_type']))
          {
              $this->noticia_img_ul_type = $this->NM_ajax_info['param']['noticia_img_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['noticia_titulo']))
          {
              $this->noticia_titulo = $this->NM_ajax_info['param']['noticia_titulo'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_news_noticias_publicar_frm($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new news_noticias_publicar_frm_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['news_noticias_publicar_frm']['upload_field_info']['noticia_img'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'news_noticias_publicar_frm',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['news_noticias_publicar_frm']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['news_noticias_publicar_frm'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['news_noticias_publicar_frm']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['news_noticias_publicar_frm']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('news_noticias_publicar_frm') . "/news_noticias_publicar_frm.php";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['news_noticias_publicar_frm']['label'] = "" . $this->Ini->Nm_lang['lang_header_publicar_frm'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "news_noticias_publicar_frm")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['categoria_id'] = '' . $this->Ini->Nm_lang['lang_news_noticias_fild_categoria_id'] . '';
      $this->nm_new_label['noticia_data_noticia'] = '' . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_data_noticia'] . '';
      $this->nm_new_label['noticia_hora_noticia'] = '' . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_hora_noticia'] . '';
      $this->nm_new_label['noticia_titulo'] = '' . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_titulo'] . '';
      $this->nm_new_label['noticia_corpo'] = '' . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_corpo'] . '';
      $this->nm_new_label['noticia_img'] = '' . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_img'] . '';

      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';



      $_SESSION['scriptcase']['error_icon']['news_noticias_publicar_frm']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['news_noticias_publicar_frm'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "news_noticias_publicar_frm.php"; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['noticia_img_ul_name']) && '' != $this->NM_ajax_info['param']['noticia_img_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['upload_field_ul_name'][$this->noticia_img_ul_name]))
          {
              $this->NM_ajax_info['param']['noticia_img_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['upload_field_ul_name'][$this->noticia_img_ul_name];
          }
          $this->noticia_img = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['noticia_img_ul_name'];
          $this->noticia_img_scfile_name = substr($this->NM_ajax_info['param']['noticia_img_ul_name'], 12);
          $this->noticia_img_scfile_type = $this->NM_ajax_info['param']['noticia_img_ul_type'];
          $this->noticia_img_ul_name = $this->NM_ajax_info['param']['noticia_img_ul_name'];
          $this->noticia_img_ul_type = $this->NM_ajax_info['param']['noticia_img_ul_type'];
      }
      elseif (isset($this->noticia_img_ul_name) && '' != $this->noticia_img_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['upload_field_ul_name'][$this->noticia_img_ul_name]))
          {
              $this->noticia_img_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['upload_field_ul_name'][$this->noticia_img_ul_name];
          }
          $this->noticia_img = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->noticia_img_ul_name;
          $this->noticia_img_scfile_name = substr($this->noticia_img_ul_name, 12);
          $this->noticia_img_scfile_type = $this->noticia_img_ul_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['news_noticias_publicar_frm']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['news_noticias_publicar_frm'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['news_noticias_publicar_frm'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dados_form'];
          if (!isset($this->noticia_id)){$this->noticia_id = $this->nmgp_dados_form['noticia_id'];} 
          if (!isset($this->reporter_id)){$this->reporter_id = $this->nmgp_dados_form['reporter_id'];} 
          if (!isset($this->noticia_data_pub)){$this->noticia_data_pub = $this->nmgp_dados_form['noticia_data_pub'];} 
          if (!isset($this->noticia_hora_pub)){$this->noticia_hora_pub = $this->nmgp_dados_form['noticia_hora_pub'];} 
          if (!isset($this->deflag_manchete_concorrente)){$this->deflag_manchete_concorrente = $this->nmgp_dados_form['deflag_manchete_concorrente'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("news_noticias_publicar_frm", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'news_noticias_publicar_frm/news_noticias_publicar_frm_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'news_noticias_publicar_frm_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'news_noticias_publicar_frm_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'news_noticias_publicar_frm_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'news_noticias_publicar_frm/news_noticias_publicar_frm_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "news_noticias_publicar_frm_erro.class.php"); 
      }
      $this->Erro      = new news_noticias_publicar_frm_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao']))
         { 
             if ($this->noticia_id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['news_noticias_publicar_frm']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['news_noticias_publicar_frm']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['news_noticias_publicar_frm']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
            echo $orig_img . '_@@NM@@_';

            if(file_exists($out1_img_cache)){
                echo $out1_img_cache;
                exit;
            }
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($this->categoria_id)) { $this->nm_limpa_alfa($this->categoria_id); }
      if (isset($this->noticia_titulo)) { $this->nm_limpa_alfa($this->noticia_titulo); }
      if (isset($this->noticia_corpo)) { $this->nm_limpa_alfa($this->noticia_corpo); }
      if (isset($this->noticia_flag_man_editorial)) { $this->nm_limpa_alfa($this->noticia_flag_man_editorial); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "news_noticias_publicar_frm.php"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- noticia_data_noticia
      $this->field_config['noticia_data_noticia']                 = array();
      $this->field_config['noticia_data_noticia']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['noticia_data_noticia']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['noticia_data_noticia']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'noticia_data_noticia');
      //-- noticia_hora_noticia
      $this->field_config['noticia_hora_noticia']                 = array();
      $this->field_config['noticia_hora_noticia']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['noticia_hora_noticia']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['noticia_hora_noticia']['date_display'] = "hhiiss";
      $this->new_date_format('HH', 'noticia_hora_noticia');
      //-- noticia_id
      $this->field_config['noticia_id']               = array();
      $this->field_config['noticia_id']['symbol_grp'] = '.';
      $this->field_config['noticia_id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['noticia_id']['symbol_dec'] = '';
      $this->field_config['noticia_id']['symbol_neg'] = '-';
      $this->field_config['noticia_id']['format_neg'] = '';
      //-- reporter_id
      $this->field_config['reporter_id']               = array();
      $this->field_config['reporter_id']['symbol_grp'] = '.';
      $this->field_config['reporter_id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['reporter_id']['symbol_dec'] = '';
      $this->field_config['reporter_id']['symbol_neg'] = '-';
      $this->field_config['reporter_id']['format_neg'] = '';
      //-- noticia_data_pub
      $this->field_config['noticia_data_pub']                 = array();
      $this->field_config['noticia_data_pub']['date_format']  = "dd/mm/aaaa";
      $this->field_config['noticia_data_pub']['date_sep']     = "/";
      $this->field_config['noticia_data_pub']['date_display'] = "dd/mm/aaaa";
      $this->new_date_format('DT', 'noticia_data_pub');
      //-- noticia_hora_pub
      $this->field_config['noticia_hora_pub']                 = array();
      $this->field_config['noticia_hora_pub']['date_format']  = "hh:mm:ss";
      $this->field_config['noticia_hora_pub']['time_sep']     = ":";
      $this->field_config['noticia_hora_pub']['date_display'] = "hh:mm:ss";
      $this->new_date_format('HH', 'noticia_hora_pub');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_categoria_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'categoria_id');
          }
          if ('validate_noticia_data_noticia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'noticia_data_noticia');
          }
          if ('validate_noticia_hora_noticia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'noticia_hora_noticia');
          }
          if ('validate_noticia_flag_man_editorial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'noticia_flag_man_editorial');
          }
          if ('validate_noticia_titulo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'noticia_titulo');
          }
          if ('validate_noticia_corpo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'noticia_corpo');
          }
          if ('validate_noticia_img' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'noticia_img');
          }
          news_noticias_publicar_frm_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              news_noticias_publicar_frm_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['news_noticias_publicar_frm']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  news_noticias_publicar_frm_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          news_noticias_publicar_frm_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          news_noticias_publicar_frm_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "news_noticias_publicar_frm.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               if (!empty($str_zip)) {
                   exec($str_zip);
               }
               // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
               if ($fp)
               {
                   @fwrite($fp, $str_zip . "\r\n\r\n");
                   @fclose($fp);
               }
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_header_publicar_frm'] . "") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="news_noticias_publicar_frm_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="news_noticias_publicar_frm"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="news_noticias_publicar_frm.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'categoria_id':
               return "" . $this->Ini->Nm_lang['lang_news_noticias_fild_categoria_id'] . "";
               break;
           case 'noticia_data_noticia':
               return "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_data_noticia'] . "";
               break;
           case 'noticia_hora_noticia':
               return "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_hora_noticia'] . "";
               break;
           case 'noticia_flag_man_editorial':
               return "Noticia Flag Man Editorial";
               break;
           case 'noticia_titulo':
               return "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_titulo'] . "";
               break;
           case 'noticia_corpo':
               return "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_corpo'] . "";
               break;
           case 'noticia_img':
               return "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_img'] . "";
               break;
           case 'noticia_id':
               return "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_id'] . "";
               break;
           case 'reporter_id':
               return "" . $this->Ini->Nm_lang['lang_news_noticias_fild_reporter_id'] . "";
               break;
           case 'noticia_data_pub':
               return "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_data_pub'] . "";
               break;
           case 'noticia_hora_pub':
               return "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_hora_pub'] . "";
               break;
           case 'deflag_manchete_concorrente':
               return "deflag_manchete_concorrente";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_news_noticias_publicar_frm']) || !is_array($this->NM_ajax_info['errList']['geral_news_noticias_publicar_frm']))
              {
                  $this->NM_ajax_info['errList']['geral_news_noticias_publicar_frm'] = array();
              }
              $this->NM_ajax_info['errList']['geral_news_noticias_publicar_frm'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'categoria_id' == $filtro)
        $this->ValidateField_categoria_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'noticia_data_noticia' == $filtro)
        $this->ValidateField_noticia_data_noticia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'noticia_hora_noticia' == $filtro)
        $this->ValidateField_noticia_hora_noticia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'noticia_flag_man_editorial' == $filtro)
        $this->ValidateField_noticia_flag_man_editorial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'noticia_titulo' == $filtro)
        $this->ValidateField_noticia_titulo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'noticia_corpo' == $filtro)
        $this->ValidateField_noticia_corpo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'noticia_img' == $filtro)
        $this->ValidateField_noticia_img($Campos_Crit, $Campos_Falta, $Campos_Erros);
      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
//-- converter datas   
          $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_categoria_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->categoria_id == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['php_cmp_required']['categoria_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['php_cmp_required']['categoria_id'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_news_noticias_fild_categoria_id'] . "" ; 
          if (!isset($Campos_Erros['categoria_id']))
          {
              $Campos_Erros['categoria_id'] = array();
          }
          $Campos_Erros['categoria_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['categoria_id']) || !is_array($this->NM_ajax_info['errList']['categoria_id']))
          {
              $this->NM_ajax_info['errList']['categoria_id'] = array();
          }
          $this->NM_ajax_info['errList']['categoria_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->categoria_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id']) && !in_array($this->categoria_id, $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['categoria_id']))
              {
                  $Campos_Erros['categoria_id'] = array();
              }
              $Campos_Erros['categoria_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['categoria_id']) || !is_array($this->NM_ajax_info['errList']['categoria_id']))
              {
                  $this->NM_ajax_info['errList']['categoria_id'] = array();
              }
              $this->NM_ajax_info['errList']['categoria_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
   }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'categoria_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_categoria_id

    function ValidateField_noticia_data_noticia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->noticia_data_noticia, $this->field_config['noticia_data_noticia']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao == "incluir")
      { 
          $guarda_datahora = $this->field_config['noticia_data_noticia']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['noticia_data_noticia']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['noticia_data_noticia']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['noticia_data_noticia']['date_sep']) ; 
          if (trim($this->noticia_data_noticia) != "")  
          { 
              if ($teste_validade->Data($this->noticia_data_noticia, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_data_noticia'] . "; " ; 
                  if (!isset($Campos_Erros['noticia_data_noticia']))
                  {
                      $Campos_Erros['noticia_data_noticia'] = array();
                  }
                  $Campos_Erros['noticia_data_noticia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['noticia_data_noticia']) || !is_array($this->NM_ajax_info['errList']['noticia_data_noticia']))
                  {
                      $this->NM_ajax_info['errList']['noticia_data_noticia'] = array();
                  }
                  $this->NM_ajax_info['errList']['noticia_data_noticia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['php_cmp_required']['noticia_data_noticia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['php_cmp_required']['noticia_data_noticia'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_data_noticia'] . "" ; 
              if (!isset($Campos_Erros['noticia_data_noticia']))
              {
                  $Campos_Erros['noticia_data_noticia'] = array();
              }
              $Campos_Erros['noticia_data_noticia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['noticia_data_noticia']) || !is_array($this->NM_ajax_info['errList']['noticia_data_noticia']))
                  {
                      $this->NM_ajax_info['errList']['noticia_data_noticia'] = array();
                  }
                  $this->NM_ajax_info['errList']['noticia_data_noticia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['noticia_data_noticia']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'noticia_data_noticia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_noticia_data_noticia

    function ValidateField_noticia_hora_noticia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->noticia_hora_noticia, $this->field_config['noticia_hora_noticia']['time_sep']) ; 
      if ($this->nmgp_opcao == "incluir")
      {
          $Format_Hora = $this->field_config['noticia_hora_noticia']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['noticia_hora_noticia']['time_sep']) ; 
          if (trim($this->noticia_hora_noticia) != "")  
          { 
              if ($teste_validade->Hora($this->noticia_hora_noticia, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_hora_noticia'] . "; " ; 
                  if (!isset($Campos_Erros['noticia_hora_noticia']))
                  {
                      $Campos_Erros['noticia_hora_noticia'] = array();
                  }
                  $Campos_Erros['noticia_hora_noticia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['noticia_hora_noticia']) || !is_array($this->NM_ajax_info['errList']['noticia_hora_noticia']))
                  {
                      $this->NM_ajax_info['errList']['noticia_hora_noticia'] = array();
                  }
                  $this->NM_ajax_info['errList']['noticia_hora_noticia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['php_cmp_required']['noticia_hora_noticia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['php_cmp_required']['noticia_hora_noticia'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_hora_noticia'] . "" ; 
              if (!isset($Campos_Erros['noticia_hora_noticia']))
              {
                  $Campos_Erros['noticia_hora_noticia'] = array();
              }
              $Campos_Erros['noticia_hora_noticia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['noticia_hora_noticia']) || !is_array($this->NM_ajax_info['errList']['noticia_hora_noticia']))
                  {
                      $this->NM_ajax_info['errList']['noticia_hora_noticia'] = array();
                  }
                  $this->NM_ajax_info['errList']['noticia_hora_noticia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'noticia_hora_noticia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_noticia_hora_noticia

    function ValidateField_noticia_flag_man_editorial(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->noticia_flag_man_editorial == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->noticia_flag_man_editorial != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_noticia_flag_man_editorial']) && !in_array($this->noticia_flag_man_editorial, $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_noticia_flag_man_editorial']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['noticia_flag_man_editorial']))
              {
                  $Campos_Erros['noticia_flag_man_editorial'] = array();
              }
              $Campos_Erros['noticia_flag_man_editorial'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['noticia_flag_man_editorial']) || !is_array($this->NM_ajax_info['errList']['noticia_flag_man_editorial']))
              {
                  $this->NM_ajax_info['errList']['noticia_flag_man_editorial'] = array();
              }
              $this->NM_ajax_info['errList']['noticia_flag_man_editorial'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'noticia_flag_man_editorial';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_noticia_flag_man_editorial

    function ValidateField_noticia_titulo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['php_cmp_required']['noticia_titulo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['php_cmp_required']['noticia_titulo'] == "on")) 
      { 
          if ($this->noticia_titulo == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_titulo'] . "" ; 
              if (!isset($Campos_Erros['noticia_titulo']))
              {
                  $Campos_Erros['noticia_titulo'] = array();
              }
              $Campos_Erros['noticia_titulo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['noticia_titulo']) || !is_array($this->NM_ajax_info['errList']['noticia_titulo']))
                  {
                      $this->NM_ajax_info['errList']['noticia_titulo'] = array();
                  }
                  $this->NM_ajax_info['errList']['noticia_titulo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->noticia_titulo) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_titulo'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['noticia_titulo']))
              {
                  $Campos_Erros['noticia_titulo'] = array();
              }
              $Campos_Erros['noticia_titulo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['noticia_titulo']) || !is_array($this->NM_ajax_info['errList']['noticia_titulo']))
              {
                  $this->NM_ajax_info['errList']['noticia_titulo'] = array();
              }
              $this->NM_ajax_info['errList']['noticia_titulo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'noticia_titulo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_noticia_titulo

    function ValidateField_noticia_corpo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($this->noticia_corpo))
      {
          $this->noticia_corpo = NM_conv_charset($this->noticia_corpo, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $this->noticia_corpo = str_replace("<p>" . chr(160) . "</p>", "<p></p>", $this->noticia_corpo);
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->noticia_corpo) != "")  
          { 
          } 
          elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['php_cmp_required']['noticia_corpo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['php_cmp_required']['noticia_corpo'] == "on") 
          { 
              $hasError = true;
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_corpo'] . "" ; 
              if (!isset($Campos_Erros['noticia_corpo']))
              {
                  $Campos_Erros['noticia_corpo'] = array();
              }
              $Campos_Erros['noticia_corpo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['noticia_corpo']) || !is_array($this->NM_ajax_info['errList']['noticia_corpo']))
                  {
                      $this->NM_ajax_info['errList']['noticia_corpo'] = array();
                  }
                  $this->NM_ajax_info['errList']['noticia_corpo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'noticia_corpo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_noticia_corpo

    function ValidateField_noticia_img(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->noticia_img;
            if ("" != $this->noticia_img && "S" != $this->noticia_img_limpa && !$teste_validade->ArqExtensao($this->noticia_img, array()))
            {
                $hasError = true;
                $Campos_Crit .= "{lang_news_noticias_fild_noticia_img}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['noticia_img']))
                {
                    $Campos_Erros['noticia_img'] = array();
                }
                $Campos_Erros['noticia_img'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['noticia_img']) || !is_array($this->NM_ajax_info['errList']['noticia_img']))
                {
                    $this->NM_ajax_info['errList']['noticia_img'] = array();
                }
                $this->NM_ajax_info['errList']['noticia_img'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'noticia_img';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_noticia_img
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros) 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->noticia_img == "none") 
          { 
              $this->noticia_img = ""; 
          } 
          if ($this->noticia_img != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'news_noticias_publicar_frm_doc_name.php';
              }
              $this->noticia_img = sc_upload_unprotect_chars($this->noticia_img);
              $this->noticia_img_scfile_name = sc_upload_unprotect_chars($this->noticia_img_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->noticia_img_scfile_type = substr($this->noticia_img_scfile_type, 0, strpos($this->noticia_img_scfile_type, ";")) ; 
              } 
              if ($this->noticia_img_scfile_type == "image/pjpeg" || $this->noticia_img_scfile_type == "image/jpeg" || $this->noticia_img_scfile_type == "image/gif" ||  
                  $this->noticia_img_scfile_type == "image/png" || $this->noticia_img_scfile_type == "image/x-png" || $this->noticia_img_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->noticia_img))  
                  { 
                      $this->NM_size_docs[$this->noticia_img_scfile_name] = $this->sc_file_size($this->noticia_img);
                      $reg_noticia_img = file_get_contents($this->noticia_img); 
                      $this->noticia_img = $reg_noticia_img; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_img'] . " " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->noticia_img = "";
                      if (!isset($Campos_Erros['noticia_img']))
                      {
                          $Campos_Erros['noticia_img'] = array();
                      }
                      $Campos_Erros['noticia_img'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['noticia_img']) || !is_array($this->NM_ajax_info['errList']['noticia_img']))
                      {
                          $this->NM_ajax_info['errList']['noticia_img'] = array();
                      }
                      $this->NM_ajax_info['errList']['noticia_img'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->noticia_img = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_news_noticias_fild_noticia_img'] . " " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['noticia_img']))
                      {
                          $Campos_Erros['noticia_img'] = array();
                      }
                      $Campos_Erros['noticia_img'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['noticia_img']) || !is_array($this->NM_ajax_info['errList']['noticia_img']))
                      {
                          $this->NM_ajax_info['errList']['noticia_img'] = array();
                      }
                      $this->NM_ajax_info['errList']['noticia_img'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dados_form']['noticia_img']) && $this->noticia_img_limpa != "S")
          {
              $this->noticia_img = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dados_form']['noticia_img'];
          }
      } 
   }

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['categoria_id'] = $this->categoria_id;
    $this->nmgp_dados_form['noticia_data_noticia'] = (strlen(trim($this->noticia_data_noticia)) > 19) ? str_replace(".", ":", $this->noticia_data_noticia) : trim($this->noticia_data_noticia);
    $this->nmgp_dados_form['noticia_hora_noticia'] = (strlen(trim($this->noticia_hora_noticia)) > 19) ? str_replace(".", ":", $this->noticia_hora_noticia) : trim($this->noticia_hora_noticia);
    $this->nmgp_dados_form['noticia_flag_man_editorial'] = $this->noticia_flag_man_editorial;
    $this->nmgp_dados_form['noticia_titulo'] = $this->noticia_titulo;
    $this->nmgp_dados_form['noticia_corpo'] = $this->noticia_corpo;
    if (empty($this->noticia_img))
    {
        $this->noticia_img = $this->nmgp_dados_form['noticia_img'];
    }
    $this->nmgp_dados_form['noticia_img'] = $this->noticia_img;
    $this->nmgp_dados_form['noticia_img_limpa'] = $this->noticia_img_limpa;
    $this->nmgp_dados_form['noticia_id'] = $this->noticia_id;
    $this->nmgp_dados_form['reporter_id'] = $this->reporter_id;
    $this->nmgp_dados_form['noticia_data_pub'] = $this->noticia_data_pub;
    $this->nmgp_dados_form['noticia_hora_pub'] = $this->noticia_hora_pub;
    $this->nmgp_dados_form['deflag_manchete_concorrente'] = $this->deflag_manchete_concorrente;
    $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['noticia_data_noticia'] = $this->noticia_data_noticia;
      nm_limpa_data($this->noticia_data_noticia, $this->field_config['noticia_data_noticia']['date_sep']) ; 
      $this->Before_unformat['noticia_hora_noticia'] = $this->noticia_hora_noticia;
      nm_limpa_hora($this->noticia_hora_noticia, $this->field_config['noticia_hora_noticia']['time_sep']) ; 
      $this->Before_unformat['noticia_id'] = $this->noticia_id;
      nm_limpa_numero($this->noticia_id, $this->field_config['noticia_id']['symbol_grp']) ; 
      $this->Before_unformat['reporter_id'] = $this->reporter_id;
      nm_limpa_numero($this->reporter_id, $this->field_config['reporter_id']['symbol_grp']) ; 
      $this->Before_unformat['noticia_data_pub'] = $this->noticia_data_pub;
      nm_limpa_data($this->noticia_data_pub, $this->field_config['noticia_data_pub']['date_sep']) ; 
      $this->Before_unformat['noticia_hora_pub'] = $this->noticia_hora_pub;
      nm_limpa_hora($this->noticia_hora_pub, $this->field_config['noticia_hora_pub']['time_sep']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "noticia_id")
      {
          nm_limpa_numero($this->noticia_id, $this->field_config['noticia_id']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "reporter_id")
      {
          nm_limpa_numero($this->reporter_id, $this->field_config['reporter_id']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ((!empty($this->noticia_data_noticia) && 'null' != $this->noticia_data_noticia) || (!empty($format_fields) && isset($format_fields['noticia_data_noticia'])))
      {
          nm_volta_data($this->noticia_data_noticia, $this->field_config['noticia_data_noticia']['date_format']) ; 
          nmgp_Form_Datas($this->noticia_data_noticia, $this->field_config['noticia_data_noticia']['date_format'], $this->field_config['noticia_data_noticia']['date_sep']) ;  
      }
      elseif ('null' == $this->noticia_data_noticia || '' == $this->noticia_data_noticia)
      {
          $this->noticia_data_noticia = '';
      }
      if ((!empty($this->noticia_hora_noticia) && 'null' != $this->noticia_hora_noticia) || (!empty($format_fields) && isset($format_fields['noticia_hora_noticia'])))
      {
          nm_volta_hora($this->noticia_hora_noticia, $this->field_config['noticia_hora_noticia']['date_format']) ; 
          nmgp_Form_Hora($this->noticia_hora_noticia, $this->field_config['noticia_hora_noticia']['date_format'], $this->field_config['noticia_hora_noticia']['time_sep']) ;  
      }
      elseif ('null' == $this->noticia_hora_noticia || '' == $this->noticia_hora_noticia)
      {
          $this->noticia_hora_noticia = '';
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['noticia_data_noticia']['date_format'];
      if ($this->noticia_data_noticia != "")  
      { 
          nm_conv_data($this->noticia_data_noticia, $this->field_config['noticia_data_noticia']['date_format']) ; 
          $this->noticia_data_noticia_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->noticia_data_noticia_hora = substr($this->noticia_data_noticia_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->noticia_data_noticia_hora = substr($this->noticia_data_noticia_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->noticia_data_noticia_hora = substr($this->noticia_data_noticia_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->noticia_data_noticia_hora = substr($this->noticia_data_noticia_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->noticia_data_noticia_hora = substr($this->noticia_data_noticia_hora, 0, -4);
          }
          $this->noticia_data_noticia .= " " . $this->noticia_data_noticia_hora ; 
      } 
      if ($this->noticia_data_noticia == "" && $use_null)  
      { 
          $this->noticia_data_noticia = "null" ; 
      } 
      $this->field_config['noticia_data_noticia']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['noticia_hora_noticia']['date_format'];
      if ($this->noticia_hora_noticia != "")  
      { 
          $this->noticia_hora_noticia_hora = $this->noticia_hora_noticia;
          $this->noticia_hora_noticia = "1900-01-01";
          nm_conv_hora($this->noticia_hora_noticia_hora, $this->field_config['noticia_hora_noticia']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->noticia_hora_noticia_hora = substr($this->noticia_hora_noticia_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->noticia_hora_noticia_hora = substr($this->noticia_hora_noticia_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->noticia_hora_noticia_hora = substr($this->noticia_hora_noticia_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->noticia_hora_noticia_hora = substr($this->noticia_hora_noticia_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->noticia_hora_noticia_hora = substr($this->noticia_hora_noticia_hora, 0, -4);
          }
          $this->noticia_hora_noticia = $this->noticia_hora_noticia_hora;
      } 
      if ($this->noticia_hora_noticia == "" && $use_null)  
      { 
          $this->noticia_hora_noticia = "null" ; 
      } 
      $this->field_config['noticia_hora_noticia']['date_format'] = $guarda_format_hora;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_categoria_id();
          $this->ajax_return_values_noticia_data_noticia();
          $this->ajax_return_values_noticia_hora_noticia();
          $this->ajax_return_values_noticia_flag_man_editorial();
          $this->ajax_return_values_noticia_titulo();
          $this->ajax_return_values_noticia_corpo();
          $this->ajax_return_values_noticia_img();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['noticia_id']['keyVal'] = news_noticias_publicar_frm_pack_protect_string($this->nmgp_dados_form['noticia_id']);
          }
   } // ajax_return_values

          //----- categoria_id
   function ajax_return_values_categoria_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("categoria_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->categoria_id);
              $aLookup = array();
              $this->_tmp_lookup_categoria_id = $this->categoria_id;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id'] = array(); 
}
$aLookup[] = array(news_noticias_publicar_frm_pack_protect_string('') => str_replace('<', '&lt;',news_noticias_publicar_frm_pack_protect_string('  - - - - - - - - - - - - - - - - - - - - - - - ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_noticia_data_noticia = $this->noticia_data_noticia;
   $old_value_noticia_hora_noticia = $this->noticia_hora_noticia;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_noticia_data_noticia = $this->noticia_data_noticia;
   $unformatted_value_noticia_hora_noticia = $this->noticia_hora_noticia;

   $nm_comando = "SELECT news_categorias.categoria_id,              news_categorias.categoria_nome FROM              news_categorias,              news_usuarios_categorias WHERE news_categorias.categoria_id = news_usuarios_categorias.categoria_id AND news_usuarios_categorias.usuario_login = '" . $_SESSION['glo_login'] . "' order by categoria_nome";

   $this->noticia_data_noticia = $old_value_noticia_data_noticia;
   $this->noticia_hora_noticia = $old_value_noticia_hora_noticia;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(news_noticias_publicar_frm_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', news_noticias_publicar_frm_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"categoria_id\"";
          if (isset($this->NM_ajax_info['select_html']['categoria_id']) && !empty($this->NM_ajax_info['select_html']['categoria_id']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['categoria_id'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->categoria_id == $sValue)
                  {
                      $this->_tmp_lookup_categoria_id = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("categoria_id", $this->nmgp_refresh_fields)) ? 'select' : 'text';
          $this->NM_ajax_info['fldList']['categoria_id'] = array(
                       'row'    => '',
               'type'    => $Nm_tp_obj,
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['categoria_id']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['categoria_id']['valList'][$i] = news_noticias_publicar_frm_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['categoria_id']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['categoria_id']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['categoria_id']['labList'] = $aLabel;
          }
   }

          //----- noticia_data_noticia
   function ajax_return_values_noticia_data_noticia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("noticia_data_noticia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->noticia_data_noticia);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['noticia_data_noticia'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("noticia_data_noticia", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- noticia_hora_noticia
   function ajax_return_values_noticia_hora_noticia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("noticia_hora_noticia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->noticia_hora_noticia);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['noticia_hora_noticia'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("noticia_hora_noticia", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- noticia_flag_man_editorial
   function ajax_return_values_noticia_flag_man_editorial($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("noticia_flag_man_editorial", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->noticia_flag_man_editorial);
              $aLookup = array();
              $this->_tmp_lookup_noticia_flag_man_editorial = $this->noticia_flag_man_editorial;

$aLookup[] = array(news_noticias_publicar_frm_pack_protect_string('N') => str_replace('<', '&lt;',news_noticias_publicar_frm_pack_protect_string("No")));
$aLookup[] = array(news_noticias_publicar_frm_pack_protect_string('S') => str_replace('<', '&lt;',news_noticias_publicar_frm_pack_protect_string("Yes")));
$_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_noticia_flag_man_editorial'][] = 'N';
$_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_noticia_flag_man_editorial'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['noticia_flag_man_editorial']) && !empty($this->NM_ajax_info['select_html']['noticia_flag_man_editorial']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['noticia_flag_man_editorial'];
          }
          $this->NM_ajax_info['fldList']['noticia_flag_man_editorial'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['noticia_flag_man_editorial']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['noticia_flag_man_editorial']['valList'][$i] = news_noticias_publicar_frm_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['noticia_flag_man_editorial']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['noticia_flag_man_editorial']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['noticia_flag_man_editorial']['labList'] = $aLabel;
          }
   }

          //----- noticia_titulo
   function ajax_return_values_noticia_titulo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("noticia_titulo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->noticia_titulo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['noticia_titulo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- noticia_corpo
   function ajax_return_values_noticia_corpo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("noticia_corpo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->noticia_corpo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['noticia_corpo'] = array(
                       'row'    => '',
               'type'    => 'editor_html',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- noticia_img
   function ajax_return_values_noticia_img($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("noticia_img", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->noticia_img);
              $aLookup = array();
   $out_noticia_img = '';
   $out1_noticia_img = '';
   if ($this->noticia_img != "" && $this->noticia_img != "none")   
   { 
       $out_noticia_img = $this->Ini->path_imag_temp . "/sc_noticia_img_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_noticia_img = $out_noticia_img; 
       $arq_noticia_img = fopen($this->Ini->root . $out_noticia_img, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->noticia_img, 0, 12));
           if (substr($this->noticia_img, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->noticia_img = nm_conv_img_access($this->noticia_img);
           } 
       } 
       if (substr($this->noticia_img, 0, 4) == "*nm*") 
       { 
           $this->noticia_img = substr($this->noticia_img, 4) ; 
           $this->noticia_img = base64_decode($this->noticia_img) ; 
       } 
       $img_pos_bm = strpos($this->noticia_img, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->noticia_img = substr($this->noticia_img, $img_pos_bm) ; 
       } 
       fwrite($arq_noticia_img, $this->noticia_img) ;  
       fclose($arq_noticia_img) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_noticia_img, true);
       $this->nmgp_return_img['noticia_img'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['noticia_img'][1] = $sc_obj_img->getWidth();
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['noticia_img'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
               'imgFile' => $out_noticia_img,
               'imgOrig' => $out1_noticia_img,
               'keepImg' => $sKeepImage,
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['total']))
          {
               $sc_where_pos = " WHERE ((noticia_id < $this->noticia_id))";
               if ('' != $sc_where)
               {
                   if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
                   {
                       $sc_where = substr(trim($sc_where), 6);
                   }
                   if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
                   {
                       $sc_where = substr(trim($sc_where), 4);
                   }
                   $sc_where_pos .= ' AND (' . $sc_where . ')';
                   $sc_where = ' WHERE ' . $sc_where;
               }
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->noticia_id)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opcao'] = '';

   }

   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }


   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['news_noticias_publicar_frm']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_categoria_id = $this->categoria_id;
    $original_noticia_flag_man_editorial = $this->noticia_flag_man_editorial;
}
  $this->M_deflag_manchete_concorrente();
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_categoria_id != $this->categoria_id || (isset($bFlagRead_categoria_id) && $bFlagRead_categoria_id)))
    {
        $this->ajax_return_values_categoria_id(true);
    }
    if (($original_noticia_flag_man_editorial != $this->noticia_flag_man_editorial || (isset($bFlagRead_noticia_flag_man_editorial) && $bFlagRead_noticia_flag_man_editorial)))
    {
        $this->ajax_return_values_noticia_flag_man_editorial(true);
    }
}
$_SESSION['scriptcase']['news_noticias_publicar_frm']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['categoria_id'] = $this->categoria_id;
      $NM_val_form['noticia_data_noticia'] = $this->noticia_data_noticia;
      $NM_val_form['noticia_hora_noticia'] = $this->noticia_hora_noticia;
      $NM_val_form['noticia_flag_man_editorial'] = $this->noticia_flag_man_editorial;
      $NM_val_form['noticia_titulo'] = $this->noticia_titulo;
      $NM_val_form['noticia_corpo'] = $this->noticia_corpo;
      $NM_val_form['noticia_img'] = $this->noticia_img;
      $NM_val_form['noticia_id'] = $this->noticia_id;
      $NM_val_form['reporter_id'] = $this->reporter_id;
      $NM_val_form['noticia_data_pub'] = $this->noticia_data_pub;
      $NM_val_form['noticia_hora_pub'] = $this->noticia_hora_pub;
      $NM_val_form['deflag_manchete_concorrente'] = $this->deflag_manchete_concorrente;
      if ($this->noticia_id === "" || is_null($this->noticia_id))  
      { 
          $this->noticia_id = 0;
      } 
      if ($this->categoria_id === "" || is_null($this->categoria_id))  
      { 
          $this->categoria_id = 0;
          $this->sc_force_zero[] = 'categoria_id';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->reporter_id_before_qstr = $this->reporter_id;
          $this->reporter_id = substr($this->Db->qstr($this->reporter_id), 1, -1); 
          if ($this->reporter_id == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->reporter_id = "null"; 
              $NM_val_null[] = "reporter_id";
          } 
          if ($this->noticia_data_noticia == "")  
          { 
              $this->noticia_data_noticia = "null"; 
              $NM_val_null[] = "noticia_data_noticia";
          } 
          if ($this->noticia_hora_noticia == "")  
          { 
              $this->noticia_hora_noticia = "null"; 
              $NM_val_null[] = "noticia_hora_noticia";
          } 
          if ($this->noticia_data_pub == "")  
          { 
              $this->noticia_data_pub = "null"; 
              $NM_val_null[] = "noticia_data_pub";
          } 
          if ($this->noticia_hora_pub == "")  
          { 
              $this->noticia_hora_pub = "null"; 
              $NM_val_null[] = "noticia_hora_pub";
          } 
          $this->noticia_titulo_before_qstr = $this->noticia_titulo;
          $this->noticia_titulo = substr($this->Db->qstr($this->noticia_titulo), 1, -1); 
          if ($this->noticia_titulo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->noticia_titulo = "null"; 
              $NM_val_null[] = "noticia_titulo";
          } 
          $this->noticia_corpo_before_qstr = $this->noticia_corpo;
          $this->noticia_corpo = substr($this->Db->qstr($this->noticia_corpo), 1, -1); 
          if ($this->noticia_corpo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->noticia_corpo = "null"; 
              $NM_val_null[] = "noticia_corpo";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $nm_tmp = nm_conv_img_access(substr($this->noticia_img, 0, 12));
              if (substr($this->noticia_img, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
              { 
                  $this->noticia_img = nm_conv_img_access($this->noticia_img);
              } 
              if (!empty($this->noticia_img) && $this->noticia_img != 'null' && substr($this->noticia_img, 0, 4) != "*nm*") 
              { 
                  $this->noticia_img = "*nm*" . base64_encode($this->noticia_img) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              if ($this->Ini->nm_tpbanco != "pdo_sqlsrv" && !empty($this->noticia_img) && $this->noticia_img != 'null' && substr($this->noticia_img, 0, 4) != "*nm*") 
              { 
                  $this->noticia_img = "*nm*" . base64_encode($this->noticia_img) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              if ($this->Ini->nm_tpbanco != 'pdo_ibm' && !empty($this->noticia_img) && $this->noticia_img != 'null' && substr($this->noticia_img, 0, 4) != "*nm*") 
              { 
                  $this->noticia_img = "*nm*" . base64_encode($this->noticia_img) ; 
              } 
          } 
          else
          { 
              $this->noticia_img =  substr($this->Db->qstr($this->noticia_img), 1, -1);
          } 
          if ($this->noticia_img == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->noticia_img = "null"; 
              $NM_val_null[] = "noticia_img";
          } 
          $this->noticia_flag_man_editorial_before_qstr = $this->noticia_flag_man_editorial;
          $this->noticia_flag_man_editorial = substr($this->Db->qstr($this->noticia_flag_man_editorial), 1, -1); 
          if ($this->noticia_flag_man_editorial == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->noticia_flag_man_editorial = "null"; 
              $NM_val_null[] = "noticia_flag_man_editorial";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 news_noticias_publicar_frm_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $this->noticia_data_pub =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->noticia_data_pub_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $NM_val_form['noticia_data_pub'] = $this->noticia_data_pub;
              $this->NM_ajax_changed['noticia_data_pub'] = true;
              $this->noticia_hora_pub =  date('H') . ":" . date('i')  . ":" . date('s');
              $NM_val_form['noticia_hora_pub'] = $this->noticia_hora_pub;
              $this->NM_ajax_changed['noticia_hora_pub'] = true;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "noticia_titulo = '$this->noticia_titulo', noticia_corpo = '$this->noticia_corpo', noticia_flag_man_editorial = '$this->noticia_flag_man_editorial'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "noticia_titulo = '$this->noticia_titulo', noticia_corpo = '$this->noticia_corpo', noticia_flag_man_editorial = '$this->noticia_flag_man_editorial'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "noticia_titulo = '$this->noticia_titulo', noticia_corpo = '$this->noticia_corpo', noticia_flag_man_editorial = '$this->noticia_flag_man_editorial'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "noticia_titulo = '$this->noticia_titulo', noticia_corpo = '$this->noticia_corpo', noticia_flag_man_editorial = '$this->noticia_flag_man_editorial'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "noticia_titulo = '$this->noticia_titulo', noticia_corpo = '$this->noticia_corpo', noticia_flag_man_editorial = '$this->noticia_flag_man_editorial'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "noticia_titulo = '$this->noticia_titulo', noticia_corpo = '$this->noticia_corpo', noticia_flag_man_editorial = '$this->noticia_flag_man_editorial'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "noticia_titulo = '$this->noticia_titulo', noticia_corpo = '$this->noticia_corpo', noticia_flag_man_editorial = '$this->noticia_flag_man_editorial'"; 
              } 
              if (isset($NM_val_form['categoria_id']) && $NM_val_form['categoria_id'] != $this->nmgp_dados_select['categoria_id']) 
              { 
                  $SC_fields_update[] = "categoria_id = $this->categoria_id"; 
              } 
              if (isset($NM_val_form['reporter_id']) && $NM_val_form['reporter_id'] != $this->nmgp_dados_select['reporter_id']) 
              { 
                  $SC_fields_update[] = "reporter_id = '$this->reporter_id'"; 
              } 
              if (isset($NM_val_form['noticia_data_noticia']) && $NM_val_form['noticia_data_noticia'] != $this->nmgp_dados_select['noticia_data_noticia']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "noticia_data_noticia = #$this->noticia_data_noticia#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "noticia_data_noticia = EXTEND('" . $this->noticia_data_noticia . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "noticia_data_noticia = " . $this->Ini->date_delim . $this->noticia_data_noticia . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['noticia_hora_noticia']) && $NM_val_form['noticia_hora_noticia'] != $this->nmgp_dados_select['noticia_hora_noticia']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "noticia_hora_noticia = #$this->noticia_hora_noticia#"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "noticia_hora_noticia = " . $this->Ini->date_delim . $this->noticia_hora_noticia . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['noticia_data_pub']) && $NM_val_form['noticia_data_pub'] != $this->nmgp_dados_select['noticia_data_pub']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "noticia_data_pub = #$this->noticia_data_pub#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "noticia_data_pub = EXTEND('" . $this->noticia_data_pub . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "noticia_data_pub = " . $this->Ini->date_delim . $this->noticia_data_pub . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['noticia_hora_pub']) && $NM_val_form['noticia_hora_pub'] != $this->nmgp_dados_select['noticia_hora_pub']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "noticia_hora_pub = #$this->noticia_hora_pub#"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "noticia_hora_pub = " . $this->Ini->date_delim . $this->noticia_hora_pub . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              $aDoNotUpdate = array();
              $temp_cmd_sql = "";
              if ($this->noticia_img_limpa == "S")
              {
                  if ($this->noticia_img != "null")
                  {
                      $this->noticia_img = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                  }
                  else
                  {
                      $temp_cmd_sql = "noticia_img = '" . $this->noticia_img . "'";
                  }
                  $this->noticia_img = "";
              }
              else
              {
                  if ($this->noticia_img != "none" && $this->noticia_img != "")
                  {
                      $NM_conteudo =  $this->noticia_img;
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                      {
                      }
                      else
                      {
                          $temp_cmd_sql .= " noticia_img = '$NM_conteudo'";
                      }
                  }
                  else
                  {
                      $aDoNotUpdate[] = "noticia_img";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              if ($this->noticia_img_limpa == "S" || ($this->noticia_img != "none" && $this->noticia_img != "" && in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
                  { 
                      $SC_fields_update[] = "noticia_img = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                  { 
                      $SC_fields_update[] = "noticia_img = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
                  { 
                      $SC_fields_update[] = "noticia_img = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $SC_fields_update[] = "noticia_img = null"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite)) 
                  { 
                      $SC_fields_update[] = "noticia_img = ''"; 
                  } 
                  else 
                  { 
                      $SC_fields_update[] = "noticia_img = empty_blob()"; 
                  } 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE noticia_id = $this->noticia_id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE noticia_id = $this->noticia_id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE noticia_id = $this->noticia_id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE noticia_id = $this->noticia_id ";  
              }  
              else  
              {
                  $comando .= " WHERE noticia_id = $this->noticia_id ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  news_noticias_publicar_frm_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              $this->reporter_id = $this->reporter_id_before_qstr;
              $this->noticia_titulo = $this->noticia_titulo_before_qstr;
              $this->noticia_corpo = $this->noticia_corpo_before_qstr;
              $this->noticia_flag_man_editorial = $this->noticia_flag_man_editorial_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if ($this->noticia_img_limpa == "S" && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"noticia_img\", \"\",  \"noticia_id = $this->noticia_id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "noticia_img", "",  "noticia_id = $this->noticia_id"); 
                  } 
                  else 
                  { 
                      if ($this->noticia_img != "none" && $this->noticia_img != "") 
                      { 
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"noticia_img\", $this->noticia_img,  \"noticia_id = $this->noticia_id\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "noticia_img", $this->noticia_img,  "noticia_id = $this->noticia_id"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          news_noticias_publicar_frm_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->noticia_img_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['noticia_img_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
                  $this->NM_ajax_info['fldList']['noticia_img_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }


              if     (isset($NM_val_form) && isset($NM_val_form['categoria_id'])) { $this->categoria_id = $NM_val_form['categoria_id']; }
              elseif (isset($this->categoria_id)) { $this->nm_limpa_alfa($this->categoria_id); }
              if     (isset($NM_val_form) && isset($NM_val_form['noticia_titulo'])) { $this->noticia_titulo = $NM_val_form['noticia_titulo']; }
              elseif (isset($this->noticia_titulo)) { $this->nm_limpa_alfa($this->noticia_titulo); }
              if     (isset($NM_val_form) && isset($NM_val_form['noticia_corpo'])) { $this->noticia_corpo = $NM_val_form['noticia_corpo']; }
              elseif (isset($this->noticia_corpo)) { $this->nm_limpa_alfa($this->noticia_corpo); }
              if     (isset($NM_val_form) && isset($NM_val_form['noticia_flag_man_editorial'])) { $this->noticia_flag_man_editorial = $NM_val_form['noticia_flag_man_editorial']; }
              elseif (isset($this->noticia_flag_man_editorial)) { $this->nm_limpa_alfa($this->noticia_flag_man_editorial); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('categoria_id', 'noticia_data_noticia', 'noticia_hora_noticia', 'noticia_flag_man_editorial', 'noticia_titulo', 'noticia_corpo'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(noticia_id) from " . $this->Ini->nm_tabela; 
          $comando = "select max(noticia_id) from " . $this->Ini->nm_tabela; 
          $rs = $this->Db->Execute($comando); 
          if ($rs === false && !$rs->EOF)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
              $this->NM_rollback_db(); 
              if ($this->NM_ajax_flag)
              {
                  news_noticias_publicar_frm_pack_ajax_response();
              }
              exit; 
          }  
          $this->noticia_id = $rs->fields[0] + 1;
          $rs->Close(); 
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_pkey']); 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      news_noticias_publicar_frm_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->noticia_img_scfile_name, $dir_file, "noticia_img");
              if (trim($this->noticia_img_scfile_name) != $_test_file)
              {
                  $this->noticia_img_scfile_name = $_test_file;
                  $this->noticia_img = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES ($this->noticia_id, $this->categoria_id, '$this->reporter_id', #$this->noticia_data_noticia#, #$this->noticia_hora_noticia#, #$this->noticia_data_pub#, #$this->noticia_hora_pub#, '$this->noticia_titulo', '$this->noticia_corpo', '$this->noticia_img', '$this->noticia_flag_man_editorial')"; 
              }
              elseif ($this->Ini->nm_tpbanco == "pdo_sqlsrv")
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES ($this->noticia_id, $this->categoria_id, '$this->reporter_id', " . $this->Ini->date_delim . $this->noticia_data_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_data_pub . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_pub . $this->Ini->date_delim1 . ", '$this->noticia_titulo', '$this->noticia_corpo', '', '$this->noticia_flag_man_editorial')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES ($this->noticia_id, $this->categoria_id, '$this->reporter_id', " . $this->Ini->date_delim . $this->noticia_data_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_data_pub . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_pub . $this->Ini->date_delim1 . ", '$this->noticia_titulo', '$this->noticia_corpo', '$this->noticia_img', '$this->noticia_flag_man_editorial')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES ($this->noticia_id, $this->categoria_id, '$this->reporter_id', " . $this->Ini->date_delim . $this->noticia_data_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_data_pub . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_pub . $this->Ini->date_delim1 . ", '$this->noticia_titulo', '$this->noticia_corpo', '$this->noticia_img', '$this->noticia_flag_man_editorial')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (" . $NM_seq_auto . "$this->noticia_id, $this->categoria_id, '$this->reporter_id', " . $this->Ini->date_delim . $this->noticia_data_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_data_pub . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_pub . $this->Ini->date_delim1 . ", '$this->noticia_titulo', '$this->noticia_corpo', EMPTY_BLOB(), '$this->noticia_flag_man_editorial')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (" . $NM_seq_auto . "$this->noticia_id, $this->categoria_id, '$this->reporter_id', EXTEND('$this->noticia_data_noticia', YEAR TO FRACTION), " . $this->Ini->date_delim . $this->noticia_hora_noticia . $this->Ini->date_delim1 . ", EXTEND('$this->noticia_data_pub', YEAR TO FRACTION), " . $this->Ini->date_delim . $this->noticia_hora_pub . $this->Ini->date_delim1 . ", '$this->noticia_titulo', '$this->noticia_corpo', null, '$this->noticia_flag_man_editorial')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (" . $NM_seq_auto . "$this->noticia_id, $this->categoria_id, '$this->reporter_id', " . $this->Ini->date_delim . $this->noticia_data_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_data_pub . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_pub . $this->Ini->date_delim1 . ", '$this->noticia_titulo', '$this->noticia_corpo', '', '$this->noticia_flag_man_editorial')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (" . $NM_seq_auto . "$this->noticia_id, $this->categoria_id, '$this->reporter_id', " . $this->Ini->date_delim . $this->noticia_data_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_data_pub . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_pub . $this->Ini->date_delim1 . ", '$this->noticia_titulo', '$this->noticia_corpo', '', '$this->noticia_flag_man_editorial')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (" . $NM_seq_auto . "$this->noticia_id, $this->categoria_id, '$this->reporter_id', " . $this->Ini->date_delim . $this->noticia_data_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_data_pub . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_pub . $this->Ini->date_delim1 . ", '$this->noticia_titulo', '$this->noticia_corpo', '', '$this->noticia_flag_man_editorial')"; 
              }
              elseif ($this->Ini->nm_tpbanco =='pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (" . $NM_seq_auto . "$this->noticia_id, $this->categoria_id, '$this->reporter_id', " . $this->Ini->date_delim . $this->noticia_data_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_data_pub . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_pub . $this->Ini->date_delim1 . ", '$this->noticia_titulo', '$this->noticia_corpo', EMPTY_BLOB(), '$this->noticia_flag_man_editorial')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (" . $NM_seq_auto . "$this->noticia_id, $this->categoria_id, '$this->reporter_id', " . $this->Ini->date_delim . $this->noticia_data_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_noticia . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_data_pub . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->noticia_hora_pub . $this->Ini->date_delim1 . ", '$this->noticia_titulo', '$this->noticia_corpo', '$this->noticia_img', '$this->noticia_flag_man_editorial')"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              news_noticias_publicar_frm_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              $this->reporter_id = $this->reporter_id_before_qstr;
              $this->noticia_titulo = $this->noticia_titulo_before_qstr;
              $this->noticia_corpo = $this->noticia_corpo_before_qstr;
              $this->noticia_flag_man_editorial = $this->noticia_flag_man_editorial_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->noticia_img ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  noticia_img , $this->noticia_img,  \"noticia_id = $this->noticia_id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "noticia_img", $this->noticia_img,  "noticia_id = $this->noticia_id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              news_noticias_publicar_frm_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->reporter_id = $this->reporter_id_before_qstr;
              $this->noticia_titulo = $this->noticia_titulo_before_qstr;
              $this->noticia_corpo = $this->noticia_corpo_before_qstr;
              $this->noticia_flag_man_editorial = $this->noticia_flag_man_editorial_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->noticia_id = substr($this->Db->qstr($this->noticia_id), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where noticia_id = $this->noticia_id "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          news_noticias_publicar_frm_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['parms'] = "noticia_id?#?$this->noticia_id?@?"; 
      }
      $this->nmgp_dados_form['noticia_img'] = ""; 
      $this->noticia_img_limpa = ""; 
      $this->noticia_img_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->noticia_id = null === $this->noticia_id ? null : substr($this->Db->qstr($this->noticia_id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT noticia_id, categoria_id, reporter_id, str_replace (convert(char(10),noticia_data_noticia,102), '.', '-') + ' ' + convert(char(8),noticia_data_noticia,20), str_replace (convert(char(10),noticia_hora_noticia,102), '.', '-') + ' ' + convert(char(8),noticia_hora_noticia,20), str_replace (convert(char(10),noticia_data_pub,102), '.', '-') + ' ' + convert(char(8),noticia_data_pub,20), str_replace (convert(char(10),noticia_hora_pub,102), '.', '-') + ' ' + convert(char(8),noticia_hora_pub,20), noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT noticia_id, categoria_id, reporter_id, convert(char(23),noticia_data_noticia,121), convert(char(23),noticia_hora_noticia,121), convert(char(23),noticia_data_pub,121), convert(char(23),noticia_hora_pub,121), noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT noticia_id, categoria_id, reporter_id, EXTEND(noticia_data_noticia, YEAR TO FRACTION), noticia_hora_noticia, EXTEND(noticia_data_pub, YEAR TO FRACTION), noticia_hora_pub, noticia_titulo, noticia_corpo, LOTOFILE(noticia_img, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_noticia_img', 'client'), noticia_flag_man_editorial from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "noticia_id = $this->noticia_id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "noticia_id = $this->noticia_id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "noticia_id = $this->noticia_id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "noticia_id = $this->noticia_id"; 
              }  
              else  
              {
                  $aWhere[] = "noticia_id = $this->noticia_id"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "noticia_id";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['select'] = ""; 
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes['update'] = "off";
              $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes['delete'] = "off";
              return; 
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->noticia_id = $rs->fields[0] ; 
              $this->nmgp_dados_select['noticia_id'] = $this->noticia_id;
              $this->categoria_id = $rs->fields[1] ; 
              $this->nmgp_dados_select['categoria_id'] = $this->categoria_id;
              $this->reporter_id = $rs->fields[2] ; 
              $this->nmgp_dados_select['reporter_id'] = $this->reporter_id;
              $this->noticia_data_noticia = $rs->fields[3] ; 
              if (substr($this->noticia_data_noticia, 10, 1) == "-") 
              { 
                 $this->noticia_data_noticia = substr($this->noticia_data_noticia, 0, 10) . " " . substr($this->noticia_data_noticia, 11);
              } 
              if (substr($this->noticia_data_noticia, 13, 1) == ".") 
              { 
                 $this->noticia_data_noticia = substr($this->noticia_data_noticia, 0, 13) . ":" . substr($this->noticia_data_noticia, 14, 2) . ":" . substr($this->noticia_data_noticia, 17);
              } 
              $this->nmgp_dados_select['noticia_data_noticia'] = $this->noticia_data_noticia;
              $this->noticia_hora_noticia = $rs->fields[4] ; 
              $this->nmgp_dados_select['noticia_hora_noticia'] = $this->noticia_hora_noticia;
              $this->noticia_data_pub = $rs->fields[5] ; 
              if (substr($this->noticia_data_pub, 10, 1) == "-") 
              { 
                 $this->noticia_data_pub = substr($this->noticia_data_pub, 0, 10) . " " . substr($this->noticia_data_pub, 11);
              } 
              if (substr($this->noticia_data_pub, 13, 1) == ".") 
              { 
                 $this->noticia_data_pub = substr($this->noticia_data_pub, 0, 13) . ":" . substr($this->noticia_data_pub, 14, 2) . ":" . substr($this->noticia_data_pub, 17);
              } 
              $this->nmgp_dados_select['noticia_data_pub'] = $this->noticia_data_pub;
              $this->noticia_hora_pub = $rs->fields[6] ; 
              $this->nmgp_dados_select['noticia_hora_pub'] = $this->noticia_hora_pub;
              $this->noticia_titulo = $rs->fields[7] ; 
              $this->nmgp_dados_select['noticia_titulo'] = $this->noticia_titulo;
              $this->noticia_corpo = $rs->fields[8] ; 
              $this->nmgp_dados_select['noticia_corpo'] = $this->noticia_corpo;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->noticia_img = $this->Db->BlobDecode($rs->fields[9]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->noticia_img = $this->Db->BlobDecode($rs->fields[9]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[9]) && !empty($rs->fields[9]) && is_file($rs->fields[9])) 
                  { 
                     $this->noticia_img = file_get_contents($rs->fields[9]);
                  }else 
                  { 
                     $this->noticia_img = ''; 
                  } 
              } 
              else
              { 
                  $this->noticia_img = $rs->fields[9] ; 
              } 
              $this->nmgp_dados_select['noticia_img'] = $this->noticia_img;
              $this->noticia_flag_man_editorial = $rs->fields[10] ; 
              $this->nmgp_dados_select['noticia_flag_man_editorial'] = $this->noticia_flag_man_editorial;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->noticia_id = (string)$this->noticia_id; 
              $this->categoria_id = (string)$this->categoria_id; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['parms'] = "noticia_id?#?$this->noticia_id?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['sub_dir'][0]  = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->controle_navegacao();
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->noticia_id = "";  
              $this->nmgp_dados_form["noticia_id"] = $this->noticia_id;
              $this->categoria_id = "";  
              $this->nmgp_dados_form["categoria_id"] = $this->categoria_id;
              $this->reporter_id = "";  
              $this->nmgp_dados_form["reporter_id"] = $this->reporter_id;
              $this->noticia_data_noticia = "";  
              $this->noticia_data_noticia_hora = "" ;  
              $this->nmgp_dados_form["noticia_data_noticia"] = $this->noticia_data_noticia;
              $this->noticia_hora_noticia = "";  
              $this->noticia_hora_noticia_hora = "" ;  
              $this->nmgp_dados_form["noticia_hora_noticia"] = $this->noticia_hora_noticia;
              $this->noticia_data_pub =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["noticia_data_pub"] = $this->noticia_data_pub;
              $this->noticia_hora_pub =  date('H') . ":" . date('i')  . ":" . date('s');
              $this->nmgp_dados_form["noticia_hora_pub"] = $this->noticia_hora_pub;
              $this->noticia_titulo = "";  
              $this->nmgp_dados_form["noticia_titulo"] = $this->noticia_titulo;
              $this->noticia_corpo = "";  
              $this->nmgp_dados_form["noticia_corpo"] = $this->noticia_corpo;
              $this->noticia_img = "";  
              $this->noticia_img_ul_name = "" ;  
              $this->noticia_img_ul_type = "" ;  
              $this->nmgp_dados_form["noticia_img"] = $this->noticia_img;
              $this->noticia_flag_man_editorial = "";  
              $this->nmgp_dados_form["noticia_flag_man_editorial"] = $this->noticia_flag_man_editorial;
              $this->deflag_manchete_concorrente = "";  
              $this->nmgp_dados_form["deflag_manchete_concorrente"] = $this->deflag_manchete_concorrente;
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function M_deflag_manchete_concorrente()
{
$_SESSION['scriptcase']['news_noticias_publicar_frm']['contr_erro'] = 'on';
  
$_SESSION['scriptcase']['news_noticias_publicar_frm']['contr_erro']='off';



if($this->sc_evento == "alterar" and strtoupper($this->noticia_flag_man_editorial  == 'S') )
{

     
      $nm_select = "select news_config_noticia_dias_no_ar 
                       from news_config_sistema"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->qt_dias = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->qt_dias[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->qt_dias = false;
          $this->qt_dias_erro = $this->Db->ErrorMsg();
      } 
;

   

   $ndias = $this->qt_dias[0][0];
   $hoje = date('Y-m-d');

   $data_final   = 
         $this->nm_data->CalculaData($hoje, "aaaa-mm-dd", "+", $ndias, 0, 0, "aaaa-mm-dd",  "aaaa-mm-dd"); 
      ;
   $data_inicial = 
         $this->nm_data->CalculaData($hoje, "aaaa-mm-dd", "-", $ndias, 0, 0, "aaaa-mm-dd",  "aaaa-mm-dd"); 
      ;
  
    
      $nm_select = "SELECT noticia_id
                                         FROM news_noticias
                                         WHERE categoria_id = $this->categoria_id  AND
                                         noticia_data_pub BETWEEN  '$data_inicial' AND '$data_final'
                                         AND noticia_flag_man_editorial='S' AND noticia_id <> $this->noticia_id "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->id_noticia_man_choque = array();
     if ($this->categoria_id != "" && $this->noticia_id != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->id_noticia_man_choque[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->id_noticia_man_choque = false;
          $this->id_noticia_man_choque_erro = $this->Db->ErrorMsg();
      } 
     } 
;


   $this->choca = $this->id_noticia_man_choque[0][0];


   if(strlen($this->choca) > 0)
   {
       
     $nm_select ="UPDATE news_noticias                     SET noticia_flag_man_editorial = 'N'                     WHERE noticia_id = $this->choca "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                news_noticias_publicar_frm_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
   }

}
$_SESSION['scriptcase']['news_noticias_publicar_frm']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              news_noticias_publicar_frm_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_noticia_img = "";  
   } 
   else 
   { 
       $out_noticia_img = $this->noticia_img;  
   } 
   if ($this->noticia_img != "" && $this->noticia_img != "none")   
   { 
       $out_noticia_img = $this->Ini->path_imag_temp . "/sc_noticia_img_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $arq_noticia_img = fopen($this->Ini->root . $out_noticia_img, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->noticia_img, 0, 12));
           if (substr($this->noticia_img, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->noticia_img = nm_conv_img_access($this->noticia_img);
           } 
       } 
       if (substr($this->noticia_img, 0, 4) == "*nm*") 
       { 
           $this->noticia_img = substr($this->noticia_img, 4) ; 
           $this->noticia_img = base64_decode($this->noticia_img) ; 
       } 
       $img_pos_bm = strpos($this->noticia_img, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->noticia_img = substr($this->noticia_img, $img_pos_bm) ; 
       } 
       fwrite($arq_noticia_img, $this->noticia_img) ;  
       fclose($arq_noticia_img) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_noticia_img, true);
       $this->nmgp_return_img['noticia_img'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['noticia_img'][1] = $sc_obj_img->getWidth();
       if ($this->Ini->Export_img_zip) {
           $this->Ini->Img_export_zip[] = $this->Ini->root . $out_noticia_img;
           $out_noticia_img = str_replace($this->Ini->path_imag_temp . "/", "", $out_noticia_img);
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_noticia_img;
       if (isset($temp_out_noticia_img))
       {
           $out_noticia_img = $temp_out_noticia_img;
       }
   }
        $this->initFormPages();
        include_once("news_noticias_publicar_frm_form0.php");
        include_once("news_noticias_publicar_frm_form1.php");
        $this->hideFormPages();
 }

        function initFormPages() {
                $this->Ini->nm_page_names = array(
                        'News' => '0',
                        'Picture' => '1',
                );

                $this->Ini->nm_page_blocks = array(
                        'News' => array(
                                0 => 'on',
                                1 => 'on',
                        ),
                        'Picture' => array(
                                2 => 'on',
                        ),
                );

                $this->Ini->nm_block_page = array(
                        0 => 'News',
                        1 => 'News',
                        2 => 'Picture',
                );

                if (!empty($this->Ini->nm_hidden_blocos)) {
                        foreach ($this->Ini->nm_hidden_blocos as $blockNo => $blockStatus) {
                                if ('off' == $blockStatus) {
                                        $this->Ini->nm_page_blocks[ $this->Ini->nm_block_page[$blockNo] ][$blockNo] = 'off';
                                }
                        }
                }

                foreach ($this->Ini->nm_page_blocks as $pageName => $pageBlocks) {
                        $hasDisplayedBlock = false;

                        foreach ($pageBlocks as $blockNo => $blockStatus) {
                                if ('on' == $blockStatus) {
                                        $hasDisplayedBlock = true;
                                }
                        }

                        if (!$hasDisplayedBlock) {
                                $this->Ini->nm_hidden_pages[$pageName] = 'off';
                        }
                }
        } // initFormPages

        function hideFormPages() {
                if (!empty($this->Ini->nm_hidden_pages)) {
?>
<script type="text/javascript">
$(function() {
        scResetPagesDisplay();
<?php
                        foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                                if ('off' == $pageStatus) {
?>
        scHidePage("<?php echo $this->Ini->nm_page_names[$pageName]; ?>");
<?php
                                }
                        }
?>
        scCheckNoPageSelected();
});
</script>
<?php
                }
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $result = preg_replace('/'. $this->nmgp_arg_fast_search .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_categoria_id()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id'] = array(); 
    }

   $old_value_noticia_data_noticia = $this->noticia_data_noticia;
   $old_value_noticia_hora_noticia = $this->noticia_hora_noticia;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_noticia_data_noticia = $this->noticia_data_noticia;
   $unformatted_value_noticia_hora_noticia = $this->noticia_hora_noticia;

   $nm_comando = "SELECT news_categorias.categoria_id,              news_categorias.categoria_nome FROM              news_categorias,              news_usuarios_categorias WHERE news_categorias.categoria_id = news_usuarios_categorias.categoria_id AND news_usuarios_categorias.usuario_login = '" . $_SESSION['glo_login'] . "' order by categoria_nome";

   $this->noticia_data_noticia = $old_value_noticia_data_noticia;
   $this->noticia_hora_noticia = $old_value_noticia_hora_noticia;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['Lookup_categoria_id'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_noticia_flag_man_editorial()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "No?#?N?#??@?";
       $nmgp_def_dados .= "Yes?#?S?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "news_noticias_publicar_frm_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['nm_run_menu'] = 2;
       $nmgp_saida_form = "news_noticias_publicar_frm_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       news_noticias_publicar_frm_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['news_noticias_publicar_frm']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
}
?>
