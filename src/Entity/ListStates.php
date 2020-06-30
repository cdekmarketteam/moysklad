<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

/**
 * Класс для получения списка статусов заказов
 */
class ListStates extends AbstractListEntity
{
    /**
     * @Type("array<MoySklad\Entity\State>")
     */
    public $states;
}
