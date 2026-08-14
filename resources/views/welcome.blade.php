<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Minuman & Perangkat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-900 text-slate-100 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-xl w-full bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-sky-400 mb-2">Form Reservasi Minuman</h1>
            <p class="text-slate-400 text-sm">Isi detail di bawah ini untuk melakukan pemesanan minuman dan reservasi.
            </p>
        </div>

        @if (session('success'))
            <div
                class="bg-emerald-500/10 border border-emerald-500 text-emerald-400 px-4 py-3 rounded-xl mb-6 text-sm flex items-center gap-2">
                <span>✅</span>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-rose-500/10 border border-rose-500 text-rose-400 px-4 py-3 rounded-xl mb-6 text-sm">
                <p class="font-semibold mb-1">Terjadi kesalahan input:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reservations.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1 text-slate-300">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama Anda"
                    required
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-slate-100 focus:outline-none focus:border-sky-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-slate-300">Nomor WhatsApp</label>
                <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                    placeholder="Contoh: 08123456789" required
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-slate-100 focus:outline-none focus:border-sky-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-slate-300">Pesanan Minuman</label>
                <input type="text" name="order" value="{{ old('order') }}"
                    placeholder="Contoh: 2x Iced Matchatoki Latte, 1x Espresso" required
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-slate-100 focus:outline-none focus:border-sky-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-slate-300">Device / Meja</label>
                <input type="text" name="device" value="{{ old('device') }}"
                    placeholder="Contoh: Meja 04 / iPad Pro" required
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-slate-100 focus:outline-none focus:border-sky-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1 text-slate-300">Waktu Mulai</label>
                    <input type="datetime-local" name="start_date" value="{{ old('start_date') }}" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-slate-100 focus:outline-none focus:border-sky-500 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1 text-slate-300">Waktu Selesai</label>
                    <input type="datetime-local" name="end_date" value="{{ old('end_date') }}" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-slate-100 focus:outline-none focus:border-sky-500 text-sm">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-slate-300">Catatan Khusus (Opsional)</label>
                <textarea name="description" rows="3" placeholder="Contoh: Sugar 50%, Less Ice"
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-slate-100 focus:outline-none focus:border-sky-500">{{ old('description') }}</textarea>
            </div>

            <button type="submit"
                class="w-full bg-sky-500 hover:bg-sky-600 text-white font-semibold py-3 rounded-xl transition duration-200 shadow-lg shadow-sky-500/20">
                Kirim Reservasi Sekarang
            </button>
        </form>
    </div>

</body>

</html>
