<?php

    $src = '../files/cyt/config.crypto';

    //Convert a normal data to cytografyed date
    function crypto ($data) {
        global $src;
        $content = getCode($src);
        $content = json_decode($content);

        $patterns['smallAlphabet'] = $content->data->smallAlphabet;
        $patterns['bigAlphabet'] = $content->data->bigAlphabet;
        $patterns['numbs'] = $content->data->numbs;
        $replace = array(
            array(
                'a' => $patterns['smallAlphabet']->a,
                'b' => $patterns['smallAlphabet']->b,
                'c' => $patterns['smallAlphabet']->c,
                'd' => $patterns['smallAlphabet']->d,
                'e' => $patterns['smallAlphabet']->e,
                'f' => $patterns['smallAlphabet']->f,
                'g' => $patterns['smallAlphabet']->g,
                'h' => $patterns['smallAlphabet']->h,
                'i' => $patterns['smallAlphabet']->i,
                'j' => $patterns['smallAlphabet']->j,
                'k' => $patterns['smallAlphabet']->k,
                'l' => $patterns['smallAlphabet']->l,
                'm' => $patterns['smallAlphabet']->m,
                'n' => $patterns['smallAlphabet']->n,
                'o' => $patterns['smallAlphabet']->o,
                'p' => $patterns['smallAlphabet']->p,
                'q' => $patterns['smallAlphabet']->q,
                'r' => $patterns['smallAlphabet']->r,
                's' => $patterns['smallAlphabet']->s,
                't' => $patterns['smallAlphabet']->t,
                'u' => $patterns['smallAlphabet']->u,
                'v' => $patterns['smallAlphabet']->v,
                'w' => $patterns['smallAlphabet']->w,
                'x' => $patterns['smallAlphabet']->x,
                'y' => $patterns['smallAlphabet']->y,
                'z' => $patterns['smallAlphabet']->z
            ),
            array(
                'A' => $patterns['bigAlphabet']->A,
                'B' => $patterns['bigAlphabet']->B,
                'C' => $patterns['bigAlphabet']->C,
                'D' => $patterns['bigAlphabet']->D,
                'E' => $patterns['bigAlphabet']->E,
                'F' => $patterns['bigAlphabet']->F,
                'G' => $patterns['bigAlphabet']->G,
                'H' => $patterns['bigAlphabet']->H,
                'I' => $patterns['bigAlphabet']->I,
                'J' => $patterns['bigAlphabet']->J,
                'K' => $patterns['bigAlphabet']->K,
                'L' => $patterns['bigAlphabet']->L,
                'M' => $patterns['bigAlphabet']->M,
                'N' => $patterns['bigAlphabet']->N,
                'O' => $patterns['bigAlphabet']->O,
                'P' => $patterns['bigAlphabet']->P,
                'Q' => $patterns['bigAlphabet']->Q,
                'R' => $patterns['bigAlphabet']->R,
                'S' => $patterns['bigAlphabet']->S,
                'T' => $patterns['bigAlphabet']->T,
                'U' => $patterns['bigAlphabet']->U,
                'V' => $patterns['bigAlphabet']->V,
                'W' => $patterns['bigAlphabet']->W,
                'X' => $patterns['bigAlphabet']->X,
                'Y' => $patterns['bigAlphabet']->Y,
                'Z' => $patterns['bigAlphabet']->Z
            ),
            array(
                '0' => $patterns['numbs']->_0,
                '1' => $patterns['numbs']->_1,
                '2' => $patterns['numbs']->_2,
                '3' => $patterns['numbs']->_3,
                '4' => $patterns['numbs']->_4,
                '5' => $patterns['numbs']->_5,
                '6' => $patterns['numbs']->_6,
                '7' => $patterns['numbs']->_7,
                '8' => $patterns['numbs']->_8,
                '9' => $patterns['numbs']->_9
            ),
            array(
                '.' => '-'
            )
        );

        $GLOBALS['data'] = $data;
        $GLOBALS['code'] = '';
        $GLOBALS['text'] = array();
        $GLOBALS['replace'] = '';

        for ($i = 0; $i < strlen($GLOBALS['data']); $i++) {
            $GLOBALS['iterator'] = $i;
            switch (typeAndSize($GLOBALS['data'][$i])) {
                case 0:
                    array_map( function ($a, $b) {
                        if ($GLOBALS['data'][$GLOBALS['iterator']] == "$a") {
                            $GLOBALS['text'][$GLOBALS['iterator']] = "/$a/";    
                            $GLOBALS['replace'] .= $b;                                
                        }                                
                    }, array_keys($replace[0]), array_values($replace[0]));
                break;

                case 1:
                    array_map( function ($a, $b) {
                        if ($GLOBALS['data'][$GLOBALS['iterator']] == "$a") {
                            $GLOBALS['text'][$GLOBALS['iterator']] = "/$a/";    
                            $GLOBALS['replace'] .= $b;                                
                        }                                
                    }, array_keys($replace[1]), array_values($replace[1]));
                break;

                case 2:
                    array_map( function ($a, $b) {
                        if ($GLOBALS['data'][$GLOBALS['iterator']] == "$a") {
                            $GLOBALS['text'][$GLOBALS['iterator']] = "/$a/";    
                            $GLOBALS['replace'] .= $b;                                
                        }                                
                    }, array_keys($replace[2]), array_values($replace[2]));
                break;

                case 3:
                    if (!in_array($GLOBALS['data'][$GLOBALS['iterator']], array_keys($replace[3]))) 
                        $GLOBALS['replace'] .= $GLOBALS['data'][$GLOBALS['iterator']];
                    array_map( function ($a, $b) {                        
                        if ($GLOBALS['data'][$GLOBALS['iterator']] == "$a") {
                            $GLOBALS['text'][$GLOBALS['iterator']] = "/$a/";    
                            $GLOBALS['replace'] .= $b;
                        }
                    }, array_keys($replace[3]), array_values($replace[3]));
                break;
            }
        }

        return $GLOBALS['replace'];       
    }

    //Convert a cytografyed date to normal data
    function uncrypto ($data) {
        global $src;
        $content = getCode($src);
        $content = json_decode($content);

        $patterns['smallAlphabet'] = $content->data->smallAlphabet;
        $patterns['bigAlphabet'] = $content->data->bigAlphabet;
        $patterns['numbs'] = $content->data->numbs;        
        $replace = array(
            'a' => '/'.$patterns['smallAlphabet']->a.'/',
            'b' => '/'.$patterns['smallAlphabet']->b.'/',
            'c' => '/'.$patterns['smallAlphabet']->c.'/',
            'd' => '/'.$patterns['smallAlphabet']->d.'/',
            'e' => '/'.$patterns['smallAlphabet']->e.'/',
            'f' => '/'.$patterns['smallAlphabet']->f.'/',
            'g' => '/'.$patterns['smallAlphabet']->g.'/',
            'h' => '/'.$patterns['smallAlphabet']->h.'/',
            'i' => '/'.$patterns['smallAlphabet']->i.'/',
            'j' => '/'.$patterns['smallAlphabet']->j.'/',
            'k' => '/'.$patterns['smallAlphabet']->k.'/',
            'l' => '/'.$patterns['smallAlphabet']->l.'/',
            'm' => '/'.$patterns['smallAlphabet']->m.'/',
            'n' => '/'.$patterns['smallAlphabet']->n.'/',
            'o' => '/'.$patterns['smallAlphabet']->o.'/',
            'p' => '/'.$patterns['smallAlphabet']->p.'/',
            'q' => '/'.$patterns['smallAlphabet']->q.'/',
            'r' => '/'.$patterns['smallAlphabet']->r.'/',
            's' => '/'.$patterns['smallAlphabet']->s.'/',
            't' => '/'.$patterns['smallAlphabet']->t.'/',
            'u' => '/'.$patterns['smallAlphabet']->u.'/',
            'v' => '/'.$patterns['smallAlphabet']->v.'/',
            'w' => '/'.$patterns['smallAlphabet']->w.'/',
            'x' => '/'.$patterns['smallAlphabet']->x.'/',
            'y' => '/'.$patterns['smallAlphabet']->y.'/',
            'z' => '/'.$patterns['smallAlphabet']->z.'/',
            'A' => '/'.$patterns['bigAlphabet']->A.'/',
            'B' => '/'.$patterns['bigAlphabet']->B.'/',
            'C' => '/'.$patterns['bigAlphabet']->C.'/',
            'D' => '/'.$patterns['bigAlphabet']->D.'/',
            'E' => '/'.$patterns['bigAlphabet']->E.'/',
            'F' => '/'.$patterns['bigAlphabet']->F.'/',
            'G' => '/'.$patterns['bigAlphabet']->G.'/',
            'H' => '/'.$patterns['bigAlphabet']->H.'/',
            'I' => '/'.$patterns['bigAlphabet']->I.'/',
            'J' => '/'.$patterns['bigAlphabet']->J.'/',
            'K' => '/'.$patterns['bigAlphabet']->K.'/',
            'L' => '/'.$patterns['bigAlphabet']->L.'/',
            'M' => '/'.$patterns['bigAlphabet']->M.'/',
            'N' => '/'.$patterns['bigAlphabet']->N.'/',
            'O' => '/'.$patterns['bigAlphabet']->O.'/',
            'P' => '/'.$patterns['bigAlphabet']->P.'/',
            'Q' => '/'.$patterns['bigAlphabet']->Q.'/',
            'R' => '/'.$patterns['bigAlphabet']->R.'/',
            'S' => '/'.$patterns['bigAlphabet']->S.'/',
            'T' => '/'.$patterns['bigAlphabet']->T.'/',
            'U' => '/'.$patterns['bigAlphabet']->U.'/',
            'V' => '/'.$patterns['bigAlphabet']->V.'/',
            'W' => '/'.$patterns['bigAlphabet']->W.'/',
            'X' => '/'.$patterns['bigAlphabet']->X.'/',
            'Y' => '/'.$patterns['bigAlphabet']->Y.'/',
            'Z' => '/'.$patterns['bigAlphabet']->Z.'/',
            '0' => '/'.$patterns['numbs']->_0.'/',
            '1' => '/'.$patterns['numbs']->_1.'/',
            '2' => '/'.$patterns['numbs']->_2.'/',
            '3' => '/'.$patterns['numbs']->_3.'/',
            '4' => '/'.$patterns['numbs']->_4.'/',
            '5' => '/'.$patterns['numbs']->_5.'/',
            '6' => '/'.$patterns['numbs']->_6.'/',
            '7' => '/'.$patterns['numbs']->_7.'/',
            '8' => '/'.$patterns['numbs']->_8.'/',
            '9' => '/'.$patterns['numbs']->_9.'/'
        );

        $replace = array_map( function ($pattern) {
            return preg_replace('/[+]/', '\+', $pattern);
        }, $replace);

        return preg_replace(array_values($replace), array_keys($replace), $data);
    }

    //Read and get the rules of cryptografy
    function getCode ($file) {
        $handle = file($file);
        $i = new ArrayIterator($handle);
        $content = '';

        while ($i->valid()) {
            $content .= $i->current();
            $i->next();
        }

        return $content;
    }
    
    function typeAndSize ($text) {
        /*
        0 - small
        1 - big
        2 - number
        3 - special caracters
        */
        if (preg_match('/[a-z]/', $text))
            return 0;
        else if (preg_match('/[A-Z]/', $text))
            return 1;
        else if (preg_match('/[0-9]/', $text))
            return 2;
        else
            return 3;
    }  
    
    function setSource ($source) {
        global $src;
        $src = $source;
    }
    
?>