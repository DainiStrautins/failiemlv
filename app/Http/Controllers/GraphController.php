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

        $chart = new Graph; // Creates new Graph
        $chart->labels($this->getAllMonths()); // Assigns Labels
        $chart->dataset('Upload Count', 'bar', $this->getMonthlyPostData()) // Assigns legend name, type of chart, and values
            ->backgroundColor('#007bff'); // color
        return view('graph.index',['chart' => $chart]);
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
        $monthly_post_count = Upload::where('user_id',auth()->user()->id)->whereMonth( 'created_at', $month )->get()->count(); // Gets count of uploads in this month, method what is used later
        return $monthly_post_count; // returns the value
    }

    function getMonthlyPostData() {
        $monthly_post_count_array = array(); // created variable as array
        $month_array = $this->getAllMonths(); // Gets all months
        if (! empty( $month_array )) { // Check if not empty
            foreach ( $month_array as $month_no ){ // For each month do{...}
                $month_no = date('m',strtotime($month_no)); // Formats date
                $monthly_post_count = $this->getMonthlyPostCount( $month_no ); // Gets count based on each month in the loop
                array_push( $monthly_post_count_array, $monthly_post_count );  // Push elements onto the end of array
            }
        }
        $monthly_post_data_array = $monthly_post_count_array;

        return $monthly_post_data_array;
    }
}
