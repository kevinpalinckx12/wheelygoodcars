<?php
 
namespace App\Http\Controllers;
 
use App\Models\Car;
use Illuminate\Http\Request;
 
class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::all(); // Haalt alle auto's op
        return view('cars.index', compact('cars'));
    }

    public function delete($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'De auto is succesvol verwijderd.');
    }


    public function offerStep1()
    {
        // Laat het formulier zien met de input voor het kenteken
        return view('aanbieden');
    }
 
    public function processStep1(Request $request)
    {
        // Validate the license plate
       // $request->validate([
         //   'license_plate' => 'required|regex:/^[A-Z0-9-]{6,10}$/'
       // ]);
    
        // Check if the license plate exists in the database
      //  if (Car::where('license_plate', $request->license_plate)->exists()) {
       //     return redirect()->back()->with('error', 'Een auto met dit kenteken bestaat al. Probeer een ander kenteken.');
      //  }
    
        // Save the license plate to the session
        $request->session()->put('license_plate', $request->license_plate);
    
        // Redirect to step 2
        return redirect()->route('cars.offer.step2');
    }
 
    public function offerStep2()
    {
        // Laat het formulier zien met de input voor de overige gegevens
        return view('layouts.form');
    }
 
    public function processStep2(Request $request){
 
        // Valideer het formulier
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required|numeric',
            'mileage' => 'required|numeric',
            'seats' => 'nullable|numeric',
            'doors' => 'nullable|numeric',
            'production_year' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'color' => 'nullable',
            'image' => 'nullable|image',
        ]);
 
        // Sla de auto op in de database
        $car = new Car();
        $car->license_plate = $request->session()->get('license_plate');
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->price = $request->price;
        $car->mileage = $request->mileage;
        $car->seats = $request->seats;
        $car->doors = $request->doors;
        $car->production_year = $request->production_year;
        $car->weight = $request->weight;
        $car->color = $request->color;
        $car->user_id = auth()->id();
        $car->save();
 
        // Verwijder het kenteken uit de sessie
        $request->session()->forget('license_plate');
 
        // Ga terug naar de homepagina
        return redirect()->route('home')->with('success', 'De auto is succesvol aangeboden.');
    }
    
}
