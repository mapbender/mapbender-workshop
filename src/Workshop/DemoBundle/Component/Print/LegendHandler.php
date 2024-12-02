<?php
    namespace Workshop\DemoBundle\Component\Print;

use Mapbender\PrintBundle\Component\TemplateRegion;

class LegendHandler extends \Mapbender\PrintBundle\Component\LegendHandler
{

    public function __construct(
        #[Autowire(service: 'mapbender.imageexport.image_transport.service')] $imageTransport,
        #[Autowire('mapbender.print.resource_dir')] string                                   $resourceDir,
        #[Autowire('mapbender.print.temp_dir')] ?string                                      $tmpDir,
        #[Autowire('mapbender.print.canvas_legend.class')] ?string                           $canvasLegendClass
    )
    {
        parent::__construct($imageTransport, $resourceDir, $tmpDir, $canvasLegendClass);
        $this->dynamicColumnSizes = true;
        $this->dynamicColumnWidths = true;
    }

    protected function getMargins(TemplateRegion $region): array
    {
        return [
            ...parent::getMargins($region),
            'title_to_image' => 2, //mm
        ];
    }
}
