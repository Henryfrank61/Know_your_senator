<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    private $postModel, $commentModel, $shared, $userModel;

    protected $db;

    public function __construct()
    {
        helper(['url']);
        $this->shared = new Shared();

        // Initialize the database connection
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data["isLoggedIn"] = $this->shared->isLoggedIn();
        return view('senate', $data);
    }

    public function about()
    {
        $data["isLoggedIn"] = $this->shared->isLoggedIn();
        return view('about-us', $data);
    }

    public function postblogpg()
    {
        $data["isLoggedIn"] = $this->shared->isLoggedIn();
        return view('postblogpg', $data);
    }

    public function hor()
    {
        // Fetch unique states from the house_of_reps table
        $query = $this->db->query("SELECT DISTINCT state FROM house_of_reps");
        $data["states"] = $query->getResultArray();

        $data["isLoggedIn"] = $this->shared->isLoggedIn();
        return view('hor', $data);
    }

    // Method to fetch constituencies based on selected state
    public function getHorConstituencies()
    {
        $state = $this->request->getPost('state');

        // Fetch constituencies based on the selected state
        $query = $this->db->query("SELECT DISTINCT constituencies FROM house_of_reps WHERE state = ?", [$state]);
        $constituencies = $query->getResultArray();

        return $this->response->setJSON($constituencies);
    }

    public function submitHor()
    {
        $state = $this->request->getPost('state');
        $constituency = $this->request->getPost('constituency');

        // Fetch the repId based on state and constituency
        $query = $this->db->query("SELECT repId FROM house_of_reps WHERE state = ? AND constituencies = ?", [$state, $constituency]);
        $result = $query->getRow();

        if ($result) {
            $repId = $result->repId;

            // Fetch honourable details based on repId from honourable table
            $query = $this->db->query("SELECT * FROM honorables WHERE repId = ?", [$repId]);
            $honourable = $query->getRowArray();

            // Pass the honourable data to the result view
            return view('resultpop', ['profile' => $honourable]);
        } else {
            // Handle case where no matching repId is found
            return redirect()->back()->with('error', 'No representative found for the selected state and constituency.');
        }
    }


    public function resultpop()
    {
        $data["isLoggedIn"] = $this->shared->isLoggedIn();
        return view('resultpop', $data);
    }

    public function subsenate()
    {
        // Fetch unique states from the house_of_reps table
        $query = $this->db->query("SELECT DISTINCT state FROM senatorial_district");
        $data["states"] = $query->getResultArray();

        $data["isLoggedIn"] = $this->shared->isLoggedIn();
        return view('subsenate', $data);
    }

    public function getSenatorialDistrict()
    {
        $state = $this->request->getPost('state');

        // Fetch constituencies based on the selected state
        $query = $this->db->query("SELECT DISTINCT districtName FROM senatorial_district WHERE state = ?", [$state]);
        $senatorialDistrict = $query->getResultArray();

        return $this->response->setJSON($senatorialDistrict);
    }

    public function submitSenate()
    {
        $state = $this->request->getPost('state');
        $district = $this->request->getPost('district');

        // Fetch the repId based on state and constituency
        $query = $this->db->query("SELECT senatorId FROM senatorial_district WHERE state = ? AND districtName = ?", [$state, $district]);
        $result = $query->getRow();

        if ($result) {
            $senatorId = $result->senatorId;

            // Fetch honourable details based on repId from honourable table
            $query = $this->db->query("SELECT * FROM senators WHERE senatorId = ?", [$senatorId]);
            $senators = $query->getRowArray();

            // Pass the honourable data to the result view
            return view('resultpop', ['profile' => $senators]);
        } else {
            // Handle case where no matching repId is found
            return redirect()->back()->with('error', 'No representative found for the selected state and Snatorial District.');
        }
    }
}
