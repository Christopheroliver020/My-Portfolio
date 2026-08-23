<?php

namespace App\Http\Controllers;

use App\Models\Visitor;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::latest('visited_at')
            ->paginate(20);

        return view(
            'visitors.visitors',
            compact('visitors')
        );
    }
}
