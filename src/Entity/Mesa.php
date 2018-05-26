<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Producto;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MesaRepository")
 */
class Mesa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @ORM\OneToMany(targetEntity="Comanda", mappedBy="mesa", cascade={"remove"})
     */
    private $comandas;

    /**
     * @ORM\Column(name="cuenta", type="decimal", scale=2)
     */
    private $cuenta;

    public function __construct()
    {
        $this->comandas = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getComandas()
    {
        return $this->comandas;
    }

    /**
     * @param mixed $comandas
     */
    public function setComandas($comandas)
    {
        $this->comandas = $comandas;
    }

    public function calculaPrecio()
    {
        $cuenta = 0;
        foreach($this->comandas as $comanda)
        {
            if($comanda->getEstado()=="Servido")
            {
                $cuenta = $cuenta + $comanda->calculaCuenta();
            }
        }
        $this->cuenta = $cuenta;
        return $cuenta;

    }


    /**
     * @param Comanda $comanda
     * @return $this
     */
    public function addComanda(\App\Entity\Comanda $comanda)
    {
        $this->comandas[] = $comanda;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * @param mixed $cuenta
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;
    }





}
