<x-layout title="編集">
    <x-layout.single>
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">Illustration</h2>
        <h2 class="text-center text-2xl font-bold mt-8 mb-8">
            登録内容の編集
        </h2>

    @php
        $breadcrumbs = [
            ['href' => route('artist.index'), 'label' => 'TOP'],
            ['href' => '#', 'label' => '編集']
    ];
    @endphp
    <x-element.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-element.breadcrumbs>
        <x-artist.form.put :artist="$artist"></x-artist.form.put>
    </x-layout.single>
</x-layout>