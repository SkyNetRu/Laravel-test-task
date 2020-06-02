<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class Countryusers extends Controller
{
    public function show($country = null)
    {
        if ($country) {
            $countries = Country::where('name', $country)->get();
        } else {
            $countries = Country::All();
        }

        foreach ($countries as $country) {
            echo 'Country - '.$country->name.'<br>';
            foreach ($country->companies as $company) {
                echo '&nbsp;&nbsp;Company - '.$company->name.'<br>';
                echo '&nbsp;&nbsp;Users: <br>';
                foreach ($company->users as $user) {
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;'.$user->name.'<br>';
                }
                echo '<br><hr><br>';
            }
            echo '<hr><hr><br>';
        }


    }
}
