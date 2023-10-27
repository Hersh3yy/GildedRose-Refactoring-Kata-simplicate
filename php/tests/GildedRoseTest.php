<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('foo', $items[0]->name);
    }

    public function testSomeItems(): void
    {
        $items = [
            new Item('+5 Dexterity Vest', 2, 12),
            new Item('Aged Brie', -6, 14),
            new Item('Elixir of the Mongoose', -3, 0),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 7, 31),
            new Item('Backstage passes to a TAFKAL80ETC concert', 2, 50),
            new Item('Backstage passes to a TAFKAL80ETC concert', -3, 0),
            new Item('Conjured Mana Cake', -5, 25)
        ];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertSame('+5 Dexterity Vest', $items[0]->name);
        $this->assertSame(1, $items[0]->sellIn);
        $this->assertSame(11, $items[0]->quality);

        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[3]->name);
        $this->assertSame(0, $items[3]->sellIn);
        $this->assertSame(80, $items[3]->quality);

        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[4]->name);
        $this->assertSame(-1, $items[4]->sellIn);
        $this->assertSame(80, $items[4]->quality);

        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[6]->name);
        $this->assertSame(1, $items[6]->sellIn);
        $this->assertSame(50, $items[6]->quality);

        $this->assertSame('Conjured Mana Cake', $items[8]->name);
        $this->assertSame(-6, $items[8]->sellIn);
        $this->assertSame(21, $items[8]->quality);
    }

    public function testDay15To16(): void
    {
        // Day 15 according to approvals
        $items = [
            new Item('+5 Dexterity Vest', -5, 0),
            new Item('Aged Brie', -13, 28),
            new Item('Elixir of the Mongoose', -10, 0),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 0, 50),
            new Item('Backstage passes to a TAFKAL80ETC concert', -5, 0),
            new Item('Backstage passes to a TAFKAL80ETC concert', -10, 0),
            new Item('Conjured Mana Cake', -12, 0),
        ];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        // assertions done according to day 16
        $this->assertSame('+5 Dexterity Vest', $items[0]->name);
        $this->assertSame(-6, $items[0]->sellIn);
        $this->assertSame(0, $items[0]->quality);

        $this->assertSame('Aged Brie', $items[1]->name);
        $this->assertSame(-14, $items[1]->sellIn);
        $this->assertSame(30, $items[1]->quality);

        $this->assertSame('Elixir of the Mongoose', $items[2]->name);
        $this->assertSame(-11, $items[2]->sellIn);
        $this->assertSame(0, $items[2]->quality);

        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[3]->name);
        $this->assertSame(0, $items[3]->sellIn);
        $this->assertSame(80, $items[3]->quality);

        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[4]->name);
        $this->assertSame(-1, $items[4]->sellIn);
        $this->assertSame(80, $items[4]->quality);

        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[5]->name);
        $this->assertSame(-1, $items[5]->sellIn);
        $this->assertSame(0, $items[5]->quality);

        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[6]->name);
        $this->assertSame(-6, $items[6]->sellIn);
        $this->assertSame(0, $items[6]->quality);

        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[7]->name);
        $this->assertSame(-11, $items[7]->sellIn);
        $this->assertSame(0, $items[7]->quality);

        $this->assertSame('Conjured Mana Cake', $items[8]->name);
        $this->assertSame(-13, $items[8]->sellIn);
        $this->assertSame(0, $items[8]->quality);
    }
}
