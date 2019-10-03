<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class AdminLoginController
{
    private $adminCredentials = [
        [
            'email' => 'admin@gmail.com',
            'password' => 123,
        ]
    ];

    public function index()
    {
        if ($this->isLoginSuccessful()) {
            return new RedirectResponse('/admin/dashboard');
        }

        $response = new Response($this->getLoginFormHtml());

        return $response;
    }

    private function isLoginSuccessful()
    {
        $credentials = [];
        if (!empty($_POST['login'])) {
            $credentials = $_POST['login'];
        }

        return in_array($credentials, $this->adminCredentials);
    }

    private function getLoginFormHtml()
    {
        return <<<'HTML'
<html>
    <head></head>
    <body>
        <form action="" method="post">
            <div>
                <label>
                    Email:
                    <input type="text" name="login[email]"/>
                </label>
            </div>
            <div>
                <label>
                    Password:
                    <input type="password" name="login[password]"/>
                </label>
            </div>
            <div>
                <input type="submit" value="Login!"/>
            </div>
        </form>
    </body>
</html>
HTML;
    }
}