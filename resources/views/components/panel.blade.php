@props(['title'])

<section class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
    <div class="border-b border-slate-200 px-5 py-4">
        <h2 class="text-lg font-semibold text-slate-900">{{ $title }}</h2>
    </div>
    <div class="p-5">
        {{ $slot }}
    </div>
</section>
