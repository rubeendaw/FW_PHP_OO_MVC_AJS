<?php
class controller_like {
    function __construct() {
        $_SESSION['module'] = "like";
    }

    // function view_likes() {
    //     require_once(VIEW_PATH_INC . "top_page.php");;
    //     require_once(VIEW_PATH_INC . "menu_no_auth.php");
    //     loadView('modules/like/view/', 'like.html');
    //     require_once(VIEW_PATH_INC . "footer.php");
    // }

    function ins_like() {
        // echo "<script>console.log('Hola: ". $_SESSION['username'] . "');</script>";
        // exit();
                $arrArgument = array(
                    'id' => $_POST['id'],
                    'token' => $_POST['token']
                );
                $arrValue = loadModel(MODEL_LIKE, "like_model", "insert_like", $arrArgument);
                // $rdo = $daolike->insert_like($_GET['id'],$username);
            
            if (!$arrValue) {
                echo json_encode("error");
            }else{
                echo json_encode(true);
            }
        }

        function del_like() {
            $arrArgument = array(
                'id' => $_POST['id'],
                'token' => $_POST['token']
            );
            $arrValue = loadModel(MODEL_LIKE, "like_model", "delete_like", $arrArgument);
            // $rdo = $daolike->insert_like($_GET['id'],$username);
        
            if (!$arrValue) {
                echo json_encode("error");
            }else{
                echo json_encode(true);
            }
        }

        function show_like() {
            $result = loadModel(MODEL_LIKE,'like_model','show_like',$_GET['param']);
            echo json_encode($result);
        }

}