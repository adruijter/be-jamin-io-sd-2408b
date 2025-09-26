<?php

namespace App\Http\Controllers;

use App\Models\AllergeenModel;
use Illuminate\Http\Request;

class AllergeenController extends Controller
{
    private $allergeenModel;

    public function __construct()
    {
        $this->allergeenModel = new AllergeenModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allergenen = $this->allergeenModel->sp_GetAllAllergenen();

        // var_dump($allergenen);

        return view('allergenen.index', [
            'title' => 'Allergenen',
            'allergenen' => $allergenen
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('allergenen.create', [
            'title' => 'Voeg een nieuwe allergeen toe'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255'
        ]);
      
        $newId = $this->allergeenModel->sp_CreateAllergeen(
                    $data['name'],
                    $data['description']
                );

        return redirect()->route('allergeen.index')
                         ->with('success', "Allergeen is succesvol toegevoegd met id" . $newId);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(AllergeenModel $allergeenModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AllergeenModel $allergeenModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AllergeenModel $allergeenModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AllergeenModel $allergeenModel)
    {
        //
    }
}
