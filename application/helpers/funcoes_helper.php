<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//carrega um modulo do sistema devolvendo a tela solicitada

function load_modulo($modulo=NULL, $tela=NULL, $diretorio='painel')
{
    $CI =& get_instance();
    if ($modulo!=NULL) {
        return $CI->load->view("$diretorio/$modulo", array('tela'=>$tela), TRUE);
    } else {
        return FALSE;
    }
    
}
//seta valores ao array $tema da classe sistema
function set_tema($prop, $valor, $replace=TRUE)
{
    $CI =& get_instance();
    $CI->load->library('sistema');
    if ($replace) {
          $CI->sistema->tema[$prop] = $valor;
      } else {
          if (!isset($CI->sistema->tema[$prop])) {
              $CI->sistema->tema[$prop] = '';
              $CI->sistema->tema[$prop] .= $valor;
          }
      }          
}

//retorna os valores do array da classe sistema
function get_tema()
{
    $CI =& get_instance();
    $CI->load->library('sistema');
    return $CI->sistema->tema;         
}

//inicializar o painel adm carregando os recursos necessários
function init_painel()
{
    $CI =& get_instance();
    $CI->load->library(array('parser','sistema', 'session', 'form_validation'));
    $CI->load->helper(array('form', 'url', 'array', 'text'));
    //carregamento dos models

    set_tema('titulo_padrao', 'Liberato');
    set_tema('rodape', '<p>&copy; 2015 | Todos os direitos reservados a Rodrigo Molina');
    set_tema('template', 'painel_view'); 

    set_tema('headerinc', load_css(array('foundation.min')), FALSE);       
}

//carrega um template passando o array tema como parametro
function load_template()
{
    $CI =& get_instance();
    $CI->load->library('sistema');
    $CI->parser->parse($CI->sistema->tema['template'], get_tema());    
}


//carrega um ou varios arquivos css de uma pasta
function load_css($arquivo=NULL, $pasta='css', $media='all')
{
  if ($arquivo!=NULL) {
    $CI =& get_instance();
    $CI->load->helper('url');
    $retorno = '';
    if (is_array($arquivo)) {
      foreach ($arquivo as $css) {
        $retorno .='<link rel="stylesheet" type="text/css" href="'.base_url("$pasta/$css.css").'" media="'.$media.'" />';
      }
    } else {
      $retorno .='<link rel="stylesheet" type="text/css" href="'.base_url("$pasta/$arquivo.css").'" media="'.$media.'" />';
    }
  }  
  return $retorno;    
}
