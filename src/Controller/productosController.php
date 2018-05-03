<?php
/**
 * Created by PhpStorm.
 * User: Alexis
 * Date: 25/04/2018
 * Time: 17:58
 */

namespace App\Controller;
use App\Entity\Producto;
use App\Form\ProductoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class productosController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/productos", name="app_producto")
     */
    public function indice()
    {
        return $this->render('producto.html.twig');
    }

    /**
     *@return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/productos/formulario", name="app_form_producto")
     */
    public function crearAccion()
    {
        $action = $this->generateUrl('app_producto_creando');
        $product = new Producto();
        $form = $this->createForm(ProductoType::class, $product);

        return $this->render('crearproducto.html.twig',
            ['action' => $action,
                'form' => $form->createView()]
        );
    }

    /**
     *@return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/productos/crear", name="app_producto_creando")
     */
    public function hacerCrearAccion(EntityManagerInterface $em, Request $request)
    {
        $producto = new Producto();
        $formulario = $this->createForm(ProductoType::class, $producto);
        $formulario->handleRequest($request);
        if ($formulario->isValid()) {
            $em->persist($producto);
            $em->flush();
            return $this->redirectToRoute('app_producto');
        }
    }

    /**
     *@return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/productos/listar", name="app_producto_listar")
     */
    public function hacerListarAccion(EntityManagerInterface $em)
    {
        $productoRepo = $em->getRepository('App\Entity\Producto');
        $productos = $productoRepo->findAll();
        return $this->render('listarproductos.html.twig',
            ['productos'=>$productos]
        );

    }
}