<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Infrastructure\ReadModel\View\BeerView;

interface BeerViews
{
    public function add(BeerView $beerView): void;

    public function getAll(): array;
}