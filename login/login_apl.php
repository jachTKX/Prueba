<?php
//
class login_apl
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
   var $login;
   var $senha;
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
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['bok']))
          {
              $this->bok = $this->NM_ajax_info['param']['bok'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['login']))
          {
              $this->login = $this->NM_ajax_info['param']['login'];
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
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['senha']))
          {
              $this->senha = $this->NM_ajax_info['param']['senha'];
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
      if (isset($this->glo_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['glo_login'] = $this->glo_login;
      }
      if (isset($this->glo_nome_usuario) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['glo_nome_usuario'] = $this->glo_nome_usuario;
      }
      if (isset($_POST["glo_login"]) && isset($this->glo_login)) 
      {
          $_SESSION['glo_login'] = $this->glo_login;
      }
      if (isset($_POST["glo_nome_usuario"]) && isset($this->glo_nome_usuario)) 
      {
          $_SESSION['glo_nome_usuario'] = $this->glo_nome_usuario;
      }
      if (isset($_GET["glo_login"]) && isset($this->glo_login)) 
      {
          $_SESSION['glo_login'] = $this->glo_login;
      }
      if (isset($_GET["glo_nome_usuario"]) && isset($this->glo_nome_usuario)) 
      {
          $_SESSION['glo_nome_usuario'] = $this->glo_nome_usuario;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['login']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['login']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['login']['embutida_parms']);
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
                 nm_limpa_str_login($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->glo_login)) 
          {
              $_SESSION['glo_login'] = $this->glo_login;
          }
          if (isset($this->glo_nome_usuario)) 
          {
              $_SESSION['glo_nome_usuario'] = $this->glo_nome_usuario;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['login']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['login']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['login']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['login']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->glo_login)) 
          {
              $_SESSION['glo_login'] = $this->glo_login;
          }
          if (isset($this->glo_nome_usuario)) 
          {
              $_SESSION['glo_nome_usuario'] = $this->glo_nome_usuario;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['login']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['login']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['login']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['login']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['login']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['login']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['login']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['login']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['login']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['login']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new login_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $_SESSION['sc_session'][$script_case_init]['login']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['login']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['login']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['login']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['login']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['login'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['login']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['login']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('login') . "/login.php";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['login']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "login")
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



      $_SESSION['scriptcase']['error_icon']['login']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['login'] = "";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['login']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "login.php"; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['login']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['login']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['login']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['login']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['login']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['login']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['login']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['login']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['login']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['login']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['login']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['login']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['login']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['login']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['login']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['login']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['login'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['login'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['login']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['login']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['login']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['login']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['login']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['login']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['login']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['login']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['login']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['login']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['login']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['login']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['login']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['login']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['login']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['login']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['login']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['login']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['login']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("login", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['login']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'login_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'login_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('contr:' == substr($str_link_webhelp, 0, 6))
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
          require_once($this->Ini->path_embutida . 'login/login_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "login_erro.class.php"); 
      }
      $this->Erro      = new login_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['login']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['login']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['login']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['login']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['login']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['login']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['login']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['login']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9)))
      {
      $_SESSION['scriptcase']['login']['contr_erro'] = 'on';
  $idioma = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
switch($idioma){
	case 'pt': 
		$this->Ini->sc_change_language('pt_br');
include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
		break;
	case 'es': 
		$this->Ini->sc_change_language('es');
include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
		break;
	default:
		$this->Ini->sc_change_language('en_us');
include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
		break;
}

if(isset($_GET['lang']) && !empty($_GET['lang']))
{
	switch($_GET['lang']){
		case 'pt': 
			$this->Ini->sc_change_language('pt_br');
include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
			break;
		case 'es': 
			$this->Ini->sc_change_language('es');
include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
			break;
		default:
			$this->Ini->sc_change_language('en_us');
include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
			break;
		}
}

 $this->Ini->Nm_lang['lang_page_copyright']  = sprintf( $this->Ini->Nm_lang['lang_page_copyright'] , date('Y'));
$_SESSION['scriptcase']['login']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['login']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['login']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "login.php"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['login']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


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
          if ('validate_login' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'login');
          }
          if ('validate_senha' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'senha');
          }
          login_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['login']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              login_pack_ajax_response();
              exit;
          }
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          if ($this->nmgp_opcao != "incluir")
          {
              $this->scFormFocusErrorName = '';
          }
          $_SESSION['scriptcase']['login']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  login_pack_ajax_response();
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
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['login']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  login_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
//
      if (!isset($nm_form_submit) && $this->nmgp_opcao != "nada")
      {
          $this->login = "" ;  
          $this->senha = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['login']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['login']['dados_form'] as $NM_campo => $NM_valor)
              {
                  $$NM_campo = $NM_valor;
              }
          }
      }
      else
      {
           if ($this->nmgp_opcao != "nada")
           {
           }
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['login']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['campos']))
              { 
                  $login = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['campos'][0]; 
                  $senha = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['campos'][1]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['login']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['login']['campos'][0] = $this->login; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['login']['campos'][1] = $this->senha; 
          $contr_menu = "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['login']['iframe_menu'])
          {
              $contr_menu = "glo_menu";
          }
          if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("login", $_SESSION['scriptcase']['sc_ult_apl_menu']))
          {
              $this->nmgp_redireciona_form("login_fim.php", $this->nm_location, $contr_menu); 
          }
          else
          {
              $this->nmgp_redireciona_form($this->Ini->link_menu, $this->nm_location, "glo_login*scin" . $this->login . "*scoutglo_nome_usuario*scin" . $this->login . "*scout", "_self", '', '430', '630'); 
          }
          $this->NM_close_db(); 
          if ($this->NM_ajax_flag)
          {
              login_pack_ajax_response();
              exit;
          }
      }
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "login.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['login'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['login'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . "") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
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
<form name="Fdown" method="get" action="login_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="login"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="login.php" target="_self" style="display: none"> 
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
           case 'login':
               return "Login";
               break;
           case 'senha':
               return "Senha";
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
     $this->scFormFocusErrorName = '';
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_login']) || !is_array($this->NM_ajax_info['errList']['geral_login']))
              {
                  $this->NM_ajax_info['errList']['geral_login'] = array();
              }
              $this->NM_ajax_info['errList']['geral_login'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'login' == $filtro)
        $this->ValidateField_login($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "login";

      if ('' == $filtro || 'senha' == $filtro)
        $this->ValidateField_senha($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "senha";


      if (empty($Campos_Crit) && empty($Campos_Falta))
      {
      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['login']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_login = $this->login;
    $original_senha = $this->senha;
}
  $this->M_valida_usu();

if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_login != $this->login || (isset($bFlagRead_login) && $bFlagRead_login)))
    {
        $this->ajax_return_values_login(true);
    }
    if (($original_senha != $this->senha || (isset($bFlagRead_senha) && $bFlagRead_senha)))
    {
        $this->ajax_return_values_senha(true);
    }
}
$_SESSION['scriptcase']['login']['contr_erro'] = 'off'; 
      }
      }
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

      if (empty($Campos_Crit) && empty($Campos_Falta) && empty($this->Campos_Mens_erro))
      {
          if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
          {
              $_SESSION['scriptcase']['login']['contr_erro'] = 'on';
  $this->populateNews();
$_SESSION['scriptcase']['login']['contr_erro'] = 'off'; 
          }
      }
   }

    function ValidateField_login(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->login) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Login " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['login']))
              {
                  $Campos_Erros['login'] = array();
              }
              $Campos_Erros['login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['login']) || !is_array($this->NM_ajax_info['errList']['login']))
              {
                  $this->NM_ajax_info['errList']['login'] = array();
              }
              $this->NM_ajax_info['errList']['login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'login';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_login

    function ValidateField_senha(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->senha) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Senha " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['senha']))
              {
                  $Campos_Erros['senha'] = array();
              }
              $Campos_Erros['senha'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['senha']) || !is_array($this->NM_ajax_info['errList']['senha']))
              {
                  $this->NM_ajax_info['errList']['senha'] = array();
              }
              $this->NM_ajax_info['errList']['senha'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'senha';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_senha

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
    $this->nmgp_dados_form['login'] = $this->login;
    $this->nmgp_dados_form['senha'] = $this->senha;
    $_SESSION['sc_session'][$this->Ini->sc_page]['login']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
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
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
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

   function ajax_return_values()
   {
          $this->ajax_return_values_login();
          $this->ajax_return_values_senha();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- login
   function ajax_return_values_login($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("login", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->login);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['login'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- senha
   function ajax_return_values_senha($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("senha", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->senha);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['senha'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['login']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['login']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['login']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['login']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['login']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['login']['upload_dir'][$fieldName][] = $newName;
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
//
function M_info_usu()
{
$_SESSION['scriptcase']['login']['contr_erro'] = 'on';
  
$nome = "";
$func = "";
$func_nome = "";

 
      $nm_select = "SELECT usuario_nome, usuario_perfil
                    FROM news_usuario
                    WHERE usuario_login = '" . $this->login  . "'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->infousu = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->infousu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->infousu = false;
          $this->infousu_erro = $this->Db->ErrorMsg();
      } 
;

if (FALSE === $this->infousu ) 
{
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "login - info_usu - Erro em lookup" . $this->infousu_erro ;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_login' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "login - info_usu - Erro em lookup" . $this->infousu_erro ;
 }
;
}

if (!empty($this->infousu )) 
{
    $nome = $this->infousu[0][0];
    $func = $this->infousu[0][1];
}

$info_usu   = "User: <b>$nome</b> , Profile: <b>$func</b>";
$_SESSION['scriptcase']['login']['contr_erro'] = 'off';
}
function M_valida_usu()
{
$_SESSION['scriptcase']['login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_glo_nome_usuario)) {$this->sc_temp_glo_nome_usuario = (isset($_SESSION['glo_nome_usuario'])) ? $_SESSION['glo_nome_usuario'] : "";}
if (!isset($this->sc_temp_glo_login)) {$this->sc_temp_glo_login = (isset($_SESSION['glo_login'])) ? $_SESSION['glo_login'] : "";}
  
 unset($_SESSION['glo_login']);
 unset($this->sc_temp_glo_login);
;
 unset($_SESSION['glo_nome_usuario']);
 unset($this->sc_temp_glo_nome_usuario);
;
unset($_SESSION['scriptcase']['sc_apl_seg']);unset($_SESSION['scriptcase']['pass']);if( strlen($this->login ) < 1 || strlen($this->senha ) < 1)
    {
         
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .=  $this->Ini->Nm_lang['lang_login_message_13'] ;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_login' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] =  $this->Ini->Nm_lang['lang_login_message_13'] ;
 }
; 
    }
    
    
     
      $nm_select = "SELECT usuario_login, 
                              usuario_senha, 
                              usuario_nome, 
                              usuario_perfil 
                       FROM 
                              news_usuario 
                       WHERE usuario_login = '" . $this->login  . "'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 
;
    
    if (FALSE === $this->dataset )
    {
            
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .=  $this->Ini->Nm_lang['lang_login_message_13'] ;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_login' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] =  $this->Ini->Nm_lang['lang_login_message_13'] ;
 }
;
            return;
    }
    elseif (empty($this->dataset ))
    {
        
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .=  $this->Ini->Nm_lang['lang_login_message_13'] ;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_login' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] =  $this->Ini->Nm_lang['lang_login_message_13'] ;
 }
;
        return;
    }

    $senha_teste = $this->senha ;

    if ($senha_teste != $this->dataset[0][1])
    {
        
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .=  $this->Ini->Nm_lang['lang_login_message_13'] ;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_login' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] =  $this->Ini->Nm_lang['lang_login_message_13'] ;
 }
;
        return;
    }
    
    $this->glo_login = $this->dataset[0][0];
     if (isset($this->glo_login)) {$this->sc_temp_glo_login = $this->glo_login;}
;
    
    
    $this->glo_nome_usuario = $this->dataset[0][2];
     if (isset($this->glo_nome_usuario)) {$this->sc_temp_glo_nome_usuario = $this->glo_nome_usuario;}
;
    
   
    
    $perfil = $this->dataset[0][3];
  
    switch($perfil)
    {
       case 'editor':  
                      $_SESSION['scriptcase']['sc_apl_seg']['news_categorias_cad_frm'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_categorias_cad_cons'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_usuarios_cad_frm'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_usuarios_cad_cons'] = "on";; 
                      $_SESSION['scriptcase']['sc_apl_seg']['news_config_sis_frm'] = "on";;
                       
                      $_SESSION['scriptcase']['sc_apl_seg']['news_noticias_redigir_frm'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_noticias_caixa_saida_cons'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_noticias_publicar_cons'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_noticias_editar_publicadas'] = "on";; 
                      $_SESSION['scriptcase']['sc_apl_seg']['news_noticias_publicar_frm'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_editorial_cons'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_detalhes_noticia'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_editorial_por_sessao_cons'] = "on";;
                      break;
      case 'reporter': 
                      
                      $_SESSION['scriptcase']['sc_apl_seg']['news_noticias_redigir_frm'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_noticias_caixa_saida_cons'] = "on";;                      
                      $_SESSION['scriptcase']['sc_apl_seg']['news_editorial_cons'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_detalhes_noticia'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_editorial_por_sessao_cons'] = "on";;
                      break;
      case 'user': 
                      
                      $_SESSION['scriptcase']['sc_apl_seg']['news_editorial_cons'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_detalhes_noticia'] = "on";;
                      $_SESSION['scriptcase']['sc_apl_seg']['news_editorial_por_sessao_cons'] = "on";;
                      break;

    }
if (isset($this->sc_temp_glo_login)) { $_SESSION['glo_login'] = $this->sc_temp_glo_login;}
if (isset($this->sc_temp_glo_nome_usuario)) { $_SESSION['glo_nome_usuario'] = $this->sc_temp_glo_nome_usuario;}
$_SESSION['scriptcase']['login']['contr_erro'] = 'off';
}
function populateNews()
{
$_SESSION['scriptcase']['login']['contr_erro'] = 'on';
  
	
 
      $nm_select = "SELECT count(*) FROM news_noticias"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
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
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->rs[0][0]) && $this->rs[0][0] == '0')
{
	$base_date_year  = date("Y");
	$base_date_month = date("m");
	$base_date_day   = date("d");
	$arr_sqls_inserts = array();
	switch($_SESSION['scriptcase']['glo_tpbanco'])
	{
		case 'pdo_mysql':
		case 'mysql':
		case 'mysqlt':
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO `news_noticias` VALUES ('5', '3', 'editor', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '00:00:00', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:36:13', 'The obama agenda', '<p>Obama transition began before Election Day \nEven before Sen. Barack Obama won the presidential election, he was quietly \nbuilding a transition team. On Wednesday, the president-elect met with key \nadvisers and began making decisions about his transition team, including who will \nserve as his White House chief of staff. Reports say Obama is close to naming \nIllinois Rep. Rahm Emanuel to that post, but that has not been confirmed</p>', 0x6F62616D612E6A7067, 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO `news_noticias` VALUES ('6', '1', 'editor', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '00:00:00', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:52:00', 'Swede Stenson leads Champions tournament', '<p>Henrik Stenson \nfires a 7-under 65 in Shanghai on Thursday for a one-stroke first round lead in the \nHSBC Champions tournament ahead of defending champion Phil Mickelson, Sergio \nGarcia, Anthony Kim and Adam Scott. full story</p>', 0x676F6C662E6A7067, 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO `news_noticias` VALUES ('7', '4', 'editor', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '00:00:00', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:50:44', 'Law and Order goes for a record', '<p>The outburst comes from \nAnthony Anderson, who is describing the essential qualities of Kevin Bernard, the \nlatest detective to join NBC-TV\'s long-running Law & Order. The fun-loving and \nfunny Anderson debuted last season as Bernard and resumes busting bad guys on \nWednesday, 10 p.m. ET, with the season opener.</p>', 0x6C61772E6A7067, 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO `news_noticias` VALUES ('8', '3', 'editor', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '00:00:00', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:45:01', 'Ahmadinejad\'s visit to Brazil draws criticism', '<p>Iranian President \nMahmoud Ahmadinejad and Brazilian counterpart Luiz Inacio Lula da Silva signed a \nseries of agreements Monday after the controversial Iranian leader arrived at the \nfirst of three Latin American nations he will visit this week.</p>n<p>Ahmadinejad \nalready visited Gambia on a five-nation trip that also will take him to Bolivia and \nVenezuela in South America and Senegal in Africa</p>n<p>...</p>', 0x6C756C612E6A7067, 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO `news_noticias` VALUES ('10', '3', 'editor', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '14:58:57', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:47:24', 'Obama will change', '<p>Obama sad that in your mandat the United \nStates will break and lost the title of First Economy of the World.</p>', 0x6F62616D61312E6A7067, 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO `news_noticias` VALUES ('11', '3', 'editor', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '16:04:55', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:48:46', ' Obama: \'It is time for us to transition to the Iraqis\'', '<p>President \nObama lauded the U.S. military in Baghdad on Tuesday during an unannounced \nvisit to Iraq, reminding troops that the next 18 months will be difficult as the United \nStates plans to start withdrawing its forces.<br /><br />I was just discussing this \nwith your commander, but I think it\'s something that all of you know. It is time for \nus to transition to the Iraqis, Obama said, according to a transcript from the White \nHouse. They need to take responsibility for their country and for their \nsovereignty.<br /><br />And in order for them to do that, they have got to make \npolitical accommodations. They\'re going to have to decide that they want to \nresolve their differences through constitutional means and legal means. They are \ngoing to have to focus on providing government services that encourage \nconfidence among their citizens.<br /><br />A new CNN/Opinion Research \nCorporation poll found that 79 percent of Americans surveyed feel that Obama has \nhad a more positive effect on how people in other countries view the U.S. Only 19 \npercent of those surveyed thought he\'s had a more negative effect.<br /><br \n/>The poll also indicated that only 35 percent of Americans currently approve of \nthe U.S. war in Iraq; 65 percent disapprove.<br />Almost seven in 10 Americans \nagree with Obama\'s plan to remove most U.S. troops from Iraq by next August, \nwhile leaving a residual force of between 35,000 and 50,000 troops.</p>', 0x6F62616D61332E6A7067, 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO `news_noticias` VALUES ('12', '1', 'reporter', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '16:04:04', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:32:13', 'Tar Heels Tourney Romp Ends With Title', '<p>DETROIT -- The heckling \nalways came in summertime pickup games at the Dean Dome, when players from \nNorth Carolina\'s 2005 national-title team would square off against the ringless \nmembers of the program\'s current roster. The worst offenders were <strong>Sean \nMay</strong>, <strong>Raymond Felton</strong>, and <strong>Melvin \nScott</strong>, who tended to end any dispute -- over things as trivial as foul calls \nanswer, for the entire careers of current stars <strong>Ty Lawson</strong>, \n<strong>Wayne Ellington</strong> and <strong>Tyler Hansbrough</strong>, had \nbeen no. And so in the aftermath of Monday\'s 89-72 national-championship game \nrout of Michigan State, some of the Tar Heels\' thoughts turned to bragging rights. \nAs Lawson said, before breaking into one of his trademark, devilish grins, I mean, \nwhat can they say now?<br /><br />Nothing, really, given the magnitude of the \nrout: The Tar Heels scored 55 first-half points and led by 21 at the break -- both \ntitle-game records -- and essentially put the game away in the first 10 minutes. It \nwas an epic beatdown that brought Carolina its fifth championship and sucked the \nlife out of a record crowd of 72,922 in Detroit, an economically struggling city that \nhad rallied around Michigan State\'s fairy-tale ride to the final. Ellington was named \nMOP after scoring 19 points, but it was Lawson who was masterful, getting to the \nfree-throw line for 18 attempts (and converting 15 of them) to finish with 21 points, \nsix assists and an amazing eight steals.<br /><br />On Sunday, he had reminisced \nabout acting out approximately 20 different NCAA-championship buzzer-beater \nscenarios on his Fisher Price hoop as a child: Sometimes I needed a three to win \nit, sometimes I was on the free-throw line, sometimes I was making a last-second \ndrive when we were down one, Lawson said, and we won every single time. But \nwhen a writer tried to goad Lawson into saying that he was dreaming of making an \nactual, last-second shot on Monday, he said, I hope it won\'t be that close. I like \nblowouts better.<br /><br />A blowout is exactly what Lawson got -- one much \nlike the 35-point massacre that occurred the first time the two teams met, on Dec. \n3, in the same building. He and Ellington had talked to each other about not starting \nslow, the way they did against Kansas in last year\'s Final Four, when they came \nout shell-shocked and fell behind 40-12. Instead, they were the ones giving \nMichigan State what coach <strong>Tom Izzo</strong> described as that deer-in-\nthe-headlights look, as the Spartans trailed 21-7, then 32-11, then 46-22 and 55-\n34 at half. Izzo\'s floor leader, senior guard <strong>Travis Walton</strong>, \nadmitted that it was a blur the first five minutes, when they jumped out on us so \nfast.<br /><br />When the Tar Heels finally subbed out their starters, en masse, \nwith 1:03 left in the game, they led 89-70, and Lawson still hadn\'t broken much of \na sweat. Close games are nerve-wracking, Lawson said. When you have a \nblowout, everyone has fun. Even my boy Marc -- he nodded toward walk-on \n<strong>Marc Campbell</strong>, who had replaced him -- got in and got some \ntime on a national stage.<br /><br />As confetti streamed down from the Ford \nField ceiling in the aftermath, the player who appeared to be having the most fun \nwas the one who had, up to that point, been the most robotic and businesslike. \nHansbrough, who arrived in <strong>Roy Williams</strong>\' first recruiting class \nfollowing that \'05 national title, beamed as he bear-hugged his coach on the court, \nand later jumped into the arms of Carolina strength coach <strong>Jonas \nSahratian</strong>, the man responsible for giving Hansbrough the nickname \nPsycho T during his freshman year. This, Sahratian said, was the biggest day of \nTyler\'s life, I think. It\'s what he\'d been working for.<br /><br />Despite winning \nthe Wooden and Naismith Awards as a junior, Hansbrough\'s legacy was ultimately \ngoing to be defined by whether or not he added a banner to the Dean Dome \nrafters. Sitting in the locker room with one of the nets around his neck, and 18 \npoints and seven rebounds in the box score, Hansbrough felt he had put an \nappropriate coda on his college career, and declared, Whoever said [I\'m] not \nvalidated, I\'m validated right now.<br /><br />This win over Michigan State also \nvalidated the entire North Carolina team, which, like it or not, would have been \nregarded as an underachiever had it not won the national title. The Heels began the \nseason as the AP Poll\'s unanimous No. 1, and were also heavy title favorites in Las \nVegas -- but then they started 0-2 in the ACC, with losses to Boston College and \nWake Forest, and, as Williams said, everybody jumped off the ship. Their defense \nappeared to be lacking with senior specialist <strong>Marcus Ginyard</strong> \nout of the lineup, and Lawson in particular was being shown up by guards such as \n<strong>Tyrese Rice</strong> and <strong>Jeff Teague</strong>. But Williams \ngathered them together in the locker room after that second loss in Winston-Salem, \nand, in front of everyone, asked a question to assistant coach <strong>Steve \nRobinson</strong>, who had also been on Williams\' staff at Kansas: Coach, do \nyou remember 1991, what we started out the season?<br /><br />We started \nout 0-2, Robinson said.<br />Do you remember where we finished that \nseason?<br />We played Duke for the national championship.<br /><br />And \nso Williams told his team that, if they did what the coaching staff asked, then \nthey\'d have a chance and be there at the end.<br /><br />The Tar Heels were \nmore than just <em>there</em> in this NCAA tournament. They blitzed their way \nthrough the bracket, beating Radford by 43 in the first round, LSU by 14 in the \nsecond, Gonzaga by 21 in the Sweet 16, Oklahoma by 12 in the Elite Eight, \nVillanova by 14 in the Final Four and Michigan State by 17 in the final. Carolina only \ntrailed its opponents for 10 minutes during the entire dance. They stepped up their \ndefense, especially on the perimeter, when it became necessary, and put on an \nexhibition in the title game, forcing the Spartans in to 21 turnovers and just 40 \npercent shooting. Carolina lost just four games all season, but, as senior guard \n<strong>Bobby Frasor</strong> said, If we had played D like this all year, it \ncould have been special.<br /><br />There was a sense, coming into Monday \nnight\'s title game, that the Tar Heels might be running up against something \nspecial -- a pre-ordained, fairy-tale story for the state of Michigan. Legendary \nSpartans point guard <strong>Earvin </strong>Magic<strong> \nJohnson</strong> had called them a team of destiny on Saturday, and it seemed \nthat Michigan State could be the right team (having knocked off two-straight No. 1 \nseeds), playing at the right time (the 30th anniversary of Magic\'s title) in the right \ncity (Detroit, which desperately needed an emotional diversion from its failing auto \nindustry). When the Spartans ran out of their locker room, point guard \n<strong>Kalin Lucas</strong> -- one of two Motor City products -- yelled, Let\'s \nwin this for the city!<br /><br />A raucous crowd -- clad in approximately 65 \npercent green and white -- was waiting for them in the stands, and those same fans \nlustily booed Carolina when it took the floor. Late Saturday night, after they beat \nVillanova to clinch a trip to the title game against the home-state team, Williams \nhad told his players to prepare for the atmosphere at Ford Field as if it were more \nfamiliar, hostile territory: Coach said, \'It\'s like going into Cameron again,\' said \nFrasor, referring to Duke\'s home court, where he and Hansbrough are 4-0. And \nfor us to make them quiet from the get-go, that was huge.<br /><br />As the \nSpartans faded quickly, so did the power of their fan advantage. It took them until \nthe 7:33 mark of the second half to reach the 55 points Carolina had scored in the \nfirst half, and the building was so quiet with 3:25 left in the game, and Carolina up \n15, that a Michigan State dance team member could be heard saying, C\'mon, \nState! We still believe in you! Not many others in the stands seemed to share that \nfeeling. Seconds later, Lawson sunk two free throws to extend UNC\'s lead to \n17.<br /><br />Carolina came into the game exuding the confidence of a club \nthat, as even Johnson admitted in a pregame press conference with 1979 NCAA \nfinal foe <strong>Larry Bird</strong>, was the best team in basketball, when you \nlook at it talent-wise. Izzo said on Sunday that the only way the Spartans could \nwin was to have a game plan that altered Carolina\'s identity, because, If we play \ngood and they play good, we\'re losing. The Heels were unfazed by Izzo scheming \nthat took them out of their transition game; they managed to win despite scoring \njust four fast-break points -- the same amount that Michigan State did. They \ntaunted Sparty, Michigan State\'s mascot, in the tunnel beforehand -- \n<strong>Danny Green</strong> yelled in his face a few times, and someone said \nfrom a distance, Sparty\'s just a b----! When the Heels charged out of their locker \nroom for the final time before the game began, they created an intimidating \namount of noise in the tunnel, by clapping in rhythm, barking, and chanting Here \n... We ... Go!<br /><br />From there the Heels went, unfazed by the crowd, and \nsteamrolled Michigan State to win what was expected of them in the preseason: the \nnational title. After they\'d watched <em>One Shining Moment</em> together on \nthe floor, with Williams, who had the other net around his neck, standing amongst \nthem, they raced back to the locker room to perform a final ceremony. As is \nWilliams\' tradition during the dance, there was an empty box drawn on their \nwhiteboard prior to the game, waiting to be filled in. What goes inside the box is the \nnumber of teams left in the NCAA tournament. They\'ll typically gather \'round \nWilliams to calculate the figure, but this time the math was easy. All that needed to \nbe written was a giant number one.</p>', 0x6368616D70696F6E732E6A7067, 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO `news_noticias` VALUES ('13', '2', 'reporter', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '16:04:17', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:33:22', 'Fatal shooting at German courthouse', '<p>Two people were killed and \ntwo were severely wounded Tuesday in a shooting at a courthouse in Landshut, \nGermany, police said.<br /><br />The gunman, a 60-year-old man, was among \nthe dead, Bavarian Police said in a statement.<br /><br />It happened around \n10:15 a.m. (4:15 a.m. ET) during a break in a court proceeding about inheritance, \nLandshut police spokesman Leonard Mayer told CNN.<br /><br />The man began \nshooting once he stepped outside the courtroom, police said.<br /><br />He \nwounded three people before turning the gun on himself, Mayer said. One of the \nvictims, a woman, died about 2 1/2 hours later, Bavarian Police said.<br /><br \n/>The lives of the two wounded victims are not in danger, he told CNN.<br /><br \n/>The courthouse has no metal detectors or security checks that would have \nturned up the shooter\'s weapon, Mayer said.<br /><br />This latest shooting in \nGermany took place less than a month after a school massacre in the southwestern \ntown of Winnenden, in which a total of 16 people were killed.</p>', 0x706F6C6963652E6A7067, 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO `news_noticias` VALUES ('14', '4', 'reporter', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '14:30:49', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:45:03', 'The greatest car chases in movie history', '<p>LONDON, England ? What is it about the car chase? This action staple isrnalmost as old as cinema itself, and the incredible success of ?Fastrn& Furious? the latest high-octane joyride to hit cinema screensrnshows the almost supernatural allure the prospect of a quality chasernexerts on a certain kind of movie-goer.</p>\n<p>rn</p>\n<p>Although they date back to silent film series like the ?KeystonernCops? in 1912, most agree the modern car chase was born with ?Bullitt?rnin 1968, which features Steve McQueen as the titular hard-nosed coprndetailed to protect a star witness.</p>\n<p>rn</p>\n<p>In this endlessly imitated sequence, Bullitt screeches up and downrnthe hilly streets of San Francisco at the wheel of a Ford Mustang GT,rnhitting speeds of up to 185km/hour (115 miles/hour). An expertrnautomobile and motorcycle racer in real life, the sequence is all thernmore impressive when you find out McQueen did almost all his own stuntrndriving.</p>\n<p>rn</p>\n<p>William Friedkin upped the realism in ?The French Connection?rn(1971), which stars a fresh-faced Gene Hackman as New York City policerndetective Jimmy ?Popeye? Doyle who wrestles an increasinglyrnbattered-looking 1971 Pontiac LeMans around the road underneath anrnelevated train he is chasing in Brooklyn.</p>\n<p>rn</p>\n<p>Many of the scenes in this chase are real, including the car crash,rnwhich was unplanned and caused when a local man drove onto the set notrnrealizing what was happening. The producers later paid for repairs.</p>\n<p>rn</p>\n<p>Other honorable mentions include: ?Cannonball Run? (1981) for thernspectacular cars including a Ferrari 308 GTS and Aston Martin DB5, ?ThernItalian Job? (1969) for an incredibly hip car chase featuring red,rnwhite and blue Minis that personify swinging 60s London, StevenrnSpielberg?s 1971 TV movie ?Duel,? which is really just one extendedrnchase scene.</p>\n<p>rn</p>\n<p>Car chases have gotten progressively more complicated since the 70s,rnwith computer graphics (CGI) allowing filmmakers to conjure up scenesrnthat would have been unthinkable using only stuntmen ? just think ofrnthe impossibly violent crashes in the main chase scene in last year?srn?The Dark Knight.?</p>\n<p>rn</p>\n<p>Some critics say all this CGI tomfoolery makes chase scenes lookrnfake; that they don?t require the same amount of skill from stuntmen.rnThe dodgy CGI chase scene in Luc Besson?s otherwise brilliant ?ThernFifth Element? (1997) could be held up as an example of this ? althoughrnquite how they would have made taxis really hover 12 stories up isrnanother question entirely.</p>\n<p>rn</p>\n<p>One of the most famous proponents of this view is Quentin Tarantino,rnwho put his money where his mouth is with ?Death Proof? (2007) whichrnfeatures a long, climactic chase scene featuring stripped down 1969rnDodge Charger and a heavily modified 1970 Dodge Challenger completernwith a girl clinging precariously to the hood ? and absolutely no CGI.</p>\n<p>rn</p>\n<p>Other contemporary chase scenes that deserve an honorable mentionrninclude the BMW vs. Peugeot car chase through the streets of Paris and,rnnerve-wrackingly, the wrong way up an autoroute in espionage caperrn?Ronin? (1998) and Paul Greengrass? ?Bourne? trilogy.</p>', 0x6361722E6A7067, 'S')
EOT;

		break;
		case 'pdosqlite':
		case 'sqlite':
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "news_noticias" ("noticia_id", "categoria_id", "reporter_id", "noticia_data_noticia", "noticia_hora_noticia", "noticia_data_pub", "noticia_hora_pub", "noticia_titulo", "noticia_corpo", "noticia_img", "noticia_flag_man_editorial") VALUES (5,	3,	'editor',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'00:00:00',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'11:36:13',	'The obama agenda',	'<p>Obama transition began before Election Day 
Even before Sen. Barack Obama won the presidential election, he was quietly 
building a transition team. On Wednesday, the president-elect met with key 
advisers and began making decisions about his transition team, including who will 
serve as his White House chief of staff. Reports say Obama is close to naming 
Illinois Rep. Rahm Emanuel to that post, but that has not been confirmed</p>',	'obama.jpg',	'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "news_noticias" ("noticia_id", "categoria_id", "reporter_id", "noticia_data_noticia", "noticia_hora_noticia", "noticia_data_pub", "noticia_hora_pub", "noticia_titulo", "noticia_corpo", "noticia_img", "noticia_flag_man_editorial") VALUES (6,	1,	'editor',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'00:00:00',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'11:52:00',	'Swede Stenson leads Champions tou ament',	'<p>Henrik Stenson 
fires a 7-under 65 in Shanghai on Thursday for a one-stroke first round lead in the 
HSBC Champions tou ament ahead of defending champion Phil Mickelson, Sergio 
Garcia, Anthony Kim and Adam Scott. full story</p>',	'golf.jpg',	'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "news_noticias" ("noticia_id", "categoria_id", "reporter_id", "noticia_data_noticia", "noticia_hora_noticia", "noticia_data_pub", "noticia_hora_pub", "noticia_titulo", "noticia_corpo", "noticia_img", "noticia_flag_man_editorial") VALUES (7,	4,	'editor',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'00:00:00',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'11:50:44',	'Law and Order goes for a record',	'<p>The outburst comes from 
Anthony Anderson, who is describing the essential qualities of Kevin Be ard, the 
latest detective to join NBC-TV''s long-running "Law & Order." The fun-loving and 
funny Anderson debuted last season as Be ard and resumes busting bad guys on 
Wednesday, 10 p.m. ET, with the season opener.</p>',	'law.jpg',	'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "news_noticias" ("noticia_id", "categoria_id", "reporter_id", "noticia_data_noticia", "noticia_hora_noticia", "noticia_data_pub", "noticia_hora_pub", "noticia_titulo", "noticia_corpo", "noticia_img", "noticia_flag_man_editorial") VALUES (8,	3,	'editor',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'00:00:00',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'11:45:01',	'Ahmadinejad''s visit to Brazil draws criticism',	'<p>Iranian President 
Mahmoud Ahmadinejad and Brazilian counterpart Luiz Inacio Lula da Silva signed a 
series of agreements Monday after the controversial Iranian leader arrived at the 
first of three Latin American nations he will visit this week.</p>n<p>Ahmadinejad 
already visited Gambia on a five-nation trip that also will take him to Bolivia and 
Venezuela in South America and Senegal in Africa</p>n<p>...</p>',	'lula.jpg',	'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "news_noticias" ("noticia_id", "categoria_id", "reporter_id", "noticia_data_noticia", "noticia_hora_noticia", "noticia_data_pub", "noticia_hora_pub", "noticia_titulo", "noticia_corpo", "noticia_img", "noticia_flag_man_editorial") VALUES (10,	3,	'editor',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'14:58:57',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'11:47:24',	'Obama will change',	'<p>Obama sad that in your mandat the United 
States will break and lost the title of First Economy of the World.</p>',	'obama1.jpg',	'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "news_noticias" ("noticia_id", "categoria_id", "reporter_id", "noticia_data_noticia", "noticia_hora_noticia", "noticia_data_pub", "noticia_hora_pub", "noticia_titulo", "noticia_corpo", "noticia_img", "noticia_flag_man_editorial") VALUES (11,	3,	'editor',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'16:04:55',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'11:48:46',	' Obama: ''It is time for us to transition to the Iraqis''',	'<p>President 
Obama lauded the U.S. military in Baghdad on Tuesday during an unannounced 
visit to Iraq, reminding troops that the next 18 months will be difficult as the United 
States plans to start withdrawing its forces.<br /><br />"I was just discussing this 
with your commander, but I think it''s something that all of you know. It is time for 
us to transition to the Iraqis," Obama said, according to a transcript from the White 
House. "They need to take responsibility for their country and for their 
sovereignty.<br /><br />"And in order for them to do that, they have got to make 
political accommodations. They''re going to have to decide that they want to 
resolve their differences through constitutional means and legal means. They are 
going to have to focus on providing gove ment services that encourage 
confidence among their citizens."<br /><br />A new CNN/Opinion Research 
Corporation poll found that 79 percent of Americans surveyed feel that Obama has 
had a "more positive" effect on how people in other countries view the U.S. Only 19 
percent of those surveyed thought he''s had a "more negative" effect.<br /><br 
/>The poll also indicated that only 35 percent of Americans currently approve of 
the U.S. war in Iraq; 65 percent disapprove.<br />Almost seven in 10 Americans 
agree with Obama''s plan to remove most U.S. troops from Iraq by next August, 
while leaving a residual force of between 35,000 and 50,000 troops.</p>',	'obama3.jpg',	'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "news_noticias" ("noticia_id", "categoria_id", "reporter_id", "noticia_data_noticia", "noticia_hora_noticia", "noticia_data_pub", "noticia_hora_pub", "noticia_titulo", "noticia_corpo", "noticia_img", "noticia_flag_man_editorial") VALUES (12,	1,	'reporter',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'16:04:04',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'11:32:13',	'Tar Heels Tou ey Romp Ends With Title',	'<p>DETROIT -- The heckling 
always came in summertime pickup games at the Dean Dome, when players from 
North Carolina''s 2005 national-title team would square off against the ringless 
members of the program''s current roster. The worst offenders were <strong>Sean 
May</strong>, <strong>Raymond Felton</strong>, and <strong>Melvin 
Scott</strong>, who tended to end any dispute -- over things as trivial as foul calls 
answer, for the entire careers of current stars <strong>Ty Lawson</strong>, 
<strong>Wayne Ellington</strong> and <strong>Tyler Hansbrough</strong>, had 
been no. And so in the aftermath of Monday''s 89-72 national-championship game 
rout of Michigan State, some of the Tar Heels'' thoughts tu ed to bragging rights. 
As Lawson said, before breaking into one of his trademark, devilish grins, "I mean, 
what can they say now?"<br /><br />Nothing, really, given the magnitude of the 
rout: The Tar Heels scored 55 first-half points and led by 21 at the break -- both 
title-game records -- and essentially put the game away in the first 10 minutes. It 
was an epic beatdown that brought Carolina its fifth championship and sucked the 
life out of a record crowd of 72,922 in Detroit, an economically struggling city that 
had rallied around Michigan State''s fairy-tale ride to the final. Ellington was named 
MOP after scoring 19 points, but it was Lawson who was masterful, getting to the 
free-throw line for 18 attempts (and converting 15 of them) to finish with 21 points, 
six assists and an amazing eight steals.<br /><br />On Sunday, he had reminisced 
about acting out approximately 20 different NCAA-championship buzzer-beater 
scenarios on his Fisher Price hoop as a child: "Sometimes I needed a three to win 
it, sometimes I was on the free-throw line, sometimes I was making a last-second 
drive when we were down one," Lawson said, "and we won every single time." But 
when a writer tried to goad Lawson into saying that he was dreaming of making an 
actual, last-second shot on Monday, he said, "I hope it won''t be that close. I like 
blowouts better."<br /><br />A blowout is exactly what Lawson got -- one much 
like the 35-point massacre that occurred the first time the two teams met, on Dec. 
3, in the same building. He and Ellington had talked to each other about not starting 
slow, the way they did against Kansas in last year''s Final Four, when they came 
out shell-shocked and fell behind 40-12. Instead, they were the ones giving 
Michigan State what coach <strong>Tom Izzo</strong> described as that "deer-in-
the-headlights look," as the Spartans trailed 21-7, then 32-11, then 46-22 and 55-
34 at half. Izzo''s floor leader, senior guard <strong>Travis Walton</strong>, 
admitted that "it was a blur the first five minutes, when they jumped out on us so 
fast."<br /><br />When the Tar Heels finally subbed out their starters, en masse, 
with 1:03 left in the game, they led 89-70, and Lawson still hadn''t broken much of 
a sweat. "Close games are nerve-wracking," Lawson said. "When you have a 
blowout, everyone has fun. Even my boy Marc" -- he nodded toward walk-on 
<strong>Marc Campbell</strong>, who had replaced him -- "got in and got some 
time on a national stage."<br /><br />As confetti streamed down from the Ford 
Field ceiling in the aftermath, the player who appeared to be having the most fun 
was the one who had, up to that point, been the most robotic and businesslike. 
Hansbrough, who arrived in <strong>Roy Williams</strong>'' first recruiting class 
following that ''05 national title, beamed as he bear-hugged his coach on the court, 
and later jumped into the arms of Carolina strength coach <strong>Jonas 
Sahratian</strong>, the man responsible for giving Hansbrough the nickname 
Psycho T during his freshman year. "This," Sahratian said, "was the biggest day of 
Tyler''s life, I think. It''s what he''d been working for."<br /><br />Despite winning 
the Wooden and Naismith Awards as a junior, Hansbrough''s legacy was ultimately 
going to be defined by whether or not he added a banner to the Dean Dome 
rafters. Sitting in the locker room with one of the nets around his neck, and 18 
points and seven rebounds in the box score, Hansbrough felt he had put an 
appropriate coda on his college career, and declared, "Whoever said [I''m] not 
validated, I''m validated right now."<br /><br />This win over Michigan State also 
validated the entire North Carolina team, which, like it or not, would have been 
regarded as an underachiever had it not won the national title. The Heels began the 
season as the AP Poll''s unanimous No. 1, and were also heavy title favorites in Las 
Vegas -- but then they started 0-2 in the ACC, with losses to Boston College and 
Wake Forest, and, as Williams said, "everybody jumped off the ship." Their defense 
appeared to be lacking with senior specialist <strong>Marcus Ginyard</strong> 
out of the lineup, and Lawson in particular was being shown up by guards such as 
<strong>Tyrese Rice</strong> and <strong>Jeff Teague</strong>. But Williams 
gathered them together in the locker room after that second loss in Winston-Salem, 
and, in front of everyone, asked a question to assistant coach <strong>Steve 
Robinson</strong>, who had also been on Williams'' staff at Kansas: "Coach, do 
you remember 1991, what we started out the season?"<br /><br />"We started 
out 0-2," Robinson said.<br />"Do you remember where we finished that 
season?"<br />"We played Duke for the national championship."<br /><br />And 
so Williams told his team that, if they did what the coaching staff asked, then 
they''d have a chance and "be there at the end."<br /><br />The Tar Heels were 
more than just <em>there</em> in this NCAA tou ament. They blitzed their way 
through the bracket, beating Radford by 43 in the first round, LSU by 14 in the 
second, Gonzaga by 21 in the Sweet 16, Oklahoma by 12 in the Elite Eight, 
Villanova by 14 in the Final Four and Michigan State by 17 in the final. Carolina only 
trailed its opponents for 10 minutes during the entire dance. They stepped up their 
defense, especially on the perimeter, when it became necessary, and put on an 
exhibition in the title game, forcing the Spartans in to 21 tu overs and just 40 
percent shooting. Carolina lost just four games all season, but, as senior guard 
<strong>Bobby Frasor</strong> said, "If we had played D like this all year, it 
could have been special."<br /><br />There was a sense, coming into Monday 
night''s title game, that the Tar Heels might be running up against something 
special -- a pre-ordained, fairy-tale story for the state of Michigan. Legendary 
Spartans point guard <strong>Earvin </strong>"Magic"<strong> 
Johnson</strong> had called them a "team of destiny" on Saturday, and it seemed 
that Michigan State could be the right team (having knocked off two-straight No. 1 
seeds), playing at the right time (the 30th anniversary of Magic''s title) in the right 
city (Detroit, which desperately needed an emotional diversion from its failing auto 
industry). When the Spartans ran out of their locker room, point guard 
<strong>Kalin Lucas</strong> -- one of two Motor City products -- yelled, "Let''s 
win this for the city!"<br /><br />A raucous crowd -- clad in approximately 65 
percent green and white -- was waiting for them in the stands, and those same fans 
lustily booed Carolina when it took the floor. Late Saturday night, after they beat 
Villanova to clinch a trip to the title game against the home-state team, Williams 
had told his players to prepare for the atmosphere at Ford Field as if it were more 
familiar, hostile territory: "Coach said, ''It''s like going into Cameron again,''" said 
Frasor, referring to Duke''s home court, where he and Hansbrough are 4-0. "And 
for us to make them quiet from the get-go, that was huge."<br /><br />As the 
Spartans faded quickly, so did the power of their fan advantage. It took them until 
the 7:33 mark of the second half to reach the 55 points Carolina had scored in the 
first half, and the building was so quiet with 3:25 left in the game, and Carolina up 
15, that a Michigan State dance team member could be heard saying, "C''mon, 
State! We still believe in you!" Not many others in the stands seemed to share that 
feeling. Seconds later, Lawson sunk two free throws to extend UNC''s lead to 
17.<br /><br />Carolina came into the game exuding the confidence of a club 
that, as even Johnson admitted in a pregame press conference with 1979 NCAA 
final foe <strong>Larry Bird</strong>, was "the best team in basketball, when you 
look at it talent-wise." Izzo said on Sunday that the only way the Spartans could 
win was to have a game plan that altered Carolina''s identity, because, "If we play 
good and they play good, we''re losing." The Heels were unfazed by Izzo scheming 
that took them out of their transition game; they managed to win despite scoring 
just four fast-break points -- the same amount that Michigan State did. They 
taunted Sparty, Michigan State''s mascot, in the tunnel beforehand -- 
<strong>Danny Green</strong> yelled in his face a few times, and someone said 
from a distance, "Sparty''s just a b----!" When the Heels charged out of their locker 
room for the final time before the game began, they created an intimidating 
amount of noise in the tunnel, by clapping in rhythm, barking, and chanting "Here 
... We ... Go!"<br /><br />From there the Heels went, unfazed by the crowd, and 
steamrolled Michigan State to win what was expected of them in the preseason: the 
national title. After they''d watched <em>One Shining Moment</em> together on 
the floor, with Williams, who had the other net around his neck, standing amongst 
them, they raced back to the locker room to perform a final ceremony. As is 
Williams'' tradition during the dance, there was an empty box drawn on their 
whiteboard prior to the game, waiting to be filled in. What goes inside the box is the 
number of teams left in the NCAA tou ament. They''ll typically gather ''round 
Williams to calculate the figure, but this time the math was easy. All that needed to 
be written was a giant number one.</p>',	'champions.jpg',	'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "news_noticias" ("noticia_id", "categoria_id", "reporter_id", "noticia_data_noticia", "noticia_hora_noticia", "noticia_data_pub", "noticia_hora_pub", "noticia_titulo", "noticia_corpo", "noticia_img", "noticia_flag_man_editorial") VALUES (13,	2,	'reporter',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'16:04:17',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'11:33:22',	'Fatal shooting at German courthouse',	'<p>Two people were killed and 
two were severely wounded Tuesday in a shooting at a courthouse in Landshut, 
Germany, police said.<br /><br />The gunman, a 60-year-old man, was among 
the dead, Bavarian Police said in a statement.<br /><br />It happened around 
10:15 a.m. (4:15 a.m. ET) during a break in a court proceeding about inheritance, 
Landshut police spokesman Leonard Mayer told CNN.<br /><br />The man began 
shooting once he stepped outside the courtroom, police said.<br /><br />He 
wounded three people before tu ing the gun on himself, Mayer said. One of the 
victims, a woman, died about 2 1/2 hours later, Bavarian Police said.<br /><br 
/>The lives of the two wounded victims are not in danger, he told CNN.<br /><br 
/>The courthouse has no metal detectors or security checks that would have 
tu ed up the shooter''s weapon, Mayer said.<br /><br />This latest shooting in 
Germany took place less than a month after a school massacre in the southweste  
town of Winnenden, in which a total of 16 people were killed.</p>',	'police.jpg',	'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "news_noticias" ("noticia_id", "categoria_id", "reporter_id", "noticia_data_noticia", "noticia_hora_noticia", "noticia_data_pub", "noticia_hora_pub", "noticia_titulo", "noticia_corpo", "noticia_img", "noticia_flag_man_editorial") VALUES (14,	4,	'reporter',	'$base_date_year-$base_date_month-$base_date_day 00:00:00',	'14:30:49',	NULL,	'14:30:49',	'The 
greatest car chases in movie history',	'<p>LONDON, England - What is it 
about the car chase? This action staple is almost as old as cinema itself, and the 
incredible success of Fast and Furious the latest high-octane 
joyride to hit cinema screens shows the almost supe atural allure the prospect 
of a quality chase exerts on a certain kind of movie-goer.</p> <p>Although 
they date back to silent film series like the Keystone Cops in 
1912, most agree the mode  car chase was bo  with Bullitt in 
1968, which features Steve McQueen as the titular hard-nosed cop detailed to 
protect a star witness.</p> <p>In this endlessly imitated sequence, Bullitt 
screeches up and down the hilly streets of San Francisco at the wheel of a Ford 
Mustang GT, hitting speeds of up to 185km/hour (115 miles/hour). An 
expert automobile and motorcycle racer in real life, the sequence is all 
the more impressive when you find out McQueen did almost all his own 
stunt driving.</p> <p>William Friedkin upped the realism in The 
French Connection (1971), which stars a fresh-faced Gene Hackman as 
New York City police detective Jimmy Popeye Doyle who 
wrestles an increasingly battered-looking 1971 Pontiac LeMans around the road 
unde eath an elevated train he is chasing in Brooklyn.</p> <p>Many of the 
scenes in this chase are real, including the car crash, which was unplanned and 
caused when a local man drove onto the set not realizing what was happening. 
The producers later paid for repairs.</p> <p>Other honorable mentions 
include: Cannonball Run (1981) for the spectacular cars 
including a Ferrari 308 GTS and Aston Martin DB5, The Italian 
Job (1969) for an incredibly hip car chase featuring red, white and blue 
Minis that personify swinging 60s London, Steven Spielberg 1971 
TV movie Duel, which is really just one extended chase 
scene.</p> <p>Car chases have gotten progressively more complicated since 
the 70s, with computer graphics (CGI) allowing filmmakers to conjure up 
scenes that would have been unthinkable using only stuntmen - just 
think of the impossibly violent crashes in the main chase scene in last 
years The Dark Knight.</p> <p>Some critics say all 
this CGI tomfoolery makes chase scenes look fake; that they dont 
require the same amount of skill from stuntmen. The dodgy CGI chase scene in 
Luc Bessons otherwise brilliant The Fifth Element (1997) 
could be held up as an example of this - although quite how they would 
have made taxis really hover 12 stories up is another question 
entirely.</p> <p>One of the most famous proponents of this view is Quentin 
Tarantino, who put his money where his mouth is with Death 
Proof (2007) which features a long, climactic chase scene featuring 
stripped down 1969 Dodge Charger and a heavily modified 1970 Dodge 
Challenger complete with a girl clinging precariously to the hood - and 
absolutely no CGI.</p> <p>Other contemporary chase scenes that deserve an 
honorable mention include the BMW vs. Peugeot car chase through the streets 
of Paris and, nerve-wrackingly, the wrong way up an autoroute in espionage 
caper Ronin (1998) and Paul Greengrass Bou e trilogy.</p>',	'car.jpg',	'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "news_noticias" ("noticia_id", "categoria_id", "reporter_id", "noticia_data_noticia", "noticia_hora_noticia", "noticia_data_pub", "noticia_hora_pub", "noticia_titulo", "noticia_corpo", "noticia_img", "noticia_flag_man_editorial") VALUES (15,	4,	'editor',	'2012-05-14',	'11:53:09:000',	'2012-05-14',	'11:56:14',	'Soccer is going down!',	'<p>Soccer attendence is lowering pass the years.</p>',	'',	'S')
EOT;
		break;
		
		case 'access':
		case 'ado_access':
			$arr_sqls_inserts[] = <<<EOT
insert into news_noticias(noticia_id,categoria_id,reporter_id,noticia_data_noticia,noticia_hora_noticia,noticia_data_pub,noticia_hora_pub,noticia_titulo,noticia_corpo,noticia_img,noticia_flag_man_editorial)select 5,3,'editor',#$base_date_year-$base_date_month-$base_date_day#,#1899-12-30#,#$base_date_year-$base_date_month-$base_date_day#,'11:36:13','The obama agenda','<p>Obama transition began before Election Day 
Even before Sen. Barack Obama won the presidential election, he was quietly 
building a transition team. On Wednesday, the president-elect met with key 
advisers and began making decisions about his transition team, including who will 
serve as his White House chief of staff. Reports say Obama is close to naming 
Illinois Rep. Rahm Emanuel to that post, but that has not been confirmed</p>',0x6F62616D612E6A7067,'N'
EOT;
			$arr_sqls_inserts[] = <<<EOT
insert into news_noticias(noticia_id,categoria_id,reporter_id,noticia_data_noticia,noticia_hora_noticia,noticia_data_pub,noticia_hora_pub,noticia_titulo,noticia_corpo,noticia_img,noticia_flag_man_editorial)select 6,1,'editor',#$base_date_year-$base_date_month-$base_date_day#,#1899-12-30#,#$base_date_year-$base_date_month-$base_date_day#,'11:52:00','Swede Stenson leads Champions tou ament','<p>Henrik Stenson 
fires a 7-under 65 in Shanghai on Thursday for a one-stroke first round lead in the 
HSBC Champions tou ament ahead of defending champion Phil Mickelson, Sergio 
Garcia, Anthony Kim and Adam Scott. full story</p>',0x676F6C662E6A7067,'N'
EOT;
			$arr_sqls_inserts[] = <<<EOT
insert into news_noticias(noticia_id,categoria_id,reporter_id,noticia_data_noticia,noticia_hora_noticia,noticia_data_pub,noticia_hora_pub,noticia_titulo,noticia_corpo,noticia_img,noticia_flag_man_editorial)select 7,4,'editor',#$base_date_year-$base_date_month-$base_date_day#,#1899-12-30#,#$base_date_year-$base_date_month-$base_date_day#,'11:50:44','Law and Order goes for a record','<p>The outburst comes from 
Anthony Anderson, who is describing the essential qualities of Kevin Be ard, the 
latest detective to join NBC-TV''s long-running Law & Order. The fun-loving and 
funny Anderson debuted last season as Be ard and resumes busting bad guys on 
Wednesday, 10 p.m. ET, with the season opener.</p>',0x6C61772E6A7067,'S'
EOT;
			$arr_sqls_inserts[] = <<<EOT
insert into news_noticias(noticia_id,categoria_id,reporter_id,noticia_data_noticia,noticia_hora_noticia,noticia_data_pub,noticia_hora_pub,noticia_titulo,noticia_corpo,noticia_img,noticia_flag_man_editorial)select 8,3,'editor',#$base_date_year-$base_date_month-$base_date_day#,#1899-12-30#,#$base_date_year-$base_date_month-$base_date_day#,'11:45:01','Ahmadinejad''s visit to Brazil draws criticism','<p>Iranian President 
Mahmoud Ahmadinejad and Brazilian counterpart Luiz Inacio Lula da Silva signed a 
series of agreements Monday after the controversial Iranian leader arrived at the 
first of three Latin American nations he will visit this week.</p>n<p>Ahmadinejad 
already visited Gambia on a five-nation trip that also will take him to Bolivia and 
Venezuela in South America and Senegal in Africa</p>n<p>...</p>',0x6C756C612E6A7067,'N'
EOT;
			$arr_sqls_inserts[] = <<<EOT
insert into news_noticias(noticia_id,categoria_id,reporter_id,noticia_data_noticia,noticia_hora_noticia,noticia_data_pub,noticia_hora_pub,noticia_titulo,noticia_corpo,noticia_img,noticia_flag_man_editorial)select 10,3,'editor',#$base_date_year-$base_date_month-$base_date_day#,'14:58:57',#$base_date_year-$base_date_month-$base_date_day#,'11:47:24','Obama will change','<p>Obama sad that in your mandat the United 
States will break and lost the title of First Economy of the World.</p>',0x6F62616D61312E6A7067,'N'
EOT;
			$arr_sqls_inserts[] = <<<EOT
insert into news_noticias(noticia_id,categoria_id,reporter_id,noticia_data_noticia,noticia_hora_noticia,noticia_data_pub,noticia_hora_pub,noticia_titulo,noticia_corpo,noticia_img,noticia_flag_man_editorial)select 11,3,'editor',#$base_date_year-$base_date_month-$base_date_day#,'16:04:55',#$base_date_year-$base_date_month-$base_date_day#,'11:48:46',' Obama: ''It is time for us to transition to the Iraqis''','<p>President 
Obama lauded the U.S. military in Baghdad on Tuesday during an unannounced 
visit to Iraq, reminding troops that the next 18 months will be difficult as the United 
States plans to start withdrawing its forces.<br /><br />I was just discussing this 
with your commander, but I think it''s something that all of you know. It is time for 
us to transition to the Iraqis, Obama said, according to a transcript from the White 
House. They need to take responsibility for their country and for their 
sovereignty.<br /><br />And in order for them to do that, they have got to make 
political accommodations. They''re going to have to decide that they want to 
resolve their differences through constitutional means and legal means. They are 
going to have to focus on providing gove ment services that encourage 
confidence among their citizens.<br /><br />A new CNN/Opinion Research 
Corporation poll found that 79 percent of Americans surveyed feel that Obama has 
had a more positive effect on how people in other countries view the U.S. Only 19 
percent of those surveyed thought he''s had a more negative effect.<br /><br 
/>The poll also indicated that only 35 percent of Americans currently approve of 
the U.S. war in Iraq; 65 percent disapprove.<br />Almost seven in 10 Americans 
agree with Obama''s plan to remove most U.S. troops from Iraq by next August, 
while leaving a residual force of between 35,000 and 50,000 troops.</p>',0x6F62616D61332E6A7067,'S'
EOT;
			$arr_sqls_inserts[] = <<<EOT
insert into news_noticias(noticia_id,categoria_id,reporter_id,noticia_data_noticia,noticia_hora_noticia,noticia_data_pub,noticia_hora_pub,noticia_titulo,noticia_corpo,noticia_img,noticia_flag_man_editorial)select 12,1,'reporter',#$base_date_year-$base_date_month-$base_date_day#,'16:04:04',#$base_date_year-$base_date_month-$base_date_day#,'11:32:13','Tar Heels Tou ey Romp Ends With Title','<p>DETROIT -- The heckling 
always came in summertime pickup games at the Dean Dome, when players from 
North Carolina''s 2005 national-title team would square off against the ringless 
members of the program''s current roster. The worst offenders were <strong>Sean 
May</strong>, <strong>Raymond Felton</strong>, and <strong>Melvin 
Scott</strong>, who tended to end any dispute -- over things as trivial as foul calls 
answer, for the entire careers of current stars <strong>Ty Lawson</strong>, 
<strong>Wayne Ellington</strong> and <strong>Tyler Hansbrough</strong>, had 
been no. And so in the aftermath of Monday''s 89-72 national-championship game 
rout of Michigan State, some of the Tar Heels'' thoughts tu ed to bragging rights. 
As Lawson said, before breaking into one of his trademark, devilish grins, I mean, 
what can they say now?<br /><br />Nothing, really, given the magnitude of the 
rout: The Tar Heels scored 55 first-half points and led by 21 at the break -- both 
title-game records -- and essentially put the game away in the first 10 minutes. It 
was an epic beatdown that brought Carolina its fifth championship and sucked the 
life out of a record crowd of 72,922 in Detroit, an economically struggling city that 
had rallied around Michigan State''s fairy-tale ride to the final. Ellington was named 
MOP after scoring 19 points, but it was Lawson who was masterful, getting to the 
free-throw line for 18 attempts (and converting 15 of them) to finish with 21 points, 
six assists and an amazing eight steals.<br /><br />On Sunday, he had reminisced 
about acting out approximately 20 different NCAA-championship buzzer-beater 
scenarios on his Fisher Price hoop as a child: Sometimes I needed a three to win 
it, sometimes I was on the free-throw line, sometimes I was making a last-second 
drive when we were down one, Lawson said, and we won every single time. But 
when a writer tried to goad Lawson into saying that he was dreaming of making an 
actual, last-second shot on Monday, he said, I hope it won''t be that close. I like 
blowouts better.<br /><br />A blowout is exactly what Lawson got -- one much 
like the 35-point massacre that occurred the first time the two teams met, on Dec. 
3, in the same building. He and Ellington had talked to each other about not starting 
slow, the way they did against Kansas in last year''s Final Four, when they came 
out shell-shocked and fell behind 40-12. Instead, they were the ones giving 
Michigan State what coach <strong>Tom Izzo</strong> described as that deer-in-
the-headlights look, as the Spartans trailed 21-7, then 32-11, then 46-22 and 55-
34 at half. Izzo''s floor leader, senior guard <strong>Travis Walton</strong>, 
admitted that it was a blur the first five minutes, when they jumped out on us so 
fast.<br /><br />When the Tar Heels finally subbed out their starters, en masse, 
with 1:03 left in the game, they led 89-70, and Lawson still hadn''t broken much of 
a sweat. Close games are nerve-wracking, Lawson said. When you have a 
blowout, everyone has fun. Even my boy Marc -- he nodded toward walk-on 
<strong>Marc Campbell</strong>, who had replaced him -- got in and got some 
time on a national stage.<br /><br />As confetti streamed down from the Ford 
Field ceiling in the aftermath, the player who appeared to be having the most fun 
was the one who had, up to that point, been the most robotic and businesslike. 
Hansbrough, who arrived in <strong>Roy Williams</strong>'' first recruiting class 
following that ''05 national title, beamed as he bear-hugged his coach on the court, 
and later jumped into the arms of Carolina strength coach <strong>Jonas 
Sahratian</strong>, the man responsible for giving Hansbrough the nickname 
Psycho T during his freshman year. This, Sahratian said, was the biggest day of 
Tyler''s life, I think. It''s what he''d been working for.<br /><br />Despite winning 
the Wooden and Naismith Awards as a junior, Hansbrough''s legacy was ultimately 
going to be defined by whether or not he added a banner to the Dean Dome 
rafters. Sitting in the locker room with one of the nets around his neck, and 18 
points and seven rebounds in the box score, Hansbrough felt he had put an 
appropriate coda on his college career, and declared, Whoever said [I''m] not 
validated, I''m validated right now.<br /><br />This win over Michigan State also 
validated the entire North Carolina team, which, like it or not, would have been 
regarded as an underachiever had it not won the national title. The Heels began the 
season as the AP Poll''s unanimous No. 1, and were also heavy title favorites in Las 
Vegas -- but then they started 0-2 in the ACC, with losses to Boston College and 
Wake Forest, and, as Williams said, everybody jumped off the ship. Their defense 
appeared to be lacking with senior specialist <strong>Marcus Ginyard</strong> 
out of the lineup, and Lawson in particular was being shown up by guards such as 
<strong>Tyrese Rice</strong> and <strong>Jeff Teague</strong>. But Williams 
gathered them together in the locker room after that second loss in Winston-Salem, 
and, in front of everyone, asked a question to assistant coach <strong>Steve 
Robinson</strong>, who had also been on Williams'' staff at Kansas: Coach, do 
you remember 1991, what we started out the season?<br /><br />We started 
out 0-2, Robinson said.<br />Do you remember where we finished that 
season?<br />We played Duke for the national championship.<br /><br />And 
so Williams told his team that, if they did what the coaching staff asked, then 
they''d have a chance and be there at the end.<br /><br />The Tar Heels were 
more than just <em>there</em> in this NCAA tou ament. They blitzed their way 
through the bracket, beating Radford by 43 in the first round, LSU by 14 in the 
second, Gonzaga by 21 in the Sweet 16, Oklahoma by 12 in the Elite Eight, 
Villanova by 14 in the Final Four and Michigan State by 17 in the final. Carolina only 
trailed its opponents for 10 minutes during the entire dance. They stepped up their 
defense, especially on the perimeter, when it became necessary, and put on an 
exhibition in the title game, forcing the Spartans in to 21 tu overs and just 40 
percent shooting. Carolina lost just four games all season, but, as senior guard 
<strong>Bobby Frasor</strong> said, If we had played D like this all year, it 
could have been special.<br /><br />There was a sense, coming into Monday 
night''s title game, that the Tar Heels might be running up against something 
special -- a pre-ordained, fairy-tale story for the state of Michigan. Legendary 
Spartans point guard <strong>Earvin </strong>Magic<strong> 
Johnson</strong> had called them a team of destiny on Saturday, and it seemed 
that Michigan State could be the right team (having knocked off two-straight No. 1 
seeds), playing at the right time (the 30th anniversary of Magic''s title) in the right 
city (Detroit, which desperately needed an emotional diversion from its failing auto 
industry). When the Spartans ran out of their locker room, point guard 
<strong>Kalin Lucas</strong> -- one of two Motor City products -- yelled, Let''s 
win this for the city!<br /><br />A raucous crowd -- clad in approximately 65 
percent green and white -- was waiting for them in the stands, and those same fans 
lustily booed Carolina when it took the floor. Late Saturday night, after they beat 
Villanova to clinch a trip to the title game against the home-state team, Williams 
had told his players to prepare for the atmosphere at Ford Field as if it were more 
familiar, hostile territory: Coach said, ''It''s like going into Cameron again,'' said 
Frasor, referring to Duke''s home court, where he and Hansbrough are 4-0. And 
for us to make them quiet from the get-go, that was huge.<br /><br />As the 
Spartans faded quickly, so did the power of their fan advantage. It took them until 
the 7:33 mark of the second half to reach the 55 points Carolina had scored in the 
first half, and the building was so quiet with 3:25 left in the game, and Carolina up 
15, that a Michigan State dance team member could be heard saying, C''mon, 
State! We still believe in you! Not many others in the stands seemed to share that 
feeling. Seconds later, Lawson sunk two free throws to extend UNC''s lead to 
17.<br /><br />Carolina came into the game exuding the confidence of a club 
that, as even Johnson admitted in a pregame press conference with 1979 NCAA 
final foe <strong>Larry Bird</strong>, was the best team in basketball, when you 
look at it talent-wise. Izzo said on Sunday that the only way the Spartans could 
win was to have a game plan that altered Carolina''s identity, because, If we play 
good and they play good, we''re losing. The Heels were unfazed by Izzo scheming 
that took them out of their transition game; they managed to win despite scoring 
just four fast-break points -- the same amount that Michigan State did. They 
taunted Sparty, Michigan State''s mascot, in the tunnel beforehand -- 
<strong>Danny Green</strong> yelled in his face a few times, and someone said 
from a distance, Sparty''s just a b----! When the Heels charged out of their locker 
room for the final time before the game began, they created an intimidating 
amount of noise in the tunnel, by clapping in rhythm, barking, and chanting Here 
... We ... Go!<br /><br />From there the Heels went, unfazed by the crowd, and 
steamrolled Michigan State to win what was expected of them in the preseason: the 
national title. After they''d watched <em>One Shining Moment</em> together on 
the floor, with Williams, who had the other net around his neck, standing amongst 
them, they raced back to the locker room to perform a final ceremony. As is 
Williams'' tradition during the dance, there was an empty box drawn on their 
whiteboard prior to the game, waiting to be filled in. What goes inside the box is the 
number of teams left in the NCAA tou ament. They''ll typically gather ''round 
Williams to calculate the figure, but this time the math was easy. All that needed to 
be written was a giant number one.</p>',0x6368616D70696F6E732E6A7067,'S'
EOT;
			$arr_sqls_inserts[] = <<<EOT
insert into news_noticias(noticia_id,categoria_id,reporter_id,noticia_data_noticia,noticia_hora_noticia,noticia_data_pub,noticia_hora_pub,noticia_titulo,noticia_corpo,noticia_img,noticia_flag_man_editorial)select 13,2,'reporter',#$base_date_year-$base_date_month-$base_date_day#,'16:04:17',#$base_date_year-$base_date_month-$base_date_day#,'11:33:22','Fatal shooting at German courthouse','<p>Two people were killed and 
two were severely wounded Tuesday in a shooting at a courthouse in Landshut, 
Germany, police said.<br /><br />The gunman, a 60-year-old man, was among 
the dead, Bavarian Police said in a statement.<br /><br />It happened around 
10:15 a.m. (4:15 a.m. ET) during a break in a court proceeding about inheritance, 
Landshut police spokesman Leonard Mayer told CNN.<br /><br />The man began 
shooting once he stepped outside the courtroom, police said.<br /><br />He 
wounded three people before tu ing the gun on himself, Mayer said. One of the 
victims, a woman, died about 2 1/2 hours later, Bavarian Police said.<br /><br 
/>The lives of the two wounded victims are not in danger, he told CNN.<br /><br 
/>The courthouse has no metal detectors or security checks that would have 
tu ed up the shooter''s weapon, Mayer said.<br /><br />This latest shooting in 
Germany took place less than a month after a school massacre in the southweste  
town of Winnenden, in which a total of 16 people were killed.</p>',0x706F6C6963652E6A7067,'S'
EOT;
			$arr_sqls_inserts[] = <<<EOT
insert into news_noticias(noticia_id,categoria_id,reporter_id,noticia_data_noticia,noticia_hora_noticia,noticia_data_pub,noticia_hora_pub,noticia_titulo,noticia_corpo,noticia_img,noticia_flag_man_editorial)select 14,4,'reporter',#$base_date_year-$base_date_month-$base_date_day#,'14:30:49',#2012-07-02#,'11:45:03','The greatest car chases in movie history','<p>LONDON, England ? What is it about the car chase? This action staple is almost as old as cinema itself, and the incredible success of ?Fast & Furious? the latest high-octane joyride to hit cinema screens shows the almost supe atural allure the prospect of a quality chase exerts on a certain kind of movie-goer.</p>
<p> </p>
<p>Although they date back to silent film series like the ?Keystone Cops? in 1912, most agree the mode  car chase was bo  with ?Bullitt? in 1968, which features Steve McQueen as the titular hard-nosed cop detailed to protect a star witness.</p>
<p> </p>
<p>In this endlessly imitated sequence, Bullitt screeches up and down the hilly streets of San Francisco at the wheel of a Ford Mustang GT, hitting speeds of up to 185km/hour (115 miles/hour). An expert automobile and motorcycle racer in real life, the sequence is all the more impressive when you find out McQueen did almost all his own stunt driving.</p>
<p> </p>
<p>William Friedkin upped the realism in ?The French Connection? (1971), which stars a fresh-faced Gene Hackman as New York City police detective Jimmy ?Popeye? Doyle who wrestles an increasingly battered-looking 1971 Pontiac LeMans around the road unde eath an elevated train he is chasing in Brooklyn.</p>
<p> </p>
<p>Many of the scenes in this chase are real, including the car crash, which was unplanned and caused when a local man drove onto the set not realizing what was happening. The producers later paid for repairs.</p>
<p> </p>
<p>Other honorable mentions include: ?Cannonball Run? (1981) for the spectacular cars including a Ferrari 308 GTS and Aston Martin DB5, ?The Italian Job? (1969) for an incredibly hip car chase featuring red, white and blue Minis that personify swinging 60s London, Steven Spielberg?s 1971 TV movie ?Duel,? which is really just one extended chase scene.</p>
<p> </p>
<p>Car chases have gotten progressively more complicated since the 70s, with computer graphics (CGI) allowing filmmakers to conjure up scenes that would have been unthinkable using only stuntmen ? just think of the impossibly violent crashes in the main chase scene in last year?s ?The Dark Knight.?</p>
<p> </p>
<p>Some critics say all this CGI tomfoolery makes chase scenes look fake; that they don?t require the same amount of skill from stuntmen. The dodgy CGI chase scene in Luc Besson?s otherwise brilliant ?The Fifth Element? (1997) could be held up as an example of this ? although quite how they would have made taxis really hover 12 stories up is another question entirely.</p>
<p> </p>
<p>One of the most famous proponents of this view is Quentin Tarantino, who put his money where his mouth is with ?Death Proof? (2007) which features a long, climactic chase scene featuring stripped down 1969 Dodge Charger and a heavily modified 1970 Dodge Challenger complete with a girl clinging precariously to the hood ? and absolutely no CGI.</p>
<p> </p>
<p>Other contemporary chase scenes that deserve an honorable mention include the BMW vs. Peugeot car chase through the streets of Paris and, nerve-wrackingly, the wrong way up an autoroute in espionage caper ?Ronin? (1998) and Paul Greengrass? ?Bou e? trilogy.</p>',0x6361722E6A7067,'S';
EOT;
		break;
		
		case 'postgres7':
		case 'pdo_pgsql':
		case 'postgres64':
		case 'postgres':
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "public"."news_noticias" VALUES ('5', '3', 'editor', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '00:00:00', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:36:13', 'The obama agenda', '<p>Obama transition began before Election Day 
Even before Sen. Barack Obama won the presidential election, he was quietly 
building a transition team. On Wednesday, the president-elect met with key 
advisers and began making decisions about his transition team, including who will 
serve as his White House chief of staff. Reports say Obama is close to naming 
Illinois Rep. Rahm Emanuel to that post, but that has not been confirmed</p>', E'obama.jpg', 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "public"."news_noticias" VALUES ('6', '1', 'editor', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '00:00:00', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:52:00', 'Swede Stenson leads Champions tournament', '<p>Henrik Stenson 
fires a 7-under 65 in Shanghai on Thursday for a one-stroke first round lead in the 
HSBC Champions tournament ahead of defending champion Phil Mickelson, Sergio 
Garcia, Anthony Kim and Adam Scott. full story</p>', E'golf.jpg', 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "public"."news_noticias" VALUES ('7', '4', 'editor', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '00:00:00', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:50:44', 'Law and Order goes for a record', '<p>The outburst comes from 
Anthony Anderson, who is describing the essential qualities of Kevin Bernard, the 
latest detective to join NBC-TV''s long-running Law & Order. The fun-loving and 
funny Anderson debuted last season as Bernard and resumes busting bad guys on 
Wednesday, 10 p.m. ET, with the season opener.</p>', E'law.jpg', 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "public"."news_noticias" VALUES ('8', '3', 'editor', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '00:00:00', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:45:01', 'Ahmadinejad''s visit to Brazil draws criticism', '<p>Iranian President 
Mahmoud Ahmadinejad and Brazilian counterpart Luiz Inacio Lula da Silva signed a 
series of agreements Monday after the controversial Iranian leader arrived at the 
first of three Latin American nations he will visit this week.</p>n<p>Ahmadinejad 
already visited Gambia on a five-nation trip that also will take him to Bolivia and 
Venezuela in South America and Senegal in Africa</p>n<p>...</p>', E'lula.jpg', 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "public"."news_noticias" VALUES ('10', '3', 'editor', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '14:58:57', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:47:24', 'Obama will change', '<p>Obama sad that in your mandat the United 
States will break and lost the title of First Economy of the World.</p>', E'obama1.jpg', 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "public"."news_noticias" VALUES ('11', '3', 'editor', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '16:04:55', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:48:46', ' Obama: ''It is time for us to transition to the Iraqis''', '<p>President 
Obama lauded the U.S. military in Baghdad on Tuesday during an unannounced 
visit to Iraq, reminding troops that the next 18 months will be difficult as the United 
States plans to start withdrawing its forces.<br /><br />I was just discussing this 
with your commander, but I think it''s something that all of you know. It is time for 
us to transition to the Iraqis, Obama said, according to a transcript from the White 
House. They need to take responsibility for their country and for their 
sovereignty.<br /><br />And in order for them to do that, they have got to make 
political accommodations. They''re going to have to decide that they want to 
resolve their differences through constitutional means and legal means. They are 
going to have to focus on providing government services that encourage 
confidence among their citizens.<br /><br />A new CNN/Opinion Research 
Corporation poll found that 79 percent of Americans surveyed feel that Obama has 
had a more positive effect on how people in other countries view the U.S. Only 19 
percent of those surveyed thought he''s had a more negative effect.<br /><br 
/>The poll also indicated that only 35 percent of Americans currently approve of 
the U.S. war in Iraq; 65 percent disapprove.<br />Almost seven in 10 Americans 
agree with Obama''s plan to remove most U.S. troops from Iraq by next August, 
while leaving a residual force of between 35,000 and 50,000 troops.</p>', E'obama3.jpg', 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "public"."news_noticias" VALUES ('12', '1', 'reporter', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '16:04:04', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:32:13', 'Tar Heels Tourney Romp Ends With Title', '<p>DETROIT -- The heckling 
always came in summertime pickup games at the Dean Dome, when players from 
North Carolina''s 2005 national-title team would square off against the ringless 
members of the program''s current roster. The worst offenders were <strong>Sean 
May</strong>, <strong>Raymond Felton</strong>, and <strong>Melvin 
Scott</strong>, who tended to end any dispute -- over things as trivial as foul calls 
answer, for the entire careers of current stars <strong>Ty Lawson</strong>, 
<strong>Wayne Ellington</strong> and <strong>Tyler Hansbrough</strong>, had 
been no. And so in the aftermath of Monday''s 89-72 national-championship game 
rout of Michigan State, some of the Tar Heels'' thoughts turned to bragging rights. 
As Lawson said, before breaking into one of his trademark, devilish grins, I mean, 
what can they say now?<br /><br />Nothing, really, given the magnitude of the 
rout: The Tar Heels scored 55 first-half points and led by 21 at the break -- both 
title-game records -- and essentially put the game away in the first 10 minutes. It 
was an epic beatdown that brought Carolina its fifth championship and sucked the 
life out of a record crowd of 72,922 in Detroit, an economically struggling city that 
had rallied around Michigan State''s fairy-tale ride to the final. Ellington was named 
MOP after scoring 19 points, but it was Lawson who was masterful, getting to the 
free-throw line for 18 attempts (and converting 15 of them) to finish with 21 points, 
six assists and an amazing eight steals.<br /><br />On Sunday, he had reminisced 
about acting out approximately 20 different NCAA-championship buzzer-beater 
scenarios on his Fisher Price hoop as a child: Sometimes I needed a three to win 
it, sometimes I was on the free-throw line, sometimes I was making a last-second 
drive when we were down one, Lawson said, and we won every single time. But 
when a writer tried to goad Lawson into saying that he was dreaming of making an 
actual, last-second shot on Monday, he said, I hope it won''t be that close. I like 
blowouts better.<br /><br />A blowout is exactly what Lawson got -- one much 
like the 35-point massacre that occurred the first time the two teams met, on Dec. 
3, in the same building. He and Ellington had talked to each other about not starting 
slow, the way they did against Kansas in last year''s Final Four, when they came 
out shell-shocked and fell behind 40-12. Instead, they were the ones giving 
Michigan State what coach <strong>Tom Izzo</strong> described as that deer-in-
the-headlights look, as the Spartans trailed 21-7, then 32-11, then 46-22 and 55-
34 at half. Izzo''s floor leader, senior guard <strong>Travis Walton</strong>, 
admitted that it was a blur the first five minutes, when they jumped out on us so 
fast.<br /><br />When the Tar Heels finally subbed out their starters, en masse, 
with 1:03 left in the game, they led 89-70, and Lawson still hadn''t broken much of 
a sweat. Close games are nerve-wracking, Lawson said. When you have a 
blowout, everyone has fun. Even my boy Marc -- he nodded toward walk-on 
<strong>Marc Campbell</strong>, who had replaced him -- got in and got some 
time on a national stage.<br /><br />As confetti streamed down from the Ford 
Field ceiling in the aftermath, the player who appeared to be having the most fun 
was the one who had, up to that point, been the most robotic and businesslike. 
Hansbrough, who arrived in <strong>Roy Williams</strong>'' first recruiting class 
following that ''05 national title, beamed as he bear-hugged his coach on the court, 
and later jumped into the arms of Carolina strength coach <strong>Jonas 
Sahratian</strong>, the man responsible for giving Hansbrough the nickname 
Psycho T during his freshman year. This, Sahratian said, was the biggest day of 
Tyler''s life, I think. It''s what he''d been working for.<br /><br />Despite winning 
the Wooden and Naismith Awards as a junior, Hansbrough''s legacy was ultimately 
going to be defined by whether or not he added a banner to the Dean Dome 
rafters. Sitting in the locker room with one of the nets around his neck, and 18 
points and seven rebounds in the box score, Hansbrough felt he had put an 
appropriate coda on his college career, and declared, Whoever said [I''m] not 
validated, I''m validated right now.<br /><br />This win over Michigan State also 
validated the entire North Carolina team, which, like it or not, would have been 
regarded as an underachiever had it not won the national title. The Heels began the 
season as the AP Poll''s unanimous No. 1, and were also heavy title favorites in Las 
Vegas -- but then they started 0-2 in the ACC, with losses to Boston College and 
Wake Forest, and, as Williams said, everybody jumped off the ship. Their defense 
appeared to be lacking with senior specialist <strong>Marcus Ginyard</strong> 
out of the lineup, and Lawson in particular was being shown up by guards such as 
<strong>Tyrese Rice</strong> and <strong>Jeff Teague</strong>. But Williams 
gathered them together in the locker room after that second loss in Winston-Salem, 
and, in front of everyone, asked a question to assistant coach <strong>Steve 
Robinson</strong>, who had also been on Williams'' staff at Kansas: Coach, do 
you remember 1991, what we started out the season?<br /><br />We started 
out 0-2, Robinson said.<br />Do you remember where we finished that 
season?<br />We played Duke for the national championship.<br /><br />And 
so Williams told his team that, if they did what the coaching staff asked, then 
they''d have a chance and be there at the end.<br /><br />The Tar Heels were 
more than just <em>there</em> in this NCAA tournament. They blitzed their way 
through the bracket, beating Radford by 43 in the first round, LSU by 14 in the 
second, Gonzaga by 21 in the Sweet 16, Oklahoma by 12 in the Elite Eight, 
Villanova by 14 in the Final Four and Michigan State by 17 in the final. Carolina only 
trailed its opponents for 10 minutes during the entire dance. They stepped up their 
defense, especially on the perimeter, when it became necessary, and put on an 
exhibition in the title game, forcing the Spartans in to 21 turnovers and just 40 
percent shooting. Carolina lost just four games all season, but, as senior guard 
<strong>Bobby Frasor</strong> said, If we had played D like this all year, it 
could have been special.<br /><br />There was a sense, coming into Monday 
night''s title game, that the Tar Heels might be running up against something 
special -- a pre-ordained, fairy-tale story for the state of Michigan. Legendary 
Spartans point guard <strong>Earvin </strong>Magic<strong> 
Johnson</strong> had called them a team of destiny on Saturday, and it seemed 
that Michigan State could be the right team (having knocked off two-straight No. 1 
seeds), playing at the right time (the 30th anniversary of Magic''s title) in the right 
city (Detroit, which desperately needed an emotional diversion from its failing auto 
industry). When the Spartans ran out of their locker room, point guard 
<strong>Kalin Lucas</strong> -- one of two Motor City products -- yelled, Let''s 
win this for the city!<br /><br />A raucous crowd -- clad in approximately 65 
percent green and white -- was waiting for them in the stands, and those same fans 
lustily booed Carolina when it took the floor. Late Saturday night, after they beat 
Villanova to clinch a trip to the title game against the home-state team, Williams 
had told his players to prepare for the atmosphere at Ford Field as if it were more 
familiar, hostile territory: Coach said, ''It''s like going into Cameron again,'' said 
Frasor, referring to Duke''s home court, where he and Hansbrough are 4-0. And 
for us to make them quiet from the get-go, that was huge.<br /><br />As the 
Spartans faded quickly, so did the power of their fan advantage. It took them until 
the 7:33 mark of the second half to reach the 55 points Carolina had scored in the 
first half, and the building was so quiet with 3:25 left in the game, and Carolina up 
15, that a Michigan State dance team member could be heard saying, C''mon, 
State! We still believe in you! Not many others in the stands seemed to share that 
feeling. Seconds later, Lawson sunk two free throws to extend UNC''s lead to 
17.<br /><br />Carolina came into the game exuding the confidence of a club 
that, as even Johnson admitted in a pregame press conference with 1979 NCAA 
final foe <strong>Larry Bird</strong>, was the best team in basketball, when you 
look at it talent-wise. Izzo said on Sunday that the only way the Spartans could 
win was to have a game plan that altered Carolina''s identity, because, If we play 
good and they play good, we''re losing. The Heels were unfazed by Izzo scheming 
that took them out of their transition game; they managed to win despite scoring 
just four fast-break points -- the same amount that Michigan State did. They 
taunted Sparty, Michigan State''s mascot, in the tunnel beforehand -- 
<strong>Danny Green</strong> yelled in his face a few times, and someone said 
from a distance, Sparty''s just a b----! When the Heels charged out of their locker 
room for the final time before the game began, they created an intimidating 
amount of noise in the tunnel, by clapping in rhythm, barking, and chanting Here 
... We ... Go!<br /><br />From there the Heels went, unfazed by the crowd, and 
steamrolled Michigan State to win what was expected of them in the preseason: the 
national title. After they''d watched <em>One Shining Moment</em> together on 
the floor, with Williams, who had the other net around his neck, standing amongst 
them, they raced back to the locker room to perform a final ceremony. As is 
Williams'' tradition during the dance, there was an empty box drawn on their 
whiteboard prior to the game, waiting to be filled in. What goes inside the box is the 
number of teams left in the NCAA tournament. They''ll typically gather ''round 
Williams to calculate the figure, but this time the math was easy. All that needed to 
be written was a giant number one.</p>', 'champions.jpg', 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "public"."news_noticias" VALUES ('13', '2', 'reporter', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '16:04:17', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '11:33:22', 'Fatal shooting at German courthouse', '<p>Two people were killed and 
two were severely wounded Tuesday in a shooting at a courthouse in Landshut, 
Germany, police said.<br /><br />The gunman, a 60-year-old man, was among 
the dead, Bavarian Police said in a statement.<br /><br />It happened around 
10:15 a.m. (4:15 a.m. ET) during a break in a court proceeding about inheritance, 
Landshut police spokesman Leonard Mayer told CNN.<br /><br />The man began 
shooting once he stepped outside the courtroom, police said.<br /><br />He 
wounded three people before turning the gun on himself, Mayer said. One of the 
victims, a woman, died about 2 1/2 hours later, Bavarian Police said.<br /><br 
/>The lives of the two wounded victims are not in danger, he told CNN.<br /><br 
/>The courthouse has no metal detectors or security checks that would have 
turned up the shooter''s weapon, Mayer said.<br /><br />This latest shooting in 
Germany took place less than a month after a school massacre in the southwestern 
town of Winnenden, in which a total of 16 people were killed.</p>', E'police.jpg', 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "public"."news_noticias" VALUES ('14', '4', 'reporter', '$base_date_year-$base_date_month-$base_date_day 00:00:00', '14:30:49', '2012-07-05 00:00:00', '08:00:47', 'The greatest car chases in movie history', '<p>LONDON, England ? What is it about the car chase? This action staple isrnalmost as old as cinema itself, and the incredible success of ?Fastrn& Furious? the latest high-octane joyride to hit cinema screensrnshows the almost supernatural allure the prospect of a quality chasernexerts on a certain kind of movie-goer.</p>
<p>rn</p>
<p>Although they date back to silent film series like the ?KeystonernCops? in 1912, most agree the modern car chase was born with ?Bullitt?rnin 1968, which features Steve McQueen as the titular hard-nosed coprndetailed to protect a star witness.</p>
<p>rn</p>
<p>In this endlessly imitated sequence, Bullitt screeches up and downrnthe hilly streets of San Francisco at the wheel of a Ford Mustang GT,rnhitting speeds of up to 185km/hour (115 miles/hour). An expertrnautomobile and motorcycle racer in real life, the sequence is all thernmore impressive when you find out McQueen did almost all his own stuntrndriving.</p>
<p>rn</p>
<p>William Friedkin upped the realism in ?The French Connection?rn(1971), which stars a fresh-faced Gene Hackman as New York City policerndetective Jimmy ?Popeye? Doyle who wrestles an increasinglyrnbattered-looking 1971 Pontiac LeMans around the road underneath anrnelevated train he is chasing in Brooklyn.</p>
<p>rn</p>
<p>Many of the scenes in this chase are real, including the car crash,rnwhich was unplanned and caused when a local man drove onto the set notrnrealizing what was happening. The producers later paid for repairs.</p>
<p>rn</p>
<p>Other honorable mentions include: ?Cannonball Run? (1981) for thernspectacular cars including a Ferrari 308 GTS and Aston Martin DB5, ?ThernItalian Job? (1969) for an incredibly hip car chase featuring red,rnwhite and blue Minis that  personify swinging 60s London, StevenrnSpielberg?s 1971 TV movie ?Duel,? which is really just one extendedrnchase scene.</p>
<p>rn</p>
<p>Car chases have gotten progressively more complicated since the 70s,rnwith computer graphics (CGI) allowing filmmakers to conjure up scenesrnthat would have been unthinkable using only stuntmen ? just think ofrnthe impossibly violent crashes in the main chase scene in last year?srn?The Dark Knight.?</p>
<p>rn</p>
<p>Some critics say all this CGI tomfoolery makes chase scenes lookrnfake; that they don?t require the same amount of skill from stuntmen.rnThe dodgy CGI chase scene in Luc Besson?s otherwise brilliant ?ThernFifth Element? (1997) could be held up as an example of this ? althoughrnquite how they would have made taxis really hover 12 stories up isrnanother question entirely.</p>
<p>rn</p>
<p>One of the most famous proponents of this view is Quentin Tarantino,rnwho put his money where his mouth is with ?Death Proof? (2007) whichrnfeatures a long, climactic chase scene featuring stripped down 1969rnDodge Charger and a heavily modified 1970 Dodge Challenger completernwith a girl clinging precariously to the hood ? and absolutely no CGI.</p>
<p>rn</p>
<p>Other contemporary chase scenes that deserve an honorable mentionrninclude the BMW vs. Peugeot car chase through the streets of Paris and,rnnerve-wrackingly, the wrong way up an autoroute in espionage caperrn?Ronin? (1998) and Paul Greengrass? ?Bourne? trilogy.</p>', E'car.jpg', 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "public"."news_noticias" VALUES ('15', '4', 'editor', '2012-05-11 00:00:00', '11:03:33', '2012-05-11 00:00:00', '11:04:37', 'Cirque in town!!', '<p>Cirque in town</p>', E'', 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "public"."news_noticias" VALUES ('16', '2', 'editor', '2012-07-04 00:00:00', '18:11:48', '2012-07-04 00:00:00', '18:11:59', 'Cirque in town', '<p>asdasdasd</p>', E'', 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "public"."news_noticias" VALUES ('17', '2', 'reporter', '2012-07-04 00:00:00', '18:18:15', '2012-07-05 00:00:00', '08:01:12', 'Nautico wins again!', '<p>Nautico 2 x 0 Sport</p>', E'', 'N')
EOT;
		break;
		
		case 'oci805':
		case 'odbc_oracle':
		case 'oci8':
		case 'oci8po':
		case 'oracle':
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "NEWS_NOTICIAS" VALUES (5, 3, 'editor', TO_DATE('$base_date_year-$base_date_month-$base_date_day 000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('18991230000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('$base_date_year-$base_date_month-$base_date_day 000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('20120801113613', 'yyyy-mm-dd hh24:mi:ss'), 'The obama agenda', '<p>Obama transition began before Election Day 
Even before Sen. Barack Obama won the presidential election, he was quietly 
building a transition team. On Wednesday, the president-elect met with key 
advisers and began making decisions about his transition team, including who will 
serve as his White House chief of staff. Reports say Obama is close to naming 
Illinois Rep. Rahm Emanuel to that post, but that has not been confirmed</p>', HEXTORAW('6F62616D612E6A7067'), 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "NEWS_NOTICIAS" VALUES (6, 1, 'editor', TO_DATE('$base_date_year-$base_date_month-$base_date_day 000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('18991230000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('$base_date_year-$base_date_month-$base_date_day 000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('20120801115200', 'yyyy-mm-dd hh24:mi:ss'), 'Swede Stenson leads Champions tournament', '<p>Henrik Stenson 
fires a 7-under 65 in Shanghai on Thursday for a one-stroke first round lead in the 
HSBC Champions tournament ahead of defending champion Phil Mickelson, Sergio 
Garcia, Anthony Kim and Adam Scott. full story</p>', HEXTORAW('676F6C662E6A7067'), 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "NEWS_NOTICIAS" VALUES (7, 4, 'editor', TO_DATE('$base_date_year-$base_date_month-$base_date_day 000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('18991230000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('$base_date_year-$base_date_month-$base_date_day 000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('20120801115044', 'yyyy-mm-dd hh24:mi:ss'), 'Law and Order goes for a record', '<p>The outburst comes from 
Anthony Anderson, who is describing the essential qualities of Kevin Bernard, the 
latest detective to join NBC-TV''s long-running Law & Order. The fun-loving and 
funny Anderson debuted last season as Bernard and resumes busting bad guys on 
Wednesday, 10 p.m. ET, with the season opener.</p>', HEXTORAW('6C61772E6A7067'), 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "NEWS_NOTICIAS" VALUES (8, 3, 'editor', TO_DATE('$base_date_year-$base_date_month-$base_date_day 000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('18991230000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('$base_date_year-$base_date_month-$base_date_day 000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('20120801114501', 'yyyy-mm-dd hh24:mi:ss'), 'Ahmadinejad''s visit to Brazil draws criticism', '<p>Iranian President 
Mahmoud Ahmadinejad and Brazilian counterpart Luiz Inacio Lula da Silva signed a 
series of agreements Monday after the controversial Iranian leader arrived at the 
first of three Latin American nations he will visit this week.</p>n<p>Ahmadinejad 
already visited Gambia on a five-nation trip that also will take him to Bolivia and 
Venezuela in South America and Senegal in Africa</p>n<p>...</p>', HEXTORAW('6C756C612E6A7067'), 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "NEWS_NOTICIAS" VALUES (10, 3, 'editor', TO_DATE('$base_date_year-$base_date_month-$base_date_day 000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('20120801145857', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('$base_date_year-$base_date_month-$base_date_day 000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('20120801114724', 'yyyy-mm-dd hh24:mi:ss'), 'Obama will change', '<p>Obama sad that in your mandat the United 
States will break and lost the title of First Economy of the World.</p>', HEXTORAW('6F62616D61312E6A7067'), 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO "NEWS_NOTICIAS" VALUES (11, 3, 'editor', TO_DATE('$base_date_year-$base_date_month-$base_date_day 000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('20120801160455', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('$base_date_year-$base_date_month-$base_date_day 000000', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('20120801114846', 'yyyy-mm-dd hh24:mi:ss'), ' Obama: ''It is time for us to transition to the Iraqis''', '<p>President 
Obama lauded the U.S. military in Baghdad on Tuesday during an unannounced 
visit to Iraq, reminding troops that the next 18 months will be difficult as the United 
States plans to start withdrawing its forces.<br /><br />I was just discussing this 
with your commander, but I think it''s something that all of you know. It is time for 
us to transition to the Iraqis, Obama said, according to a transcript from the White 
House. They need to take responsibility for their country and for their 
sovereignty.<br /><br />And in order for them to do that, they have got to make 
political accommodations. They''re going to have to decide that they want to 
resolve their differences through constitutional means and legal means. They are 
going to have to focus on providing government services that encourage 
confidence among their citizens.<br /><br />A new CNN/Opinion Research 
Corporation poll found that 79 percent of Americans surveyed feel that Obama has 
had a more positive effect on how people in other countries view the U.S. Only 19 
percent of those surveyed thought he''s had a more negative effect.<br /><br 
/>The poll also indicated that only 35 percent of Americans currently approve of 
the U.S. war in Iraq; 65 percent disapprove.<br />Almost seven in 10 Americans 
agree with Obama''s plan to remove most U.S. troops from Iraq by next August, 
while leaving a residual force of between 35,000 and 50,000 troops.</p>', HEXTORAW('6F62616D61332E6A7067'), 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO NEWS_NOTICIAS VALUES ('12', '1', 'reporter', TO_DATE('$base_date_year-$base_date_month-$base_date_day 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), TO_DATE('2012-08-01 16:04:04', 'YYYY-MM-DD HH24:MI:SS'), TO_DATE('$base_date_year-$base_date_month-$base_date_day 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), TO_DATE('2012-08-01 11:32:13', 'YYYY-MM-DD HH24:MI:SS'), 'Tar Heels Tourney Romp Ends With Title', empty_clob(), HexToRaw('6368616D70696F6E732E6A7067'), 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
UPDATE NEWS_NOTICIAS SET NOTICIA_CORPO = CONCAT(NOTICIA_CORPO, 'DETROIT -- The heckling always came in summertime pickup games at the Dean Dome, when players from North Carolina''s 2005 national-title team would square off against the ringless members of the program''s current roster. The worst offenders were Sean May, Raymond Felton, and Melvin Scott, who tended to end any dispute -- over things as trivial as foul calls answer, for the entire careers of current stars Ty Lawson, Wayne Ellington and Tyler Hansbrough, had been no. And so in the aftermath of Monday''s 89-72 national-championship game rout of Michigan State, some of the Tar Heels'' thoughts turned to bragging rights. As Lawson said, before breaking into one of his trademark, devilish grins, I mean, what can they say now?

Nothing, really, given the magnitude of the rout: The Tar Heels scored 55 first-half points and led by 21 at the break -- both title-game records -- and essentially put the game away in the first 10 minutes. It was an epic beatdown that brought Carolina its fifth championship and sucked the life out of a record crowd of 72,922 in Detroit, an economically struggling city that had rallied around Michigan State''s fairy-tale ride to the final. Ellington was named MOP after scoring 19 points, but it was Lawson who was masterful, getting to the free-throw line for 18 attempts (and converting 15 of them) to finish with 21 points, six assists and an amazing eight steals.

On Sunday, he had reminisced about acting out approximately 20 different NCAA-championship buzzer-beater scenarios on his Fisher Price hoop as a child: Sometimes I needed a three to win it, sometimes I was on the free-throw line, sometimes I was making a last-second drive when we were down one, Lawson said, and we won every single time. But when a writer tried to goad Lawson into saying that he was dreaming of making an actual, last-second shot on Monday, he said, I hope it won''t be that close. I like blowouts better.

A blowout is exactly what Lawson got -- one much like the 35-point massacre that occurred the first time the two teams met, on Dec. 3, in the same building. He and Ellington had talked to each other about not starting slow, the way they did against Kansas in last year''s Final Four, when they came out shell-shocked and fell behind 40-12. Instead, they were the ones giving Michigan State what coach Tom Izzo described as that deer-in- the-headlights look, as the Spartans trailed 21-7, then 32-11, then 46-22 and 55- 34 at half. Izzo''s floor leader, senior guard Travis Walton, admitted that it was a blur the first five minutes, when they jumped out on us so fast.

When the Tar Heels finally subbed out their starters, en masse, with 1:03 left in the game, they led 89-70, and Lawson still hadn''t broken much of a sweat. Close games are nerve-wracking, Lawson said. When you have a blowout, everyone has fun. Even my boy Marc -- he nodded toward walk-on Marc Campbell, who had replaced him -- got in and got some time on a national stage.

As confetti streamed down from the Ford Field ceiling in the aftermath, the player who appeared to be having the most fun was the one who had, up to that point, been the most robotic and businesslike. Hansbrough, who arrived in Roy Williams'' first recruiting class following that ''05 national title, beamed as he bear-hugged his coach on the court, and later jumped into the arms of Carolina strength coach Jonas Sahratian, the man responsible for giving Hansbrough the nickname Psycho T ') WHERE NOTICIA_ID = 12
EOT;
			$arr_sqls_inserts[] = <<<EOT
UPDATE NEWS_NOTICIAS SET NOTICIA_CORPO = CONCAT(NOTICIA_CORPO, 'during his freshman year. This, Sahratian said, was the biggest day of Tyler''s life, I think. It''s what he''d been working for.

Despite winning the Wooden and Naismith Awards as a junior, Hansbrough''s legacy was ultimately going to be defined by whether or not he added a banner to the Dean Dome rafters. Sitting in the locker room with one of the nets around his neck, and 18 points and seven rebounds in the box score, Hansbrough felt he had put an appropriate coda on his college career, and declared, Whoever said [I''m] not validated, I''m validated right now.

This win over Michigan State also validated the entire North Carolina team, which, like it or not, would have been regarded as an underachiever had it not won the national title. The Heels began the season as the AP Poll''s unanimous No. 1, and were also heavy title favorites in Las Vegas -- but then they started 0-2 in the ACC, with losses to Boston College and Wake Forest, and, as Williams said, everybody jumped off the ship. Their defense appeared to be lacking with senior specialist Marcus Ginyard out of the lineup, and Lawson in particular was being shown up by guards such as Tyrese Rice and Jeff Teague. But Williams gathered them together in the locker room after that second loss in Winston-Salem, and, in front of everyone, asked a question to assistant coach Steve Robinson, who had also been on Williams'' staff at Kansas: Coach, do you remember 1991, what we started out the season?

We started out 0-2, Robinson said.
Do you remember where we finished that season?
We played Duke for the national championship.

And so Williams told his team that, if they did what the coaching staff asked, then they''d have a chance and be there at the end.

The Tar Heels were more than just there in this NCAA tournament. They blitzed their way through the bracket, beating Radford by 43 in the first round, LSU by 14 in the second, Gonzaga by 21 in the Sweet 16, Oklahoma by 12 in the Elite Eight, Villanova by 14 in the Final Four and Michigan State by 17 in the final. Carolina only trailed its opponents for 10 minutes during the entire dance. They stepped up their defense, especially on the perimeter, when it became necessary, and put on an exhibition in the title game, forcing the Spartans in to 21 turnovers and just 40 percent shooting. Carolina lost just four games all season, but, as senior guard Bobby Frasor said, If we had played D like this all year, it could have been special.

There was a sense, coming into Monday night''s title game, that the Tar Heels might be running up against something special -- a pre-ordained, fairy-tale story for the state of Michigan. Legendary Spartans point guard Earvin Magic Johnson had called them a team of destiny on Saturday, and it seemed that Michigan State could be the right team (having knocked off two-straight No. 1 seeds), playing at the right time (the 30th anniversary of Magic''s title) in the right city (Detroit, which desperately needed an emotional diversion from its failing auto industry). When the Spartans ran out of their locker room, point guard Kalin Lucas -- one of two Motor City products -- yelled, Let''s win this for the city!

A raucous crowd -- clad in approximately 65 percent green and white -- was waiting for them in the stands, and those same fans lustily booed Carolina when it took the floor. Late Saturday night, after they beat Villanova to clinch a trip to the title game against the home-state team, William') WHERE NOTICIA_ID = 12

EOT;
			$arr_sqls_inserts[] = <<<EOT
UPDATE NEWS_NOTICIAS SET NOTICIA_CORPO = CONCAT(NOTICIA_CORPO, 's had told his players to prepare for the atmosphere at Ford Field as if it were more familiar, hostile territory: Coach said, ''It''s like going into Cameron again,'' said Frasor, referring to Duke''s home court, where he and Hansbrough are 4-0. And for us to make them quiet from the get-go, that was huge.

As the Spartans faded quickly, so did the power of their fan advantage. It took them until the 7:33 mark of the second half to reach the 55 points Carolina had scored in the first half, and the building was so quiet with 3:25 left in the game, and Carolina up 15, that a Michigan State dance team member could be heard saying, C''mon, State! We still believe in you! Not many others in the stands seemed to share that feeling. Seconds later, Lawson sunk two free throws to extend UNC''s lead to 17.

Carolina came into the game exuding the confidence of a club that, as even Johnson admitted in a pregame press conference with 1979 NCAA final foe Larry Bird, was the best team in basketball, when you look at it talent-wise. Izzo said on Sunday that the only way the Spartans could win was to have a game plan that altered Carolina''s identity, because, If we play good and they play good, we''re losing. The Heels were unfazed by Izzo scheming that took them out of their transition game; they managed to win despite scoring just four fast-break points -- the same amount that Michigan State did. They taunted Sparty, Michigan State''s mascot, in the tunnel beforehand -- Danny Green yelled in his face a few times, and someone said from a distance, Sparty''s just a b----! When the Heels charged out of their locker room for the final time before the game began, they created an intimidating amount of noise in the tunnel, by clapping in rhythm, barking, and chanting Here ... We ... Go!

From there the Heels went, unfazed by the crowd, and steamrolled Michigan State to win what was expected of them in the preseason: the national title. After they''d watched One Shining Moment together on the floor, with Williams, who had the other net around his neck, standing amongst them, they raced back to the locker room to perform a final ceremony. As is Williams'' tradition during the dance, there was an empty box drawn on their whiteboard prior to the game, waiting to be filled in. What goes inside the box is the number of teams left in the NCAA tournament. They''ll typically gather ''round Williams to calculate the figure, but this time the math was easy. All that needed to be written was a giant number one.') WHERE NOTICIA_ID = 12
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO NEWS_NOTICIAS VALUES ('13', '2', 'reporter', TO_DATE('$base_date_year-$base_date_month-$base_date_day 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), TO_DATE('2012-08-01 16:04:17', 'YYYY-MM-DD HH24:MI:SS'), TO_DATE('$base_date_year-$base_date_month-$base_date_day 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), TO_DATE('2012-08-01 11:33:22', 'YYYY-MM-DD HH24:MI:SS'), 'Fatal shooting at German courthouse', '<p>Two people were killed and \ntwo were severely wounded Tuesday in a shooting at a courthouse in Landshut, \nGermany, police said.<br /><br />The gunman, a 60-year-old man, was among \nthe dead, Bavarian Police said in a statement.<br /><br />It happened around \n10:15 a.m. (4:15 a.m. ET) during a break in a court proceeding about inheritance, \nLandshut police spokesman Leonard Mayer told CNN.<br /><br />The man began \nshooting once he stepped outside the courtroom, police said.<br /><br />He \nwounded three people before turning the gun on himself, Mayer said. One of the \nvictims, a woman, died about 2 1/2 hours later, Bavarian Police said.<br /><br \n/>The lives of the two wounded victims are not in danger, he told CNN.<br /><br \n/>The courthouse has no metal detectors or security checks that would have \nturned up the shooter\s weapon, Mayer said.<br /><br />This latest shooting in \nGermany took place less than a month after a school massacre in the southwestern \ntown of Winnenden, in which a total of 16 people were killed.</p>', HexToRaw('706F6C6963652E6A7067'), 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO NEWS_NOTICIAS VALUES ('14', '4', 'reporter', TO_DATE('2012-05-11 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), TO_DATE('2012-08-01 14:30:49', 'YYYY-MM-DD HH24:MI:SS'), TO_DATE('2012-05-11 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), TO_DATE('2012-08-01 11:45:03', 'YYYY-MM-DD HH24:MI:SS'), 'The greatest car chases in movie history', '<p>LONDON, England ? What is it about the car chase? This action staple isrnalmost as old as cinema itself, and the incredible success of ?Fastrn& Furious? the latest high-octane joyride to hit cinema screensrnshows the almost supernatural allure the prospect of a quality chasernexerts on a certain kind of movie-goer.</p>
<p>rn</p>
<p>Although they date back to silent film series like the ?KeystonernCops? in 1912, most agree the modern car chase was born with ?Bullitt?rnin 1968, which features Steve McQueen as the titular hard-nosed coprndetailed to protect a star witness.</p>
<p>rn</p>
<p>In this endlessly imitated sequence, Bullitt screeches up and downrnthe hilly streets of San Francisco at the wheel of a Ford Mustang GT,rnhitting speeds of up to 185km/hour (115 miles/hour). An expertrnautomobile and motorcycle racer in real life, the sequence is all thernmore impressive when you find out McQueen did almost all his own stuntrndriving.</p>
<p>rn</p>
<p>William Friedkin upped the realism in ?The French Connection?rn(1971), which stars a fresh-faced Gene Hackman as New York City policerndetective Jimmy ?Popeye? Doyle who wrestles an increasinglyrnbattered-looking 1971 Pontiac LeMans around the road underneath anrnelevated train he is chasing in Brooklyn.</p>
<p>rn</p>
<p>Many of the scenes in this chase are real, including the car crash,rnwhich was unplanned and caused when a local man drove onto the set notrnrealizing what was happening. The producers later paid for repairs.</p>
<p>rn</p>
<p>Other honorable mentions include: ?Cannonball Run? (1981) for thernspectacular cars including a Ferrari 308 GTS and Aston Martin DB5, ?ThernItalian Job? (1969) for an incredibly hip car chase featuring red,rnwhite and blue Minis that personify swinging 60s London, StevenrnSpielberg?s 1971 TV movie ?Duel,? which is really just one extendedrnchase scene.</p>
<p>rn</p>
<p>Car chases have gotten progressively more complicated since the 70s,rnwith computer graphics (CGI) allowing filmmakers to conjure up scenesrnthat would have been unthinkable using only stuntmen ? just think ofrnthe impossibly violent crashes in the main chase scene in last year?srn?The Dark Knight.?</p>
<p>rn</p>
<p>Some critics say all this CGI tomfoolery makes chase scenes lookrnfake; that they don?t require the same amount of skill from stuntmen.rnThe dodgy CGI chase scene in Luc Besson?s otherwise brilliant ?ThernFifth Element? (1997) could be held up as an example of this ? althoughrnquite how they would have made taxis really hover 12 stories up isrnanother question entirely.</p>
<p>rn</p>
<p>One of the most famous proponents of this view is Quentin Tarantino,rnwho put his money where his mouth is with ?Death Proof? (2007) whichrnfeatures a long, climactic chase scene featuring stripped down 1969rnDodge Charger and a heavily modified 1970 Dodge Challenger completernwith a girl clinging precariously to the hood ? and absolutely no CGI.</p>
<p>rn</p>
<p>Other contemporary chase scenes that deserve an honorable mentionrninclude the BMW vs. Peugeot car chase through the streets of Paris and,rnnerve-wrackingly, the wrong way up an autoroute in espionage caperrn?Ronin? (1998) and Paul Greengrass? ?Bourne? trilogy.</p>', HexToRaw('6361722E6A7067'), 'S')
EOT;
		break;
		
		case 'borland_ibase';
		case 'ibase';
		case 'firebird';
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO NEWS_NOTICIAS
VALUES (5, 3, 'editor', '$base_date_year-$base_date_month-$base_date_day', '00:00:00', '$base_date_year-$base_date_month-$base_date_day', '11:36:13', 'The obama agenda', '<p>Obama transition began before Election Day 
Even before Sen. Barack Obama won the presidential election, he was quietly 
building a transition team. On Wednesday, the president-elect met with key 
advisers and began making decisions about his transition team, including who will 
serve as his White House chief of staff. Reports say Obama is close to naming 
Illinois Rep. Rahm Emanuel to that post, but that has not been confirmed</p>', 'obama.jpg', 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO NEWS_NOTICIAS
VALUES (6, 1, 'editor', '$base_date_year-$base_date_month-$base_date_day', '00:00:00', '$base_date_year-$base_date_month-$base_date_day', '11:52:00', 'Swede Stenson leads Champions tournament', '<p>Henrik Stenson 
fires a 7-under 65 in Shanghai on Thursday for a one-stroke first round lead in the 
HSBC Champions tournament ahead of defending champion Phil Mickelson, Sergio 
Garcia, Anthony Kim and Adam Scott. full story</p>', 'golf.jpg', 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO NEWS_NOTICIAS
VALUES (7, 4, 'editor', '$base_date_year-$base_date_month-$base_date_day', '00:00:00', '$base_date_year-$base_date_month-$base_date_day', '11:50:44', 'Law and Order goes for a record', '<p>The outburst comes from 
Anthony Anderson, who is describing the essential qualities of Kevin Bernard, the 
latest detective to join NBC-TV''s long-running Law & Order. The fun-loving and 
funny Anderson debuted last season as Bernard and resumes busting bad guys on 
Wednesday, 10 p.m. ET, with the season opener.</p>', 'law.jpg', 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO NEWS_NOTICIAS
VALUES (8, 3, 'editor', '$base_date_year-$base_date_month-$base_date_day', '00:00:00', '$base_date_year-$base_date_month-$base_date_day', '11:45:01', 'Ahmadinejad''s visit to Brazil draws criticism', '<p>Iranian President 
Mahmoud Ahmadinejad and Brazilian counterpart Luiz Inacio Lula da Silva signed a 
series of agreements Monday after the controversial Iranian leader arrived at the 
first of three Latin American nations he will visit this week.</p>n<p>Ahmadinejad 
already visited Gambia on a five-nation trip that also will take him to Bolivia and 
Venezuela in South America and Senegal in Africa</p>n<p>...</p>', 'lula.jpg', 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO NEWS_NOTICIAS
VALUES (10, 3, 'editor', '$base_date_year-$base_date_month-$base_date_day', '14:58:57', '$base_date_year-$base_date_month-$base_date_day', '11:47:24', 'Obama will change', '<p>Obama sad that in your mandat the United 
States will break and lost the title of First Economy of the World.</p>', 'obama1.jpg', 'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO NEWS_NOTICIAS
VALUES (11, 3, 'editor', '$base_date_year-$base_date_month-$base_date_day', '16:04:55', '$base_date_year-$base_date_month-$base_date_day', '11:48:46', ' Obama: ''It is time for us to transition to the Iraqis''', '<p>President 
Obama lauded the U.S. military in Baghdad on Tuesday during an unannounced 
visit to Iraq, reminding troops that the next 18 months will be difficult as the United 
States plans to start withdrawing its forces.<br /><br />I was just discussing this 
with your commander, but I think it''s something that all of you know. It is time for 
us to transition to the Iraqis, Obama said, according to a transcript from the White 
House. They need to take responsibility for their country and for their 
sovereignty.<br /><br />And in order for them to do that, they have got to make 
political accommodations. They''re going to have to decide that they want to 
resolve their differences through constitutional means and legal means. They are 
going to have to focus on providing government services that encourage 
confidence among their citizens.<br /><br />A new CNN/Opinion Research 
Corporation poll found that 79 percent of Americans surveyed feel that Obama has 
had a more positive effect on how people in other countries view the U.S. Only 19 
percent of those surveyed thought he''s had a more negative effect.<br /><br 
/>The poll also indicated that only 35 percent of Americans currently approve of 
the U.S. war in Iraq; 65 percent disapprove.<br />Almost seven in 10 Americans 
agree with Obama''s plan to remove most U.S. troops from Iraq by next August, 
while leaving a residual force of between 35,000 and 50,000 troops.</p>', 'obama3.jpg', 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO NEWS_NOTICIAS
VALUES (12, 1, 'reporter', '$base_date_year-$base_date_month-$base_date_day', '16:04:04', '$base_date_year-$base_date_month-$base_date_day', '11:32:13', 'Tar Heels Tourney Romp Ends With Title', '<p>DETROIT -- The heckling 
always came in summertime pickup games at the Dean Dome, when players from 
North Carolina''s 2005 national-title team would square off against the ringless 
members of the program''s current roster. The worst offenders were <strong>Sean 
May</strong>, <strong>Raymond Felton</strong>, and <strong>Melvin 
Scott</strong>, who tended to end any dispute -- over things as trivial as foul calls 
answer, for the entire careers of current stars <strong>Ty Lawson</strong>, 
<strong>Wayne Ellington</strong> and <strong>Tyler Hansbrough</strong>, had 
been no. And so in the aftermath of Monday''s 89-72 national-championship game 
rout of Michigan State, some of the Tar Heels'' thoughts turned to bragging rights. 
As Lawson said, before breaking into one of his trademark, devilish grins, I mean, 
what can they say now?<br /><br />Nothing, really, given the magnitude of the 
rout: The Tar Heels scored 55 first-half points and led by 21 at the break -- both 
title-game records -- and essentially put the game away in the first 10 minutes. It 
was an epic beatdown that brought Carolina its fifth championship and sucked the 
life out of a record crowd of 72,922 in Detroit, an economically struggling city that 
had rallied around Michigan State''s fairy-tale ride to the final. Ellington was named 
MOP after scoring 19 points, but it was Lawson who was masterful, getting to the 
free-throw line for 18 attempts (and converting 15 of them) to finish with 21 points, 
six assists and an amazing eight steals.<br /><br />On Sunday, he had reminisced 
about acting out approximately 20 different NCAA-championship buzzer-beater 
scenarios on his Fisher Price hoop as a child: Sometimes I needed a three to win 
it, sometimes I was on the free-throw line, sometimes I was making a last-second 
drive when we were down one, Lawson said, and we won every single time. But 
when a writer tried to goad Lawson into saying that he was dreaming of making an 
actual, last-second shot on Monday, he said, I hope it won''t be that close. I like 
blowouts better.<br /><br />A blowout is exactly what Lawson got -- one much 
like the 35-point massacre that occurred the first time the two teams met, on Dec. 
3, in the same building. He and Ellington had talked to each other about not starting 
slow, the way they did against Kansas in last year''s Final Four, when they came 
out shell-shocked and fell behind 40-12. Instead, they were the ones giving 
Michigan State what coach <strong>Tom Izzo</strong> described as that deer-in-
the-headlights look, as the Spartans trailed 21-7, then 32-11, then 46-22 and 55-
34 at half. Izzo''s floor leader, senior guard <strong>Travis Walton</strong>, 
admitted that it was a blur the first five minutes, when they jumped out on us so 
fast.<br /><br />When the Tar Heels finally subbed out their starters, en masse, 
with 1:03 left in the game, they led 89-70, and Lawson still hadn''t broken much of 
a sweat. Close games are nerve-wracking, Lawson said. When you have a 
blowout, everyone has fun. Even my boy Marc -- he nodded toward walk-on 
<strong>Marc Campbell</strong>, who had replaced him -- got in and got some 
time on a national stage.<br /><br />As confetti streamed down from the Ford 
Field ceiling in the aftermath, the player who appeared to be having the most fun 
was the one who had, up to that point, been the most robotic and businesslike. 
Hansbrough, who arrived in <strong>Roy Williams</strong>'' first recruiting class 
following that ''05 national title, beamed as he bear-hugged his coach on the court, 
and later jumped into the arms of Carolina strength coach <strong>Jonas 
Sahratian</strong>, the man responsible for giving Hansbrough the nickname 
Psycho T during his freshman year. This, Sahratian said, was the biggest day of 
Tyler''s life, I think. It''s what he''d been working for.<br /><br />Despite winning 
the Wooden and Naismith Awards as a junior, Hansbrough''s legacy was ultimately 
going to be defined by whether or not he added a banner to the Dean Dome 
rafters. Sitting in the locker room with one of the nets around his neck, and 18 
points and seven rebounds in the box score, Hansbrough felt he had put an 
appropriate coda on his college career, and declared, Whoever said [I''m] not 
validated, I''m validated right now.<br /><br />This win over Michigan State also 
validated the entire North Carolina team, which, like it or not, would have been 
regarded as an underachiever had it not won the national title. The Heels began the 
season as the AP Poll''s unanimous No. 1, and were also heavy title favorites in Las 
Vegas -- but then they started 0-2 in the ACC, with losses to Boston College and 
Wake Forest, and, as Williams said, everybody jumped off the ship. Their defense 
appeared to be lacking with senior specialist <strong>Marcus Ginyard</strong> 
out of the lineup, and Lawson in particular was being shown up by guards such as 
<strong>Tyrese Rice</strong> and <strong>Jeff Teague</strong>. But Williams 
gathered them together in the locker room after that second loss in Winston-Salem, 
and, in front of everyone, asked a question to assistant coach <strong>Steve 
Robinson</strong>, who had also been on Williams'' staff at Kansas: Coach, do 
you remember 1991, what we started out the season?<br /><br />We started 
out 0-2, Robinson said.<br />Do you remember where we finished that 
season?<br />We played Duke for the national championship.<br /><br />And 
so Williams told his team that, if they did what the coaching staff asked, then 
they''d have a chance and be there at the end.<br /><br />The Tar Heels were 
more than just <em>there</em> in this NCAA tournament. They blitzed their way 
through the bracket, beating Radford by 43 in the first round, LSU by 14 in the 
second, Gonzaga by 21 in the Sweet 16, Oklahoma by 12 in the Elite Eight, 
Villanova by 14 in the Final Four and Michigan State by 17 in the final. Carolina only 
trailed its opponents for 10 minutes during the entire dance. They stepped up their 
defense, especially on the perimeter, when it became necessary, and put on an 
exhibition in the title game, forcing the Spartans in to 21 turnovers and just 40 
percent shooting. Carolina lost just four games all season, but, as senior guard 
<strong>Bobby Frasor</strong> said, If we had played D like this all year, it 
could have been special.<br /><br />There was a sense, coming into Monday 
night''s title game, that the Tar Heels might be running up against something 
special -- a pre-ordained, fairy-tale story for the state of Michigan. Legendary 
Spartans point guard <strong>Earvin </strong>Magic<strong> 
Johnson</strong> had called them a team of destiny on Saturday, and it seemed 
that Michigan State could be the right team (having knocked off two-straight No. 1 
seeds), playing at the right time (the 30th anniversary of Magic''s title) in the right 
city (Detroit, which desperately needed an emotional diversion from its failing auto 
industry). When the Spartans ran out of their locker room, point guard 
<strong>Kalin Lucas</strong> -- one of two Motor City products -- yelled, Let''s 
win this for the city!<br /><br />A raucous crowd -- clad in approximately 65 
percent green and white -- was waiting for them in the stands, and those same fans 
lustily booed Carolina when it took the floor. Late Saturday night, after they beat 
Villanova to clinch a trip to the title game against the home-state team, Williams 
had told his players to prepare for the atmosphere at Ford Field as if it were more 
familiar, hostile territory: Coach said, ''It''s like going into Cameron again,'' said 
Frasor, referring to Duke''s home court, where he and Hansbrough are 4-0. And 
for us to make them quiet from the get-go, that was huge.<br /><br />As the 
Spartans faded quickly, so did the power of their fan advantage. It took them until 
the 7:33 mark of the second half to reach the 55 points Carolina had scored in the 
first half, and the building was so quiet with 3:25 left in the game, and Carolina up 
15, that a Michigan State dance team member could be heard saying, C''mon, 
State! We still believe in you! Not many others in the stands seemed to share that 
feeling. Seconds later, Lawson sunk two free throws to extend UNC''s lead to 
17.<br /><br />Carolina came into the game exuding the confidence of a club 
that, as even Johnson admitted in a pregame press conference with 1979 NCAA 
final foe <strong>Larry Bird</strong>, was the best team in basketball, when you 
look at it talent-wise. Izzo said on Sunday that the only way the Spartans could 
win was to have a game plan that altered Carolina''s identity, because, If we play 
good and they play good, we''re losing. The Heels were unfazed by Izzo scheming 
that took them out of their transition game; they managed to win despite scoring 
just four fast-break points -- the same amount that Michigan State did. They 
taunted Sparty, Michigan State''s mascot, in the tunnel beforehand -- 
<strong>Danny Green</strong> yelled in his face a few times, and someone said 
from a distance, Sparty''s just a b----! When the Heels charged out of their locker 
room for the final time before the game began, they created an intimidating 
amount of noise in the tunnel, by clapping in rhythm, barking, and chanting Here 
... We ... Go!<br /><br />From there the Heels went, unfazed by the crowd, and 
steamrolled Michigan State to win what was expected of them in the preseason: the 
national title. After they''d watched <em>One Shining Moment</em> together on 
the floor, with Williams, who had the other net around his neck, standing amongst 
them, they raced back to the locker room to perform a final ceremony. As is 
Williams'' tradition during the dance, there was an empty box drawn on their 
whiteboard prior to the game, waiting to be filled in. What goes inside the box is the 
number of teams left in the NCAA tournament. They''ll typically gather ''round 
Williams to calculate the figure, but this time the math was easy. All that needed to 
be written was a giant number one.</p>', 'champions.jpg', 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO NEWS_NOTICIAS
VALUES (13, 2, 'reporter', '$base_date_year-$base_date_month-$base_date_day', '16:04:17', '$base_date_year-$base_date_month-$base_date_day', '11:33:22', 'Fatal shooting at German courthouse', '<p>Two people were killed and 
two were severely wounded Tuesday in a shooting at a courthouse in Landshut, 
Germany, police said.<br /><br />The gunman, a 60-year-old man, was among 
the dead, Bavarian Police said in a statement.<br /><br />It happened around 
10:15 a.m. (4:15 a.m. ET) during a break in a court proceeding about inheritance, 
Landshut police spokesman Leonard Mayer told CNN.<br /><br />The man began 
shooting once he stepped outside the courtroom, police said.<br /><br />He 
wounded three people before turning the gun on himself, Mayer said. One of the 
victims, a woman, died about 2 1/2 hours later, Bavarian Police said.<br /><br 
/>The lives of the two wounded victims are not in danger, he told CNN.<br /><br 
/>The courthouse has no metal detectors or security checks that would have 
turned up the shooter''s weapon, Mayer said.<br /><br />This latest shooting in 
Germany took place less than a month after a school massacre in the southwestern 
town of Winnenden, in which a total of 16 people were killed.</p>', 'police.jpg', 'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
INSERT INTO NEWS_NOTICIAS
VALUES (14, 4, 'reporter', '2012-05-11', '14:30:49', '2012-05-11', '11:45:03', 'The greatest car chases in movie history', '<p>LONDON, England ? What is it about the car chase? This action staple isrnalmost as old as cinema itself, and the incredible success of ?Fastrn& Furious? the latest high-octane joyride to hit cinema screensrnshows the almost supernatural allure the prospect of a quality chasernexerts on a certain kind of movie-goer.</p>
<p>rn</p>
<p>Although they date back to silent film series like the ?KeystonernCops? in 1912, most agree the modern car chase was born with ?Bullitt?rnin 1968, which features Steve McQueen as the titular hard-nosed coprndetailed to protect a star witness.</p>
<p>rn</p>
<p>In this endlessly imitated sequence, Bullitt screeches up and downrnthe hilly streets of San Francisco at the wheel of a Ford Mustang GT,rnhitting speeds of up to 185km/hour (115 miles/hour). An expertrnautomobile and motorcycle racer in real life, the sequence is all thernmore impressive when you find out McQueen did almost all his own stuntrndriving.</p>
<p>rn</p>
<p>William Friedkin upped the realism in ?The French Connection?rn(1971), which stars a fresh-faced Gene Hackman as New York City policerndetective Jimmy ?Popeye? Doyle who wrestles an increasinglyrnbattered-looking 1971 Pontiac LeMans around the road underneath anrnelevated train he is chasing in Brooklyn.</p>
<p>rn</p>
<p>Many of the scenes in this chase are real, including the car crash,rnwhich was unplanned and caused when a local man drove onto the set notrnrealizing what was happening. The producers later paid for repairs.</p>
<p>rn</p>
<p>Other honorable mentions include: ?Cannonball Run? (1981) for thernspectacular cars including a Ferrari 308 GTS and Aston Martin DB5, ?ThernItalian Job? (1969) for an incredibly hip car chase featuring red,rnwhite and blue Minis that personify swinging 60s London, StevenrnSpielberg?s 1971 TV movie ?Duel,? which is really just one extendedrnchase scene.</p>
<p>rn</p>
<p>Car chases have gotten progressively more complicated since the 70s,rnwith computer graphics (CGI) allowing filmmakers to conjure up scenesrnthat would have been unthinkable using only stuntmen ? just think ofrnthe impossibly violent crashes in the main chase scene in last year?srn?The Dark Knight.?</p>
<p>rn</p>
<p>Some critics say all this CGI tomfoolery makes chase scenes lookrnfake; that they don?t require the same amount of skill from stuntmen.rnThe dodgy CGI chase scene in Luc Besson?s otherwise brilliant ?ThernFifth Element? (1997) could be held up as an example of this ? althoughrnquite how they would have made taxis really hover 12 stories up isrnanother question entirely.</p>
<p>rn</p>
<p>One of the most famous proponents of this view is Quentin Tarantino,rnwho put his money where his mouth is with ?Death Proof? (2007) whichrnfeatures a long, climactic chase scene featuring stripped down 1969rnDodge Charger and a heavily modified 1970 Dodge Challenger completernwith a girl clinging precariously to the hood ? and absolutely no CGI.</p>
<p>rn</p>
<p>Other contemporary chase scenes that deserve an honorable mentionrninclude the BMW vs. Peugeot car chase through the streets of Paris and,rnnerve-wrackingly, the wrong way up an autoroute in espionage caperrn?Ronin? (1998) and Paul Greengrass? ?Bourne? trilogy.</p>', 'car.jpg', 'S')
EOT;

		break;
		
		case 'ado_mssql':
		case 'pdo_sqlsrv':
		case 'mssqlnative':
		case 'odbc_mssql':
		case 'mssql':
			$arr_sqls_inserts[] = <<<EOT
SET DATEFORMAT ymd;
INSERT INTO dbo.news_noticias (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (N'5', N'3', N'editor', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1899-12-30 00:00:00.000', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1900-01-01 11:36:13.000', N'The obama agenda', N'<p>Obama transition began before Election Day Even before Sen. Barack Obama won the presidential election, he was quietly building a transition team. On Wednesday, the president-elect met with key advisers and began making decisions about his transition team, including who will serve as his White House chief of staff. Reports say Obama is close to naming Illinois Rep. Rahm Emanuel to that post, but that has not been confirmed</p>', 0x6F62616D612E6A7067, N'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
SET DATEFORMAT ymd;
INSERT INTO dbo.news_noticias (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (N'6', N'1', N'editor', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1899-12-30 00:00:00.000', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1900-01-01 11:52:00.000', N'Swede Stenson leads Champions tournament', N'<p>Henrik Stenson fires a 7-under 65 in Shanghai on Thursday for a one-stroke first round lead in the HSBC Champions tournament ahead of defending champion Phil Mickelson, Sergio Garcia, Anthony Kim and Adam Scott. full story</p>', 0x676F6C662E6A7067, N'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
SET DATEFORMAT ymd;
INSERT INTO dbo.news_noticias (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (N'7', N'4', N'editor', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1899-12-30 00:00:00.000', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1900-01-01 11:50:44.000', N'Law and Order goes for a record', N'<p>The outburst comes from Anthony Anderson, who is describing the essential qualities of Kevin Bernard, the latest detective to join NBC-TV''s long-running Law & Order. The fun-loving and funny Anderson debuted last season as Bernard and resumes busting bad guys on Wednesday, 10 p.m. ET, with the season opener.</p>', 0x6C61772E6A7067, N'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
SET DATEFORMAT ymd;
INSERT INTO dbo.news_noticias (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (N'8', N'3', N'editor', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1899-12-30 00:00:00.000', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1900-01-01 11:45:01.000', N'Ahmadinejad''s visit to Brazil draws criticism', N'<p>Iranian President Mahmoud Ahmadinejad and Brazilian counterpart Luiz Inacio Lula da Silva signed a series of agreements Monday after the controversial Iranian leader arrived at the first of three Latin American nations he will visit this week.</p>n<p>Ahmadinejad already visited Gambia on a five-nation trip that also will take him to Bolivia and Venezuela in South America and Senegal in Africa</p>n<p>...</p>', 0x6C756C612E6A7067, N'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
SET DATEFORMAT ymd;
INSERT INTO dbo.news_noticias (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (N'10', N'3', N'editor', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1900-01-01 14:58:57.000', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1900-01-01 11:47:24.000', N'Obama will change', N'<p>Obama sad that in your mandat the United States will break and lost the title of First Economy of the World.</p>', 0x6F62616D61312E6A7067, N'N')
EOT;
			$arr_sqls_inserts[] = <<<EOT
SET DATEFORMAT ymd;
INSERT INTO dbo.news_noticias (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (N'11', N'3', N'editor', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1900-01-01 16:04:55.000', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1900-01-01 11:48:46.000', N' Obama: ''It is time for us to transition to the Iraqis''', N'<p>President Obama lauded the U.S. military in Baghdad on Tuesday during an unannounced visit to Iraq, reminding troops that the next 18 months will be difficult as the United States plans to start withdrawing its forces.<br /><br />I was just discussing this with your commander, but I think it''s something that all of you know. It is time for us to transition to the Iraqis, Obama said, according to a transcript from the White House. They need to take responsibility for their country and for their sovereignty.<br /><br />And in order for them to do that, they have got to make political accommodations. They''re going to have to decide that they want to resolve their differences through constitutional means and legal means. They are going to have to focus on providing government services that encourage confidence among their citizens.<br /><br />A new CNN/Opinion Research Corporation poll found that 79 percent of Americans surveyed feel that Obama has had a more positive effect on how people in other countries view the U.S. Only 19 percent of those surveyed thought he''s had a more negative effect.<br /><br />The poll also indicated that only 35 percent of Americans currently approve of the U.S. war in Iraq; 65 percent disapprove.<br />Almost seven in 10 Americans agree with Obama''s plan to remove most U.S. troops from Iraq by next August, while leaving a residual force of between 35,000 and 50,000 troops.</p>', 0x6F62616D61332E6A7067, N'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
SET DATEFORMAT ymd;
INSERT INTO dbo.news_noticias (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (N'12', N'1', N'reporter', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1900-01-01 16:04:04.000', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1900-01-01 11:32:13.000', N'Tar Heels Tourney Romp Ends With Title', N'<p>DETROIT -- The heckling always came in summertime pickup games at the Dean Dome, when players from North Carolina''s 2005 national-title team would square off against the ringless members of the program''s current roster. The worst offenders were <strong>Sean May</strong>, <strong>Raymond Felton</strong>, and <strong>Melvin Scott</strong>, who tended to end any dispute -- over things as trivial as foul calls answer, for the entire careers of current stars <strong>Ty Lawson</strong>, <strong>Wayne Ellington</strong> and <strong>Tyler Hansbrough</strong>, had been no. And so in the aftermath of Monday''s 89-72 national-championship game rout of Michigan State, some of the Tar Heels'' thoughts turned to bragging rights. As Lawson said, before breaking into one of his trademark, devilish grins, I mean, what can they say now?<br /><br />Nothing, really, given the magnitude of the rout: The Tar Heels scored 55 first-half points and led by 21 at the break -- both title-game records -- and essentially put the game away in the first 10 minutes. It was an epic beatdown that brought Carolina its fifth championship and sucked the life out of a record crowd of 72,922 in Detroit, an economically struggling city that had rallied around Michigan State''s fairy-tale ride to the final. Ellington was named MOP after scoring 19 points, but it was Lawson who was masterful, getting to the free-throw line for 18 attempts (and converting 15 of them) to finish with 21 points, six assists and an amazing eight steals.<br /><br />On Sunday, he had reminisced about acting out approximately 20 different NCAA-championship buzzer-beater scenarios on his Fisher Price hoop as a child: Sometimes I needed a three to win it, sometimes I was on the free-throw line, sometimes I was making a last-second drive when we were down one, Lawson said, and we won every single time. But when a writer tried to goad Lawson into saying that he was dreaming of making an actual, last-second shot on Monday, he said, I hope it won''t be that close. I like blowouts better.<br /><br />A blowout is exactly what Lawson got -- one much like the 35-point massacre that occurred the first time the two teams met, on Dec. 3, in the same building. He and Ellington had talked to each other about not starting slow, the way they did against Kansas in last year''s Final Four, when they came out shell-shocked and fell behind 40-12. Instead, they were the ones giving Michigan State what coach <strong>Tom Izzo</strong> described as that deer-in- the-headlights look, as the Spartans trailed 21-7, then 32-11, then 46-22 and 55- 34 at half. Izzo''s floor leader, senior guard <strong>Travis Walton</strong>, admitted that it was a blur the first five minutes, when they jumped out on us so fast.<br /><br />When the Tar Heels finally subbed out their starters, en masse, with 1:03 left in the game, they led 89-70, and Lawson still hadn''t broken much of a sweat. Close games are nerve-wracking, Lawson said. When you have a blowout, everyone has fun. Even my boy Marc -- he nodded toward walk-on <strong>Marc Campbell</strong>, who had replaced him -- got in and got some time on a national stage.<br /><br />As confetti streamed down from the Ford Field ceiling in the aftermath, the player who appeared to be having the most fun was the one who had, up to that point, been the most robotic and businesslike. Hansbrough, who arrived in <strong>Roy Williams</strong>'' first recruiting class following that ''05 national title, beamed as he bear-hugged his coach on the court, and later jumped into the arms of Carolina strength coach <strong>Jonas Sahratian</strong>, the man responsible for giving Hansbrough the nickname Psycho T during his freshman year. This, Sahratian said, was the biggest day of Tyler''s life, I think. It''s what he''d been working for.<br /><br />Despite winning the Wooden and Naismith Awards as a junior, Hansbrough''s legacy was ultimately going to be defined by whether or not he added a banner to the Dean Dome rafters. Sitting in the locker room with one of the nets around his neck, and 18 points and seven rebounds in the box score, Hansbrough felt he had put an appropriate coda on his college career, and declared, Whoever said [I''m] not validated, I''m validated right now.<br /><br />This win over Michigan State also validated the entire North Carolina team, which, like it or not, would have been regarded as an underachiever had it not won the national title. The Heels began the season as the AP Poll''s unanimous No. 1, and were also heavy title favorites in Las Vegas -- but then they started 0-2 in the ACC, with losses to Boston College and Wake Forest, and, as Williams said, everybody jumped off the ship. Their defense appeared to be lacking with senior specialist <strong>Marcus Ginyard</strong> out of the lineup, and Lawson in particular was being shown up by guards such as <strong>Tyrese Rice</strong> and <strong>Jeff Teague</strong>. But Williams gathered them together in the locker room after that second loss in Winston-Salem, and, in front of everyone, asked a question to assistant coach <strong>Steve Robinson</strong>, who had also been on Williams'' staff at Kansas: Coach, do you remember 1991, what we started out the season?<br /><br />We started out 0-2, Robinson said.<br />Do you remember where we finished that season?<br />We played Duke for the national championship.<br /><br />And so Williams told his team that, if they did what the coaching staff asked, then they''d have a chance and be there at the end.<br /><br />The Tar Heels were more than just <em>there</em> in this NCAA tournament. They blitzed their way through the bracket, beating Radford by 43 in the first round, LSU by 14 in the second, Gonzaga by 21 in the Sweet 16, Oklahoma by 12 in the Elite Eight, Villanova by 14 in the Final Four and Michigan State by 17 in the final. Carolina only trailed its opponents for 10 minutes during the entire dance. They stepped up their defense, especially on the perimeter, when it became necessary, and put on an exhibition in the title game, forcing the Spartans in to 21 turnovers and just 40 percent shooting. Carolina lost just four games all season, but, as senior guard <strong>Bobby Frasor</strong> said, If we had played D like this all year, it could have been special.<br /><br />There was a sense, coming into Monday night''s title game, that the Tar Heels might be running up against something special -- a pre-ordained, fairy-tale story for the state of Michigan. Legendary Spartans point guard <strong>Earvin </strong>Magic<strong> Johnson</strong> had called them a team of destiny on Saturday, and it seemed that Michigan State could be the right team (having knocked off two-straight No. 1 seeds), playing at the right time (the 30th anniversary of Magic''s title) in the right city (Detroit, which desperately needed an emotional diversion from its failing auto industry). When the Spartans ran out of their locker room, point guard <strong>Kalin Lucas</strong> -- one of two Motor City products -- yelled, Let''s win this for the city!<br /><br />A raucous crowd -- clad in approximately 65 percent green and white -- was waiting for them in the stands, and those same fans lustily booed Carolina when it took the floor. Late Saturday night, after they beat Villanova to clinch a trip to the title game against the home-state team, Williams had told his players to prepare for the atmosphere at Ford Field as if it were more familiar, hostile territory: Coach said, ''It''s like going into Cameron again,'' said Frasor, referring to Duke''s home court, where he and Hansbrough are 4-0. And for us to make them quiet from the get-go, that was huge.<br /><br />As the Spartans faded quickly, so did the power of their fan advantage. It took them until the 7:33 mark of the second half to reach the 55 points Carolina had scored in the first half, and the building was so quiet with 3:25 left in the game, and Carolina up 15, that a Michigan State dance team member could be heard saying, C''mon, State! We still believe in you! Not many others in the stands seemed to share that feeling. Seconds later, Lawson sunk two free throws to extend UNC''s lead to 17.<br /><br />Carolina came into the game exuding the confidence of a club that, as even Johnson admitted in a pregame press conference with 1979 NCAA final foe <strong>Larry Bird</strong>, was the best team in basketball, when you look at it talent-wise. Izzo said on Sunday that the only way the Spartans could win was to have a game plan that altered Carolina''s identity, because, If we play good and they play good, we''re losing. The Heels were unfazed by Izzo scheming that took them out of their transition game; they managed to win despite scoring just four fast-break points -- the same amount that Michigan State did. They taunted Sparty, Michigan State''s mascot, in the tunnel beforehand -- <strong>Danny Green</strong> yelled in his face a few times, and someone said from a distance, Sparty''s just a b----! When the Heels charged out of their locker room for the final time before the game began, they created an intimidating amount of noise in the tunnel, by clapping in rhythm, barking, and chanting Here ... We ... Go!<br /><br />From there the Heels went, unfazed by the crowd, and steamrolled Michigan State to win what was expected of them in the preseason: the national title. After they''d watched <em>One Shining Moment</em> together on the floor, with Williams, who had the other net around his neck, standing amongst them, they raced back to the locker room to perform a final ceremony. As is Williams'' tradition during the dance, there was an empty box drawn on their whiteboard prior to the game, waiting to be filled in. What goes inside the box is the number of teams left in the NCAA tournament. They''ll typically gather ''round Williams to calculate the figure, but this time the math was easy. All that needed to be written was a giant number one.</p>', 0x6368616D70696F6E732E6A7067, N'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
SET DATEFORMAT ymd;
INSERT INTO dbo.news_noticias (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (N'13', N'2', N'reporter', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1900-01-01 16:04:17.000', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1900-01-01 11:33:22.000', N'Fatal shooting at German courthouse', N'<p>Two people were killed and two were severely wounded Tuesday in a shooting at a courthouse in Landshut, Germany, police said.<br /><br />The gunman, a 60-year-old man, was among the dead, Bavarian Police said in a statement.<br /><br />It happened around 10:15 a.m. (4:15 a.m. ET) during a break in a court proceeding about inheritance, Landshut police spokesman Leonard Mayer told CNN.<br /><br />The man began shooting once he stepped outside the courtroom, police said.<br /><br />He wounded three people before turning the gun on himself, Mayer said. One of the victims, a woman, died about 2 1/2 hours later, Bavarian Police said.<br /><br />The lives of the two wounded victims are not in danger, he told CNN.<br /><br />The courthouse has no metal detectors or security checks that would have turned up the shooter''s weapon, Mayer said.<br /><br />This latest shooting in Germany took place less than a month after a school massacre in the southwestern town of Winnenden, in which a total of 16 people were killed.</p>', 0x706F6C6963652E6A7067, N'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
SET DATEFORMAT ymd;
INSERT INTO dbo.news_noticias (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (N'14', N'4', N'reporter', N'$base_date_year-$base_date_month-$base_date_day 00:00:00.000', N'1900-01-01 14:30:49.000', N'2012-07-02 00:00:00.000', N'1900-01-01 11:45:03.000', N'The greatest car chases in movie history', N'<p>LONDON, England ? What is it about the car chase? This action staple isrnalmost as old as cinema itself, and the incredible success of ?Fastrn& Furious? the latest high-octane joyride to hit cinema screensrnshows the almost supernatural allure the prospect of a quality chasernexerts on a certain kind of movie-goer.</p> <p>rn</p> <p>Although they date back to silent film series like the ?KeystonernCops? in 1912, most agree the modern car chase was born with ?Bullitt?rnin 1968, which features Steve McQueen as the titular hard-nosed coprndetailed to protect a star witness.</p> <p>rn</p> <p>In this endlessly imitated sequence, Bullitt screeches up and downrnthe hilly streets of San Francisco at the wheel of a Ford Mustang GT,rnhitting speeds of up to 185km/hour (115 miles/hour). An expertrnautomobile and motorcycle racer in real life, the sequence is all thernmore impressive when you find out McQueen did almost all his own stuntrndriving.</p> <p>rn</p> <p>William Friedkin upped the realism in ?The French Connection?rn(1971), which stars a fresh-faced Gene Hackman as New York City policerndetective Jimmy ?Popeye? Doyle who wrestles an increasinglyrnbattered-looking 1971 Pontiac LeMans around the road underneath anrnelevated train he is chasing in Brooklyn.</p> <p>rn</p> <p>Many of the scenes in this chase are real, including the car crash,rnwhich was unplanned and caused when a local man drove onto the set notrnrealizing what was happening. The producers later paid for repairs.</p> <p>rn</p> <p>Other honorable mentions include: ?Cannonball Run? (1981) for thernspectacular cars including a Ferrari 308 GTS and Aston Martin DB5, ?ThernItalian Job? (1969) for an incredibly hip car chase featuring red,rnwhite and blue Minis that personify swinging 60s London, StevenrnSpielberg?s 1971 TV movie ?Duel,? which is really just one extendedrnchase scene.</p> <p>rn</p> <p>Car chases have gotten progressively more complicated since the 70s,rnwith computer graphics (CGI) allowing filmmakers to conjure up scenesrnthat would have been unthinkable using only stuntmen ? just think ofrnthe impossibly violent crashes in the main chase scene in last year?srn?The Dark Knight.?</p> <p>rn</p> <p>Some critics say all this CGI tomfoolery makes chase scenes lookrnfake; that they don?t require the same amount of skill from stuntmen.rnThe dodgy CGI chase scene in Luc Besson?s otherwise brilliant ?ThernFifth Element? (1997) could be held up as an example of this ? althoughrnquite how they would have made taxis really hover 12 stories up isrnanother question entirely.</p> <p>rn</p> <p>One of the most famous proponents of this view is Quentin Tarantino,rnwho put his money where his mouth is with ?Death Proof? (2007) whichrnfeatures a long, climactic chase scene featuring stripped down 1969rnDodge Charger and a heavily modified 1970 Dodge Challenger completernwith a girl clinging precariously to the hood ? and absolutely no CGI.</p> <p>rn</p> <p>Other contemporary chase scenes that deserve an honorable mentionrninclude the BMW vs. Peugeot car chase through the streets of Paris and,rnnerve-wrackingly, the wrong way up an autoroute in espionage caperrn?Ronin? (1998) and Paul Greengrass? ?Bourne? trilogy.</p>', 0x6361722E6A7067, N'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
SET DATEFORMAT ymd;
INSERT INTO dbo.news_noticias (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (N'15', N'4', N'editor', N'2012-05-11 00:00:00.000', N'1900-01-01 11:03:33.000', N'2012-05-11 00:00:00.000', N'1900-01-01 11:04:37.000', N'Cirque in town!!', N'<p>Cirque in town</p>', 0x, N'S')
EOT;
			$arr_sqls_inserts[] = <<<EOT
SET DATEFORMAT ymd;
INSERT INTO dbo.news_noticias (noticia_id, categoria_id, reporter_id, noticia_data_noticia, noticia_hora_noticia, noticia_data_pub, noticia_hora_pub, noticia_titulo, noticia_corpo, noticia_img, noticia_flag_man_editorial) VALUES (N'16', N'1', N'editor', N'2012-07-02 00:00:00.000', N'1900-01-01 11:19:34.000', N'2012-07-02 00:00:00.000', N'1900-01-01 11:43:30.000', N'Nautico wins again!', N'<p>one more time, we can''t belive.</p>', 0x, N'S')
EOT;
		break;
	}
	
	if(is_array($arr_sqls_inserts) && !empty($arr_sqls_inserts))
	{
		foreach($arr_sqls_inserts as $sql)
		{
			
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                login_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		}
	}
}
$_SESSION['scriptcase']['login']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['login']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['login']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['login']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['login']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['login']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['login']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['login']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['login']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['login']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              login_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['login']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['login']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
      { 
          $nm_saida_global = $_SESSION['scriptcase']['nm_sc_retorno']; 
      } 
    $this->nm_formatar_campos();
        $this->initFormPages();
    $login = $this->login;
    $senha = $this->senha;
    header("X-XSS-Protection: 1; mode=block");
    header("X-Frame-Options: SAMEORIGIN");
    include_once("login_form_user.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['login']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['login']['csrf_token'];
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
       $nmgp_saida_form = "login_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['login']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['login']['nm_run_menu'] = 2;
       $nmgp_saida_form = "login_fim.php";
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['redir_target_name']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['login']['redir_target_name'])
       {
           $sTarget = $_SESSION['sc_session'][$this->Ini->sc_page]['login']['redir_target_name'];
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['redir_target_name']);
       }
       else
       {
           $sTarget = '_self';
       }
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       login_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['login']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['login']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['login']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['masterValue']);
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
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['login'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['login']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['login']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['login']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           login_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       }
       login_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
   if ($nm_target == "_blank")
   {
?>
<form name="Fredir" method="post" target="_blank" action="<?php echo $nm_apl_dest; ?>">
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
</form>
<script type="text/javascript">
setTimeout(function() { document.Fredir.submit(); }, 250);
</script>
<?php
    return;
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<?php
   }
?>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
   </BODY>
   </HTML>
<?php
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
}
?>
