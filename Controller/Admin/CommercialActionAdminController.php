<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18/06/17
 * Time: 21:59
 */

namespace Miky\Bundle\CommercialBundle\Controller\Admin;


use FOS\RestBundle\View\View;
use Miky\Bundle\AdminBundle\Controller\AdminController;
use Miky\Component\Resource\ResourceActions;
use Symfony\Component\HttpFoundation\Request;

class CommercialActionAdminController extends AdminController
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function timelineAction(Request $request)
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $this->isGrantedOr403($configuration, ResourceActions::INDEX);
        $resources = $this->resourcesCollectionProvider->get($configuration, $this->repository);

        $view = View::create($resources);

        if ($configuration->isHtmlRequest()) {
            $view
                ->setTemplate("MikyCommercialBundle:Admin/CommercialAction:timeline.html.twig")
                ->setTemplateVar($this->metadata->getPluralName())
                ->setData([
                    'configuration' => $configuration,
                    'metadata' => $this->metadata,
                    'resources' => $resources,
                    $this->metadata->getPluralName() => $resources,
                ]);
        }

        return $this->viewHandler->handle($configuration, $view);
    }

}