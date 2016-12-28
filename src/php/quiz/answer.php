<?php

    include("../connect.php");

    $question_id = $_GET["questionId"];
    $answer = $_GET["answer"];
    
    $statement = $pdo->prepare(
        "SELECT correctAnswerId
        FROM quizQuestions
        WHERE id=:questionId");
    $statement->bindParam(":questionId", $question_id);
    $statement->execute();

    $correctAnswerId = $statement->fetch();

    $result=array();
    $result["result"] =$correctAnswerId["correctanswerid"] == $answer;
    echo json_encode($result);

?>
