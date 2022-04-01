<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <script src="https://cdn.tailwindcss.com/?plugins=forms"></script>
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.0/dist/flowbite.min.css" />
        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

        <link
        rel="stylesheet"
        media="screen"
        href="https://cdnjs.cloudflare.com/ajax/libs/openlayers/4.6.5/ol.css"
        id="cm-theme"
        />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/openlayers/4.6.5/ol.js"></script>
        <script src="https://kit.fontawesome.com/2ce8604ad9.js" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        @livewireChartsScripts

        <script>

        Livewire.on("updatePoints", (coord) => {
            document.getElementById("map").innerText = "";

            var collection = [];
            var places = [];

            coord.forEach(element_atual => {

                collection.push(new ol.Feature({
                    geometry: new ol.geom.Point(
                        ol.proj.fromLonLat([parseFloat(element_atual['lon']), parseFloat(element_atual['lat'])])
                    ),
                }));

                places.push([
                    parseFloat(element_atual['lon']),
                    parseFloat(element_atual['lat']),
                    "http://maps.google.com/mapfiles/ms/micons/blue.png",
                ]);

            });

            var vectorSource = new ol.source.Vector({
                features: collection,
            });

            var features = [];
            for (var i = 0; i < places.length; i++) {

                var iconFeature = new ol.Feature({
                    geometry: new ol.geom.Point(
                    ol.proj.transform(
                        [places[i][0], places[i][1]],
                        "EPSG:4326",
                        "EPSG:3857"
                    )
                    ),
                });

                var iconStyle = new ol.style.Style({
                    image: new ol.style.Icon({
                    src: places[i][2],
                    color: places[i][3],
                    crossOrigin: "anonymous",
                    }),
                });
                iconFeature.setStyle(iconStyle);
                vectorSource.addFeature(iconFeature);
            }

            var vectorLayer = new ol.layer.Vector({
                source: vectorSource,
                updateWhileAnimating: true,
                updateWhileInteracting: true,
            });

            var Foco = ol.proj.fromLonLat([parseFloat(coord[0]['lon']), parseFloat(coord[0]['lat'])]);

            var view = new ol.View({
                center: Foco,
                zoom: 5, // 5
            });

            var map = new ol.Map({
                target: "map",
                view: view,
                layers: [
                    new ol.layer.Tile({
                    preload: 3,
                    source: new ol.source.OSM(),
                    }),
                    vectorLayer,
                ],
                loadTilesWhileAnimating: true,
            });

        });
        </script>

        <style>
        /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        </style>
        <script>

        </script>
    </body>
</html>
