<?php

use function Livewire\Volt\{state};

state(['count' => 0]);

$increment = fn() => $this->count++;

?>

<div>
    <h1 class="mx-2 flex items-center justify-center font-bold">
        {{ $count }}
    </h1>
    <button
        class="mx-2 flex h-8 w-24 items-center justify-center rounded bg-green-600 text-white shadow transition-all hover:bg-green-500"
        wire:click="increment"
    >
        <span class="material-icons">add</span>
    </button>
</div>
