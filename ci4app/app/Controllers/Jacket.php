<?php

namespace App\Controllers;

use App\Models\JacketModel;

class Jacket extends BaseController
{
    protected $jacketModel;
    public function __construct()
    {
        $this->jacketModel = new JacketModel();
    }

    public function index()
    {
        // $jacket = $this->jacketModel->findAll();

        $data = [
            'title' => 'Jacket List',
            'jacket' => $this->jacketModel->getJacket()
        ];

        // $jacketModel = new \App\Models\JacketModel();
        // $jacketModel = new JacketModel();


        return view('jacket/index', $data);
    }


    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Jacket',
            'jacket' => $this->jacketModel->getJacket($slug)
        ];

        //jika jacket tidak terdapat pada tabel
        if (empty($data['jacket'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Jacket name ' . $slug .
                ' not found.');
        }


        return view('jacket/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Add Jacket Data',
            'validation' => \Config\Services::validation()
        ];
        return view('jacket/create', $data);
    }

    public function save()
    {
        // dd($this->request->getVar('name'));

        // validasi input
        if (!$this->validate([
            // *'name' => 'required|is_unique[jacket.name]',
            //'product_price' => 'required|is_unique[jacket.product_price]',
            // 'product_code' => 'required|is_unique[jacket.product_code]',
            // 'pictures' => 'required|is_unique[jacket.pictures]'

            'name' => [
                'rules' => 'required|is_unique[jacket.name]',
                'errors' => [
                    'required' => '{field} this is required.',
                    'is_unique' => '{field} this is already registered'
                ]
            ],
            'product_code' => [
                'rules' => 'required|is_unique[jacket.product_code]',
                'errors' => [
                    'required' => '{field} this is required.',
                    'is_unique' => '{field} this is already registered'
                ]
            ],
            'pictures' => [
                'rules' => 'required|is_unique[jacket.pictures]',
                'errors' => [
                    'required' => '{field} this is required.',
                    'is_unique' => '{field} this is already registered'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/jacket/create')->withInput()->with('validation', $validation);
        }


        $slug = url_title($this->request->getVar('name'), '-', true);
        $this->jacketModel->save([
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'product_price' => $this->request->getVar('product_price'),
            'product_code' => $this->request->getVar('product_code'),
            'pictures' => $this->request->getVar('pictures')
        ]);

        session()->setFlashdata('message', 'Managed to add.');

        return redirect()->to('/jacket');
    }
}
