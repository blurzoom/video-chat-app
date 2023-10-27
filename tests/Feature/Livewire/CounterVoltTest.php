<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('counter_volt');

    $component->assertSee('');
});
