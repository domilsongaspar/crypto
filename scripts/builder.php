<?php

    class Builder {
        private $rules = array('@3P', '_S5');
        private $random;
        private $ns_until_2;
        private $ns_until_6;
        private $ns_until_9 ;
        private $ns_until_99;
        private $bigAToF = array('A', 'B', 'C', 'D', 'E', 'F');
        private $smallAToF = array('a', 'b', 'c', 'd', 'e', 'f');        

        public function createMask ($source) {
            $smallAlphabet = array(
                'a',
                'b',
                'c',
                'd',
                'e',
                'f',
                'g',
                'h',
                'i',
                'j',
                'k',
                'l',
                'm',
                'n',
                'o',
                'p',
                'q',
                'r',
                's',
                't',
                'u',
                'v',
                'w',
                'x',
                'y',
                'z'
            );

            $bigAlphabet = array(
                'A',
                'B',
                'C',
                'D',
                'E', 
                'F',
                'G',
                'H',
                'I',
                'J',
                'K',
                'L',
                'M',
                'N',
                'O',
                'P',
                'Q',
                'R',
                'S',
                'T',
                'U',
                'V',
                'W',
                'X',
                'Y',
                'Z'
            );

            $numbs = array(
                '0' => '0',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9'
            );
              
            $smallAlphabet = $this->addMasks($smallAlphabet, 'az');
            $bigAlphabet = $this->addMasks($bigAlphabet, 'AZ');
            $numbs = $this->addMasks($numbs, 'numbs');

            if ($this->writeOnFile($source, array($smallAlphabet, $bigAlphabet, $numbs))) return 'ok';

            return false;

        }

        private function addMasks ($array, $type) {
            $size = sizeof($array);
            $i = 0;
            $new = array();

            while ($i < $size) {
                $pos = $array[$i];
                $new[$pos] = $this->mask($size, $type);

                $i++;
            }

            return $new;
        }

        private function mask ($size, $type) {
            static $array = array();
            static $i = 0;

            while ($i < $size) {
                $this->random = rand(0, 99);
                $this->ns_until_2 = rand(0, 2);
                $this->ns_until_6 = rand(3, 6);
                $this->ns_until_9 = rand(0, 9);
                $this->ns_until_99 = $this->random < 10 ? (int) '0'.$this->random : $this->random;
                switch ($type) {
                    case 'az':
                        $mask = $this->rules[rand(0, 1)].$this->ns_until_2.'+'.$this->ns_until_99.$this->bigAToF[rand(0, 5)].rand(0, 9);
                    break;

                    case 'AZ':
                        $mask = $this->rules[rand(0, 1)].$this->ns_until_2.'+'.$this->ns_until_99.$this->smallAToF[rand(0, 5)].rand(0, 9);
                    break;

                    case 'numbs':
                        $mask = $this->rules[rand(0, 1)].$this->ns_until_6.'+'.$this->smallAToF[rand(0, 5)].$this->ns_until_9.$this->bigAToF[rand(0, 5)];
                    break;
                }

                if (!in_array($mask, $array)) {                        
                    $array[$i] = $mask;

                    return $mask;
                } else {
                    $i--;
                    $size--;
                    $this->mask($size, $type);
                }

                $i++;
            }
        }

        private function clearFile ($file) {
            if (file_exists($file)) {
                $handle = fopen($file, "r+");
                if (!$handle) {
                    die("Erro ao abrir arquivo: permissao negada ou caminho invalido");
                }
                rewind($handle);
                ftruncate($handle, 0);
            }
        }
        
        private function writeOnFile ($src, $data) {            
            $text = '{
    "rules": {
        "main_1":"$3P",
        "main_2":"_S5"
    },
    "data": {
        "smallAlphabet": {';
            foreach ($data[0] as $item => $key) {
                if ($item != 'z') $text .= "\n\t\t\t".'"'.$item.'":'.'"'.$key.'",';
                else $text .= "\n\t\t\t".'"'.$item.'":'.'"'.$key.'"';
            }
            $text .= "\n\t\t".'},';
        $text .= "\n\t\t".'"bigAlphabet": {';
            foreach ($data[1] as $item => $key) {
                if ($item != 'Z') $text .= "\n\t\t\t".'"'.$item.'":'.'"'.$key.'",';
                else $text .= "\n\t\t\t".'"'.$item.'":'.'"'.$key.'"';
            }
        $text .= "\n\t\t".'},';
        $text .="\n\t\t".'"numbs": {';
            foreach ($data[2] as $item => $key) {
                if ($item != '9') $text .= "\n\t\t\t".'"_'.$item.'":'.'"'.$key.'",';
                else $text .= "\n\t\t\t".'"_'.$item.'":'.'"'.$key.'"';
            }
        $text .="\n\t\t".'}
    }
}';

            $qtd = strlen($text);
            $this->clearFile($src);
            $handle = fopen($src, "a");
            fputs($handle, $text, $qtd);
            fclose($handle);

            return true;
        }        
    }