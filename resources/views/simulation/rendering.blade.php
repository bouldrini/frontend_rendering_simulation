@extends('layout.application')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2>Rendering Simulation</h2>
            <b>Erklärung:</b> Der Renderingaufwand für die View dieser Anwendung ist der gleiche, wie der der Gesamtanwendung (siehe Projektbeschreibung, Zusammenarbeit mit MySQL, Redis und ElasticSearch zur Anzeige von Suchergebnissen im Szenario WG Suchportal).
            Es soll durch einen Lasttest gezeigt werden, wie viele Frontendserver gebraucht werden um den Renderingaufwand garantiert innerhalb von gegebenen Zeiten zu bewältigen.

            Daten zur Anzeige werden in dieser Simulation statisch generiert. Keine externen Komponenten werden benutzt. Die Ladezeit der Anwendung hängt ausschließlich von der Renderingzeit des Webservers ab.
        </div>
    </div>
    <hr>
    <div class='row'>
        @for ($i = 0; $i <= 100; $i++)
            @include ("simulation.inserat", [
                    "id" => $i,
                    "inserat" => $dummydata
                ])
        @endfor
    </div>
@endsection