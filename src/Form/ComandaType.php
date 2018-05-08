<?php
/**
 * Created by PhpStorm.
 * User: Alexis
 * Date: 25/04/2018
 * Time: 17:44
 */
namespace App\Form;
use App\Entity\Comanda;
use App\Entity\Producto;
use App\Repository\ProductoRepository;

use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\ChoiceList\Factory\ChoiceListFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComandaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mesa', IntegerType::class, array('label'=> 'Num. Mesa:', 'error_bubbling'=>true))
            ->add('camarero', TextType::class, array('label'=>'Camarero: ', 'error_bubbling'=>true))
            ->add('productos', EntityType::class, array(
                'label'         => 'Hamburguesas',
                'class'         => Producto::class,
                'query_builder' => function(ProductoRepository $repo1){
                    return $repo1->createQueryBuilder('p')->where('p.tipo = :tipo')
                        ->setParameter('tipo', '1');
                }))
            ->add('productos', EntityType::class, array(
                'label'         => 'Acompañamiento',
                'class'         => Producto::class,
                'query_builder' => function(ProductoRepository $repo2){
                    return $repo2->createQueryBuilder('p')->where('p.tipo = :tipo')
                        ->setParameter('tipo', '2');
                }))
            ->add('productos', EntityType::class, array(
                'label'         => 'Bebida',
                'class'         => Producto::class,
                'query_builder' => function(ProductoRepository $repo3){
                    return $repo3->createQueryBuilder('p')->where('p.tipo = :tipo')
                        ->setParameter('tipo', '3');
                }))
            ->add('save', SubmitType::class, array('label' => 'añadir'))
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Comanda::class,
        ));
    }

}