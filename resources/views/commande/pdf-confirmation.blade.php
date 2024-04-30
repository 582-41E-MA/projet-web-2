<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Véhicules D*Occasion</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .page-panier {
            padding: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        .photo {
            width: 150px;
        }
        
    </style>
</head>
<body>
    <main class="page-panier">
        <div class="nom-page">
            @if ($commande->statut_id == 3)
                <h1>Confirmation</h1>
            @else
                <h1>Reservation</h1>
            @endif
        </div>
        <table class="liste-panier">
        @foreach($voitures as $voiture)
            <tr>
                <td class="photo-container">
                    <img class="photo" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/img/voitures/'.$voiture['photo'] )))}}" >
                </td>
                <td>
                    <h3>{{$voiture['annee']}} {{$voiture['marque']}} {{$voiture['modele']}}</h3>
                </td>
                <td>
                    <p>${{$voiture['prix']}}</p>
                </td>
            </tr>
        @endforeach
        </table>
            <h3><span class="prix">@lang('Total price') : ${{$commande->prix}}</span></h3>
    </main>
</body>
</html>