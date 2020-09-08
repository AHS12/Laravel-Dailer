<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ContactModel;

class ContactController extends Controller
{
    //

    /**
     * @name contactSearch
     * @role filter and find suitable contacts and matching contacts from database
     * @param Request form data
     * @return JSON response
     *
     */
    public function contactSearch(Request $request)
    {

        //dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'queryFilter' => 'required|string|min:1',
            ]
        );

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

            $queryText = $request->queryFilter;
            // dd($queryText);

            $outputArray = [];
            $contactsByNumberids = [];
            //filter as number
            $number = $queryText;
            $contactsByNumber = ContactModel::where('phone','LIKE','%'.$number.'%')->get();
            //$contactsByNumberids = ContactModel::where('phone','LIKE','%'.$number.'%')->pluck('id')->toArray();

            foreach($contactsByNumber as $cnumber){
                $outputArray[] =  $cnumber;
                $contactsByNumberids[] = $cnumber->id;
            }
            //dd($contactsByNumberids);

            //filter as character
            $char = $this->numberToStr($queryText);
            $contactsByChar = ContactModel::whereNotIn('id',$contactsByNumberids)->where('first_name','LIKE','%'.$char.'%')
            ->orWhere('last_name','LIKE','%'.$char.'%')->get();

            foreach($contactsByChar as $chnumber){
                $outputArray[] =  $chnumber;
            }

            return response()->json($outputArray);

        }
    }

    /**
     * @name numberToStr
     * @role convert the typed number into string
     * @param string
     * @return string
     *
     */
    public function numberToStr($string)
    {

        $returnString = '';


        $countofTwo = substr_count($string, '2');
        $countofThree = substr_count($string, '3');
        $countoffour = substr_count($string, '4');
        $countofFive = substr_count($string, '5');
        $countofSix = substr_count($string, '6');
        $countofSeven = substr_count($string, '7');
        $countofEight = substr_count($string, '8');
        $countofNine = substr_count($string, '9');

        //dd($countofTwo.','.$countofThree.','.$countoffour.','.$countofFive);

        //finding 2's string
        switch ($countofTwo) {
            case 1:
                $returnString .= 'A';
                break;
            case 2:
                $returnString .= 'B';
                break;
            case 3:
                $returnString .= 'C';
                break;
        }

        //finding 3's string

        switch ($countofThree) {
            case 1:
                $returnString .= 'D';
                break;
            case 2:
                $returnString .= 'E';
                break;
            case 3:
                $returnString .= 'F';
                break;    
        }

        //finding 4's string
        switch ($countoffour) {
            case 1:
                $returnString .= 'G';
                break;
            case 2:
                $returnString .= 'H';
                break;
            case  3:
                $returnString .= 'I';
                break;
        }

        //finding 5's string
        switch ($countofFive) {
            case 1:
                $returnString .= 'J';
                break;
            case 2:
                $returnString .= 'K';
                break;
            case 3:
                $returnString .= 'L';
                break;
        }

        //finding 6's string
        switch ($countofSix) {
            case 1:
                $returnString .= 'M';
                break;
            case 2:
                $returnString .= 'N';
                break;
            case 3:
                $returnString .= 'O';
                break;
        }

        //finding 7's string
        switch ($countofSeven) {
            case 1:
                $returnString .= 'P';
                break;
            case 2:
                $returnString .= 'Q';
                break;
            case 3:
                $returnString .= 'R';
                break;
            case 4:
                $returnString .= 'S';
                break;
        }

        //finding 8's string
        switch ($countofEight) {
            case 1:
                $returnString .= 'T';
                break;
            case 2:
                $returnString .= 'U';
                break;
            case 3:
                $returnString .= 'V';
                break;
        }

        //finding 9's string
        switch ($countofNine) {
            case 1:
                $returnString .= 'W';
                break;
            case 2:
                $returnString .= 'X';
                break;
            case 3:
                $returnString .= 'Y';
                break;
            case 4:
                $returnString .= 'Z';
                break;
        }


        return $returnString;
    }
    

    /**
     * @name processStringForSearch
     * @role convert the number string into searchable string
     * @param string
     * @return string
     *
     */
    function processStringForSearch($string){
        $returnString = '';
        $occurenceString = '';
        for ($i=0; $i < strlen($string); $i++) { 
            $currentIndex = $i;
            $nextIndex = $i+1;
        
            

            $currentIndexChar = $string[$currentIndex];
            $nextIndexChar = $string[$nextIndex];

            if ($currentIndexChar == $nextIndexChar) {
                $occurenceString .= $currentIndexChar;
            } else {
              $occurenceString = $currentIndexChar;
            }
        }

        return $returnString;

    }

    
}
