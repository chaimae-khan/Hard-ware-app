<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\DetailCategory;
use App\Models\BodyCategory;
use Illuminate\Support\Str;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::getAllCategory();
        // return $category;


        return view('backend.category.index')->with('categories',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_cats=Category::where('is_parent',1)->orderBy('title','ASC')->get();
        return view('backend.category.create')->with('parent_cats',$parent_cats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|nullable',
            'photo'=>'string|nullable',
            'status'=>'required|in:active,inactive',
            'is_parent'=>'sometimes|in:1',
            'parent_id'=>'nullable|exists:categories,id',
        ]);
        $data= $request->all();
        $slug=Str::slug($request->title);
        $count=Category::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $data['is_parent']=$request->input('is_parent',0);
        // return $data;
        $status=Category::create($data);
        if($status){
            request()->session()->flash('success','Category successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('category.index');


    }

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
        $parent_cats=Category::where('is_parent',1)->get();
        $category=Category::findOrFail($id);
        return view('backend.category.edit')->with('category',$category)->with('parent_cats',$parent_cats);
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
        // return $request->all();
        $category=Category::findOrFail($id);
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|nullable',
            'photo'=>'string|nullable',
            'status'=>'required|in:active,inactive',
            'is_parent'=>'sometimes|in:1',
            'parent_id'=>'nullable|exists:categories,id',
        ]);
        $data= $request->all();
        $data['is_parent']=$request->input('is_parent',0);
        // return $data;
        $status=$category->fill($data)->save();
        if($status){
            request()->session()->flash('success','Category successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $child_cat_id=Category::where('parent_id',$id)->pluck('id');
        // return $child_cat_id;
        $status=$category->delete();

        if($status){
            if(count($child_cat_id)>0){
                Category::shiftChild($child_cat_id);
            }
            request()->session()->flash('success','Category successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting category');
        }
        return redirect()->route('category.index');
    }

    public function getChildByParent(Request $request){
        // return $request->all();
        $category=Category::findOrFail($request->id);
        $child_cat=Category::getChildByParentID($request->id);
        // return $child_cat;
        if(count($child_cat)<=0){
            return response()->json(['status'=>false,'msg'=>'','data'=>null]);
        }
        else{
            return response()->json(['status'=>true,'msg'=>'','data'=>$child_cat]);
        }
    }


    public function DetailCategory()
    {
        $DetailCategory = DB::table('detailcategory as d')
        ->join('categories as c','c.id','=','d.idcategory')
        ->select('d.id','d.name','c.title as nameCategory','d.title','c.id as idcategory')
        ->get();

        return view('backend.DetailCategory.index')
        ->with('DetailCategory',$DetailCategory);
    }

    public function PageAddLigneDetailCategory()
    {
        $Category = DB::table('categories')->get();

        return view('backend.DetailCategory.createDetailCategory')->with('Category',$Category);
    }

    public function ListDetailCategory()
    {
        $Data = DB::table('categories as c')
        ->join('detailcategory as d','d.idcategory','=','c.id')
        ->select("d.name",'c.title')
        ->get();
        return response()->json([
            'status'    => 200,
            'data'      => $Data,
        ]);
    }

    public function StoreDetailCategory(Request $request)
    {
        try
        {

            $DetailCategory = DetailCategory::create([
                'name'   => $request->name,
                'idcategory' => $request->category,
                'title' => $request->name,
            ]);
            return response()->json([
                'status'    => 200,

            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function BodyCategory()
    {
        $data = DB::table('detailcategory as d')
        ->join('bodycategory as b','b.idHeaderCategory','=','d.id')
        ->select('b.name as bodyname','d.name as headename','b.id')
        ->get();
        $headerCategory = DetailCategory::all();
        return view('backend.BodyCategory.index')
        ->with('data',$data)
        ->with('headerCategory',$headerCategory);
    }

    public function StoreBodyCategorys(Request $request)
    {
        try
        {
            $BodyCategory = BodyCategory::create([
                'name'    => $request->name,
                'idHeaderCategory'    => $request->header
            ]);

            return response()->json([
                'status'    => 200,

            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function getBodyAndHeadCategory(Request $request)
    {
        try
        {
            $Data = DB::select("select *,b.id as idbody from categories c , detailcategory d , bodycategory b
                                where c.id = d.idcategory and d.id = b.idHeaderCategory and c.id = ?",[$request->id]);

            $result = [];

            foreach ($Data as $item) {
                $title = $item->title;
                $name = $item->name;
                $id = $item->idbody;

                if (array_key_exists($title, $result)) {
                    $result[$title][] = [
                        'name' => $name,
                        'id' => $id
                    ];
                } else {
                    $result[$title] = [
                        [
                            'name' => $name,
                            'id' => $id
                        ]
                    ];
                }
            }



            return response()->json([
                'status' => 200,
                'data'   => $result
            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }
}
