<?php

namespace App\Http\Controllers;

use App\Http\Resources\LabelResource;
use App\Models\Label;
use Illuminate\Http\Request;
use App\Http\Requests\LabelRequest;

class LabelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Label::class, 'label');
    }

    public function index()
    {
        return LabelResource::collection(Label::paginate());
    }

    public function store(LabelRequest $request)
    {
        $label = Label::create($request->validated());
        return new LabelResource($label);
    }

    public function show(Label $label)
    {
        return new LabelResource($label);
    }

    public function update(LabelRequest $request, Label $label)
    {
        $label->fill($request->except(['id']));
        $label->save();
        return new LabelResource($label);
    }

    public function destroy(Request $request, Label $label)
    {
        $label = Label::findOrFail($label->id);
        if($label->delete()) return response(null, 204);
    }
}
