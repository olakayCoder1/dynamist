@props([
    'count' => '123' ,
    'card_title' => 'Home' ,
])

<div class="flex flex-col rounded-md bg-white p-6 py-8 shadow-xl">
    <dt class="mb-2 text-3xl font-extrabold">{{ $count }}</dt>
    <dd class="text-gray-500 dark:text-gray-400">{{ $card_title }}</dd>
</div>