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

    public function deleteAction()
    {
        $this->view->kegiatans = Kegiatan::find();
    }


    public function addKegiatanAction()
    {
        $this->authorized();
        $success = false;
        
        $dataSent = $this->request->getPost();
        $kegiatan = new Kegiatan;
        // $kegiatan_id = $datasent["kegiatan_id"];
         
        if($this->request->isPost())
        {
            $kegiatan->kegiatan_nama = $dataSent["kegiatan_nama"];
            $kegiatan->kegiatan_deskripsi = $dataSent["kegiatan_deskripsi"];
            $kegiatan->kegiatan_waktu = $dataSent["kegiatan_waktu"];
            $kegiatan->kegiatan_tanggal = $dataSent["kegiatan_tanggal"];
            $kegiatan->kegiatan_lokasi = $dataSent["kegiatan_lokasi"];
            // $kegiatan->kegiatan_foto = $dataSent["kegiatan_foto"];

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
            // $exist->kegiatan_pendaftar = $dataSent["phone"];

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