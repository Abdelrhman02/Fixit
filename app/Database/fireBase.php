<?php

namespace App\Database;

use Google\Cloud\Firestore\FirestoreClient;


class fireBase
{
    private static $db;

    public static function setup_client_create(string $projectId = null, string $jsonFile = null)
    {
        try {
            self::$db = new FirestoreClient([
                'projectId' => $projectId,
                "keyFilePath" => __DIR__ . "\\$jsonFile",
            ]);
            if (!self::$db) {
                throw new ("cann't connect to firestore pls check your internet connection");
            }

        } catch (\Exception $e) {
            die("Cannot connect to database");
        }
    }

    public static function get($collection, $orderBy = null, $order = null, $column = null, $value = null)
    {

        $usersRef = self::$db->collection($collection);
        if ($column !== null) {

            $query = $usersRef->where($column, '=', $value);
            $snapshot = $query->documents();
            $items = array();
            $i = 0;
            foreach ($snapshot as $data) {
                $items[$i++] = $data->data();
            }
            if ($collection === "problems") {
                usort($items, function ($b, $a) {
                    return $a['Request_num'] <=> $b['Request_num'];
                });
            }
            return $items;
        }
        $snapshot = $usersRef->documents();
        $items = array();
        $i = 0;
        if (isTechnical() && $collection === "problems") {
            foreach ($snapshot as $data) {
                if (isset($data->data()["Technical"])) {
                    if (in_array($value, $data->data()["Technical"])) {
                        $items[$i++] = $data->data();
                    }
                }

            }
            if ($collection === "problems") {
                usort($items, function ($b, $a) {
                    return $a['Request_num'] <=> $b['Request_num'];
                });
            }
            return $items;
        }

        foreach ($snapshot as $data) {
            $items[$i++] = $data->data();
        }

        if ($collection === "problems") {
            usort($items, function ($b, $a) {
                return $a['Request_num'] <=> $b['Request_num'];
            });
        }


        return $items;
    }

    public static function insert($collection, $data)
    {

        print_r($data);
        if ($collection === "problems") {
            $docRef = self::$db->collection($collection)->document($data["Request_num"]);
        }
        if ($collection === "users") {
            $docRef = self::$db->collection($collection)->newDocument();
            $data["ID"] = $docRef->id();
        }
        $docRef->set($data);
    }

    public static function update($collection, $data, $column = null, $value = null)
    {

        if ($collection === "problems") {
            if (!(isTechnical() or isStudent()))
                $data["Technical"] = array();
            $data["TechnicalId"] = array();

            for ($i = 1; $i < 4; $i++) {
                if (isset($data["Technical_" . $i])) {
                    $arr = explode("--", $data["Technical_" . $i]);
                    unset($data["Technical_" . $i]);
                    array_push($data["Technical"], $arr[1]);
                    array_push($data["TechnicalId"], $arr[0]);
                    $data["submitForTechinalTime"] = date("F j, Y, g:i a", time());
                }

            }
        }
        if (isset($_POST["Status"])) {
            if ($_POST["Status"] == "تم") {
                $data["fixTime"] = date("F j, Y, g:i a", time());;
            } else {
                $data["fixTime"] = "";
            }
        }

        $keys = array_keys($data);
        $data = array_values($data);
        $items = [];
        for ($i = 0; $i < count($keys); $i++) {
            $items[$i] = ["path" => $keys[$i], "value" => $data[$i]];
        }
        $usersRef = self::$db->collection($collection);
        $query = $usersRef->where($column, '=', $value);
        $documents = $query->documents();
        foreach ($documents as $doc) {
            self::$db->collection($collection)->document($doc->id())->update($items);
        }

    }

    public static function delete($collection, $column = null, $value = null)
    {
        $usersRef = self::$db->collection($collection);
        $query = $usersRef->where($column, '=', $value);
        $documents = $query->documents();
        foreach ($documents as $doc) {
            self::$db->collection($collection)->document($doc->id())->delete();
        }
    }


    public static function check($collection, $post)
    {
        $usersRef = self::$db->collection($collection);
        $userid = $post["user_id"];
        $query = $usersRef->where("Id", '=', $userid);
        $documents = $query->documents();
        $password = $post["password"];
        foreach ($documents as $document) {
            if ($document->exists()) {
                $data = $document->data();

                if ($data["Id"] !== $userid) {
                    redirect(home() . "/login?message=الرقم الجامعي او كلمه المرور غير صحيحه");
                    return;
                }
                if($data["AttempLogin"] > 3 ){
                    redirect(home() . "/login?message=هذا الحساب تم وقفه راجع اداره الكليه");
                    return;
                }
                if ($data["Password"] !== $password) {
                    $_SESSION["AttempLogin"] = ++$data["AttempLogin"];
                    self::$db->collection("users")->document($data["ID"])->update([ ["path" => "AttempLogin", "value" => $_SESSION["AttempLogin"] ]]);
                    redirect(home() . "/login?message=الرقم الجامعي او كلمه المرور غير صحيحه");
                    return;
                }
                self::$db->collection("users")->document($data["ID"])->update([ ["path" => "AttempLogin", "value" => 0 ]]);
                $_SESSION['name'] = $data["Name"];
                $_SESSION['user_id'] = $data["Id"];
                $_SESSION['ID'] = $data["ID"];
                $_SESSION["Role"] = $data["Role"];
                $_SESSION["IdNum"] = $data["Id"];
                if ($_SESSION["Role"] === "Admin") {
                    redirect(home() . "/admin");
                    return;
                } else {
                    redirect(home() . "/fixit");
                    return;
                }
            }
        }
        redirect(home() . "/login?message=الرقم الجامعي او كلمه المرور غير صحيحه");
    }

    public static function count($collection, $column, $value)
    {
        $data = self::$db->collection($collection);
        $query = $data->where($column, '=', $value);
        $documents = $query->documents();
        $total = 0;
        foreach ($documents as $document) {
            if ($document->exists()) {
                $total++;
            }
        }
        return $total;
    }

    public static function checkTec($id)
    {
        $doc = time() * 1000;
        if (!isTechnical()) {
            $docRef = self::$db->collection("problems/${id}/adminChat")->document($doc);

            $docRef->set([
                'admin' => $_SESSION['name'],
                'Time' => date("F j, Y, g:i a", time()),
                'message' => $_POST["adminFeedBack"],
                "id" => $doc
            ]);
            return;
        }
        $docRef = self::$db->collection("problems/${id}/map")->document($doc);
        if ($_FILES) {
            $imageUrl = self::handleImage();
        } else {
            $imageUrl = null;
        }
        $docRef->set([
            'tecName' => $_SESSION['name'],
            'Time' => date("F j, Y, g:i a", time()),
            'message' => $_POST["TechFeedback"],
            'image' => $imageUrl,
            "id" => $doc
        ]);

    }

    public static function handleImage()
    {

        if (isset($_FILES['image_tec'])) {


            $img_name = $_FILES['image_tec']['name'];
            $img_size = $_FILES['image_tec']['size'];
            $tmp_name = $_FILES['image_tec']['tmp_name'];
            $error = $_FILES['image_tec']['error'];


            if ($error === 0) {
                if ($img_size > 16777215) {
                    $em = "Sorry, your file is too large.";
                    return null;
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "jpeg", "png");

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                        $img_upload_path = 'uploads/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);

                        // Insert into Database
                        return $new_img_name;
                    } else {
                        $em = "You can't upload files of this type";
                        return null;
                    }
                }
            } else {
                $em = "unknown error occurred!";
                return null;
            }

        } else {
            return null;
        }
    }
}
