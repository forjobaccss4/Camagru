<?php

namespace application\models;

use application\controllers\ErrorController;
use application\core\base\Model;

class Other extends Model {

    public $img1;

    public function makeImage($imageBaseCode, $pathToSticker)
    {
        $path = ROOT . "/public/png";
        $outputFile = md5(uniqid(rand(), 1)) . ".png";
        $ifp = fopen($path . "/" . $outputFile, 'wb');
        $data = explode(',', $imageBaseCode);

        $trigger = 0;
        foreach ($pathToSticker as $key => $value) {
            if (!empty($value)) {
                if (!$trigger) {
                    $value = explode("/", $value);
                    fwrite($ifp, base64_decode($data[1]));
                    fclose($ifp);
                    $tmpArray = [$_SESSION['login'], "/png/" . $outputFile];
                    $this->insertOne($tmpArray);
                    $imgSmall = $value[2];
                    $this->img1 = imagecreatefrompng($path . DIRECTORY_SEPARATOR . $outputFile);
                    $img2 = imagecreatefrompng($path . DIRECTORY_SEPARATOR . $imgSmall);
                    if ($this->img1 && $img2) {
                        $x2 = imagesx($img2);
                        $y2 = imagesy($img2);
                        imagecopyresampled($this->img1, $img2, 20, 0, 0, 0, $x2, $y2, $x2, $y2);
                    } else {
                        ErrorController::errorPage();
                    }
                    $trigger = 1;
                } else {
                    $value = explode("/", $value);
                    $imgSmall = $value[2];
                    $img2 = imagecreatefrompng($path . DIRECTORY_SEPARATOR . $imgSmall);
                    if ($this->img1 && $img2) {
                        $x2 = imagesx($img2);
                        $y2 = imagesy($img2);
                        imagecopyresampled($this->img1, $img2, 20, 0, 0, 0, $x2, $y2, $x2, $y2);
                    }
                }
            }
        }
        imagepng($this->img1, $path . "/" . $outputFile, 9);
        header('Location: /camagru/');
    }

    public function makeUploadedImage($imageName)
    {
        $allowed_filetypes = array('.png'); // Допустимые типы файлов
        $max_filesize = 524288; // Максимальный размер файла в байтах (в данном случае он равен 0.5 Мб).
        $upload_path = ROOT . "/public/png/"; // Папка, куда будут загружаться файлы .
        $ext = substr($imageName, strpos($imageName, '.'), strlen($imageName) - 1); // В переменную $ext заносим расширение загруженного файла.

        if (!in_array($ext, $allowed_filetypes)) {
            ErrorController::errorPage();
            exit;
        }

        if (filesize($_FILES['upload_this']['tmp_name']) > $max_filesize) {
            ErrorController::errorPage();
            exit;
        }

        if(!is_writable($upload_path)) {
            ErrorController::errorPage();
            exit;
        }
// Загружаем фаил в указанную папку.
        if(!move_uploaded_file($_FILES['upload_this']['tmp_name'],$upload_path . $imageName)) {
            ErrorController::errorPage();
            exit;
        }

        $path = ROOT . "/public/png";
        $outputFile = md5(uniqid(rand(), 1)) . ".png";
        $ifp = fopen($path . "/" . $outputFile, 'wb');
        $encode = file_get_contents($upload_path . $imageName);
        $encode = base64_encode($encode);
        unlink($upload_path . $imageName);
        $trigger = 0;
        $pathToSticker = ["sticker" => "/png/sigara.png"];//delete
        foreach ($pathToSticker as $key => $value) {
            if (!empty($value)) {
                if (!$trigger) {
                    $value = explode("/", $value);
                    fwrite($ifp, base64_decode($encode));
                    fclose($ifp);
                    $tmpArray = [$_SESSION['login'], "/png/" . $outputFile];
                    $this->insertOne($tmpArray);
                    $imgSmall = $value[2];
                    $this->img1 = imagecreatefrompng($path . DIRECTORY_SEPARATOR . $outputFile);
                    $img2 = imagecreatefrompng($path . DIRECTORY_SEPARATOR . $imgSmall);
                    if ($this->img1 && $img2) {
                        $x2 = imagesx($img2);
                        $y2 = imagesy($img2);
                        imagecopyresampled($this->img1, $img2, 20, 0, 0, 0, $x2, $y2, $x2, $y2);
                    } else {
                        ErrorController::errorPage();
                    }
                    $trigger = 1;
                } else {
                    $value = explode("/", $value);
                    $imgSmall = $value[2];
                    $img2 = imagecreatefrompng($path . DIRECTORY_SEPARATOR . $imgSmall);
                    if ($this->img1 && $img2) {
                        $x2 = imagesx($img2);
                        $y2 = imagesy($img2);
                        imagecopyresampled($this->img1, $img2, 20, 0, 0, 0, $x2, $y2, $x2, $y2);
                    }
                }
            }
        }
        imagepng($this->img1, $path . "/" . $outputFile, 9);
        header('Location: /camagru/');
    }

    public function showAllPhoto()
    {
        $counter = 0;
        $photo = '';
        $this->table = 'images';
        $tmpArray = $this->findAll();
        $tmpArray = array_reverse($tmpArray);
        foreach ($tmpArray as $key) {
            $likes = $key['likes'];
            $src = $key['src'];
            $pSrc = $src . "1";
            $aSrc = $src . "2";
            $dSrc = $src . "3";
            $rSrc = $src . "6";
            if (file_exists(WWW . "/" . $key['src']) && ($key['user'] == $_SESSION['login'])) {
                $counter++;
                $tmpCounter = $counter . "a";
                $photo = $photo
                    . "<div id='$tmpCounter' class=\"container_tmp hide\">"
                    . "<div class=\"row center-align\">"
                    . "<div class=\"col s12 grey darken-4\" style='border-radius: 5px'>"
                    . "<div style='padding-bottom: 50px;'>"
                    . "<img style='margin-top: 10px; width: 300px' width='200' src=" ."\"". $key['src'] . "\">"
                    . "<figcaption>" . "<a id='$aSrc' class='content_img' onclick='addComment(this.id)'>Comments</a>" . "<p id='$pSrc' align=right class='p_like_img'>$likes</p>"
                    . "<img id=\"$src\" src=" ."\"". "/png/like.png" . "\" class='like_img' onclick=\"addLike(this.id)\">"
                    . "</figcaption>"
                    . "<p id='$rSrc' align='center' style='color: white; margin-top: -29px; margin-right: 60px; font-size: 12px; cursor: pointer' onclick='deletePhotos(this.id)'>удалить</p>"
                    . "<div id='$dSrc'>"
                    . "</div></div></div></div></div>";
            }else if (file_exists(WWW . "/" . $key['src']) && ($key['user'] !== $_SESSION['login'])) {
                $counter++;
                $tmpCounter = $counter . "a";
                $photo = $photo
                    . "<div id='$tmpCounter' class=\"container_tmp hide\">"
                    . "<div class=\"row center-align\">"
                    . "<div class=\"col s12 grey darken-4\">"
                    . "<div style='padding-bottom: 50px'>"
                    . "<img style='margin-top: 10px; width: 300px' src=" ."\"". $key['src'] . "\">"
                    . "<figcaption>" . "<a id='$aSrc' class='content_img' onclick='addComment(this.id)'>Comments</a>" . "<p id='$pSrc' align=right class='p_like_img'>$likes</p>"
                    . "<img id=\"$src\" src=" ."\"". "/png/like.png" . "\" class='like_img' onclick=\"addLike(this.id)\">"
                    . "</figcaption>"
                    . "<div id='$dSrc'>"
                    . "</div></div></div></div></div>";
            }
        }
        return $photo;
    }

    public function showGallery() {
        $counter = 0;
        $photo = '';
        $this->table = 'images';
        $tmpArray = $this->findAll();
        $tmpArray = array_reverse($tmpArray);
        foreach ($tmpArray as $key) {
            $likes = $key['likes'];
            $src = $key['src'];
            $pSrc = $src . "1";
            $aSrc = $src . "2";
            $dSrc = $src . "3";
            $rSrc = $src . "6";
            if (file_exists(WWW . "/" . $key['src'])) {
                $counter++;
                $tmpCounter = $counter . "a";
                $photo = $photo
                    . "<div id='$tmpCounter' class=\"container_tmp hide\">"
                    . "<div class=\"row center-align\">"
                    . "<div class=\"col s12 grey darken-4\">"
                    . "<div style='padding-bottom: 50px'>"
                    . "<img style='margin-top: 10px; width:300px' src=" ."\"". $key['src'] . "\">"
                    . "<figcaption>" . "<a id='$aSrc' class='content_img' onclick='showComment(this.id)'>Comments</a>" . "<p id='$pSrc' align=right class='p_like_img'>$likes</p>"
                    . "<img id=\"$src\" src=" ."\"". "/png/like.png" . "\" class='like_img'>"
                    . "</figcaption>"
                    . "<div id='$dSrc'>"
                    . "</div></div></div></div></div>";
            }
        }
        return $photo;
    }

    public function addLikes() {
        $this->table = "likes";
        $findUser = $this->findAll();
        if (count($findUser)) {
            $trigger = 0;
            foreach ($findUser as $key => $value) {
                if ($value['user'] == $_SESSION['login'] && $value['photo'] == $_POST['path'] && $value['likes'] == 1) {
                    $this->addOrRemoveOneLike("likes", "likes", "0", "user", "\"" .$_SESSION['login'] . "\"", "photo", "\"" . $_POST['path'] . "\"");
                    $this->table = "images";
                    $foundRow = $this->findOne($_POST['path'], "src");
                    $numOfLikes = $foundRow[0]['likes'] - 1;
                    $this->updateOne("images", "likes", $numOfLikes, "src", "\"" . $_POST['path'] . "\"");
                    $trigger = 1;
                    echo $numOfLikes;
                    exit;
                } else if ($value['user'] == $_SESSION['login'] && $value['photo'] == $_POST['path'] && $value['likes'] == 0) {
                    $this->addOrRemoveOneLike("likes", "likes", "1", "user", "\"" .$_SESSION['login'] . "\"", "photo", "\"" . $_POST['path'] . "\"");
                    $this->table = "images";
                    $foundRow = $this->findOne($_POST['path'], "src");
                    $numOfLikes = $foundRow[0]['likes'] + 1;
                    $this->updateOne("images", "likes", $numOfLikes, "src", "\"" . $_POST['path'] . "\"");
                    $trigger = 1;
                    echo $numOfLikes;
                    exit;
                }
            }
            if (!$trigger) {
                $this->table = "likes";
                $tmpArray = [$_SESSION['login'], $_POST['path'], "1"];
                $this->insertLikes($tmpArray);
                $this->table = "images";
                $foundRow = $this->findOne($_POST['path'], "src");
                $numOfLikes = $foundRow[0]['likes'] + 1;
                $this->updateOne("images", "likes", $numOfLikes, "src", "\"" . $_POST['path'] . "\"");
                echo $numOfLikes;
                exit;
            }
        }else {
            $this->table = "likes";
            $tmpArray = [$_SESSION['login'], $_POST['path'], "1"];
            $this->insertLikes($tmpArray);
            $this->table = "images";
            $foundRow = $this->findOne($_POST['path'], "src");
            $numOfLikes = $foundRow[0]['likes'] + 1;
            $this->updateOne("images", "likes", $numOfLikes, "src", "\"" . $_POST['path'] . "\"");
            echo $numOfLikes;
            exit;
        }
    }

    public function addComments() {
        $comment = htmlspecialchars(stripslashes("<b>" . "<p align='left'>" . $_SESSION['login'] . ":" . "<p>" . "</b>" . "<p align='left'>" . $_POST['comment'] . "<p>"));
        $commentsArray = [$_SESSION['login'], htmlspecialchars(stripslashes($_POST['photo'])), $comment];
        $this->insertComments($commentsArray);
        $this->table = 'images';
        $findUserPhoto = $this->findOne($_POST['photo'], "src");
        if ($findUserPhoto[0]['user'] !== $_SESSION['login']) {
            $this->table = 'user';
            if ($findMail = $this->findOne($findUserPhoto[0]['user'], "login")) {
                if ($findMail[0]['notification']) {
                    $this->sendNotification($findMail[0]['email']);
                }
            }
        }
        echo $_SESSION['login'];
        exit;
    }

    public function loadComments() {
        $tmpComments = '';
        $allComments = $this->findAllComments("\"" . $_POST['commentId'] . "\"");
        $allComments = array_reverse($allComments);
        if (!count($allComments)) {
            echo "";
            exit;
        }else {
            foreach ($allComments as $key => $value) {
                    $tmpComments = $tmpComments . htmlspecialchars_decode($value['comment']);
            }
            echo $tmpComments;
            exit;
        }
    }
    public function sendNotification($mail){
        $encoding = "utf-8";
        $from_name = "Camagru Notification";
        $from_mail = "vsarapin@student.unit.ua";
        $mail_subject = "You have new comment";
        $mail_message = "Вам оставили комментарий под Вашим фото";

        $subject_preferences = array(
            "input-charset" => $encoding,
            "output-charset" => $encoding,
            "line-length" => 76,
            "line-break-chars" => "\r\n"
        );

        $header = "Content-type: text/html; charset=" . $encoding . " \r\n";
        $header .= "From: " . $from_name . " <" . $from_mail . "> \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-Transfer-Encoding: 8bit \r\n";
        $header .= "Date: " . date("r (T)") . " \r\n";
        $header .= iconv_mime_encode("Subject", $mail_subject, $subject_preferences);

        mail($mail, $mail_subject, $mail_message, $header);
    }

    public function removeNotification() {
        $this->table = 'user';
        $findUserNotification = $this->findOne($_SESSION['login'], "login");
        if ($findUserNotification && $findUserNotification[0]['notification'] == 1) {
            $this->updateOne($this->table, "notification", "0", "login", "\"" . $_SESSION['login']. "\"");
            echo "Вкл. уведомления";
            exit;
        }else {
            $this->updateOne($this->table, "notification", "1", "login", "\"" . $_SESSION['login']. "\"");
            echo "Откл. уведомления";
            exit;
        }
    }

    public function checkNotification() {
        $this->table = 'user';
        $findUserNotification = $this->findOne($_SESSION['login'], "login");
        if ($findUserNotification && $findUserNotification[0]['notification'] == 1) {
            echo "Откл. уведомления";
            exit;
        }else {
            echo "Вкл. уведомления";
            exit;
        }
    }

    public function deleteUserPhoto($photo) {
        $this->deletePhoto("\"" . $photo . "\"");
        $this->deleteComments("\"" . $photo . "\"");
        $this->deleteLikes("\"" . $photo . "\"");
    }
}
