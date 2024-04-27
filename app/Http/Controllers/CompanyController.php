<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
class CompanyController extends Controller
{
    protected $companyData;

    public function __construct()
    {
        $this->companyData = $this->getCompanyData(); // Automatically fetch company data
    }

    protected function getCompanyData()
    {
        $company = Config::first();
        return $company;
    }

}
