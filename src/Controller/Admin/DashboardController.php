<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
        ){
        }


    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(UserCrudController::class)
            ->generateUrl();
        return $this->redirect($url);
        // Option 1. You can make your dashboard redirect to some common page of your backend

        //$adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);


        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function Dashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('LimayHub');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Acceuil', 'fa fa-home','home');
        yield MenuItem::linkToRoute("Ajout d'utilisateur", 'fa fa-user','register');
        yield MenuItem::linkToCrud("Gestion des Utilisateurs", 'fas fa-list', User::class);
    }
}
