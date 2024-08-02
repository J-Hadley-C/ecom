<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
   {
    return [
            IdField::new('id')->onlyOnDetail(),
            TextField::new('ref')->onlyOnDetail(),
            TextField::new('name'),
            MoneyField::new('price')
                ->setCurrency('EUR'),
            TextEditorField::new('description'),
            ImageField::new('image')
                ->setUploadedFileNamePattern('[contenthash].[extension]')
                ->setBasePath('images/products')
                ->setUploadDir('public/images/products'),
            AssociationField::new('category')
                ->setCrudController(CategoryCrudController::class),
        ];
  }
}