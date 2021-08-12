<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatePlanRequest;

class PlanController extends Controller
{
    private $repository;

    public function __contruct(Plan $plans) {

        $this->repository = $plans;

    }

    public function index() {
        $plans = Plan::orderBy('price', 'asc')->paginate(10);
        return view('admin.pages.plans.index', compact('plans'));
    }

    
    public function create() {
        return view('admin.pages.plans.create');
    }



    public function store(StoreUpdatePlanRequest $request) {
        Plan::create($request->all());
        return redirect()->route('plans.index');
    }



    public function show($url) {
        $plan = Plan::where('url', $url)->first();
        if (!$plan) {
            return redirect()->back();
        }
        return view('admin.pages.plans.show', compact('plan')); 
    }



    public function delete($url) {
        $plan = Plan::where('url', $url)->first();
        if (!$plan) {
            return redirect()->back();
        }

        $plan->delete($plan);
        return redirect()->route('plans.index');
        
    }


    public function search(Request $request) {
        
        $filters = $request->only('filters');
        $plans   = Plan::where('name', 'LIKE', "%{$request->filters}%")->paginate(1);
        return view('admin.pages.plans.index', compact('plans', 'filters'));

    }


    

    public function edit($url) {
        $plan = Plan::where('url', $url)->first();
        if (!$plan) {
            return redirect()->back();
        }
        return view('admin.pages.plans.edit', compact('plan')); 
    }


    
    public function update(StoreUpdatePlanRequest $request, $url) {
        $plan = Plan::where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $plan->update($request->all());
        return redirect()->route('plans.index');
    }


}
