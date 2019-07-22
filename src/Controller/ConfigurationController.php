<?php

namespace App\Controller;

use App\Entity\Configuration;
use App\Traits\RepositoryAwareTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ConfigurationController extends AbstractController
{
    use RepositoryAwareTrait;

    /**
     * @Route("/configuration", name="configuration_procedure")
     */
    public function listAction(Request $request)
    {
        $configurations = $this->getDoctrine()->getRepository(Configuration::class);
        $speed = $configurations->findOneBy(['key' => 'speed']);
        $angle = $configurations->findOneBy(['key' => 'angle']);
        $sensorParametr1 = $configurations->findOneBy(['key' => 'sensor_parametr_1']);
        $sensorParametr2 = $configurations->findOneBy(['key' => 'sensor_parametr_2']);
        $sensorParametr3 = $configurations->findOneBy(['key' => 'sensor_parametr_3']);

        return $this->render('config/list.html.twig', [
            'speed' => $speed,
            'angle' => $angle,
            'sensorParametr1' => $sensorParametr1,
            'sensorParametr2' => $sensorParametr2,
            'sensorParametr3' => $sensorParametr3
        ]);
    }

    /**
     * @Route("/configuration/save-configuration", name="save_configuration")
     */
    public function saveConfiguration(Request $request)
    {
        $configuration = $request->get('configuration');

        if ($request->get('action') == 'save') {

            foreach ($configuration as $key => $val) {
                /** @var Configuration $config */
                $config = $this->getConfigurationRepository()->findOneBy(['key' => $key]);

                $config->setValue($val);
                $this->getEm()->persist($config);
            }

        } elseif ($request->get('action') == 'reset') {

            foreach ($configuration as $key => $val) {
                /** @var Configuration $config */
                $config = $this->getConfigurationRepository()->findOneBy(['key' => $key]);

                $config->setValue(0);
                $this->getEm()->persist($config);
            }

        }

        $this->getEm()->flush();

        return $this->redirect($request->headers->get('referer'));
    }
}