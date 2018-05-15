<?php
/**
 * Created by PhpStorm.
 * User: Alexis
 * Date: 10/05/2018
 * Time: 18:41
 */

namespace App\Controller;
use App\Entity\Comanda;
use App\Entity\Producto;
use App\Entity\Mesa;
use App\Form\ComandaType;
use App\Form\ProductoType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class cuentaController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/cuenta", name="app_cuenta")
     */
    public function mostrarMesas()
    {
        return $this->render('mesascuenta.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/cuenta/mesa{numeromesa}", name="app_cuenta_mesa")
     */
    public function calcularCuenta(EntityManagerInterface $em, $numeromesa)
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository(Mesa::class);
        $mesa = $repository->find($numeromesa);
        $comandas = $mesa->getComandas();
        $cuentatotal = $mesa->calculaPrecio();

        return $this->render('cuenta.html.twig',
            ['comandas' => $comandas,
                'cuentatotal' => $cuentatotal]);
    }

}