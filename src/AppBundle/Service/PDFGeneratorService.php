<?php

namespace AppBundle\Service;

use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PDFGeneratorService
 *
 * @package AppBundle\Service
 */
class PDFGeneratorService
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * ContractService constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $html
     * @param string $filename
     *
     * @return Response
     */
    public function generate($html, $filename)
    {
        return new Response(
            $this->container->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="'.$filename.'"',
            )
        );
    }
}