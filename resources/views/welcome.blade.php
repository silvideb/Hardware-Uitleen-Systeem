<x-base-layout title="Hardware Uitleen">
    <div class="max-w-5xl mx-auto py-12">
        <h1 class="text-4xl font-bold mb-6">Welkom bij Hardware Uitleen</h1>
        <p class="mb-8 text-lg text-gray-700">Snel en betrouwbaar IT-apparatuur lenen voor school, bedrijf of project. Onze hardware is up-to-date, goed onderhouden en beschikbaar voor short-term en long-term verhuur.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 bg-white shadow rounded-lg">
                <h2 class="text-2xl font-semibold mb-3">Beschikbare categorieën</h2>
                <ul class="space-y-2 text-gray-600">
                    <li>🖥️ Laptops</li>
                    <li>🖨️ Printers & scanners</li>
                    <li>🔌 Kabels & adapters</li>
                    <li>🛠️ Gereedschap voor installatie</li>
                </ul>
            </div>

            <div class="p-6 bg-white shadow rounded-lg">
                <h2 class="text-2xl font-semibold mb-3">Hoe werkt het?</h2>
                <ol class="list-decimal list-inside text-gray-600 space-y-2">
                    <li>Maak een account aan of log in.</li>
                    <li>Kies je hardware uit de voorraad.</li>
                    <li>Dien een leningaanvraag in.</li>
                    <li>Beheer je uitleningen via het dashboard.</li>
                </ol>
            </div>
        </div>

        <div class="mt-8">
            @auth
                <a href="{{ route('loans.index') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Naar leningen</a>
            @else
                <a href="{{ route('login') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Inloggen / Account aanmaken</a>
            @endauth
        </div>

        <div class="mt-12 p-6 bg-white rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-2">Onze service</h3>
            <p class="text-gray-600 mb-1">- Snelle beoordeling van je aanvraag</p>
            <p class="text-gray-600 mb-1">- Voorzien van onderhoud en support</p>
            <p class="text-gray-600">- Transparante huurtarieven zonder onverwachte kosten</p>
        </div>
    </div>
</x-base-layout>