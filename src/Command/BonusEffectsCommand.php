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

use App\Entity\BonusEffectsList;
use App\Entity\Ranks;
use App\Entity\UpFeature;

class BonusEffectsCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:bonus-effects';
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
        $data = $serializer->decode(file_get_contents($this->container->get('kernel')->getProjectDir().'/src/Imports/bel.csv'), 'csv');

        foreach($data as $bel) {
            // $deserialized = $serializer->denormalize($bel, BonusEffectList::class);

            $bonusEffect = new BonusEffectsList();
            $bonusEffect->setName($bel['name']);
            $bonusEffect->setRank($em->getRepository(Ranks::class)->findOneById($bel['rank_id']));
            $bonusEffect->setIsunique($bel['isunique']);
            $bonusEffect->setIsRare($bel['israre']);
            $bonusEffect->setDescription($bel['description']);

            if(!empty($bel["up_feature_id"]) && strcmp($bel["up_feature_id"], "NULL") !== 0) {
                    $bonusEffect->addUpFeature($em->getRepository(UpFeature::class)->findOneById($bel['up_feature_id']));
                }

            if(strcmp($bel["add_glyphe_place"], "NULL") !== 0) {
                $bonusEffect->setAddGlyphPlace($bel['add_glyphe_place']);
            }
            $bonusEffect->setBought($bel['bought']);
            $bonusEffect->setSpecial($bel['special']);
            $bonusEffect->setEvolSalary((int)$bel['evol_salary']);
            $bonusEffect->setEvolMaintenance((int)$bel['evol_maintenance']);
            $bonusEffect->setEvolStaff((int)$bel['evol_staff']);
           
            $em->persist($bonusEffect);
            $em->flush();

        }

        return 0;
    }
}