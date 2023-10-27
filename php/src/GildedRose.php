<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            switch (true) {
                case strpos($item->name, 'Conjured') === 0:
                    $item->sellIn -= 1;
                    $item->quality = max(0, $item->quality - ($item->sellIn < 0 ? 4 : 2));
                    break;

                case $item->name == 'Aged Brie':
                    $item->sellIn -= 1;
                    if ($item->quality < 50) {
                        $item->quality += $item->sellIn < 0 ? 2 : 1;
                    }
                    break;

                case $item->name == 'Sulfuras, Hand of Ragnaros':
                    break;

                case $item->name == 'Backstage passes to a TAFKAL80ETC concert':
                    $this->updateBackstagePasses($item);
                    break;

                default:
                    $item->sellIn -= 1;
                    $item->quality = max(0, $item->quality - ($item->sellIn < 0 ? 2 : 1));
                    break;
            }
        }
    }

    private function updateBackstagePasses(Item $item): void
    {
        $item->sellIn -= 1;
        if ($item->sellIn < 0) {
            $item->quality = 0;
        } elseif ($item->quality < 50) {
            $item->quality += 1;
            $item->quality += $item->sellIn < 11 ? 1 : 0;
            $item->quality += $item->sellIn < 6 ? 1 : 0;
            $item->quality = min(50, $item->quality);
        }
    }
}
