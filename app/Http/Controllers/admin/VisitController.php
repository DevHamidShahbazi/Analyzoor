<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\admin\VisitResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Shetabit\Visitor\Models\Visit;
use Stevebauman\Location\Facades\Location;

class VisitController extends Controller
{
    public function __construct()
    {
        DB::table('visits')->where('method','!=','GET')->delete();
        DB::table('visits')->whereIn('visitor_id',['1'])->delete();
    }

    public function index()
    {
        return view('admin.visit.index');
    }

    public function chart()
    {
        $visit = $this->Get_Visits()->get();
        $visitGroupByCreateDate = $visit->groupBy('Create_Date');
        $visit_all = $visitGroupByCreateDate->map(function ($item){
            return VisitResource::collection($item);
        })->toArray();
        return [
            'visit'=> [
                'all'=> $visit_all,
                'date'=> array_keys($visitGroupByCreateDate->toArray()),
                'count'=>$visitGroupByCreateDate->count(),
            ],
        ];
    }

    public function location(Request $request)
    {
        return response()->json(Location::get($request['ip'])?Location::get($request['ip'])?->cityName:null);
    }

    private function Get_Visits()
    {
        return Visit::orderBy('created_at','asc');
    }
}
