<?php

namespace App\Http\Controllers;
use App\Upload;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use App\Charts\Graph;
class GraphController extends Controller
{
    public function index()
    {

        $chart = new Graph;
        $chart->labels($this->getAllMonths());
        $chart->dataset('My dataset', 'bar', $this->getMonthlyPostData())
            ->backgroundColor('#007bff');



        return view('graph.index',['chart' => $chart]);
    }
    public function show($id)
    {

    }


    function getAllMonths(){

        $month_array = array(); // creates an array
        $posts_dates = Upload::where('user_id',auth()->user()->id)->orderBy('created_at', 'ASC')->pluck('created_at'); // gets information, query

        $posts_dates = json_decode( $posts_dates ); // re-formats date to string type date
        if ( ! empty( $posts_dates ) ) { // precedes further if there are any uploads
            foreach ( $posts_dates as $unformatted_date ) {
                $date = new \DateTime( $unformatted_date); // gets date
                $month_name = $date->format( 'F' ); // formats date

                $month_array[] = $month_name; // saves date into array
            }
        }
        $month_array = array_unique($month_array);
        return array_values($month_array); // returns unique values from array
    }
    function getMonthlyPostCount( $month ) {
        $monthly_post_count = Upload::where('user_id',auth()->user()->id)->whereMonth( 'created_at', $month )->get()->count();
        return $monthly_post_count;
    }

    function getMonthlyPostData() {

        $monthly_post_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        if (! empty( $month_array )) {
            foreach ( $month_array as $month_no ){
                $month_no = date('m',strtotime($month_no));

                $monthly_post_count = $this->getMonthlyPostCount( $month_no );


                array_push( $monthly_post_count_array, $monthly_post_count );
            }
        }
        $monthly_post_data_array = $monthly_post_count_array;

        return $monthly_post_data_array;

    }
}
