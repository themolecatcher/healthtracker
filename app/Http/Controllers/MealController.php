<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Symptom;
use App\Models\Allergen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\MealAdded;
use Illuminate\Support\Facades\DB;

class MealController extends Controller
{
    public function index() {
            $meals = Meal::where('user_id', Auth::id())->with('symptoms', 'allergens')->simplePaginate(2);
            $symptoms = Symptom::all();
            $allergens = Allergen::all();
        
            return view('meals.index', [
                'meals' => $meals,
                'symptoms' => $symptoms,
                'allergens' => $allergens,
            ]);
    }


    public function create(Meal $meal) {
        Gate::authorize('create', $meal);
        $symptoms = Symptom::all();
        $allergens = Allergen::all();

        return view('meals.create', [
            'meal' => $meal,
            'symptoms' => $symptoms,
            'allergens' => $allergens,
        ]);
    }


    public function show(Meal $meal) {
        Gate::authorize('view', $meal);
        $symptoms = Symptom::all();
        $allergens = Allergen::all();

        return view('meals.show', [
            'meal' => $meal, 
            'symptoms' => $symptoms,
            'allergens' => $allergens,
    ]);
    }


    public function store(Request $request) {
        $request->validate([
            'title' => ['required', 'min:3', 'max:100'],
            'date' => ['required', 'date'],
            'ingredients' => ['required', 'min:5','max:255'],
            'symptoms' => ['nullable', 'array'],
            'allergens' => ['nullable', 'array'],
        ]);
        DB::transaction(function () use ($request) {
            $meal = Meal::create([
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'ingredients' => $request->input('ingredients'),
                'user_id' => Auth::id(),
            ]);
    
            if ($request->input('symptoms')) {
                $meal->symptoms()->attach($request->input('symptoms'));
            }
    
            if ($request->input('allergens')) {
                $meal->allergens()->attach($request->input('allergens'));
            }
    
            Mail::to($meal->user)->queue(new MealAdded($meal));
        });
    
        return redirect('/meals');
    }


    public function edit(Meal $meal) {
        Gate::authorize('edit', $meal);
        $symptoms = Symptom::all();
        $allergens = Allergen::all();

        return view('meals.edit', [
            'meal' => $meal,
            'symptoms' => $symptoms,
            'allergens' => $allergens,
    ]);
    }


    public function update(Meal $meal, Request $request) {
        Gate::authorize('update', $meal);

        request()->validate([
            'title' => ['required', 'min:3', 'max:100'],
            'date' => ['required', 'date'],
            'ingredients' => ['required', 'min:5','max:255'],
            'symptoms' => ['nullable', 'array'],
            'allergens' => ['nullable', 'array'],
        ]);
        
        $meal->update([
            'title' => request('title'),
            'date' => request('date'),
            'ingredients' => request('ingredients'),
        ]);

        $meal->symptoms()->sync($request->input('symptoms', []));
        $meal->allergens()->sync($request->input('allergens', []));

       return redirect('/meals/' . $meal->id);
    }


    public function destroy(Meal $meal) {
        $meal->delete();
   
        return redirect('/meals');

    }
}
