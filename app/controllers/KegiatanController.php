<?php

class KegiatanController extends ControllerBase
{
    public function indexAction()
    {
        
    }

    public function aturKegiatanAction()
    {
        $this->view->kegiatans = Kegiatan::find();
    }
    
    public function lihatKegiatanAction()
    {
        $this->view->kegiatans = Kegiatan::find();
    }
    
    public function lihatPendaftarAction($kegiatan_id)
    {
        $this->view->pendaftars = Pendaftar::find([
            'conditions' => 'fk_kegiatan_id = :kegiatan_id:',
            'bind'       => [
                'kegiatan_id' => $kegiatan_id,
            ],
        ]);

        $this->view->kegiatans = Kegiatan::findfirst([
            'conditions' => 'kegiatan_id = :kegiatan_id:',
            'bind'       => [
                'kegiatan_id' => $kegiatan_id,
            ],
        ]);
    }
    
    public function detailKegiatanAction($kegiatan_id)
    {
        $this->view->kegiatan = Kegiatan::findFirst([
            'conditions' => 'kegiatan_id = :kegiatan_id:',
            'bind'       => [
                'kegiatan_id' => $kegiatan_id,
            ],
        ]);
        $this->view->totalpendaftar = Pendaftar::count(
            [
                'conditions' => "fk_kegiatan_id = :kegiatan_id:",
                'bind'       => [
                    'kegiatan_id' => $kegiatan_id,
                ],
            ]
        );
    }

    public function daftarKegiatanAction($kegiatan_id)
    {
        $dataSent = $this->request->getPost();
        $email = $this->request->getPost('pendaftar_contact');
        $pendaftar = new Pendaftar;

        $exist =  Pendaftar::findFirst(     
            [
                'conditions' => 'pendaftar_contact = :email: AND fk_kegiatan_id = :kegiatan_id:',
                'bind'       => [
                    'email' => $email,
                    'kegiatan_id' => $kegiatan_id,
                ],
            ]
        );
        if($exist)
        {
            $success = false;
            header("refresh:2;url=/kegiatan/lihatkegiatan");
            echo "<div class='alert alert-danger'> Email ini sudah terdaftar pada kegiatan ini! </div>";                
        }

        else if(!$exist && $this->request->isPost())
        {
            $pendaftar->pendaftar_nama = $dataSent["pendaftar_nama"];
            $pendaftar->pendaftar_contact = $dataSent["pendaftar_contact"];
            $pendaftar->pendaftar_alamat = $dataSent["pendaftar_alamat"];
            $pendaftar->fk_kegiatan_id = $kegiatan_id;

            $success = $pendaftar->save();
        }
        if($success)
        {
            echo "<div class='alert alert-success'>Anda berhasil terdaftar! </div>";
            header("refresh:2;url=/kegiatan/lihatkegiatan");
        } else 
        {
            $messages = $pendaftar->getMessages();

            foreach ($messages as $message) {
                echo "<div class='alert alert-danger'>", $message->getMessage(), "</div>";
            }
            header("refresh:2;url=/kegiatan/lihatkegiatan");
        }
    }

    public function cancelDaftarAction($kegiatan_id)
    {
        $email = $this->request->getPost('pendaftar_contact');

        $exist =  Pendaftar::findFirst(     
            [
                'conditions' => 'pendaftar_contact = :email: AND fk_kegiatan_id = :kegiatan_id:',
                'bind'       => [
                    'email' => $email,
                    'kegiatan_id' => $kegiatan_id,
                ],
            ]
        );
        if (!$exist)
        {
            echo "<div class='alert alert-danger'> Email belum terdaftar di kegiatan ini!</div>";
            header("refresh:2;url=/kegiatan/detailkegiatan/".$kegiatan_id);
        }
        else if ($exist !== false) 
        {
            if ($exist->delete() === false) {
                $messages = $exist->getMessages();

                foreach ($messages as $message) {
                    echo "<div class='alert alert-danger'>", $message,  "</div><br>";
                }
                header("refresh:2;url=/kegiatan/detailkegiatan/".$kegiatan_id);
            } else {
                echo "<div class='alert alert-success'> Pendaftaran berhasil dibatalkan!</div>";
                header("refresh:2;url=/kegiatan/detailkegiatan/".$kegiatan_id);
            }
        } 
    }

    public function addKegiatanAction()
    {
        $this->authorized();
        $success = false;
        
        $dataSent = $this->request->getPost();
        $kegiatan = new Kegiatan;
         
        if($this->request->isPost())
        {
            $kegiatan->kegiatan_nama = $dataSent["kegiatan_nama"];
            $kegiatan->kegiatan_deskripsi = $dataSent["kegiatan_deskripsi"];
            $kegiatan->kegiatan_waktu = $dataSent["kegiatan_waktu"];
            $kegiatan->kegiatan_tanggal = $dataSent["kegiatan_tanggal"];
            $kegiatan->kegiatan_lokasi = $dataSent["kegiatan_lokasi"];
            $kegiatan->setKegiatanFoto(base64_encode(file_get_contents($this->request->getUploadedFiles()[0]->getTempName())));

            $success = $kegiatan->save();
        }
        if($success)
        {
            echo "<div class='alert alert-success'> Data saved! </div>";
            header("refresh:2;url=/kegiatan/aturkegiatan");
        } else 
        {
            $messages = $kegiatan->getMessages();

            foreach ($messages as $message) {
                echo "<div class='alert alert-danger'>", $message->getMessage(), "</div>";
            }
            header("refresh:2;url=/kegiatan/aturkegiatan");
        }
    }

    public function editKegiatanAction($kegiatan_id)
    {
        $this->authorized();
        $success = false;
        $dataSent = $this->request->getPost();

        $exist = Kegiatan::findFirst([
            'conditions' => 'kegiatan_id = :kegiatan_id:',
            'bind'       => [
                'kegiatan_id' => $kegiatan_id,
            ],
        ]);
 
        if($exist)
        {
            $exist->kegiatan_nama = $dataSent["kegiatan_nama"];
            $exist->kegiatan_deskripsi = $dataSent["kegiatan_deskripsi"];
            $exist->kegiatan_waktu = $dataSent["kegiatan_waktu"];
            $exist->kegiatan_lokasi = $dataSent["kegiatan_lokasi"];
            $exist->setKegiatanFoto(base64_encode(file_get_contents($this->request->getUploadedFiles()[0]->getTempName())));

            $success = $exist->update();
        }
        if($success)
        {
            echo "<div class='alert alert-success'> Data berhasil diubah! </div>";
            header("refresh:2;url=/kegiatan/aturkegiatan");
        } else 
        {
            $messages = $kegiatan->getMessages();

                foreach ($messages as $message) {
                    echo "<div class='alert alert-danger'>", $message,  "</div><br>";
                }
            header("refresh:2;url=/kegiatan/aturkegiatan");
        }
    }

    public function hapusKegiatanAction($kegiatan_id)
    {
        $this->authorized();

        $kegiatan = Kegiatan::findFirst([
            'conditions' => 'kegiatan_id = :kegiatan_id:',
            'bind'       => [
                'kegiatan_id' => $kegiatan_id,
            ],
        ]);

        if ($kegiatan !== false) {
            if ($kegiatan->delete() === false) {
                $messages = $kegiatan->getMessages();

                foreach ($messages as $message) {
                    echo "<div class='alert alert-danger'>", $message,  "</div><br>";
                }
                header("refresh:2;url=/kegiatan/aturkegiatan");
            } else {
                echo "<div class='alert alert-success'> Kegiatan berhasil dihapus!</div>";
                header("refresh:2;url=/kegiatan/aturkegiatan");
            }
        }
    }

}