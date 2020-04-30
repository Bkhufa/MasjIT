<?php

class UangController extends ControllerBase
{
    public function indexAction()
    {
        
    }

    public function tambahuangAction()
    {

    }

    public function kuranguangAction()
    {

    }

    public function addUangAction()
    {
        $uang = new Uang();

        if($this->request->isPost())
        {
            
            $dataSent = $this->request->getPost();
            
            $uang->uang_pengirim = $dataSent["uang_pengirim"];
            $uang->uang_nominal = $dataSent["uang_nominal"];
            $uang->uang_pesan = $dataSent["uang_pesan"];
            $uang->uang_total = $uang->uang_pesan;
            $uang->setUangBukti(base64_encode(file_get_contents($this->request->getUploadedFiles()[0]->getTempName())));

            $success = $uang->save();
        }

        if ($success) {
            echo "<div class='alert alert-success'> Terimakasih atas donasi anda! </div>";
            header("refresh:2;url=/uang/tambahuang");
        } else {
            // echo "Oops, seems like the following issues were encountered: ";

            $messages = $uang->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }
        // $this->view->message = $message;
        // $this->view->disable();
    }

    public function lihatUangAction()
    {
        $this->authorized();

        $this->view->totalUang = Uang::sum(
            [
                'column' => 'uang_nominal',
            ]
        );
        $this->view->donasi = Uang::find(
            [
                'conditions' => "uang_nominal > 0",
            ]
        );
        $this->view->totalDonasi = Uang::sum(
            [
                'column' => 'uang_nominal',
                'conditions' => "uang_nominal > 0",
            ]
        );
        $this->view->pengeluarans = Uang::find(
            [
                'conditions' => "uang_nominal < 0",
            ]
        );
        $this->view->totalPengeluaran = Uang::sum(
            [
                'column' => 'uang_nominal',
                'conditions' => "uang_nominal < 0",
            ]
        );
    }

    public function pengeluaranAction()
    {
        $uang = new Uang();

        if($this->request->isPost())
        {
            
            $dataSent = $this->request->getPost();
            
            $uang->uang_pengirim = $this->session->get('name');
            $uang->uang_nominal = $dataSent["uang_nominal"];
            $uang->uang_pesan = $dataSent["uang_pesan"];
            $uang->uang_total = $uang->uang_pesan;
            $uang->setUangBukti(base64_encode(file_get_contents($this->request->getUploadedFiles()[0]->getTempName())));

            $success = $uang->save();
        }
        $this->view->totalUang = Uang::sum(
            [
                'column' => 'uang_nominal',
            ]
        );
        if ($this->view->totalUang < 0)
        {
            $uang->delete();
            echo "<div class='alert alert-danger'>Saldo uang kas tidak mencukupi</div>";
            header("refresh:2;url=/uang/lihatuang");
        }
        else if ($success) {
            echo "<div class='alert alert-success'> Pengeluaran tercatat! </div>";
            header("refresh:2;url=/uang/lihatuang");
        } else {
            // echo "Oops, seems like the following issues were encountered: ";

            $messages = $uang->getMessages();

            foreach ($messages as $message) {
                echo "<div class='alert alert-danger'>", $message->getMessage(), "</div>";
                header("refresh:2;url=/uang/kuranguang");
            }
        }
    }

}