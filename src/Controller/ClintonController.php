<?php

namespace App\Controller;

use App\Entity\Clinton;
use App\Form\ClintonType;
use App\Repository\ClintonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Undocumented class
 */
class ClintonController extends AbstractController
{
    #[Route('/clinton', name: 'app_clinton', methods : ['GET','POST'])]
    public function index(ClintonRepository $repository,
    EntityManagerInterface $manager,
    request $request
    ): Response
    {   
        $clintonn = $repository->findAll();
        //$clintonn = $repository->findBy([],['createAt'=> 'DESC']);

        //essay
        $clinton = new Clinton();
        $form = $this->createForm(ClintonType::class, $clinton);
        $form->handleRequest($request);
         if($form->isSubmitted() && $form->isValid()){
           $clinton = $form->getData();
           $manager->persist($clinton);
           $manager->flush();
           $this->addFlash(
            'succes',
            'enregistrement effectuer avec succes!'
        );
          return $this->redirectToRoute('app_clinton');
         }

        //fin
        //dd($clinton);
        return $this->render('clinton/index.html.twig', [
            'clinton' =>$clintonn,
            'form' => $form->createView()
            
        ]);
    }

    #[Route('/clinton/new', name: 'app_clintonNew', methods : ['GET','POST'])]
   /* public function new(request $request,
    //EntityManagerInterface $manager
   // ) : Response
    {
        $clinton = new Clinton();
        $form = $this->createForm(ClintonType::class, $clinton);
        $form->handleRequest($request);
         if($form->isSubmitted() && $form->isValid()){
           $clinton = $form->getData();
           $manager->persist($clinton);
           $manager->flush();
           $this->addFlash(
            'succes',
            'enregistrement effectuer avec succes!'
        );
          return $this->redirectToRoute('app_clinton');
         }
        return $this->render('clinton/new.html.twig', [
            'form' => $form->createView()
        ]);
        
    }*/

    #[Route('/clinton/update/{id}', name: 'app_clintonUp', methods : ['GET','POST'])]
        public function edit(Clinton $clinton,
        EntityManagerInterface $manager,
        request $request
        ) : Response 
            {   
                //$clinton = $repository->findOneBy(["id" => $id]);
                $form = $this->createForm(ClintonType::class, $clinton);
                $form->handleRequest($request);
                if($form->isSubmitted() && $form->isValid()){
                  $clinton = $form->getData();
                  $manager->persist($clinton);
                  $manager->flush();
                  $this->addFlash(
                   'succes',
                   'modiffication  effectuer avec succes!'
               );
               return $this->redirectToRoute('app_clinton');
            }
               
                return  $this->render('form2.html.twig',[
                    'form' => $form->createView()
                ]);
            }  
            
    #[Route('/clinton/delete/{id}', name: 'app_clintonDel', methods : ['GET','POST'])]
         public function delete(Clinton $clinton,
         EntityManagerInterface $manager
          ) : Response 
            {
                $manager->remove($clinton);
                $manager->flush();
                $this->addFlash(
                    'succes',
                    'suppression effectuer avec succes!'
                );
                return $this->redirectToRoute('app_clinton');
            }

}
