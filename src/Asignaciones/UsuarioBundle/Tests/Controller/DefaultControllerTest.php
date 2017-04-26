<?php

namespace Asignaciones\UsuarioBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/hola/gustavo');

        $this->assertTrue($crawler->filter('html:contains("Hola gustavo")')->count() > 0);
    }

    public function testRegistro()
    {
    	$client = static::createClient();

        $crawler = $client->request('GET', '/usuarios');

        $enlaceRegistro = $crawler->selectLink('Agregar usuario')->link();

        $crawler = $client->click($enlaceRegistro);

        $this->assertTrue($crawler->filter('html:contains("Crear nuevo usuario")')->count() > 0 );

		
// 		$formulario = $crawler->selectButton('Registrarme')->form($usuario);
//	    $crawler = $client->submit($formulario);
  		
// 		$this->assertTrue($client->getResponse()->isSuccessful());	
    }

    public function testRegistroCompleto($value='')
    {
    	# code...  	
    }


    /**
     * Método que provee de usuarios de prueba a los tests de esta clase
     */
    public function usuarios()
    {
        return array(
            array(
                array(
                    'frontend_usuario[Usuario]'         => 'luis',
                    'frontend_usuario[Clave]'  		 	=> '1234',
                )
            )
        );
    }
}
