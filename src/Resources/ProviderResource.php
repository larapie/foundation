<?php

namespace Larapie\Core\Resources;

use Larapie\Core\Abstracts\ClassResource;
use Larapie\Core\Contracts\Scheduling;

class ProviderResource extends ClassResource
{
    public function hasSchedule()
    {
        return class_implements_interface($this->getFQN(), Scheduling::class);
    }

    public function toArray()
    {
        return array_merge(parent::toArray(), ['schedule' => $this->hasSchedule()]);
    }
}