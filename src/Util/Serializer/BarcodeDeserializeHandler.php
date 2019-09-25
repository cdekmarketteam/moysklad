<?php

namespace MoySklad\Util\Serializer;

use JMS\Serializer\Serializer;
use MoySklad\Entity\Barcode;
use MoySklad\Entity\Meta;

class BarcodeDeserializeHandler
{
    /**
     * @param $visitor
     * @param array $barcode
     * @param array $type
     * @return array|mixed
     */
    public function __invoke($visitor, array $barcode, array $type)
    {
        foreach ($barcode as $key => $value) {
            $barcode = new Barcode();
            $barcode->type = $key;
            $barcode->value = $value;
        }

        return $barcode;
    }
}
