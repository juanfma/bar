<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 17/10/18
 * Time: 13:48
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class TapaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class)
            ->add('descripcion', CKEditorType::class)
            ->add('ingredientes', TextareaType::class)
            ->add('foto', FileType::class)
            ->add('top')
            ->add('grabar', SubmitType::class, array('label' => 'Crear tapa'));
    }
}