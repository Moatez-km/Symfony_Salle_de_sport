<?php


namespace SalleBundle\Controller;


use SalleBundle\Entity\User;
use SalleBundle\Form\RegistrationForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
//Inscription
    public function RegistrationAction(Request $request)
    {
        $user = new User();
        $passwordEncoder = $this->get('security.password_encoder');

        $form = $this->createForm(RegistrationForm::class,$user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $hash= $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $em = $this->getDoctrine()->getManager();
            $user->setRoles(["ROLE_USER"]);
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl("salle_affichage_user"));
        }

        return $this->render('@Salle/Connection/registration.html.twig',array(
            'Form' => $form->createView()
        ));
    }

    //Connexion
    public function LoginAction()
    {
        //init authentification symfony utility
        $authenticationUtils = $this->get('security.authentication_utils');
        //get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        //last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@Salle/Connection/login.html.twig',['lastUsername'=>$lastUsername,'error'=>$error]);
    }

    //Deconnexion
    public function LogoutAction()
    {
        return $this->render('@Salle/Connection/login.html.twig');

    }
}

