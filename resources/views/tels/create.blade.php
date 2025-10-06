<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Konfirmasi Pendaftaran TELS
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900">
                        Aturan Pendaftaran TELS
                    </h3>

                    <div class="mt-4 space-y-4 text-gray-600">
                        <p>
                            Dengan menekan tombol konfirmasi, Anda akan didaftarkan ke jadwal tes TELS untuk minggu ini.
                        </p>
                        <ul class="list-disc list-inside space-y-2">
                            <li>Kuota pendaftaran adalah <strong>50 orang per minggu</strong>.</li>
                            <li>25 pendaftar pertama akan dijadwalkan pada hari <strong>Senin</strong>.</li>
                            <li>25 pendaftar berikutnya akan dijadwalkan pada hari <strong>Rabu</strong>.</li>
                        </ul>
                        <p>
                            Pastikan Anda siap untuk mengikuti tes pada jadwal yang ditentukan.
                        </p>
                    </div>

                    <div class="mt-6">
                        {{-- Form ini akan mengirim request ke method store --}}
                        <form method="POST" action="{{ route('tels.register.store') }}">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 bg-green-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-800 focus:bg-green-800 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <i class="fas fa-check-circle mr-2"></i> Ya, Daftarkan Saya
                            </button>
                            <a href="{{ route('dashboard') }}"
                                class="ml-4 text-sm text-gray-600 hover:underline">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
