<?php


class controller extends Component
{
    /**
     * @param string
     * @return HttpResponse
    */
    public function redirect($url) {
        $response = new HttpResponse();
        $response->setHeader('Location: '.$url);
        return $response;
    }

    /**
     * @param string
     * @param array
     * @return HttpRequest
    */
    public function render($template, $context) {
        $render = $this->get('render');
        $response = new HttpResponse();
        $response->setData($render->render($template, $context));
        return $response;
    }

    /**
     * @param string
     * @param array
     * @return string
     */
    public function generateURL($route, $args = array()) {

    }
}