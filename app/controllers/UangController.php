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

        $this->view->uangs = Uang::find(
            [
                'conditions' => "uang_nominal > 0",
            ]
        );
        $this->view->total = Uang::sum(
            [
                'column' => 'uang_nominal',
            ]
        );
        $this->view->pengeluarans = Uang::find(
            [
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

            $success = $uang->save();
        }

        if ($success) {
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