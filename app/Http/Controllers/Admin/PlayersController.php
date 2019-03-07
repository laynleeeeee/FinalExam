<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Player, App\Team;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $players = Player::where('first_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('height', 'LIKE', "%$keyword%")
                ->orWhere('birth_date', 'LIKE', "%$keyword%")
                ->orWhere('team_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $players = Player::latest()->paginate($perPage);
        }

        return view('admin.players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $teams = Team::get()->pluck('team_id', 'id');
        return view('admin.players.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'last_name' => 'required',
			'first_name' => 'required',
			'height' => 'required',
			'birth_date' => 'required'
		]);
        $requestData = $request->all();
        
        Player::create($requestData);

        return redirect('admin/players')->with('flash_message', 'Player added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $player = Player::findOrFail($id);

        return view('admin.players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $player = Player::findOrFail($id);

        return view('admin.players.edit', compact('player'))->with('teams', $teams);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'last_name' => 'required',
			'first_name' => 'required',
			'height' => 'required',
			'birth_date' => 'required'
		]);
        $requestData = $request->all();
        
        $player = Player::findOrFail($id);
        $player->update($requestData);

        return redirect('admin/players')->with('flash_message', 'Player updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Player::destroy($id);

        return redirect('admin/players')->with('flash_message', 'Player deleted!');
    }
}
