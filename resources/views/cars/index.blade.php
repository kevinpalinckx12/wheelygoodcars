<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Auto's overzicht</title>
        <style>
            body { 
                font-family: Arial, sans-serif; 
                background-color: #1c1c1c;
                color: #fff;
                margin: 0;
                padding: 20px;
            }
            h1 {
                color: #FFA500;
                text-align: center;
                font-size: 36px;
            }
            table { 
                width: 100%; 
                border-collapse: collapse; 
                margin-top: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
            th, td { 
                padding: 12px; 
                text-align: left; 
                font-size: 16px;
            }
            th {
                background-color: #333;
                color: #FFA500;
                border-bottom: 2px solid #FFA500;
            }
            td {
                background-color: #444;
                border-bottom: 1px solid #555;
            }
            tr:nth-child(even) td {
                background-color: #333;
            }
            tr:hover td {
                background-color: #666;
            }
            td:last-child {
                font-weight: bold;
                color: #FFA500;
            }
            .price {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Overzicht van alle auto's</h1>
        <table>
            <thead>
                <tr>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Kenteken</th>
                    <th>Bouwjaar</th>
                    <th>Kleur</th>
                    <th>Kilometerstand</th>
                    <th>Aantal deuren</th>
                    <th>Aantal zitplaatsen</th>
                    <th>Prijs</th>
                    <th>Verwijderen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                    <tr>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->license_plate }}</td>
                        <td>{{ $car->production_year }}</td>
                        <td>{{ $car->color }}</td>
                        <td>{{ $car->mileage }} km</td>
                        <td>{{ $car->doors }}</td>
                        <td>{{ $car->seats }}</td>
                        <td class="price">€{{ number_format($car->price, 2, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cars.delete', $car->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze auto wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: #FF4500; border: none; padding: 6px 12px; color: #fff; cursor: pointer;">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>