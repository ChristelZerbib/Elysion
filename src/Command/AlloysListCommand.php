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

use App\Entity\AlloysList;
use App\Entity\BonusEffectsList;


class AlloysListCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:alloys';
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
        $data = $serializer->decode(file_get_contents($this->container->get('kernel')->getProjectDir().'/src/Imports/al.csv'), 'csv');

        foreach($data as $al) {
 
            $alloy = new AlloysList();
            $alloy->setName($al['name']);
            $alloy->setIsunique($al['isunique']);
            $alloy->setDescription($al['description']);
            $price = 0;

            if(strcmp($al["bonus1_id"], "NULL") !== 0) {
                $bonus = $em->getRepository(BonusEffectsList::class)->findOneById($al['bonus1_id']);
                $alloy->setBonus1($bonus);
                $price += $bonus->getRank()->getPrice();
            }
            if(strcmp($al["bonus2_id"], "NULL") !== 0) {
                $bonus = $em->getRepository(BonusEffectsList::class)->findOneById($al['bonus2_id']);
                $alloy->setBonus2($bonus);
                $price += $bonus->getRank()->getPrice();
            }
            if(strcmp($al["bonus3_id"], "NULL") !== 0) {
                $bonus = $em->getRepository(BonusEffectsList::class)->findOneById($al['bonus3_id']);
                $alloy->setBonus3($bonus);
                $price += $bonus->getRank()->getPrice();
            }
            if(strcmp($al["bonus4_id"], "NULL") !== 0) {
                $bonus = $em->getRepository(BonusEffectsList::class)->findOneById($al['bonus4_id']);
                $alloy->setBonus4($bonus);
                $price += $bonus->getRank()->getPrice();
            }
            if(strcmp($al["malus1_id"], "NULL") !== 0) {
                $alloy->setMalus1($em->getRepository(BonusEffectsList::class)->findOneById($al['malus1_id']));
            }
            if(strcmp($al["malus2_id"], "NULL") !== 0) {
                $alloy->setMalus2($em->getRepository(BonusEffectsList::class)->findOneById($al['malus2_id']));
            }
            if(strcmp($al["malus3_id"], "NULL") !== 0) {
                $alloy->setMalus3($em->getRepository(BonusEffectsList::class)->findOneById($al['malus3_id']));
            }
            if(strcmp($al["effect1_id"], "NULL") !== 0) {
                $effect = $em->getRepository(BonusEffectsList::class)->findOneById($al['effect1_id']);
                $alloy->setEffect1($effect);
                $price += $effect->getRank()->getPrice();
            }
            if(strcmp($al["effect2_id"], "NULL") !== 0) {
                $effect = $em->getRepository(BonusEffectsList::class)->findOneById($al['effect2_id']);
                $alloy->setEffect2($effect);
                $price += $effect->getRank()->getPrice();
            }

            $alloy->setBought($al['bought']);
            $alloy->setUsed($al['used']);
            $alloy->setType($al['type']);
            $alloy->setSupport($al['support ']);
            $alloy->setSupport2($al['support_2']);
            $alloy->setSupport3($al['support_3']);
            $alloy->setPrice($price);
           
            $em->persist($alloy);
            $em->flush();

        }

        return 0;
    }
}