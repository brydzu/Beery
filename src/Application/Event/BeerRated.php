<?php

declare(strict_types=1);

namespace App\Application\Event;

use App\Domain\Model\Id;
use App\Domain\Model\Rate;
use Prooph\Common\Messaging\DomainEvent;
use Prooph\Common\Messaging\PayloadTrait;

final class BeerRated extends DomainEvent
{
    use PayloadTrait;

    private function __construct(array $payload)
    {
        $this->init();
        $this->setPayload($payload);
    }

    public static function occur(Id $connoisseurId, Id $beerId, Rate $rate): self
    {
        return new self([
            'connoisseur_id' => $connoisseurId->value(),
            'beer_id' => $beerId->value(),
            'rate' => $rate->value(),
        ]);
    }

    public function connoisseurId(): Id
    {
        return new Id($this->payload()['connoisseur_id']);
    }

    public function beerId(): Id
    {
        return new Id($this->payload()['beer_id']);
    }

    public function rate(): Rate
    {
        return new Rate($this->payload()['rate']);
    }
}