<div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden mb-5">
    <div class="px-5 py-3 border-b border-gray-100 flex items-center gap-2" style="background: linear-gradient(90deg, #f0fdf4, #ffffff);">
        <span class="w-1 h-4 rounded-full" style="background: #16a34a;"></span>
        <h3 class="text-sm font-semibold text-gray-700">{{ $title }}</h3>
    </div>
    <div class="p-5">
        {{ $slot }}
    </div>
</div>