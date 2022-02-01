<?php

namespace Controllers;

class Commandes extends Controller
{
    protected $modelName = "Commandes";

    public function show()
    {
        $pageTitle = "Accueil";
        \Renderer::render("commandes", compact('pageTitle'));
    }
}