<?php

namespace App\Http\Controllers;

use App\Models\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class URLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get All Urls
        $urls = Url::latest()->get();
        return view('home', ['urls' => $urls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Page for creating new Url
        return view('new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Adding new Url
        $existingUrl = Url::where('destination', '=', $request->destination)->get();
        if(count($existingUrl) > 0){
            return Redirect::back()->withErrors(['msg' => 'Link already exists']);
        }
        $input['destination'] = $request->destination;
        $input['slug'] = Str::random(5);
        $input['views'] = 0;
        $url = Url::create($input);
        return redirect('url')->with('status', 'New Link has been inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\URL  $uRL
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // view link page
        $url = Url::where('id', '=', $id)->first();
        if($url){
            // updating views count every time a link is viewed
            $url->increment('views');
            $url->save();
            return view('show', ['url' => $url]); 
        }else{
            return view('show', ['url' => NULL])->withErrors(['msg' => 'Link does not exist']);; 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\URL  $uRL
     * @return \Illuminate\Http\Response
     */
    public function edit(URL $uRL)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\URL  $uRL
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, URL $uRL)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\URL  $uRL
     * @return \Illuminate\Http\Response
     */
    public function destroy(URL $uRL)
    {
        //
    }
}
