<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_lib {

    public function getfilesnames() {
        $CI = get_instance();
        $files = get_filenames('files');
        $tems = array();
        foreach ($files as $f) {
            if ($f == '.' || $f == '..' || $f == 'index.html') {
                
            } else {
                $tems[] = str_replace('.txt', '', $f);
            }
        }
        return $tems;
    }

    public function getquest_ans_res($temname) {
        $a = file('files/' . $temname . '.txt');
        $quest = array();
        $i = 1;
        for ($index = 0; $index < count($a); $index = $index + 7) {
            $quest[$i] = $a[$index]; // масив з питаннями
            $rez[$i] = $a[$index + 6];  // масив з правильними відповідями
            for ($index1 = 1; $index1 <= 5; $index1++) {
                $ans[$i][$index1] = $a[$index + $index1]; // масив відповідей, що містить масиви по 5 варіантів
            }
            $i++;
        }
        return array('quest'=>$quest,'rez'=>$rez, 'ans'=>$ans);
    }

}

?>