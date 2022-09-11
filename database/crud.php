<?php
class Crud
{
    public function createRecord($dataArray)
    {
        $data[] = $dataArray;
        $recorded = file_get_contents('database/users.json');
        $tempArray = json_decode($recorded);
        $tempArray[] =  $data;
        $jsonData = json_encode($tempArray);
        file_put_contents('database/users.json', $jsonData);
    }

    public static function readRecord($login = '', $email = '')
    {
        $data = file_get_contents('database/users.json');
        $data = json_decode($data, true);

        foreach ($data as $value) {
  
            if ($value[0]['login'] === $login || $value[0]['email'] === $email) {

                return $value;
            }
        }
        return '';
    }

    public function updateRecord($login, $new_data_array)
    {
        $data = file_get_contents('database/users.json');
        $data = json_decode($data, true);
        foreach ($data as $key => $value) {
            if ($value[0]['login'] === $login) {
                $data[$key][0] = $new_data_array;
                break;
            }
        }
        $jsonData = json_encode($data, true);
        file_put_contents('database/users.json', $jsonData);
    }
    public function deleteRecord($login)
    {
        $data = file_get_contents('database/users.json');
        $data = json_decode($data, true);
        foreach ($data as $key => $value) {
            if ($value[0]['login'] === $login) {
                unset($data[$key]);
                break;
            }
        }
        $jsonData = json_encode($data, true);
        file_put_contents('database/users.json', $jsonData);
    }
}
