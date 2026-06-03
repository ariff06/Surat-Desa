<div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg mb-6 text-sm">
    <p class="font-semibold mb-2">Mohon periksa kembali isian berikut:</p>
    <ul class="space-y-1">
        @foreach ($errors->all() as $error)
            <li class="flex items-start gap-2">
                <span class="mt-0.5">•</span>
                <span>{{ $error }}</span>
            </li>
        @endforeach
    </ul>
</div>