<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $dados = [
            'name'=> 'Name 01',
            'email'=> 'email@exemplo.com',
            'password'=> '123'
        ];


        $this->post('/api/user',$dados);
        $this->assertResponseOk();

        $resposta = (array) json_decode($this->response->content());

        $this->assertArrayHaskey('name',$resposta);
        $this->assertArrayHaskey('email',$resposta);
        $this->assertArrayHaskey('id',$resposta);


    }
}
