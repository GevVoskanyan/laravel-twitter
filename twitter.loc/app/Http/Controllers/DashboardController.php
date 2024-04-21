<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $ideas = Idea::withCount('likes')->orderBy('created_at', 'DESC');

        if ($request->has("search")) {
            $ideas = $ideas->search(request("search", ''));
        }



        return view('dashboard', [
            'ideas' => $ideas->paginate(5),
        ]);
    }
}
