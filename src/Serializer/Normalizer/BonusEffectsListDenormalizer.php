<?php

namespace App\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectDenormalizer;

class BonusEffectsListDenormalizer implements NormalizerInterface, CacheableSupportsMethodInterface
{
    private $denormalizer;

    public function __construct(ObjectDenormalizer $denormalizer)
    {
        $this->denormalizer = $denormalizer;
    }

    public function denormalize($object, $type, $format = null, array $context = array()): array
    {
        $data = $this->denormalizer->denormalize($object, $format, $context);

        // Here: add, edit, or delete some data

        return $data;
    }

    public function supportsDenormalization($data, $format = null): bool
    {
        return $data instanceof \App\Entity\BonusEffectsList;
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }
}
