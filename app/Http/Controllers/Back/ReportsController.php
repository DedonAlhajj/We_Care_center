<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\back\cln_x_prev_dia;
use App\Models\back\gnr_m_areas;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ReportsController extends Controller
{
    public function index()
    {
        $area = gnr_m_areas::all();
        return view('back.reports.index', compact('area'));
    }
    public function create()
    {
        $dia = cln_x_prev_dia::all();
        return view('back.reports.create', compact('dia'));
    }

    public function store(Request $request)
    {
        $array = array(
            0 => array(
                'area_id' => 5,
                'area_name' => 'مزة',
                'd1' => array(
                    0 => array(
                        'name' => "low back pain",
                        'num' => '43.3%',
                    ),
                    1 => array(
                        'name' => "كريب",
                        'num' => '20.8%',
                    ),
                    2 => array(
                        'name' => "تسريب حديد",
                        'num' => '18.8%',
                    ),
                    3 => array(
                        'name' => "thoracic pain",
                        'num' => '17.1%',
                    ),
                ),

            ),
            1 => array(
                'area_id' => 2865,
                'area_name' => 'مساكن الحرس',
                'd1' => array(
                    0 => array(
                        'name' => "شك كورونا",
                        'num' => '27.1%',
                    ),
                    1 => array(
                        'name' => "كريب",
                        'num' => '35.1%',
                    ),
                    2 => array(
                        'name' => "التهاب أمعاء",
                        'num' => '19.4%',
                    ),
                    3 => array(
                        'name' => "طلب تحليل",
                        'num' => '18.3%',
                    ),
                ),

            ),
            2 => array(
                'area_id' => 175,
                'area_name' => 'قرى الأطفال SOS',
                'd1' => array(
                    0 => array(
                        'name' => "التهاب أمعاء",
                        'num' => '18.9%',
                    ),
                    1 => array(
                        'name' => "كريب",
                        'num' => '43.2%',
                    ),
                    2 => array(
                        'name' => "عد شائع",
                        'num' => '18.9%',
                    ),
                    3 => array(
                        'name' => "شك كورونا",
                        'num' => '16.9%',
                    ),
                ),

            ),
            3 => array(
                'area_id' => 668,
                'area_name' => 'الغزلانية',
                'd1' => array(
                    0 => array(
                        'name' => "هبوط توتر",
                        'num' => '16.7%',
                    ),
                    1 => array(
                        'name' => "كريب",
                        'num' => '50.0%',
                    ),
                    2 => array(
                        'name' => "وهن عام",
                        'num' => '16.7%',
                    ),
                    3 => array(
                        'name' => "التهاب بلعوم",
                        'num' => '16.7%',
                    ),
                ),

            ),
            4 => array(
                'area_id' => 182,
                'area_name' => 'الروضة',
                'd1' => array(
                    0 => array(
                        'name' => "low back pain",
                        'num' => '40.9%',
                    ),
                    1 => array(
                        'name' => "التهاب انف تحسس",
                        'num' => '13.6%',
                    ),
                    2 => array(
                        'name' => "تسريب حديد",
                        'num' => '31.8%',
                    ),
                    3 => array(
                        'name' => "الفحص طبيعي",
                        'num' => '13.6%',
                    ),
                ),

            ),
            5 => array(
                'area_id' => 512,
                'area_name' => 'ديماس',
                'd1' => array(
                    0 => array(
                        'name' => "التهاب أمعاء",
                        'num' => '35.7%',
                    ),
                    1 => array(
                        'name' => "التهاب معدة",
                        'num' => '21.4%',
                    ),
                    2 => array(
                        'name' => "كورونا",
                        'num' => '21.4%',
                    ),
                    3 => array(
                        'name' => "طلب تحليل",
                        'num' => '21.4%',
                    ),
                ),

            ),
            6 => array(
                'area_id' => 64,
                'area_name' => 'ضاحية قدسيا',
                'd1' => array(
                    0 => array(
                        'name' => "شك كورونا",
                        'num' => '27.5%',
                    ),
                    1 => array(
                        'name' => "كريب",
                        'num' => '33.9%',
                    ),
                    2 => array(
                        'name' => "التهاب امعاء",
                        'num' => '21.9%',
                    ),
                    3 => array(
                        'name' => "طلب تحليل",
                        'num' => '16.7%',
                    ),
                ),

            ),
        );

        foreach ( $array  as $groupid => $fields) {
           $area_id = $fields['area_id'];
           if($area_id == $request->area){
              $arr =  [$fields['area_name'],
                  $fields['d1'][0]['name'],
                  $fields['d1'][0]['num'],
                  $fields['d1'][1]['name'],
                  $fields['d1'][1]['num'],
                  $fields['d1'][2]['name'],
                  $fields['d1'][2]['num'],
                  $fields['d1'][3]['name'],
                  $fields['d1'][3]['num']];
              return $arr;
           }

        }

    }

    public function update(Request $request,string $gfdg)
    {

        $array = array(
            0 => array(
                'area_name' => 'انتان تنفسي علوي',
                'd1' => array(
                    0 => array(
                        'name' => "مشروع دمر",
                        'num' => '66.7%',
                    ),
                    1 => array(
                        'name' => "ضاحية قدسيا",
                        'num' => '17.3%',
                    ),
                    2 => array(
                        'name' => "مساكن الحرس",
                        'num' => '9.0%',
                    ),
                    3 => array(
                        'name' => "قدسيا البلد",
                        'num' => '6.9%',
                    ),
                ),

            ),
            1 => array(
                'area_name' => 'التهاب اذن وسطى يسرى حاد',
                'd1' => array(
                    0 => array(
                        'name' => "مشروع دمر",
                        'num' => '71.8%',
                    ),
                    1 => array(
                        'name' => "ضاحية قدسيا",
                        'num' => '12.8%',
                    ),
                    2 => array(
                        'name' => "دمر البلد",
                        'num' => '7.7%',
                    ),
                    3 => array(
                        'name' => "مهاجرين",
                        'num' => '7.7%',
                    ),
                ),

            ),
            2 => array(
                'area_name' => 'شرى حاد&nbsp',
                'd1' => array(
                    0 => array(
                        'name' => "مشروع دمر",
                        'num' => '45.0%',
                    ),
                    1 => array(
                        'name' => "ضاحية قدسيا",
                        'num' => '25.0%',
                    ),
                    2 => array(
                        'name' => "مزة",
                        'num' => '15.0%',
                    ),
                    3 => array(
                        'name' => "مساكن الحرس",
                        'num' => '15.0%',
                    ),
                ),

            ),
            3 => array(
                'area_name' => 'رشح',
                'd1' => array(
                    0 => array(
                        'name' => "مشروع دمر",
                        'num' => '68.3%',
                    ),
                    1 => array(
                        'name' => "ضاحية قدسيا",
                        'num' => '22.0%',
                    ),
                    2 => array(
                        'name' => "الهامة",
                        'num' => '4.9%',
                    ),
                    3 => array(
                        'name' => "مساكن الحرس",
                        'num' => '4.9%',
                    ),
                ),

            ),
            4 => array(
                'area_id' => 182,
                'area_name' => 'أكزيما مجرى سمع أيسر',
                'd1' => array(
                    0 => array(
                        'name' => "مساكن الحرس",
                        'num' => '50.0%',
                    ),
                    1 => array(
                        'name' => "قدسيا البلد",
                        'num' => '50.0%',
                    ),
                    2 => array(
                        'name' => "-----",
                        'num' => '-----',
                    ),
                    3 => array(
                        'name' => "-----",
                        'num' => '------',
                    ),
                ),

            ),
            5 => array(
                'area_id' => 512,
                'area_name' => 'نوبة ربوية خفيفة',
                'd1' => array(
                    0 => array(
                        'name' => "مساكن الحرس",
                        'num' => '20.0%',
                    ),
                    1 => array(
                        'name' => "مشروع دمر",
                        'num' => '80.0%',
                    ),
                    2 => array(
                        'name' => "",
                        'num' => '',
                    ),
                    3 => array(
                        'name' => "",
                        'num' => '',
                    ),
                ),

            ),
        );

        foreach ( $array  as $groupid => $fields) {
            $area_id = $fields['area_name'];
            if($area_id == $request->area){
                $arr =  [$fields['area_name'],
                    $fields['d1'][0]['name'],
                    $fields['d1'][0]['num'],
                    $fields['d1'][1]['name'],
                    $fields['d1'][1]['num'],
                    $fields['d1'][2]['name'],
                    $fields['d1'][2]['num'],
                    $fields['d1'][3]['name'],
                    $fields['d1'][3]['num']];
                return $arr;
            }

        }
    }

}
