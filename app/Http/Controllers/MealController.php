<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\MealAdded;

class MealController extends Controller
{
    public function index() {
            $meals = Meal::where('user_id', Auth::id())->with('symptoms')->simplePaginate(3);
            $symptoms = Symptom::all();
        
            return view('meals.index', [
                'meals' => $meals,
                'symptoms' => $symptoms,
            ]);
    }

    
    public function create(Meal $meal) {
        Gate::authorize('create', $meal);
        $symptoms = Symptom::all();
        return view('meals.create', [
            'meal' => $meal,
            'symptoms' => $symptoms,
        ]);
    }


    public function show(Meal $meal) {
        Gate::authorize('view', $meal);
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
            'user_id' => Auth::id(),
        ]);

        if ($request->input('symptoms')) {
            $meal->symptoms()->attach($request->input('symptoms')); //
        }

        Mail::to($meal->user)->queue(new MealAdded($meal)
    );
        return redirect('/meals');
    }


    public function edit(Meal $meal) {
        Gate::authorize('edit', $meal);

        $symptoms = Symptom::all();
        return view('meals.edit', [
            'meal' => $meal,
            'symptoms' => $symptoms,
    ]);
    }


    public function update(Meal $meal, Request $request) {
        Gate::authorize('update', $meal);

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
