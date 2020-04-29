<?php


class SaranController extends ControllerBase
{
    public function indexAction()
    {
        
    }

    public function tambahsaranAction()
    {

    }

    public function addAction()
    {
        $saran = new Saran();

        if($this->request->isPost())
        {
            
            $dataSent = $this->request->getPost();
            
            $saran->saran_name = $dataSent["saran_name"];
            $saran->saran_category = $dataSent["saran_category"];
            $saran->saran_isi = $dataSent["saran_isi"];

            $success = $saran->save();
        }

        if ($success) {
            echo "<div class='alert alert-success'> Terimakasih atas masukannya! </div>";
            header("refresh:2;url=/saran/tambahsaran");
        } else {
            // echo "Oops, seems like the following issues were encountered: ";

            $messages = $saran->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }
        // $this->view->message = $message;
        // $this->view->disable();
    }

    public function lihatsaranAction()
    {
        $this->authorized();
        $this->view->sarans = Saran::find();
    }
}