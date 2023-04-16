<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $comments = DB::table('sweetwater_test')->get();
		
		$candy_array = DB::table('sweetwater_test')
			->where('comments', 'LIKE', '%candy%')
			->orWhere('comments', 'LIKE', '%smarties%')
			->orWhere('comments', 'LIKE', '%bit o honey%')
			->orWhere('comments', 'LIKE', '%cinnanom%')
			->get();
		
		$call_array = DB::table('sweetwater_test')
			->where('comments', 'LIKE', '%call me%')
			->get();
		
		$no_call_array = DB::table('sweetwater_test')
			->where('comments', 'LIKE', '%do not call%')
			->get();
		
		$refer_array = DB::table('sweetwater_test')
			->where('comments', 'LIKE', "%referred%")
			->get();

		$signature_array = DB::table('sweetwater_test')
			->where('comments', 'LIKE', '%signature%')
			->get();
		
		$misc_array = DB::table('sweetwater_test')
			->where('comments','not LIKE', '%candy%')
			->where('comments','not LIKE', '%smarties%')
			->where('comments','not LIKE', '%bit o honey%')
			->where('comments','not LIKE', '%connanom%')
			->where('comments','not LIKE', '%call me%')
			->where('comments','not LIKE', '%do not call%')
			->where('comments','not LIKE', '%referred%')
			->where('comments','not LIKE', '%signature%')
			->get();
		
		return view('index', compact('comments','candy_array','call_array','no_call_array','refer_array','signature_array','misc_array'));
    }
	
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
