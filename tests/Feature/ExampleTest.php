<?php

use Filament\Facades\Filament;
use Tests\TestCase;

use function Pest\Livewire\livewire;

uses(TestCase::class)->group('webshop');

beforeEach(fn () => Filament::setCurrentPanel(Filament::getPanel('admin')));

it('can render filament resource create pages', function () {
    collect(Filament::getResources())
        ->filter(fn (string $resourceClass) => $resourceClass::hasPage('create'))
        ->each(function (string $resourceClass) {
            $this->get($resourceClass::getUrl('create'))->assertSuccessful();
            $modelClass = $resourceClass::getModel();
            $newData = $modelClass::factory()->make();

            $attributes = $newData->attributesToArray();

            $attributes['orderProducts'][] = ['product_id' => 1, 'quantity' => 1];

            // This will fail because the fields in the repeater
            // are not filled
            livewire($resourceClass::getPages()['create']->getPage())
                ->fillForm($attributes)
                ->call('create')->assertHasNoFormErrors();

            $this->assertDatabaseHas($modelClass, $newData->attributesToArray());
        });
});
