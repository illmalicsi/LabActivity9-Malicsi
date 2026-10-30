@props(['title'])

<section class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
    <div class="border-b border-slate-200 px-4 py-4 sm:px-5">
        <h2 class="text-lg font-semibold text-slate-900">{{ $title }}</h2>
    </div>
    <div class="p-4 sm:p-5">
        {{ $slot }}
    </div>
</section>
