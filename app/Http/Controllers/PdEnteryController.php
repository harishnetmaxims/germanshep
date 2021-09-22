<?php

namespace App\Http\Controllers;

use App\pd_entery;
use App\View\Components\pd_entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdEnteryController extends Controller
{
    public function addpedigree(Request $request)
    {
        if(session()->has('name')){

            $cat = DB::table('channels')->get();
            $breeder = DB::table('member_profile')->where('breeder',1)->get();
            $owner = DB::table('member_profile')->where('owner',1)->get();
            $registry = DB::table('dp_registry')->get();
            $title = DB::table('dp_kz')->get();
            $koer = DB::table('dp_koer')->get();
            $hips = DB::table('hips')->get();
            $hi_el = DB::table('hips_elbow')->get();
            return view('addpedigree',compact('cat','breeder','owner','registry','title','koer','hips','hi_el'));
        }else{
            $request->session()->flash('msg','Please Login');
            return redirect('login');
        }
    }
// channel- category member_profile WHERE breeder= 1 limit 100 member_profile WHERE owner = 1 dp_registry ORDER BY title  <option value="R">Male</option><option value="H">Female</option></select> dp_kz  dp_koer  hips['hdb']hips_desc  hips_elbow   <option value="1">Clear</option><option value="2">Normal (N/N)</option><option value="3">Carrier (A/N)</option><option value="4">At-Risk (A/A)</option>-Degenerative   <label>Class:</label><br><select class="form-control" name="class"><option value=""> </option><option value="VA">VA</option><option value="V">V</option><option value="SG">SG</option><option value="G">G</option></select>

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
        //
    }

    public function create_pedigree(Request $request)
    {
        $res =new pd_entery;
        // $res->cat=$request->input('cat');
        $res->reg1=$request->input('redcode1');
        $res->c1=$request->input('reg1value');
        $res->reg2=$request->input('redcode2');
        $res->c2=$request->input('reg2value');
        // $res->regcode=$request->input('cat');
        $res->name=$request->input('dog_name');
        $res->lastname=$request->input('kennel_name');
        $res->gender=$request->input('gender');
        $res->dob=$request->input('dob');
        $res->tattoo_nr=$request->input('tatto');
        $res->color=$request->input('color');
        $res->class=$request->input('class');
        $res->title=$request->input('title');
        $res->father_id=$request->input('father_name');
        $res->mother_id=$request->input('mother_name');
        // $res->picture=$request->input('cat');
        $res->hdzw=$request->input('hdzw');
        $res->owner_name=$request->input('owner');
        // $res->owner_lastname=$request->input('cat');
        $res->kz=$request->input('title');
        // $res->breed1=$request->input('cat');
        // $res->grad1=$request->input('cat');
        $res->height_withers=$request->input('height-wi');
        $res->breast_depth=$request->input('breast_depth');
        $res->breast_width=$request->input('breast_width');
        $res->height=$request->input('height');
        $res->elbow=$request->input('elbow');
        $res->cid=$request->input('cat');
        $res->owner=$request->input('owner');
        $res->breeder=$request->input('breeder');
        $res->micro_chip=$request->input('micro_chip');
        $res->dna=$request->input('dna');
        $res->coat=$request->input('coat-type');
        $res->number_of_views='0';
        $res->kork=$request->input('koer');
        $res->breeding=$request->input('koer_report');
        $res->added_by=$request->input('cat');
        $res->added_date= date('Y-m-d H:i');
        $res->picture = $request->file('image')->store('addpedigree');
        // $res->username =$request->session()->get('name');

        // echo '<pre>';
        // print_r(date('Y-m-d H:i'));
        // die();


        $pd = $request->input('redcode1');
        // echo '<pre>';
        // print_r($pd);
        // die();

        // for health matters
        if(isset($request->insert_date_hm)){
            $iHMData = count( $request->input('insert_date_hm'));
            // echo '<pre>';
            // print_r($iHMData);
            // die();

            if($iHMData>0){
                for ($hm = 0; $hm < $iHMData; $hm++) {
                    $insert_date_hm =  $request->input('insert_date_hm')[$hm];
                    $name_hm =  $request->input('name_hm')[$hm];
                    $dosage_hm =  $request->input('dosage_hm')[$hm];
                    $due_date_hm =  $request->input('due_date_hm')[$hm];
                    // echo '<pre>';
                    // print_r( $dosage_hm );
                    // die();
                    if ($insert_date_hm != '' and $name_hm != '') {
                        // echo '<pre>';
                        // print_r( $insert_date_hm );
                        // die();
                        // $que_deworming = "INSERT INTO dp_health_matters(pd, insert_date, due_date, name, dosage) VALUES('$pd','$insert_date_hm','$due_date_hm','$name_hm','$dosage_hm')";
                        // $query_que_deworming = mysqli_query($aVar, $que_deworming);
                                $q = DB::table('dp_health_matters')->max('hm_id');
                                $q1 = $q+'1';
                                        // echo '<pre>';
                                        // print_r( $q1 );
                                        // die();
                        DB::table('dp_health_matters')->insert([
                            // 'insert_date'=> $request->input('insert_date_hm'),
                            // 'name'=> $request->input('name_hm'),
                            // 'due_date'=>$request->input('due_date_hm'),
                            // 'dosage'=> $request->input('dosage_hm')
                            'pd' => $pd,
                            'hm_id'=>$q1,
                            'insert_date'=>$insert_date_hm,
                            'name'=>$name_hm,
                            'dosage'=>$dosage_hm,
                            'due_date'=>$due_date_hm,
                        ]);
                        // dd(DB::getQueryLog());
                    //     echo '<pre>';
                    //     print_r( $name_hm );
                    //   die();
                    }
                }
            }
        }






         // for health matters
         if(isset($request->insert_date_vaccines)){
            $iVMData = count( $request->input('insert_date_vaccines'));
            // echo '<pre>';
            // print_r($iHMData);
            // die();

            if($iVMData>0){
                for ($hv = 0; $hv < $iVMData; $hv++) {
                    $insert_date_vaccines =  $request->input('insert_date_vaccines')[$hv];
                    $name_vaccines =  $request->input('name_vaccines')[$hv];
                    $dosage_vaccines =  $request->input('dosage_vaccines')[$hv];
                    $due_date_vaccines =  $request->input('due_date_vaccines')[$hv];
                    // echo '<pre>';
                    // print_r( $dosage_hm );
                    // die();
                    if ($insert_date_vaccines != '' and $name_vaccines != '') {
                        // echo '<pre>';
                        // print_r( $insert_date_hm );
                        // die();
                        // $que_deworming = "INSERT INTO dp_health_matters(pd, insert_date, due_date, name, dosage) VALUES('$pd','$insert_date_hm','$due_date_hm','$name_hm','$dosage_hm')";
                        // $query_que_deworming = mysqli_query($aVar, $que_deworming);
                                $q = DB::table('dp_vaccines')->max('vaccines_id');
                                $q1 = $q+'1';
                                        // echo '<pre>';
                                        // print_r( $q1 );
                                        // die();
                        DB::table('dp_vaccines')->insert([
                            // 'insert_date'=> $request->input('insert_date_vaccines'),
                            // 'name'=> $request->input('name_hm'),
                            // 'due_date'=>$request->input('due_date_hm'),
                            // 'dosage'=> $request->input('dosage_hm')
                            'pd' => $pd,
                            'vaccines_id'=>$q1,
                            'insert_date'=>$insert_date_vaccines,
                            'name'=>$name_vaccines,
                            'dosage'=>$dosage_vaccines,
                            'due_date'=>$due_date_vaccines,
                        ]);
                        // dd(DB::getQueryLog());
                    //     echo '<pre>';
                    //     print_r( $name_hm );
                    //   die();
                    }
                }
            }
        }








         // for health matters
         if(isset($request->insert_date_rabies)){
            $iRMData = count( $request->input('insert_date_rabies'));
            // echo '<pre>';
            // print_r($iHMData);
            // die();

            if($iRMData>0){
                for ($hr = 0; $hr < $iRMData; $hr++) {
                    $insert_date_rabies =  $request->input('insert_date_rabies')[$hr];
                    $name_rabies =  $request->input('name_rabies')[$hr];
                    $dosage_rabies =  $request->input('dosage_rabies')[$hr];
                    $due_date_rabies =  $request->input('due_date_rabies')[$hr];
                    // echo '<pre>';
                    // print_r( $dosage_hm );
                    // die();
                    if ($insert_date_rabies != '' and $name_rabies != '') {
                        // echo '<pre>';
                        // print_r( $insert_date_hm );
                        // die();
                        // $que_deworming = "INSERT INTO dp_health_matters(pd, insert_date, due_date, name, dosage) VALUES('$pd','$insert_date_hm','$due_date_hm','$name_hm','$dosage_hm')";
                        // $query_que_deworming = mysqli_query($aVar, $que_deworming);
                                $r= DB::table('dp_rabies')->max('rabies_id');
                                $r1 = $r+'1';
                                        // echo '<pre>';
                                        // print_r( $q1 );
                                        // die();
                        DB::table('dp_rabies')->insert([
                            // 'insert_date'=> $request->input('insert_date_vaccines'),
                            // 'name'=> $request->input('name_hm'),
                            // 'due_date'=>$request->input('due_date_hm'),
                            // 'dosage'=> $request->input('dosage_hm')
                            'pd' => $pd,
                            'rabies_id'=>$r1,
                            'insert_date'=>$insert_date_rabies,
                            'name'=>$name_rabies,
                            'dosage'=>$dosage_rabies,
                            'due_date'=>$due_date_rabies,
                        ]);
                        // dd(DB::getQueryLog());
                    //     echo '<pre>';
                    //     print_r( $name_hm );
                    //   die();
                    }
                }
            }
        }







         // for health matters
         if(isset($request->insert_date_deworming)){
            $deRMData = count( $request->input('insert_date_deworming'));
            // echo '<pre>';
            // print_r($iHMData);
            // die();

            if($deRMData>0){
                for ($hde = 0; $hde < $deRMData; $hde++) {
                    $insert_date_deworming =  $request->input('insert_date_deworming')[$hde];
                    $name_deworming =  $request->input('name_deworming')[$hde];
                    $dosage_deworming =  $request->input('dosage_deworming')[$hde];
                    $due_date_deworming =  $request->input('due_date_deworming')[$hde];
                    $weight_deworming =  $request->input('weight_deworming')[$hde];
                    // echo '<pre>';
                    // print_r( $dosage_hm );
                    // die();
                    if ($insert_date_deworming != '' and $name_deworming != '') {
                        // echo '<pre>';
                        // print_r( $insert_date_hm );
                        // die();
                        // $que_deworming = "INSERT INTO dp_health_matters(pd, insert_date, due_date, name, dosage) VALUES('$pd','$insert_date_hm','$due_date_hm','$name_hm','$dosage_hm')";
                        // $query_que_deworming = mysqli_query($aVar, $que_deworming);
                                $de= DB::table('dp_deworming')->max('deworming_id');
                                $de1 = $de+'1';
                                        // echo '<pre>';
                                        // print_r( $q1 );
                                        // die();
                        DB::table('dp_deworming')->insert([
                            // 'insert_date'=> $request->input('insert_date_vaccines'),
                            // 'name'=> $request->input('name_hm'),
                            // 'due_date'=>$request->input('due_date_hm'),
                            // 'dosage'=> $request->input('dosage_hm')
                            'pd' => $pd,
                            'deworming_id'=>$de1,
                            'weight'=>$weight_deworming,
                            'insert_date'=>$insert_date_deworming,
                            'name'=>$name_deworming,
                            'dosage'=>$dosage_deworming,
                            'due_date'=>$due_date_deworming,
                        ]);
                        // dd(DB::getQueryLog());
                    //     echo '<pre>';
                    //     print_r( $name_hm );
                    //   die();
                    }
                }
            }
        }








           // for health matters
           if(isset($request->dateofbirth)){
            $liRMData = count( $request->input('dateofbirth'));
            // echo '<pre>';
            // print_r($iHMData);
            // die();

            if($liRMData>0){
                for ($hli = 0; $hli < $liRMData; $hli++) {
                    $dateofbirth =  $request->input('dateofbirth')[$hli];
                    $breeding_partner =  $request->input('breeding_partner')[$hli];
                    $breed_bookno =  $request->input('breed_bookno')[$hli];
                    $breederinfo =  $request->input('breederinfo')[$hli];
                    $letter =  $request->input('letter')[$hli];
                    $males_total =  $request->input('males_total')[$hli];
                    // echo '<pre>';
                    // print_r( $dosage_hm );
                    // die();
                    if ($dateofbirth != '' and $breeding_partner != '') {
                        // echo '<pre>';
                        // print_r( $insert_date_hm );
                        // die();
                        // $que_deworming = "INSERT INTO dp_health_matters(pd, insert_date, due_date, name, dosage) VALUES('$pd','$insert_date_hm','$due_date_hm','$name_hm','$dosage_hm')";
                        // $query_que_deworming = mysqli_query($aVar, $que_deworming);
                                $li= DB::table('dp_litters')->max('litter_id');
                                $li1 = $li+'1';
                                        // echo '<pre>';
                                        // print_r( $q1 );
                                        // die();
                        DB::table('dp_litters')->insert([
                            // 'insert_date'=> $request->input('insert_date_vaccines'),
                            // 'name'=> $request->input('name_hm'),
                            // 'due_date'=>$request->input('due_date_hm'),
                            // 'dosage'=> $request->input('dosage_hm')
                            'pd' => $pd,
                            'males_total' => $males_total,
                            'litter_id'=>$li1,
                            'letter'=>$letter,
                            'dateofbirth'=>$dateofbirth,
                            'breeding_partner'=>$breeding_partner,
                            'breed_bookno'=>$breed_bookno,
                            'breeder'=>$breederinfo,
                        ]);
                        // dd(DB::getQueryLog());
                    //     echo '<pre>';
                    //     print_r( $name_hm );
                    //   die();
                    }
                }
            }
        }



           // for health matters
           if(isset($request->show)){
            $dtMData = count( $request->input('show'));
            // echo '<pre>';
            // print_r($iHMData);
            // die();

            if($dtMData>0){
                for ($hdt = 0; $hdt < $dtMData; $hdt++) {
                    $show =  $request->input('show')[$hdt];
                    $country =  $request->input('country')[$hdt];
                    $judge =  $request->input('judge')[$hdt];
                    $rank =  $request->input('rank')[$hdt];
                    $place =  $request->input('place')[$hdt];
                    // $override =  $request->input('override')[$hdt];
                    $ov =$hdt+1;
                    $override = $request->input('override')[$hdt];

                    if (isset($_POST['override']) && $_POST['override'] == $ov) {
                        $override =$request->input('override');
                    } else {
                        $override = 0;
                    }


                    // echo '<pre>';
                    // print_r( $dosage_hm );
                    // die();
                    if ($show != '' and $country != '') {
                        // echo '<pre>';
                        // print_r( $insert_date_hm );
                        // die();
                        // $que_deworming = "INSERT INTO dp_health_matters(pd, insert_date, due_date, name, dosage) VALUES('$pd','$insert_date_hm','$due_date_hm','$name_hm','$dosage_hm')";
                        // $query_que_deworming = mysqli_query($aVar, $que_deworming);
                                // $li= DB::table('dp_litters')->max('litter_id');
                                // $li1 = $li+'1';




                                        // echo '<pre>';
                                        // print_r( $q1 );
                                        // die();
                        DB::table('dp_pd_show')->insert([
                            // 'insert_date'=> $request->input('insert_date_vaccines'),
                            // 'name'=> $request->input('name_hm'),
                            // 'due_date'=>$request->input('due_date_hm'),
                            // 'dosage'=> $request->input('dosage_hm')
                            'sz' => $pd,
                            'override' => $override,
                            // 'litter_id'=>$li1,
                            'place'=>$place,
                            'cat'=>$show,
                            'country'=>$country,
                            'judge'=>$judge,
                            'rank'=>$rank,
                        ]);
                        // dd(DB::getQueryLog());
                    //     echo '<pre>';
                    //     print_r( $name_hm );
                    //   die();
                    }
                }
            }
        }



        $res->save();
        $request->session()->flash('msg','Pedigree Added!!');
        return redirect('addpedigree');
    }


    public function manage_pedigree()
    {


        $a = DB::table('member_profile')->where('user_name',session()->get('name'))->get();
        foreach($a as $c){
            // echo '<pre>';
            // print_r($c->user_id);
            // die();
            $user_id = $c->user_id;
        }


        $result = DB::table('pd_enteries')->where('added_by',$user_id)->get();
        // echo'<pre>';
        // print_r(session()->get('name'));
        // die();
        // $data = Add_image::paginate(6);
        // return view('manage-images',compact('result'))->with('todoCat',$data);
        return view('manage-pedigree',compact('result'));
        // return view('manage-images');


        // return view('manage-pedigree');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pd_entery  $pd_entery
     * @return \Illuminate\Http\Response
     */
    public function show(pd_entery $pd_entery)
    {
        return view('home')->with('todoPd',pd_entery::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pd_entery  $pd_entery
     * @return \Illuminate\Http\Response
     */
    public function edit(pd_entery $pd_entery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pd_entery  $pd_entery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pd_entery $pd_entery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pd_entery  $pd_entery
     * @return \Illuminate\Http\Response
     */
    public function destroy(pd_entery $pd_entery)
    {
        //
    }
}
