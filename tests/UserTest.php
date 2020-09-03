<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateUser()
    {

        $dados = [
            'name'=> 'Name 01',
            'email'=> 'testEmail3@exemplo.com',
            'password'=> '123'
        ];


        $this->post('/api/user',$dados);
        //echo $this->response->content();

        $this->assertResponseOk();

        $resposta = (array) json_decode($this->response->content());

        $this->assertArrayHaskey('name',$resposta);
        $this->assertArrayHaskey('email',$resposta);
        $this->assertArrayHaskey('id',$resposta);


    }
    public function testViewUser()
    {

        $user = \App\User::first();


        $this->get('/api/user/'.$user->id);
        //echo $this->response->content();

        $this->assertResponseOk();

        $resposta = (array) json_decode($this->response->content());

        //Verifica se tem name email e id no responsta
        $this->assertArrayHaskey('name',$resposta);
        $this->assertArrayHaskey('email',$resposta);
        $this->assertArrayHaskey('id',$resposta);


    }
}
