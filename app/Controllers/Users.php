<?php

namespace App\Controllers;
use App\Models\Model_pemasukan;
use App\Models\Model_pengeluaran;
use App\Models\Model_saldo;
class Users extends BaseController
{

    protected $Model_pemasukan;
    protected $Model_pengeluaran;
    protected $Model_saldo;
    public function __construct()
    {
        $this->saldo = new Model_saldo();
        $this->pemasukan = new Model_pemasukan();
        $this->pengeluaran = new Model_pengeluaran();
    }


    public function index()
    {
        $getdata = $this->pemasukan->findAll();
        return view('Layout/Pemasukan', ['getdata' => $getdata]);
    }

    public function save_pemasukan()
    {
        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'jumlah' => 'required',
                'catatan' => 'required',
                'keterangan' => 'required'
            ];
             if(!$this->validate($rules))
             {
              
                return redirect()->back->withInput()->with('errors', $this->validator->geterrors());
             }
        }
        $data = [
            'jumlah' => htmlspecialchars($this->request->getVar('jumlah')),
            'catatan' => htmlspecialchars($this->request->getVar('catatan')),
            'keterangan' => htmlspecialchars($this->request->getVar('keterangan'))

        ];
        $savedata = $this->pemasukan->insert($data);
  
        if($savedata)
        {
            $getid = $this->pemasukan->getInsertID('id');

            $getjumlah = $this->request->getVar('jumlah');
            
            $data = [
                'id_pemasukan' => $getid,
                'jmlh_saldo' => $getjumlah
            ];

            $getsaldo = $this->saldo->first();
            if($getsaldo == null)
            {
                $insertdata = $this->saldo->insert($data);
            }if($getsaldo == true)
            {
               $jumlahkan =  $getsaldo['jmlh_saldo'] + $getjumlah ;
               $datasaldo = [
                'jmlh_saldo' => $jumlahkan
             ];
               $saveupdate = $this->saldo->update($getsaldo['id'], $datasaldo);

            }
           
        
           
            return redirect()->to(base_url('/'))->with('pesan', 'Data Berhasil Terkirim');
        }
        else{
            return redirect()->to(base_url('/'))->with('errors', 'Data Gagal Terkirim');
        }
    }

   
  public function mysaldo()
  {
        $getsaldo = $this->saldo->findAll();
       
        return view('layout/mysaldo', ['getsaldo' => $getsaldo]);
  }

  public function pengeluaran()
  {
      $getdata = $this->pengeluaran->findAll();
      return view('Layout/Pengeluaran', ['getdata' => $getdata]);
  }


  public function save_pengeluaran()
  {
      if($this->request->getMethod() == 'post')
      {
          $rules = [
              'jumlah' => 'required',
              'catatan' => 'required',
              'keterangan' => 'required'
          ];
           if(!$this->validate($rules))
           {
            
              return redirect()->back->withInput()->with('errors', $this->validator->geterrors());
           }
      }
      $data = [
          'jumlah' => htmlspecialchars($this->request->getVar('jumlah')),
          'catatan' => htmlspecialchars($this->request->getVar('catatan')),
          'keterangan' => htmlspecialchars($this->request->getVar('keterangan'))

      ];
      $savedata = $this->pengeluaran->insert($data);

      if($savedata)
      {
          $getid = $this->pengeluaran->getInsertID('id');

          $getjumlah = $this->request->getVar('jumlah');
          
          $data = [
              'id_pengeluaran' => $getid,
              'jmlh_saldo' => $getjumlah
          ];

          $getsaldo = $this->saldo->first();
          if($getsaldo == null )
          {
              $insertdata = $this->saldo->insert($data);
          }if($getsaldo == true)
          {

            $ceksaldo = $getsaldo['jmlh_saldo'];
            if($ceksaldo < $getjumlah)
            {
               // Menampilkan pesan kesalahan
             
              session()->setFlashdata('errors', 'Saldo tidak cukup.');
              return redirect()->to(base_url('/mysaldo'));
            }
            else{
                $kurangkan =  $getsaldo['jmlh_saldo'] - $getjumlah;
                $datasaldo = [
                 'jmlh_saldo' => $kurangkan
                ];
                $saveupdate = $this->saldo->update($getsaldo['id'], $datasaldo);
            }
            

          }
         
      
         
          return redirect()->to(base_url('/pengeluaran'))->with('pesan', 'Data Berhasil Terkirim');
      }
      else{
          return redirect()->to(base_url('/pengeluaran'))->with('errors', 'Data Gagal Terkirim');
      }
  }
}
