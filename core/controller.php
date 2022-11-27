<?php
class controller
{
    public function auth()
    {
        if (!isset($_SESSION["login"])) {
            setcookie("err", "Chưa đăng nhập!!", time() + 1, "/", "", 0);
            $this->redirect($this->base_url("admin/login"));
            die();
        }else{
            if($_SESSION["login"]["status"] == 0){
                setcookie("err", "Tài khoản bị khóa!!", time() + 1, "/", "", 0);
                unset($_SESSION["login"]);
                $this->redirect($this->base_url("admin/login"));
                die();
            }
        }
    }

    public function base_url($url = '')
    {
        $a = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
        if ($a == 'http://localhost') {
            $a = _WEB_ROOT;
        }
        return $a . '/' . $url;
    }

    public function redirect($url)
    {
        header("Location: {$url}");
        exit();
    }

    public function view($path, $data = [])
    {
        $view = "views/" . $path . ".php";
        if (file_exists($view)) {
            if(strlen(strstr($view, "admin")) > 0){
                $layout = "views/admin/layout/layout.php";
                require_once($layout);
            }else{
                $layout = "views/layout/layout.php";
                require_once($layout);
            }
        }
    }
}
