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

use App\Entity\ObjectsList;
use App\Entity\ObjectLegend;
use App\Entity\Rarity;
use App\Entity\Characters;
use App\Entity\Boats;
use App\Entity\Titles;
use App\Entity\ObjectTypes;
use App\Entity\GlyphsList;
use App\Entity\AlloysList;


class ObjectListCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:objects';
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
        $data = $serializer->decode(file_get_contents($this->container->get('kernel')->getProjectDir().'/src/Imports/ol.csv'), 'csv');

        foreach($data as $ol) {
            if (!empty($ol["name"])) {
                $object = new ObjectsList();

                $object->setName($ol['name']);
                var_dump($ol['name']);

                $object->setDescription($ol['description']);

                $object->setComment($ol['comment']);

                $object->setShop($ol['shop']);
               
               $object->setBoat($em->getRepository(Boats::class)->findOneById($ol['boat_id']));

                $object->setRarity($em->getRepository(Rarity::class)->findOneById($ol['rarity_id']));

                if(strcmp($ol["character_id"], "NULL") !== 0) {
                    $object->setCharacters($em->getRepository(Characters::class)->findOneById($ol['character_id']));
                }

                if(strcmp($ol["title_id"], "NULL") !== 0) {
                    $object->setTitle($em->getRepository(Titles::class)->findOneById($ol['title_id']));
                }
                if(strcmp($ol["subtype_id"], "NULL") !== 0) {
                    $object->setSubtype($em->getRepository(ObjectTypes::class)->findOneById($ol['subtype_id']));
                }

                if(!empty($ol["glyphe1_id"])) {
                    $object->addGlyph($em->getRepository(GlyphsList::class)->findOneById($ol['glyphe1_id']));
                }

                if(!empty($ol["glyphe2_id"])) {
                    $object->addGlyph($em->getRepository(GlyphsList::class)->findOneById($ol['glyphe2_id']));
                }

                if(!empty($ol["glyph3_id"])) {
                    $object->addGlyph($em->getRepository(GlyphsList::class)->findOneById($ol['glyph3_id']));
                }

                if(!empty($ol["glyph4_id"])) {
                    $object->addGlyph($em->getRepository(GlyphsList::class)->findOneById($ol['glyph4_id']));
                }

                if(!empty($ol["glyph_sup1_id"])) {
                    $object->addGlyph($em->getRepository(GlyphsList::class)->findOneById($ol['glyph_sup1_id']));
                }

                if(!empty($ol["glyph_sup2_id"])) {
                    $object->addGlyph($em->getRepository(GlyphsList::class)->findOneById($ol['glyph_sup2_id']));
                } 

                if(strcmp($ol["alloy_id"], "NULL") !== 0) {
                    $object->setAlloy($em->getRepository(GlyphsList::class)->findOneById($ol['alloy_id']));
                }

                if(strcmp($ol["legend_id"], "NULL") !== 0) {
                    $object->setLegend($em->getRepository(ObjectLegend::class)->findOneById($ol['legend_id']));
                }

                // if(strcmp($ol["glyph_sup3_id"], "NULL") !== 0) {
                //     $object->setGlyphSup3($em->getRepository(GlyphsList::class)->findOneById($ol['glyph_sup3_id']));
                // }    

                // if(strcmp($ol["glyph_sup4_id"], "NULL") !== 0) {
                //     $object->setGlyphSup4($em->getRepository(GlyphsList::class)->findOneById($ol['glyph_sup4_id']));
                // }  

                // if(strcmp($ol["glyph_sup5_id"], "NULL") !== 0) {
                //     $object->setGlyphSup5($em->getRepository(GlyphsList::class)->findOneById($ol['glyph_sup5_id']));
                // }

                // if(strcmp($ol["glyph_sup6_id"], "NULL") !== 0) {
                //     $object->setGlyphSup6($em->getRepository(GlyphsList::class)->findOneById($ol['glyph_sup6_id']));
                // }       

                $object->setPrice((int)$ol['price']);
                
                if(strcmp($ol["max_number"], "NULL") !== 0 && !empty($ol["max_number"])) {
                    $object->setMaxNumber((int)$ol['max_number']);
                }

                $object->setPersonalization($ol['personalization']);
               
                $em->persist($object);
                $em->flush();
            }
            

        }

        return 0;
    }
}