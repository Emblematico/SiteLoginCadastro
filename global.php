<?php
spl_autoload_register('carregarClasse');

function carregarClasse($nomeclasses)
{
    if (file_exists('classes/' . $nomeclasses . '.php')) {
        require_once 'classes/' .$nomeclasses . '.php';
    }
}