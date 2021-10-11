<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Requests\LinkRequest;

class LinkController extends Controller
{
    public function index()
    {
        return LinkResource::collection(Link::all());
    }

    public function store(LinkRequest $request)
    {
        $link = Link::create($request);

        return new LinkResource($link);
    }

    public function show(Link $link)
    {
        return new LinkResource($link);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}
