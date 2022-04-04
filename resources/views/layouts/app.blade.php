<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Rebrax Assessoria Empresarial') }}</title>

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
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
    </head>
    <body class="font-sans antialiased">
        <a href="https://api.whatsapp.com/send?phone=553884096996&text=Olá" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>

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
                zoom: 7, // 5
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
        /* button wathsapp */
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
        font-size:30px;
            box-shadow: 2px 2px 3px #999;
        z-index:100;
        }

        .my-float{
            margin-top:16px;
        }

        /* ajuste paleta */
        .bg-blue-700 {
            background-color: #2c0f07 !important;
        }

       .focus\:ring-4:focus {
            --tw-ring-shadow: rgb(64 6 28 / 45%) !important;
        }

        .border-indigo-400 {
            border-color: rgb(64 6 28 / 1) !important;
        }
        .bg-indigo-600 {
            background-color: rgb(64 6 28 / 1) !important;
        }
        .hover\:bg-blue-700:hover {
            background-color: rgb(64 6 28 / 1) !important;
        }

        </style>
    </body>
</html>
