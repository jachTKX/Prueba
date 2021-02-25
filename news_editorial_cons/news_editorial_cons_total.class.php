<?php

class news_editorial_cons_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function __construct($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("en_us");
      if (isset($_SESSION['sc_session'][$this->sc_page]['news_editorial_cons']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['news_editorial_cons']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['news_editorial_cons']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->news_categorias_categoria_nome = $Busca_temp['news_categorias_categoria_nome']; 
          $tmp_pos = strpos($this->news_categorias_categoria_nome, "##@@");
          if ($tmp_pos !== false && !is_array($this->news_categorias_categoria_nome))
          {
              $this->news_categorias_categoria_nome = substr($this->news_categorias_categoria_nome, 0, $tmp_pos);
          }
          $this->news_categorias_categoris_descricao = $Busca_temp['news_categorias_categoris_descricao']; 
          $tmp_pos = strpos($this->news_categorias_categoris_descricao, "##@@");
          if ($tmp_pos !== false && !is_array($this->news_categorias_categoris_descricao))
          {
              $this->news_categorias_categoris_descricao = substr($this->news_categorias_categoris_descricao, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['news_editorial_cons']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $nm_comando = "select distinct         categoria_nome,          categoris_descricao,         news_noticias.noticia_titulo,        news_noticias.noticia_corpo,         news_noticias.noticia_id,       news_categorias.categoria_id from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['news_editorial_cons']['where_pesq']; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['news_editorial_cons']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from (" . $nm_comando . ") nm_sel_esp "; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from (" . $nm_comando . ") nm_sel_esp "; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['news_editorial_cons']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['news_editorial_cons']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['news_editorial_cons']['contr_total_geral'] = "OK";
   } 

   function nm_conv_data_db($dt_in, $form_in, $form_out)
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
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
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
              if ($cont2 >= $tam_campo)
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
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
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
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
function M_altera_where()
{
$_SESSION['scriptcase']['news_editorial_cons']['contr_erro'] = 'on';
  
 
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

$this->nm_where_dinamico = " AND news_noticias.noticia_data_pub  
                        BETWEEN ".$this->Ini->sc_Sql_Protect($data_inicial, "date")." AND ".$this->Ini->sc_Sql_Protect($data_final, "date")."";
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['news_editorial_cons']['where_dinamico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['news_editorial_cons']['where_dinamico'] != $this->nm_where_dinamico) {
    $_SESSION['sc_session'][$this->Ini->sc_page]['news_editorial_cons']['where_dinamico'] = $this->nm_where_dinamico;
    unset($_SESSION['sc_session'][$this->Ini->sc_page]['news_editorial_cons']['inicio']);
}
$_SESSION['scriptcase']['news_editorial_cons']['contr_erro'] = 'off';
}
function M_trunca_noticia()
{
$_SESSION['scriptcase']['news_editorial_cons']['contr_erro'] = 'on';
  
$this->news_noticias_noticia_corpo  = strip_tags($this->news_noticias_noticia_corpo );
$this->news_noticias_noticia_corpo  = substr($this->news_noticias_noticia_corpo ,0,255) . ' ... ';

$_SESSION['scriptcase']['news_editorial_cons']['contr_erro'] = 'off';
}
}

?>
