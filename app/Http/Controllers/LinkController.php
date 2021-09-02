<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\LinkService;
use App\Http\Requests\LinkRequest;
use App\Models\Link;

class LinkController extends Controller
{
    protected $linkService;

    public function __construct(LinkService $linkService)
    {
        $this->linkService = $linkService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('link.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        $result = $this->linkService->create($request);

        if ($result) return redirect()->route('links.show', session('slug'))->with('status', 'Your link has been created.');

        return back()->withInput()->with('error', 'Please try again later.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        $this->linkService->update($link);

        return view('link.show', ['link' => $link]);
    }
}
