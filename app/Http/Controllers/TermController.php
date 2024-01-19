<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index() {
        $terms = Term::all();
        return view('terms.terms', compact('terms'));
    }

    public function create() {
        return view('terms.create');
    }

    public function store() {

        $validated = request()->validate([
            'title' => 'required|min:4|max:30',
            'content' => 'required|min:30|unique:terms,content'
        ]);

        Term::create([
            'title' => $validated['title'],
            'content' => $validated['content']
        ]);

        return redirect()->route('home')->with('success', 'Term created successfully!');
    }

    public function edit($term_id) {
        $term = Term::find($term_id);
        return view("terms.edit", compact('term'));
    }

    public function update($term_id) {
        $validated = request()->validate([
            'title' => 'required|min:4|max:30',
            'content' => 'required|min:30|unique:terms,content'
        ]);

        Term::find($term_id)->update($validated);

        return redirect()->route('home')->with('success', 'Term updated successfully');
    }

    public function destroy(Term $term) {
        Term::find($term->id)->delete();

        return redirect()->route('home')->with('success', 'Term deleted successfully');
    }
}