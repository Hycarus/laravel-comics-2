<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Http\Requests\UpdateComicRequest;
use App\Http\Requests\StoreComicRequest;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        if (!empty($request->query('search'))) {
            $search = $request->query('search');
            $comics = Comic::where('type', $search)->get();
        } else {
            $comics = Comic::all();
        }
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComicRequest $request)
    {
        $formData = $this->validation($request->all());
        $formData = $request->validated();
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
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        $formData = $this->validation($request->all());
        $formData = $request->validated();
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

    private function validation($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|min:5|max:255|unique:comics',
            'type' => 'required|max:50',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'series' => 'required|max:50',
            'sale_date' => 'required|date_format:Y-m-d',
        ], [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno :min caratteri',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'title.unique' => 'Il titolo deve essere univoco',
            'type.required' => 'Il tipo è obbligatorio',
            'type.max' => 'Il tipo deve avere massimo :max caratteri',
            'description.required' => 'La descrizione è obbligatoria',
            'description.max' => 'La descrizione deve avere massimo :max caratteri',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'series.required' => 'La serie è obbligatoria',
            'series.max' => 'La serie deve avere massimo :max caratteri',
            'sale_date.required' => 'La data di vendita è obbligatoria',
            'sale_date.date_format' => 'La data di vendita deve essere nel formato AAAA-MM-GG',
        ])->validate();
        return $validator;
    }
}
