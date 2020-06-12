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

use App\Entity\GlyphsList;
use App\Entity\Rarity;
use App\Entity\IngredientTypes;
use App\Entity\Characters;
use App\Entity\UpFeature;

class GlyphListCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:glyphs';
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
        $data = $serializer->decode(file_get_contents($this->container->get('kernel')->getProjectDir().'/src/Imports/gl.csv'), 'csv');

        foreach($data as $gl) {
            if (!empty($gl["name"])) {
                $glyph = new GlyphsList();

                $glyph->setName($gl['name']);
                var_dump($gl['name']);

                $glyph->setRarity($em->getRepository(Rarity::class)->findOneById($gl['rarity_id']));

                $glyph->setIngredientType($em->getRepository(IngredientTypes::class)->findOneById($gl['ingredient_type_id']));

                if(strcmp($gl["characters_id"], "NULL") !== 0) {
                    $glyph->setCharacters($em->getRepository(Characters::class)->findOneById($gl['characters_id']));
                }

                $glyph->setPrice((int)$gl['price']);
                $glyph->setIsunique($gl['isunique']);
                $glyph->setUsed($gl['used']);
                $glyph->setDescription($gl['description']);
                if(strcmp($gl["up_feature_id"], "NULL") !== 0 && !empty($gl["up_feature_id"])) 
                    {
                        $glyph->addUpFeature($em->getRepository(UpFeature::class)->findOneById($gl['up_feature_id']));
                    }
                $glyph->setBought($gl['bought']);
                $glyph->setSpecial($gl['special']);
                $glyph->setEvolSalary((int)$gl['Evol_salary']);
                $glyph->setEvolMaintenance((int)$gl['Evol_maintenance']);
                $glyph->setEvolStaff((int)$gl['Evol_staff']);

                $glyph->setEffect($gl['effect']);
                $glyph->setSupport($gl['support']);
                $glyph->setSupport2($gl['support_2']);
                $glyph->setSupport3($gl['support_3']);
                $glyph->setPersonalization($gl['personalization']);
               
                $em->persist($glyph);
                $em->flush();
            }
            

        }

        return 0;
    }
}