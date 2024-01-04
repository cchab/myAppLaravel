<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

class WebScraperController extends Controller
{
    public function scrapeWebsite($url)
    {
        // Iniciar sesión (si es necesario)
        // ...
        //dd($url);
        // Consultar la página web
        //$url = 'https://www.itescam.edu.mx/principal/cescolar/Syllabus/acceso/Login.php';
        $client = new Client();
        $crawler = $client->request('GET', $url);
        
        // Obtener el DOM
        $dom = $crawler->html();
        print $dom;
        // Puedes hacer algo con el DOM aquí, por ejemplo, mostrarlo en la vista
        return view('itescam.viewer', ['dom' => $dom]);
    }

    public function login()
    {
        $url = "https://www.itescam.edu.mx/principal/cescolar/Syllabus/acceso/";
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.itescam.edu.mx/principal/cescolar/Syllabus/acceso/Login.php');
        //dd($crawler->filter('body')->eq(0)->attr('src'));
        //print $crawler->filter('body')->eq(0)->attr('src');
        //$absoluteHtml = $this->convertRelativeUrlsToAbsolute($url, $crawler->html());
        //print $absoluteHtml;
        $form = $crawler->selectButton('LoginButton_DoLogin')->form();
        $client->submit($form, ['login' => 'cochab', 'password' => 'a2193fc7f2d20abdf992e31630c9a9a3']);
        $loggedInPage = $client->getResponse()->getContent();
        //dd($loggedInPage);
        //return response()->html($loggedInPage);
        $crawler->filter('.flash-error')->each(function ($node) {
            print $node->text()."\n";
        });
        $dom = $crawler->html();
        //print $dom;
        return view('itescam.viewer', ['dom' => $loggedInPage]);
    }

    public function loginGit(){
        $client = new Client();
        $crawler = $client->request('GET', 'https://github.com/');
        $crawler = $client->click($crawler->selectLink('Sign in')->link());
        $form = $crawler->selectButton('LoginButton_DoLogin')->form();
        $crawler = $client->submit($form, ['login' => 'omiomarchab@gmail.com', 'password' => '1319omiomar']);
        $crawler->filter('.flash-error')->each(function ($node) {
            print $node->text()."\n";
        });
        $dom = $crawler->html();
        print $dom;
    }

    private function convertRelativeUrlsToAbsolute($baseUrl, $html)
    {
        // Lógica para convertir URLs relativas a URLs absolutas
        // Puedes usar expresiones regulares o algún otro método según tus necesidades

        // Aquí hay un ejemplo simple utilizando una expresión regular
        $absoluteHtml = preg_replace('/href=["\']\/([^"\']+)["\']/', 'href="' . $baseUrl . '/$1"', $html);
        //dd($absoluteHtml);
        return $absoluteHtml;
    }

    public function login2(){
        $browser = new HttpBrowser(HttpClient::create());
        $crawler = $browser->request('GET', 'https://www.itescam.edu.mx/admin/Control_Escolar/acceso/Login.php');
        //dd($crawler->filter('body')->eq(0)->attr('src'));
        //print $crawler->filter('body')->eq(0)->attr('src');
        //$absoluteHtml = $this->convertRelativeUrlsToAbsolute($url, $crawler->html());
        //print $absoluteHtml;
        $form = $crawler->selectButton('Entrar')->form();
        $form['login'] = 'jmmartin';
        $form['password'] = md5('jmmartin16');
        $crawler = $browser->submit($form);
        $linkCrawler = $crawler->selectLink('Historial Academico');
        $link = $linkCrawler->link();
        //self::scrapeWebsite($link->getUri());
        $crawler = $browser->request('GET', $link->getUri());
        $form = $crawler->selectButton('Buscar')->form();
        $form['s_MATRICULA'] = '8290';
        $crawler = $browser->submit($form);
        $matricula = self::getMatricula($crawler);
        $nombre = self::getNombre($crawler);
        $carrera = self::getCarrera($crawler);
        //$periodo = self::getPeriodo($crawler);
        if(isset($matricula))
            print $matricula->html();
        else
        //return view('itescam.viewer', ['dom' => $crawler->html()]);
            print $crawler->html();
    }

    private function getMatricula($crawler){
        $crawler = $crawler
        ->filter('body > table >tr')->eq(1)->filter('td > strong');
        //dd($crawler->html());
        print $crawler->html();
        //return null;
    }

    private function getNombre($crawler){
        $crawler = $crawler
        ->filter('body > table >tr')->eq(2)->filter('td > strong');
        //dd($crawler->html());
        print $crawler->html();
        //return null;
    }

    private function getCarrera($crawler){
        $crawler = $crawler
        ->filter('body > table >tr')->eq(3)->filter('td > strong');
        //dd($crawler->html());
        print $crawler->html();
        //return null;
    }

    private function getPeriodo($crawler){
        $crawler = $crawler
        //->filter('body > table >tr')->eq(6)->filter('td > form > span >strong');
        ->filter('body > table >tr')->nextAll();
        //dd($crawler->html());
        print $crawler->html();
        //return null;
    }
}
