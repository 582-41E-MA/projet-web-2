<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: arial;
            font-size: 20px;

        }

        .liste-photos {
            /* border: 1px solid; */
            padding: 1rem;
            height: auto;
        }

        img {
            width: 250px;
        }

        .chaque-photo{
            margin:auto;
        }
        
        .chaque-photo:not(:last-child) {
            border-bottom: 1px solid #cb0606;
        }

        .photoEtTitre {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .prix {
            font-family: "Roboto Slab";
            font-weight: 700;
            color: #cb0606;
        }

        span {
            margin-bottom: 20px;
        }

    </style>
</head>

<body>
    
    <main>
        <h1 >@lang('Confirmation')</h1>
    
        <div class="liste-photos">
            @foreach($voitures as $voiture)
            <div class="chaque-photo">
                <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/img/voitures/'.$photo->nom )))}}" >
                <p>{{$voiture['annee']}} {{$voiture['marque']}} {{$voiture['modele']}}</p>
                <span class="prix">${{$commande->prix}}</span>
            </div>
            @endforeach
        </div>
    </main>
</body>
