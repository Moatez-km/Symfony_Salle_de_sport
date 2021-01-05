<?php


namespace SalleBundle\Controller;
use SalleBundle\Entity\Activiter;

use SalleBundle\Form\ActiviterForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ActiviterController  extends  Controller
{
    public function listAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $modeles = $em->getRepository('SalleBundle:Activiter')->findAll();
        return $this->render('@Salle/Activiter/listActiviter.html.twig', array('modeles' => $modeles));
    }

    public function addAction(Request $request)
    {
        $Activiter = new Activiter();
        $form = $this->createForm(ActiviterForm::class, $Activiter);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Activiter);
            $em->flush();
            return $this->redirect($this->generateUrl("salle_affichage_activiter"));
        }
        return $this->render('@Salle/Activiter/addActiviter.html.twig',array('Form'=>$form->createView()));
    }
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('SalleBundle:Activiter')->find($id);

        if ($modele != null) {
            $em->remove($modele);
            $em->flush();
        } else {
            throw new NotFoundHttpException("le modeled'id" . $id . "n'existe pas");

        }

        return $this->redirectToRoute("salle_affichage_activiter");


    }
    public function updateAction(Request $request,$id){
        $em= $this->getDoctrine()->getManager();
        $Abonner = $em->getRepository('SalleBundle:Activiter')->find($id);

        $editform = $this->createForm(ActiviterForm::class,$Abonner);
        $editform->handleRequest($request);
        if($editform->isSubmitted()&& $editform->isValid())
        {
            $em->persist($Abonner);
            $em->flush();
            return $this->redirect($this->generateUrl("salle_affichage_activiter"));
        }
        return $this->render('@Salle/Activiter/updateActiviter.html.twig',array('editForm'=>$editform->createView()));



    }

}