<?php

namespace Pondit\UrlShortner\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Pondit\UrlShortner\Models\UrlShortner;

class UrlShortnerController extends Controller
{
    public function index()
    {
        $urlShortners = UrlShortner::latest()->paginate(10);
        return view('url-shortner::urlShortner.index', compact('urlShortners'));
    }

    public function create()
    {
        return view('url-shortner::urlShortner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url|unique:url_shortners',
            'short_url' => 'required|url'
        ]);

        try {
            UrlShortner::create([
                'original_url' => $request->original_url,
                'short_url' => $request->short_url
            ]);
            return redirect()->route('url-shortners.index')
                ->withMessage('Successfully Created');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    { 
        $urlShortner = UrlShortner::findOrFail($id);
        return view('url-shortner::urlShortner.edit', compact('urlShortner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'original_url' => 'required|url|unique:url_shortners,id',
            'short_url' => 'required|url'
        ]);

        try {
            $urlShortner = UrlShortner::findOrFail($id);
            
            $urlShortner->update([
                'original_url' => $request->original_url,
                'short_url' => $request->short_url
            ]);
            return redirect()->route('url-shortners.index')
                ->withMessage('Successfully Updated');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $getUrlId = UrlShortner::findOrFail($id);
            $getUrlId->delete();
            return redirect()->route('url-shortners.index')->withMessage('Successfully Deleted');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
