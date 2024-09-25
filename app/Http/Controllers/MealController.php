<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Symptom;

class MealController extends Controller
{
    public function index() {
            $meals = Meal::with('symptoms')->simplePaginate(3);
            $symptoms = Symptom::all();
        
            return view('meals.index', [
                'meals' => $meals,
                'symptoms' => $symptoms,
            ]);
    }

    public function create() {
        $symptoms = Symptom::all();
        return view('meals.create', [
            'symptoms' => $symptoms,
        ]);
    }

    public function show(Meal $meal) {
        $symptoms = Symptom::all();

        return view('meals.show', [
            'meal' => $meal, 
            'symptoms' => $symptoms,
    ]);

    }

    public function store(Request $request) {
        $request->validate([
            'title' => ['required', 'min:3', 'max:100'],
            'date' => ['required', 'date'],
            'ingredients' => ['required', 'min:5','max:255'],
            'symptoms' => ['nullable', 'array'],
        ]);
        $meal = Meal::create([
            'title' => request('title'),
            'date' => request('date'),
            'ingredients' => request('ingredients'),
        ]);

        if ($request->input('symptoms')) {
            $meal->symptoms()->attach($request->input('symptoms')); // attach symptoms to the meal
        }
    
        return redirect('/meals');
    }

    public function edit(Meal $meal) {
        return view('meals.edit', ['meal' => $meal]);
    }

    public function update(Meal $meal, Request $request) {
        request()->validate([
            'title' => ['required', 'min:3', 'max:100'],
            'date' => ['required', 'date'],
            'ingredients' => ['required', 'min:5','max:255'],
            'symptoms' => ['nullable', 'array'],
        ]);
        
        $meal->update([
            'title' => request('title'),
            'date' => request('date'),
            'ingredients' => request('ingredients'),
        ]);

        $meal->symptoms()->sync($request->input('symptoms', []));

       return redirect('/meals/' . $meal->id);

    }

    public function destroy(Meal $meal) {
        $meal->delete();
   
        return redirect('/meals');

    }
}
