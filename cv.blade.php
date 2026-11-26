<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile['name'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .font-serif-ed { font-family: 'Fraunces', Georgia, serif; }
        .font-sans-ed { font-family: 'Inter', system-ui, sans-serif; }
        @media print {
            .no-print { display: none !important; }
            body { background: #fff !important; }
        }
    </style>
</head>
<body class="font-sans-ed bg-[#FBF8F3] text-[#18181B] antialiased">

    <div class="max-w-6xl mx-auto px-5 sm:px-8 py-8 sm:py-12">

        <!-- Top Bar Editorial -->
        <div class="flex flex-wrap items-center justify-between gap-3 pb-4 border-b-2 border-[#18181B] text-xs uppercase tracking-widest">
            <div class="flex items-center gap-3">
                <span class="font-bold text-[#B91C1C]">{{ strtoupper($profile['callname']) }} ISSUE</span>
                <span class="text-zinc-400">/</span>
                <span class="text-zinc-600">{{ $profile['city'] }}</span>
            </div>
            <div class="flex items-center gap-4 no-print">
                <a href="#work" class="hover:text-[#B91C1C] font-medium">Pengalaman & Karya</a>
                <button onclick="window.print()" class="px-3 py-1.5 bg-[#18181B] text-[#FBF8F3] hover:bg-[#B91C1C] transition font-semibold cursor-pointer">
                    Save PDF
                </button>
            </div>
        </div>

        <!-- Judul Utama & Ringkasan -->
        <header class="py-8 sm:py-10 border-b border-zinc-300">
            <p class="text-xs sm:text-sm font-semibold text-[#B91C1C] mb-2">
                {{ $profile['tagline'] }}
            </p>
            <h1 class="font-serif-ed text-4xl sm:text-6xl font-bold tracking-tight leading-[1.08] text-[#18181B] max-w-4xl">
                {{ $profile['name'] }}
            </h1>
            <p class="mt-5 text-base sm:text-lg text-zinc-700 leading-relaxed max-w-3xl">
                {{ $profile['bio'] }}
            </p>
            <div class="mt-5 inline-block border-l-4 border-[#B91C1C] pl-3.5 py-1 text-xs sm:text-sm font-medium text-zinc-800 bg-white/60">
                {{ $profile['open_for'] }}
            </div>
        </header>

        <!-- Layout 2 Kolom Asimetris -->
        <div id="work" class="mt-10 grid grid-cols-1 lg:grid-cols-12 gap-10">

            <!-- Kolom Kiri (7/12): Pengalaman & Proyek -->
            <div class="lg:col-span-7 space-y-11">

                <!-- Pengalaman -->
                <section>
                    <div class="flex items-baseline justify-between border-b border-zinc-300 pb-2 mb-6">
                        <h2 class="font-serif-ed text-2xl font-bold text-[#18181B]">Pengalaman</h2>
                        <span class="text-xs text-zinc-500">Organisasi · Acara · Konten</span>
                    </div>

                    <div class="divide-y divide-zinc-200">
                        @foreach ($experiences as $exp)
                            <div class="py-4 first:pt-0">
                                <div class="flex flex-wrap items-baseline justify-between gap-2">
                                    <h3 class="font-bold text-base text-[#18181B]">{{ $exp['role'] }}</h3>
                                    <span class="text-xs font-semibold text-[#B91C1C]">{{ $exp['year'] }}</span>
                                </div>
                                <p class="text-xs font-medium text-zinc-500 mt-0.5">{{ $exp['place'] }}</p>
                                <p class="text-sm text-zinc-700 mt-2 leading-relaxed">{{ $exp['note'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>

                <!-- Karya -->
                <section>
                    <div class="flex items-baseline justify-between border-b border-zinc-300 pb-2 mb-6">
                        <h2 class="font-serif-ed text-2xl font-bold text-[#18181B]">Karya & Proyek</h2>
                        <span class="text-xs text-zinc-500">3D · VR · Game · Web</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        @foreach ($projects as $prj)
                            <div class="bg-white border border-zinc-200 p-5">
                                <p class="text-[11px] font-semibold uppercase tracking-wider text-[#B91C1C]">
                                    {{ $prj['meta'] }}
                                </p>
                                <h3 class="font-serif-ed text-lg font-bold text-[#18181B] mt-1">
                                    {{ $prj['title'] }}
                                </h3>
                                <p class="text-sm text-zinc-600 mt-2 leading-relaxed">
                                    {{ $prj['desc'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </section>

            </div>

            <!-- Kolom Kanan (5/12): Pendidikan, Keahlian & Kontak -->
            <aside class="lg:col-span-5 space-y-8">

                <!-- Pendidikan -->
                <div class="bg-[#18181B] text-[#FBF8F3] p-6">
                    <p class="text-[11px] uppercase tracking-widest text-amber-300 font-semibold">Pendidikan</p>
                    <h2 class="font-serif-ed text-xl font-bold mt-1">{{ $education['program'] }}</h2>
                    <p class="text-sm text-zinc-300 mt-1">{{ $education['campus'] }}</p>
                    <p class="text-xs text-zinc-400 mt-3 pt-3 border-t border-zinc-700">{{ $education['nim'] }}</p>
                </div>

                <!-- Keahlian -->
                <div class="bg-white border border-zinc-200 p-6 space-y-5">
                    <h2 class="font-serif-ed text-xl font-bold text-[#18181B] border-b border-zinc-200 pb-2">
                        Tools & Kemampuan
                    </h2>

                    @foreach ($skills as $group => $list)
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-zinc-500 mb-2">{{ $group }}</h3>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach ($list as $item)
                                    <span class="px-2.5 py-1 text-xs font-medium bg-[#FBF8F3] border border-zinc-300 text-zinc-800">
                                        {{ $item }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Kontak -->
                <div class="border-t-2 border-[#18181B] pt-4 text-sm space-y-1.5">
                    <p class="text-xs font-bold uppercase tracking-widest text-[#B91C1C]">Kontak</p>
                    <p class="text-zinc-800">Email: <span class="font-medium">{{ $profile['email'] }}</span></p>
                    <p class="text-zinc-800">Instagram: <span class="font-medium">{{ $profile['ig'] }}</span></p>
                    <p class="text-zinc-800">TikTok: <span class="font-medium">{{ $profile['tiktok'] }}</span></p>
                </div>

            </aside>

        </div>

    </div>

</body>
</html>