<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Imagem {

    protected $ci;

    public function __construct() {

        $this->ci = &get_instance();

        $this->ci->load->library('wideimage/WideImage', 'wideimage');
    }

    function redimensiona($origem, $largura = 800, $altura = 600, $tipo = 'inside') {

        $image = $this->ci->wideimage->load($origem);

        $resized = $image->resize($largura, $altura, $tipo);

        $resized->saveToFile($origem);
        
    }

    function cortar($origem, $largura = 800, $altura = 600) {

        $image = $this->ci->wideimage->load($origem);

        $cropped = $image->crop('center', 'center', $largura, $altura);

        $cropped->saveToFile($origem);
        
    }

    function thumb($origem, $destino, $largura, $altura, $cortar = FALSE) {

        if (!empty($origem) && !empty($destino)) {

            $image = $this->ci->wideimage->load($origem);

            if (!$cortar) {

                $resized = $image->resize($largura, $altura, 'inside');
            } else {

                $resized = $image->resize($largura, $altura, 'outside')->crop('center', 'center', $largura, $altura);
            }

            $array = explode("/", $origem);

            $retorno = $destino . '/' . array_pop($array);

            $resized->saveToFile($retorno);
            
            return $retorno;
        }
    }

    function watermark($origem, $marca) {

        $image = $this->ci->wideimage->load($origem);

        $watermark = $this->ci->wideimage->load($marca);

        $new = $image->merge($watermark, 'right -10', 'bottom -10', 100);

        $new->saveToFile($origem);
        
    }

}
