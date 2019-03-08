<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies = Vacancy::all();
        return view('admin.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255'
        ]);

        $result = Vacancy::create($data);
        $result->addToIndex();

        return redirect('/admin/vacancies')->with('success', 'Вакансия добавлена.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacancy = $updateVacancy = Vacancy::findOrFail($id);
        $updateVacancy->counter++;

        Vacancy::whereId($id)->update($updateVacancy->toArray());
        $vacancy->removeFromIndex();
        $updateVacancy->addToIndex();

        return view('show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('admin.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255'
        ]);

        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($data);

        $vacancy->removeFromIndex();
        $vacancy->name = $data['name'];
        $vacancy->description = $data['description'];
        $vacancy->addToIndex();

        return redirect('/admin/vacancies')->with('success', 'Вакансия обновлена.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->removeFromIndex();
        $vacancy->delete();

        return redirect('/admin/vacancies')->with('success', 'Вакансия удалена.');
    }

    /**
     * Показ всех карточек посредством ElasticSearch
     *
     * @return \Illuminate\Http\Response
     */
    public function displayAll() {
        $vacancies = Vacancy::searchByQuery('', null, ['name', 'description', 'counter'], 6,  null, ['id' => 'desc']);
        return view('show_all', compact('vacancies'));
    }
}
