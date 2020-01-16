<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Categories;
use Validator;
use validate;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organizerdb');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $lastid=Events::create($data)->id;
        if(count($request->category) > 0)
        {
          foreach($request->category as $categories=>$v)
            $data2=array(
                'events_id'=>$lastid,
                'category'=>$request->category[$categories],
                'ctime'=>$request->ctime[$categories],
            );
            Categories::insert($data2);
        }
        return redirect()->back()->with('success','data insert successfully');

    }


    //    $this->validate($request,[
    //        'nevent'=> 'required',
    //        'norganizer'=> 'required',
    //        'sedate'=> 'required',
    //        'setime'=>'required'
    //          ]);
        
    //        $events = new events([
    //        'nevent'   => $request->get('nevent'),
    //        'norganizer'   => $request->get('norganizer'),
    //       'sedate'  =>$request->get('sedate'),
    //       'setime'  =>$request->get('setime')
    //   ]);
    //    $events->save();
    //    return redirect()->route('events.create')->with('success','Data Added');
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
