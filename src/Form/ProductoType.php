<?php
/**
 * Created by PhpStorm.
 * User: Alexis
 * Date: 25/04/2018
 * Time: 17:45
 */

namespace App\Form;

use App\Entity\Producto;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, ['error_bubbling' => true])
            ->add('precio', TextType::class, ['error_bubbling' => true]) /*El error building es para tratar los errores de los campos como errores del fomrulario.*/
            ->add('tipo', TextType::class, ['error_bubbling' => true])
            ->add('descripcion', TextType::class, ['error_bubbling' => true])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Producto::class,
        ));
    }
}