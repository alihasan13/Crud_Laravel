<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rank;
use DB;
use Session;
use Validator;
use Helper;

class RankController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //echo '<pre>';print_r($request->all());exit;
        $pageArr = $request->all();
        $rankList = Rank::select('*');
        
        if(!empty($request->search)){
            $rankList=$rankList->where('code','LIKE', "%".$request->search."%");
        }
        $rankList=$rankList->orderBy('id','DESC')->paginate(10);
        
        $statusArr = ['1' => 'Active', '2' => 'Inactive'];
        return view('rank.index', compact('rankList','statusArr','pageArr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('rank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required',
            'status' => 'required|not_in:0',
        ]);

        if ($validator->fails()) {
            return redirect('rank/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $target = new Rank();
        $target->name = $request->name;
        $target->code = $request->code;
        $target->status = $request->status;

        if ($target->save()) {
            Session::flash('Success', __('label.USER_HAS_BEEN_CREATED_SUCCESSFULLY'));
        }
        return redirect('rank');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id) {
        
        $target = Rank::find($id);
        return view('rank.edit', compact('target'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $target = Rank::find($id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required',
            'status' => 'required|not_in:0',
        ]);

        if ($validator->fails()) {
            return redirect('rank/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $target->name = $request->name;
        $target->code = $request->code;
        $target->status = $request->status;

        if ($target->save()) {
            Session::flash('Success', __('label.USER_HAS_BEEN_UPDATED_SUCCESSFULLY'));
        }
        return redirect('rank');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $target = Rank::find($id);
        if ($target->delete()) {
            Session::flash('Success', __('label.USER_HAS_BEEN_DELETED_SUCCESSFULLY'));
        }
        return redirect('rank');
    }
    public function filter(Request $request){
        $target= $request->text;
//        echo $target;exit;
        if(empty($target)){
           return redirect ('rank');
        }
        return redirect ('rank?'.'search='.$target);
    }

}
