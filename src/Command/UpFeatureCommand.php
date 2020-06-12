<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Entity\UpFeature;
use App\Entity\FeatureTypes;


class UpFeatureCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:up-feature';
    private $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        parent::__construct();
    }

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->container->get('doctrine')->getManager();
        $serializer = new Serializer([new GetSetMethodNormalizer(), new ArrayDenormalizer()], [new CsvEncoder()]);
        $data = $serializer->decode(file_get_contents($this->container->get('kernel')->getProjectDir().'/src/Imports/uf.csv'), 'csv');

        foreach($data as $uf) {
           

            $upFeature = new UpFeature();
            $upFeature->setFeature($em->getRepository(FeatureTypes::class)->findOneById($uf['feature_id']));
            $upFeature->setUpQuantity($uf['up_quantity']);
            $upFeature->setTemporary($uf['temporary']);
            $em->persist($upFeature);
            $em->flush();

        }

        return 0;
    }
}