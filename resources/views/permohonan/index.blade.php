@extends('layouts.guest')

@section('slot')

    {{-- Form Tidak Mampu --}}
    <div id="form-tidak_mampu">
        @include('permohonan.partials.form-tidak-mampu')
    </div>

    {{-- Form Kematian --}}
    <div id="form-kematian" class="hidden">
        @include('permohonan.partials.form-kematian')
    </div>

    <script>
    function showForm(tipe) {
        document.getElementById('form-tidak_mampu').classList.add('hidden');
        document.getElementById('form-kematian').classList.add('hidden');

        const activeClass = 'w-full text-left flex items-center gap-3 px-4 py-2 rounded-lg bg-green-50 text-green-700 font-medium text-sm';
        const inactiveClass = 'w-full text-left flex items-center gap-3 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 font-medium text-sm transition';

        document.getElementById('btn-tidak_mampu').className = inactiveClass;
        document.getElementById('btn-kematian').className = inactiveClass;

        document.getElementById('form-' + tipe).classList.remove('hidden');
        document.getElementById('btn-' + tipe).className = activeClass;
    }
</script>

@endsection