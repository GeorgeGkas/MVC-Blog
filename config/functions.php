<?php
    namespace functions;
    
    function _Title() {
        global $_Title;
        echo $_Title;
    }

    function _IncludeDependances() {
        global $AppInclude;
        if (!empty($AppInclude['css'])) {
            foreach ($AppInclude['css'] as $file) {
                echo '<link rel="stylesheet" type="text/css" href="'.$file.'">';
            }
        }

        if (!empty($AppInclude['js'])) {
            foreach ($AppInclude['js'] as $file) {
                echo '<script type="text/javascript" src="'.$file.'"></script>';
            }
        }
    }


?>