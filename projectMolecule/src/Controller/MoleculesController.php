<?php

namespace App\Controller;

use App\Entity\Molecule;
use App\Repository\MoleculeFileRepository;
use App\Repository\MoleculeRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Flex\Response;

class MoleculesController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function home(MoleculeRepository $moleculeRepository)
    {
        $molecules = $moleculeRepository->findAll();
        return $this->render('home/welcome.html.twig', compact('molecules'));
    }

    /**
     * @Route("/molecules/{id}", name="molecules_name")
     */
    public function show($id, MoleculeRepository $moleculeRepository, MoleculeFileRepository $fileRepository)
    {
        $molecule = $moleculeRepository->find($id);
        $file = $fileRepository->find($id);

        $tab = array(
            'molecule'=>$molecule,
            'file'=>$file,
        );
        return $this->render('molecules/molecule.html.twig', $tab);
    }

    public function navbar( MoleculeRepository $moleculeRepository){
        $molecules = $moleculeRepository->findAll();

        return $this->render('inc/navbar.html.twig', compact('molecules'));
    }
}


