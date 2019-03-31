<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Chalet;
use App\Attribute;
use App\Media;


class ChaletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chalets = Chalet::orderBy('id')->where(['owner_id'=> Auth::id()])->paginate(10);
        return view('chalets.index', ['chalets' => $chalets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = Attribute::get();
        return view('chalets.create',['attributes' => $attributes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        
        $ch = Chalet::create( [
            'title'=>  $input['title'],
            'description' =>$input['description'],
            'address' =>$input['address'],
            'district_id' =>$input['district_id'],
            'owner_id' =>Auth::id(),
        ]);
       // Attributes
        if(!empty($input['attributes'])){
            foreach($input['attributes'] as $key => $attribute){
                if(!empty($attribute))
                    $ch->attributes()->attach($key,['value'=>$attribute ]);
            }
        }
        //  Media
        $images=array();
        if($files= $request->file('images_files')){
            $images_titles = $input['images_titles'];
            $images_descriptions = $input['images_descriptions'];
            foreach($files as $key => $file){
                $filename = $file->getClientOriginalName();
                $file->move('images',$filename);

                Media::insert( [
                    'title' => $images_titles[$key],
                    'description' =>$images_descriptions[$key],
                    'filename'=>  $filename,
                    'type'=>'Image',
                    'path'=>'images',
                    'chalet_id' => $ch->id

                ]);

            }
        }
        // Prices
        if(!empty($input['period_from']) && !empty($input['period_to']) && !empty($input['day_price'])){
            $period_from = $input['period_from'];
            $period_to = $input['period_to'];
            $day_price = $input['day_price'];

            foreach($period_from as $key => $period){
                $ch->prices()->create([
                    'period_from' => $period_from[$key],
                    'period_to' => $period_to[$key],
                    'day_price' => $day_price[$key],
                ]);
            }
        }
    
    
        return redirect(route('chalets.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chalet = Chalet::with(['attributes', 'media','prices'])->findOrFail($id);
        //dd($chalet);
        return view('chalets.show', ['chalet' => $chalet]);
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
        Chalet::destroy($id);
        return redirect(route('chalets.index'));
    }
}
