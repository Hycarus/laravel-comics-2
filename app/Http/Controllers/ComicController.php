<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $formData = $request->all();
        $request->validate([
            'title' => 'required|min:5|max:255|unique:comics',
            'type' => 'required|max:50',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'series' => 'required|max:50',
            'sale_date' => 'required|date_format:Y-m-d',
        ]);
        // $newComic = new Comic();
        // $newComic->fill($formData);
        // $newComic->title = $formData['title'];
        // $newComic->description = $formData['description'];
        // $newComic->price = $formData['price'];
        // $newComic->series = 'a piacere';
        // $newComic->sale_date = '2020-01-01';
        // $newComic->type = $formData['type'];

        // $newComic->save();
        $newComic = Comic::create($formData);
        return to_route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        //
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $formData = $request->all();
        $request->validate([
            'title' => 'required|min:5|max:255|unique:comics',
            'type' => 'required|max:50',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'series' => 'required|max:50',
            'sale_date' => 'required|date_format:Y-m-d',
        ]);
        // $comic->title = $formData['title'];
        // $comic->description = $formData['description'];
        // $comic->price = $formData['price'];
        // $comic->series = 'a piacere';
        // $comic->sale_date = '2020-01-01';
        // $comic->type = $formData['type'];
        $comic->fill($formData);
        $comic->update();
        return to_route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return to_route('comics.index')->with('message', "Hai eliminato il fumetto " . $comic->title);
    }
}
