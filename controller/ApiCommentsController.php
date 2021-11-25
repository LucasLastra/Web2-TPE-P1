<?php
require_once "Model/CommentsModel.php";
require_once "View/ApiView.php";
class ApiCommentsController{
    private $model;
    private $view;
    function __construct(){
        $this->view = new ApiView();
        $this->model = new CommentsModel();
    }

    function getComments(){

        $comentarios = $this->model->getComments();
        return $this->view->response($comentarios, 200);
    }

    function getCommentsCancion($params = null){
        $idCancion = $params[':ID'];
        $commentsCancion = $this->model->getCommentsCancion($idCancion);
        if($commentsCancion){
            $this->view->response($commentsCancion, 200);
        }else{
            $this->view->response("Error comentarios no encontrados", 404);
        }
    }


    function postComment(){

        $body = $this->getBody();

        try {
            $post = $this->model->postComment($body->comentario, $body->puntuacion, $body->fk_cancion);
            if (!$post) {
                $this->view->response("Comentario Insertado", 200);
            } else {
                $this->view->response("Error al insertar comentario", 400);
            }
        } catch (Exception) {
            $this->view->response("Error comentario no encontrado", 404);
        }

    }

    function deleteComment($params = []){
        $id = $params[':ID'];
        $comment = $this->model->getComment($id);
        if ($comment) {
            $this->model->deleteComment($id);
            $this->view->response("Borrado", 200);
        } else {
            $this->view->response("comentario no encontrado", 404);
        }
    }

    private function getBody(){
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
}
