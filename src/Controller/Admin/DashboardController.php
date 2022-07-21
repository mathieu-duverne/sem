<?php

namespace App\Controller\Admin;

use App\Entity\DataLocationT;
use App\Entity\InterfaceT;
use App\Entity\KpiT;
use App\Entity\KpiVersionT;
use App\Entity\ParameterT;
use App\Entity\PeopleT;
use App\Entity\ContactT;
use App\Entity\PerimeterT;
use App\Entity\PublishT;
use App\Entity\ReportT;
use App\Entity\UserRightT;
use App\Entity\UserT;
use App\Entity\WarningT;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
       
    }
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->adminUrlGenerator
                        ->setController(UserTCrudController::class)
                        ->generateUrl();

        return $this->redirect($adminUrlGenerator);

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('dashboard/base-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Test Project');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        // yield MenuItem::section('Data');
        // yield MenuItem::subMenu('Data', '')->setSubItems([
            yield MenuItem::linkToCrud('Data Location', '', DataLocationT::class);
            yield MenuItem::linkToCrud('KPI', '', KpiT::class);
            yield MenuItem::linkToCrud('KPI version', '', KpiVersionT::class);
            yield MenuItem::linkToCrud('Interface', '', InterfaceT::class);
            yield MenuItem::linkToCrud('Paramater', '', ParameterT::class);    
            
        // ]);

        // yield MenuItem::subMenu('Report', '')->setSubItems([
            yield MenuItem::linkToCrud('Report', '', ReportT::class);
            yield MenuItem::linkToCrud('Publish', '', PublishT::class);
        // ]);
        
        // yield MenuItem::subMenu('User manage', 'fas fa-user')->setSubItems([
            yield MenuItem::linkToCrud('Contact', '', ContactT::class);
            yield MenuItem::linkToCrud('People', '', PeopleT::class);
            yield MenuItem::linkToCrud('User right', '', UserRightT::class);
            yield MenuItem::linkToCrud('Perimeter', '', PerimeterT::class);
        // ]);
        // yield MenuItem::subMenu('Symfony User', '')->setSubItems([
            yield MenuItem::linkToCrud('User', '', UserT::class);
        // ]);

        yield MenuItem::linkToCrud('Warning', '', WarningT::class);
    }
}
