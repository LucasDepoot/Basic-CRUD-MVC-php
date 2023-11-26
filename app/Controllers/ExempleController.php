<?php
namespace App\Controllers;

use App\Models\Exemple;

class ExempleController extends CoreController
{
    // Affiche Home
    public function exemple()
    {
        $exempleList = Exemple::findAll();
        $this->show('exemple/exemple',['listOfExemple'=>$exempleList]);
    }
    // Affiche et ajoute 
    public function exempleadd()
    {
        $this->show('exemple/exempleAdd');
    }
    public function  exempleAddProcess()
    {
        $name = filter_input(INPUT_POST,'name');
        $email = filter_input(INPUT_POST,'email');
        $exempleToAdd = new Exemple();
        $exempleToAdd->setName($name);
        $exempleToAdd->setEmail($email);
        $exempleToAdd->exempleAdd();
        $returnHome = $_SERVER['BASE_URI'];
        header("Location: $returnHome"."exemple");
    }
    // affiche et met a jour
    public function exempleUpdate($id)
    {
        $exempleToUpdate =Exemple::find($id);
        $this->show('exemple/exempleUpdate',['exemple'=>$exempleToUpdate]);
    }
    public function exempleUpdateProcess($id)
    {
        $name = filter_input(INPUT_POST,'name');
        $email = filter_input(INPUT_POST,'email');
        $exempleToUpdate =Exemple::find($id);
        $exempleToUpdate->setName($name);
        $exempleToUpdate->setEmail($email);
        $exempleToUpdate->exempleUpdate();
        $returnHome = $_SERVER['BASE_URI'];
        header("Location: $returnHome"."exemple");
    }
        // efface
        public function exempleDelete($id)
        {
            Exemple::delete($id);
            $returnHome = $_SERVER['BASE_URI'];
            header("Location: $returnHome"."exemple");
        }
}