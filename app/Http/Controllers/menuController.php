<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Type;

class menuController extends Controller
{
    //
    public function showMeal(){
        //show a specific meal
        $meals =  Meal::get();
        return view("menu",["meals"=>$meals]);
    }

    public function showMealAdmin($id=null){
        //show a specific meal
        return $id?view('mealAdmin',[
            'meal' =>Meal::where('id',$id)->firstOrFail()
        ]): view('menuAdmin',[
            'meals' =>Meal::all(),
            'types' =>Type::all(),
        ]);
    }

    public function create(){
        //create a new meal item
        return view('addMeals',[
            'types' =>Type::all(),
        ]);
    }


    public function store(Request $request){
        //persist creating
        $meal              =  new Meal();
        $request->validate([
            'title'      =>['string','required','max:70'],
            'description'=>['string','required'],
            'price'      =>['numeric', 'required'],
            'photo'      =>['file'],
            'type'       =>['string','required'],
        ]);

        $meal->title       =  request('title');
        $meal->description =  request('description');
        $meal->price       =  request('price');
        $meal ->type       =  request('type');

        if($request -> hasFile('photo')){

            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('photo')->storeAs('uploads/', $fileNameToStore);
            $meal->photo = 'uploads/'.$fileNameToStore;
        }
        $meal -> save();
        return redirect('/admin/menu');
    }

    public function addType(){
        return view('addType');
    }

    public function storeType(Request $request){

        $type              =  new Type();
        $request->validate([
            'type_name'      =>['string','required','max:20'],
        ]);

        $type->type_name       =  request('type_name');

        $type -> save();
        return redirect('/admin/menu');
    }

    public function edit($id){
        //edit
        return view('updateMeal',[
            'meal' =>Meal::where('id',$id)->firstOrFail(),
            'types' =>Type::all(),
        ]);

    }

    public function update(Request $request,Meal $meal){
        //persist editing
        $attributes = request()->validate([
            'title'      => ['string', 'required', 'max:70'],
            'price'      => ['numeric', 'required'],
            'description'=> ['string', 'required'],
            'photo'      => ['file'],
            'type'       => ['string'],
        ]);

        if($request -> hasFile('photo')){
        $attributes['photo'] = request('photo')->store('uploads');
        }
        $meal -> update($attributes);

        return redirect('/admin/menu/'.strval($meal-> id));
    }

    public function delete($id){
        return view('deleteMeal',[
            'meal' =>Meal::where('id',$id)->firstOrFail()
        ]);
    }

    public function destroy(Meal $meal)
    {
        $meal->delete();

        return redirect('/admin/menu/');

    }

    public function deleteType($id){
        return view('deleteType',[
            'type' =>Type::where('id',$id)->firstOrFail()
        ]);
    }

    public function destroyType(Type $type)
    {
        $type->delete();

        return redirect('/admin/menu/');

    }


}
