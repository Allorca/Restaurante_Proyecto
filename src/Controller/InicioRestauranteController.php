<?php
/**
 * Created by PhpStorm.
 * User: Alexis
 * Date: 19/04/2018
 * Time: 17:57
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InicioRestauranteController extends Controller
{
    public function indiceAction()
    {
        return $this->render('Restaurante/indice.html.twig');
    }

    public function cocinaAction()
    {
        return $this->render('Restaurante/cocinainicio.html.twig');
    }

    public function camareroAction()
    {
        return $this->render('Restaurante/camareroinicio.html.twig');
    }

    public function inicioAction()
    {
        return $this->render('Restaurante/inicio.html.twig');
    }
}